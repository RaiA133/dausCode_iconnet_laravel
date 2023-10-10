// FUNGSI SERCING DATA //
function performSearch() {
    const searchInput = document.getElementById("searchInput").value.toLowerCase();
    const fatSearchArea = document.getElementById("fat-search-area");
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


// FUNGSI SERCING DATA //
    const searchButton = document.getElementById("searchButton");
    searchButton.addEventListener("click", performSearch);

    // menghentikan reload halaman ketika serach button ditekan dengan enter
    document.getElementById('searchButton').addEventListener('click', (e) => { e.preventDefault() });
// end FUNGSI SERCING DATA //


// PNEGULANGAN FAT DETAILS, TABLE VERTTICAL //
    const fatJSON = JSON.parse(fat);
    const table = document.getElementById('myTable');
    function fatCode(fatCodes){
        let fatTable = [];
        for ( let i = 0; i < fatJSON.length; i++ ) {
            if ( fatJSON[i][0] === fatCodes ) {
                let fatJudul = fatJSON[0];
                let fatDetail = fatJSON[i];
                fatTable = {0:fatJudul, 1:fatDetail}
            }
        }
        for (let z = 0; z < fatTable[0].length; z++) {
            
            const row = table.insertRow(); // membuat tbody dan tr didalamnya sekaligus

            const fatTH = document.createElement('th');
            fatTH.textContent = fatTable[0][z];
            row.appendChild(fatTH);

            const fatTD = document.createElement('td');
            fatTD.textContent = ':';
            row.appendChild(fatTD);

            const fatTD2 = document.createElement('td');
            fatTD2.textContent = fatTable[1][z];
            row.appendChild(fatTD2);
        }
    }

    // menghapus / clear table details fat setelah diclose
    document.getElementById('fat-modal-close').addEventListener('click', () => {
        document.getElementById('myTable').innerHTML = "";
    });
// END FAT //



