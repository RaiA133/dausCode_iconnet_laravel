console.log('OLT')


// REALTIME SEARCH OLT //

const searchOLT = document.getElementById('searchInputOLT');
const items = document.querySelectorAll('#tbodyOLT tr');

searchOLT.addEventListener('input', (e) => searchDataOLT(e.target.value));

function searchDataOLT(search) {
    items.forEach((item) => {
        const oltText = item.querySelector('td:nth-child(2)').textContent.toLowerCase();

        if (oltText.includes(search.toLowerCase())) {
            item.classList.remove('d-none');
        } else {
            item.classList.add('d-none');
        }
    });
}


// PNEGULANGAN FAT DETAILS, TABLE VERTTICAL //
const oltJSON = JSON.parse(regionData);
const tableOLT = document.getElementById('myTableOLT'); // table penampung OLT

function oltCode(oltCodes){
    document.getElementById('oltModalTitle').innerHTML = oltCodes // Judul Modal diberi OLT
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