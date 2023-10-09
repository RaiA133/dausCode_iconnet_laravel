function fetchData(region){
    console.log(region);
    const apiUrl = `https://sheets.googleapis.com/v4/spreadsheets/17JHm_VIMaJG3D_JADeCYWFTxRUiKe7LTTTXCZjAlhmU/values/${region}!A1:AA20?key=AIzaSyCwOuZAm8MkSet-tEv7sYCrkFUx8HSsAnk&majorDimension=ROWS`;

    fetch(apiUrl)
    .then(response => response.json())
    .then(data => {
        // console.log(data.values[0]);
        // console.log(data.values[1]);
    })
    .catch(error => {
        console.error("Error fetching data:", error);
    });
}

// GANTI REGION //
const regionSelect = document.getElementById("regionSelect");
regionSelect.addEventListener("change", function () {
    const selectedRegion = this.value;
    fetchData(selectedRegion);

    // menghapus data sebelumnya ketika ganti region, jadi tidak perlu reload
    const tableBody = document.getElementById("data-table-body");
    const tableHeader = document.querySelector(".table thead tr");
    tableBody.innerHTML = "";
    tableHeader.innerHTML = "";
});

// fetchData(regionSelect.value);

// end GANTI REGION //



// FUNGSI SERCING DATA //
function performSearch() {
    const searchInput = document.getElementById("searchInput").value.toLowerCase();
    const fatSearchArea = document.getElementById("fat-search-area");
    console.log(fatSearchArea);
    const tableRows = fatSearchArea.querySelectorAll("tr");

    tableRows.forEach(row => {
        const rowData = Array.from(row.querySelectorAll("td")).map(cell => cell.textContent.toLowerCase());

        if (rowData.some(cellText => cellText.includes(searchInput))) {
            row.style.display = ""; // menampilkan baris yang sesuai dengan data
        } else {
            row.style.display = "none"; // menghilangkan baris yang tidak sesuai dengan data
        }
    });
}
// Search Button
const searchButton = document.getElementById("searchButton");
searchButton.addEventListener("click", performSearch);

// menghentikan reload halaman ketika serach button ditekan dengan enter
document.getElementById('searchButton').addEventListener('click', (e) => { e.preventDefault() });

// end FUNGSI SERCING DATA //

function fatCode(fatCodes){
    const fatCode = fatCodes
    console.log(fatCode);
    document.getElementById('fat-details').innerText = `
        <td> ${fatCode} <td>
    `;
}

