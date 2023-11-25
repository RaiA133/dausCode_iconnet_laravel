// REALTIME SEARCH FAT //

const searchOLT = document.getElementById('searchInputFAT');
const items = document.querySelectorAll('#tbodyFAT tr');

searchOLT.addEventListener('input', (e) => searchDataFAT(e.target.value));

function searchDataFAT(search) {
    items.forEach((item) => {
        const oltText = item.querySelector('td:nth-child(2)').textContent.toLowerCase();

        if (oltText.includes(search.toLowerCase())) {
            item.classList.remove('d-none');
        } else {
            item.classList.add('d-none');
        }
    });
}


let userLatitude;
let userLongitude;

const getLocation = document.getElementById("getLocation");
getLocation.addEventListener("click", () => {
    navigator.geolocation.getCurrentPosition(position => {
        const { latitude, longitude } = position.coords;
        userLatitude = latitude;
        userLongitude = longitude;

        const url = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${latitude}&lon=${longitude}`;
        fetch(url)
        .then(res => res.json())
        .then(data => {
          let hasil = data.lat + " " + data.lon;
          let alamat = data.display_name;
          console.log(alamat);
          console.log(hasil);
      
          // Tambahkan opsi baru ke elemen select
          const startSelect = document.getElementById("start");
          const newOption = document.createElement("option");
          newOption.value = hasil; // Atau sesuaikan dengan nilai yang sesuai
          newOption.text = alamat;
          startSelect.add(newOption);
      
          // Tampilkan hasil alamat
          document.getElementById("view-hasil").innerHTML =
          alamat;
        })
        .catch(() => {
          console.log("error fetching data from API");
        });
    });
});


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
    document.getElementById('fatModalTitle').innerHTML = fatCodes // Judul Modal diberi FAT
    let fatTable = [];
    for ( let i = 0; i < fatJSON.length; i++ ) {
        if ( fatJSON[i][0] === fatCodes ) {             // jika params == data region di kolom 5 (JIKA DATA PENCARI BUKAN DARI A, BISA UBAH BERDASARKAN KOLOM, INI 1 = A (KOLOM A = FAT))
            let fatJudul = fatJSON[0];
            let fatDetail = fatJSON[i];
            fatTable = {0:fatJudul, 1:fatDetail}
        }
    }
    for (let z = 0; z < fatTable[0].length; z++) {
            
        const row = tableFAT.insertRow();               // membuat tbody dan tr didalamnya sekaligus

        const fatTH = document.createElement('th');
        fatTH.textContent = fatTable[0][z];
        row.appendChild(fatTH);

        const fatTD = document.createElement('td');
        fatTD.textContent = ':';
        row.appendChild(fatTD);

        const fatTD2 = document.createElement('td');
        fatTD2.textContent = fatTable[1][z];
        row.appendChild(fatTD2);

        // const hasil = `
        // <tr>
        //     <th>${fatTable[0][z]}</th>
        //     <td>:</td>
        //     <td>${fatTable[1][z]}</td>
        // </tr>
        // `;
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
document.querySelector('#modalFAT .modal-dialog').addEventListener('click', (el) => {       // params harus disertakan untuk  
    el.stopPropagation();                                                                   // menjalankan stopPropagation();
});
       

