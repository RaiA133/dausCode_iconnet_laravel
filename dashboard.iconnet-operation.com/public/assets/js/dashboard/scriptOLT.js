console.log("OLT");

// REALTIME SEARCH OLT //

const searchOLT = document.getElementById("searchInputOLT");
const itemsOLT = document.querySelectorAll("#tbodyOLT tr");

searchOLT.addEventListener("input", (e) => searchDataOLT(e.target.value));

function searchDataOLT(search) {
    itemsOLT.forEach((item) => {
        const oltText = item
            .querySelector("td:nth-child(2)")
            .textContent.toLowerCase();

        if (oltText.includes(search.toLowerCase())) {
            item.classList.remove("d-none");
        } else {
            item.classList.add("d-none");
        }
    });
}

// Memeriksa apakah jsonDataFatKey telah berhasil dikirim
// console.log('jsonDataFatKey:', window.jsonDataFatKey);
// Menampilkan data keseluruhan dari jsonDataDetail
console.log("Data FAT keseluruhan:", jsonDataDetail);

// Fungsi untuk menangani klik pada tombol Lihat
function handleLihatClickOlt(dataOLT) {
    // Mendapatkan key dari dataOLT yang diklik
    const keyOlt = dataOLT;

    // function untuk mencari jumlah fat dari satu fdt
    const jumlahFatPadaOlt = jsonDataDetail.filter(
        (element) => element[9] === keyOlt
    ).length;

    document.getElementById("olt-22").innerHTML = jumlahFatPadaOlt

    // console.log("jumlah fat dari fdt"+ keyOlt +"adlah:" +jumlahFatPadaOlt);

    // Mencari detail dari jsonDataDetail berdasarkan key
    const cariDetailOLT = jsonDataDetail.find(
        (element) => element[9] === keyOlt
    );

    if (cariDetailOLT) {
        // Ambil nilai dengan indeks 0, 1, 2, dan 3
        const selectOltDetail = cariDetailOLT.slice(0, 22);

        // Update nilai pada tabel HTML
        document.getElementById("olt-0").innerText = selectOltDetail[0];
        document.getElementById("olt-1").innerText = selectOltDetail[1];
        document.getElementById("olt-3").innerText = selectOltDetail[3];
        document.getElementById("olt-4").innerText = selectOltDetail[4];
        document.getElementById("olt-7").innerText = selectOltDetail[7];
        document.getElementById("olt-8").innerText = selectOltDetail[8];
        document.getElementById("olt-9").innerText = selectOltDetail[9];
        document.getElementById("olt-10").innerText = selectOltDetail[10];
        document.getElementById("olt-11").innerText = selectOltDetail[11];
        document.getElementById("olt-12").innerText = selectOltDetail[12];
        document.getElementById("olt-14").innerText = selectOltDetail[14];
        document.getElementById("olt-15").innerText = selectOltDetail[15];
        document.getElementById("olt-16").innerText = selectOltDetail[16];
        document.getElementById("olt-17").innerText = selectOltDetail[17];
        document.getElementById("olt-18").innerText = selectOltDetail[18];
        document.getElementById("olt-19").innerText = selectOltDetail[19];
        document.getElementById("olt-20").innerText = selectOltDetail[20];
        document.getElementById("olt-21").innerText = selectOltDetail[21];
    } else {
        console.log("Data untuk key", keyOlt, "tidak ditemukan");
    }
}
