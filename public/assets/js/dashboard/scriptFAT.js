
console.log('FAT')

// FUNGSI SERCING DATA //
function performSearchFAT() {
    const searchInputFAT = document.getElementById("searchInputFAT").value.toLowerCase();
    const fatSearchArea = document.getElementById("fat-search-area");
    const tableRows = fatSearchArea.querySelectorAll("tr");

    tableRows.forEach(row => {
        const rowData = Array.from(row.querySelectorAll("td")).map(cell => cell.textContent.toLowerCase());
        if (rowData.some(cellText => cellText.includes(searchInputFAT))) {
            row.style.display = ""; // menampilkan baris yang sesuai dengan data
        } else {
            row.style.display = "none"; // menghilangkan baris yang tidak sesuai dengan data
        }
    });
}


const searchButtonFAT = document.getElementById("searchButtonFAT");
searchButtonFAT.addEventListener("click", performSearchFAT);

// menghentikan reload halaman ketika serach button ditekan dengan enter
document.getElementById('searchButtonFAT').addEventListener('click', (e) => { e.preventDefault() });
// end FUNGSI SERCING DATA //


// PNEGULANGAN FAT DETAILS, TABLE VERTTICAL //
const fatJSON = JSON.parse(regionData);
const tableFAT = document.getElementById('myTableFAT'); // table penampung FAT
function fatCode(fatCodes){
    let fatTable = [];
    for ( let i = 0; i < fatJSON.length; i++ ) {
        if ( fatJSON[i][0] === fatCodes ) {             // jika params == data region di kolom 5 (JIKA DATA PENCARI BUKAN DARI A, BISA UBAH BERDASARKAN KOLOM, INI 1 = A (KOLOM A = FAT))
            let fatJudul = fatJSON[0];
            let fatDetail = fatJSON[i];
            fatTable = {0:fatJudul, 1:fatDetail}
        }
    }
    for (let z = 0; z < fatTable[0].length; z++) {
            
        const row = tableFAT.insertRow(); // membuat tbody dan tr didalamnya sekaligus

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
    tableFAT.innerHTML = "";
});
document.getElementById('modalFAT').addEventListener('click', () => {
     document.getElementById('myTableFAT').innerHTML = "";
});
    
// membuat ketika bagian dalam dari modal diklik tidak akan ikut ikutan seperti 
// parentnya yg menghilangkan details ketika parent/element pembungkusnya diklik
document.querySelector('#modalFAT .modal-dialog').addEventListener('click', (el) => { // params harus disertakan untuk  
    el.stopPropagation();                                                                 // menjalankan stopPropagation();
});
       

