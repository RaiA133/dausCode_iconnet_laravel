console.log("OLT");

// REALTIME SEARCH OLT //

const searchOLT = document.getElementById("searchInputOLT");
const itemsOLT = document.querySelectorAll("#tbodyOLT tr");

searchOLT.addEventListener("input", (e) => searchDataOLT(e.target.value));

function searchDataOLT(search) {
    itemsOLT.forEach((item) => {
        let found = false;

        // Iterate through all td elements within the current item
        item.querySelectorAll("td").forEach((td) => {
            const tdText = td.textContent.toLowerCase();

            // Check if any td element contains the search text
            if (tdText.includes(search.toLowerCase())) {
                found = true;
            }
        });

        // Toggle visibility based on search result
        if (found) {
            item.classList.remove("d-none");
        } else {
            item.classList.add("d-none");
        }
    });
}




// Mendengarkan perubahan pada elemen select dengan id "selectCity"
document.getElementById("selectCity").addEventListener("change", filterTable);

// Mendengarkan perubahan pada elemen select dengan id "selectType"
document.getElementById("selectType").addEventListener("change", filterTable);

function filterTable() {
    // Mendapatkan nilai yang dipilih dari elemen select "selectCity" dan "selectType"
    const selectedCity = document.getElementById("selectCity").value;
    const selectedType = document.getElementById("selectType").value;

    // Mendapatkan semua baris dalam tabel
    const rows = document.querySelectorAll("#tbodyOLT tr");

    // Loop melalui setiap baris dan terapkan filter
    rows.forEach((row) => {
        const city = row.querySelector("#cityData").textContent;
        const asalOLT = row.querySelector("#asalOLT").textContent;

        // Memeriksa apakah baris sesuai dengan filter yang dipilih
        const cityMatch = selectedCity === "All" || city === selectedCity;
        const typeMatch = selectedType === "All" || asalOLT === selectedType;

        // Menyembunyikan/menampilkan baris berdasarkan hasil filter
        if (cityMatch && typeMatch) {
            row.style.display = ""; // Menampilkan baris jika sesuai dengan filter
        } else {
            row.style.display = "none"; // Menyembunyikan baris jika tidak sesuai dengan filter
        }
    });
}


// Tambahkan event listener untuk perubahan pada switch
// Tambahkan event listener untuk perubahan pada switch
document.getElementById("toggleRowsSwitch").addEventListener("change", toggleRows);

function toggleRows() {
    const tbodyOLT = document.getElementById("tbodyOLT");
    const rows = tbodyOLT.querySelectorAll("tr");

    // Ambil nilai switch
    const switchValue = document.getElementById("toggleRowsSwitch").checked;

    // Membatasi untuk menampilkan hanya 5 baris pertama jika switch false, jika true tampilkan semua baris
    const limit = switchValue ? rows.length : 3;

    rows.forEach((row, index) => {
        // Tampilkan baris jika index kurang dari limit, sisanya sembunyikan
        if (index < limit) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    });
}


// Memeriksa apakah jsonDataFatKey telah berhasil dikirim
// console.log('jsonDataFatKey:', window.jsonDataFatKey);
// Menampilkan data keseluruhan dari jsonOltDetail
console.log("Data FAT keseluruhan:", jsonOltDetail);

// Fungsi untuk menangani klik pada tombol Lihat
function handleLihatClickOlt(paramsOlt) {
    // Mendapatkan key dari paramsOlt yang diklik
    const keyOlt = paramsOlt;

    // function untuk mencari jumlah fat dari satu fdt
    const jumlahFatPadaOlt = jsonOltDetail.filter(
        (element) => element[2] === keyOlt
    ).length;


    // console.log("jumlah fat dari fdt"+ keyOlt +"adlah:" +jumlahFatPadaOlt);

    // Mencari detail dari jsonOltDetail berdasarkan key
    const cariDetailOLT = jsonOltDetail.find(
        (element) => element[9] === keyOlt
    );

      console.log(cariDetailOLT)

    // if (cariDetailOLT) {
    //     // Ambil nilai dengan indeks 0, 1, 2, dan 3
    //     const selectOltDetail = cariDetailOLT.slice(0, 22);

    //     // Update nilai pada tabel HTML
    //     document.getElementById("olt-0").innerText = selectOltDetail[0];
    //     document.getElementById("olt-1").innerText = selectOltDetail[1];
    //     document.getElementById("olt-3").innerText = selectOltDetail[3];
    //     document.getElementById("olt-4").innerText = selectOltDetail[4];
    //     document.getElementById("olt-7").innerText = selectOltDetail[7];
    //     document.getElementById("olt-8").innerText = selectOltDetail[8];
    //     document.getElementById("olt-9").innerText = selectOltDetail[9];
    //     document.getElementById("olt-10").innerText = selectOltDetail[10];
    //     document.getElementById("olt-11").innerText = selectOltDetail[11];
    //     document.getElementById("olt-12").innerText = selectOltDetail[12];
    //     document.getElementById("olt-14").innerText = selectOltDetail[14];
    //     document.getElementById("olt-15").innerText = selectOltDetail[15];
    //     document.getElementById("olt-16").innerText = selectOltDetail[16];
    //     document.getElementById("olt-17").innerText = selectOltDetail[17];
    //     document.getElementById("olt-18").innerText = selectOltDetail[18];
    //     document.getElementById("olt-19").innerText = selectOltDetail[19];
    //     document.getElementById("olt-20").innerText = selectOltDetail[20];
    //     document.getElementById("olt-21").innerText = selectOltDetail[21];
    // } else {
    //     console.log("Data untuk key", keyOlt, "tidak ditemukan");
    // }
}
