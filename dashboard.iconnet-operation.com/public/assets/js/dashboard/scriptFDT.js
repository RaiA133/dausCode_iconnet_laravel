// REALTIME SEARCH FDT //

const searchOLT = document.getElementById('searchInputFDT');
const items = document.querySelectorAll('#tbodyFDT tr');

searchOLT.addEventListener('input', (e) => searchDataFDT(e.target.value));

function searchDataFDT(search) {
    items.forEach((item) => {
        const oltText = item.querySelector('td:nth-child(2)').textContent.toLowerCase();

        if (oltText.includes(search.toLowerCase())) {
            item.classList.remove('d-none');
        } else {
            item.classList.add('d-none');
        }
    });
}