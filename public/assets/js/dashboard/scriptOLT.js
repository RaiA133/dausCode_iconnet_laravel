console.log('OLT')

// FUNGSI SERCING DATA //
function performSearchOLT() {
    const searchInputOLT = document.getElementById("searchInputOLT").value.toLowerCase();
    const oltSearchArea = document.getElementById("olt-search-area");
    const tableRows = oltSearchArea.querySelectorAll("tr");

    tableRows.forEach(row => {
        const rowData = Array.from(row.querySelectorAll("td")).map(cell => cell.textContent.toLowerCase());
        if (rowData.some(cellText => cellText.includes(searchInputOLT))) {
            row.style.display = ""; // menampilkan baris yang sesuai dengan data
        } else {
            row.style.display = "none"; // menghilangkan baris yang tidak sesuai dengan data
        }
    });
}


const searchButtonOLT = document.getElementById("searchButtonOLT");
searchButtonOLT.addEventListener("click", performSearchOLT);

// menghentikan reload halaman ketika serach button ditekan dengan enter
document.getElementById('searchButtonOLT').addEventListener('click', (e) => { e.preventDefault() });
// end FUNGSI SERCING DATA //

// PNEGULANGAN FAT DETAILS, TABLE VERTTICAL //
const oltJSON = JSON.parse(regionData);
const tableOLT = document.getElementById('myTableOLT'); // table penampung OLT
function oltCode(oltCodes){
    let oltTable = [];
    for ( let i = 0; i < oltJSON.length; i++ ) {
        if ( oltJSON[i][5] === oltCodes ) {             // jika params == data region di kolom 5 (JIKA DATA PENCARI BUKAN DARI A, BISA UBAH BERDASARKAN 1 = A, INI 5 = E (KOLOM E = OLT))
            let oltJudul = oltJSON[0];
            let oltDetail = oltJSON[i];
            oltTable = {0:oltJudul, 1:oltDetail}
        }
    }
    for (let z = 0; z < oltTable[0].length; z++) {
            
        const row = tableOLT.insertRow(); // membuat tbody dan tr didalamnya sekaligus

        const oltTH = document.createElement('th');
        oltTH.textContent = oltTable[0][z];
        row.appendChild(oltTH);

        const oltTD = document.createElement('td');
        oltTD.textContent = ':';
        row.appendChild(oltTD);

        const oltTD2 = document.createElement('td');
        oltTD2.textContent = oltTable[1][z];
        row.appendChild(oltTD2);
    }
}

// menghapus / clear table details fat setelah diclose
document.getElementById('olt-modal-close').addEventListener('click', () => {
    tableOLT.innerHTML = "";
});
document.getElementById('modalOLT').addEventListener('click', () => {
     document.getElementById('mytableOLT').innerHTML = "";
});

// membuat ketika bagian dalam dari modal diklik tidak akan ikut ikutan seperti 
// parentnya yg menghilangkan details ketika parent/element pembungkusnya diklik
document.querySelector('#modalOLT .modal-dialog').addEventListener('click', (el) => { // params harus disertakan untuk  
    el.stopPropagation();                                                                 // menjalankan stopPropagation();
});