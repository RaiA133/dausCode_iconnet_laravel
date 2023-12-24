// REALTIME SEARCH FAT //

const searchFAT = document.getElementById("searchInputFAT");
const itemsFAT = document.querySelectorAll("#tbodyFAT tr");

searchFAT.addEventListener("input", (e) => searchDataFAT(e.target.value));

function searchDataFAT(search) {
    itemsFAT.forEach((item) => {
        const fatText = item
            .querySelector("td:nth-child(2)")
            .textContent.toLowerCase();

        if (fatText.includes(search.toLowerCase())) {
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
function handleLihatClick(dataFAT) {
    // Mendapatkan key dari dataFAT yang diklik
    const keyfat = dataFAT;

    // Mencari detail dari jsonDataDetail berdasarkan key
    const cariDetail = jsonDataDetail.find(
        (element) => element[1] === keyfat
    );

    if (cariDetail) {

      // Ambil nilai dengan indeks 0, 1, 2, dan 3
      const selectFatDetail = cariDetail.slice(0, 22);

      // Update nilai pada tabel HTML
      document.getElementById("fat-0").innerText =
          selectFatDetail[0];
      document.getElementById("fat-1").innerText =
          selectFatDetail[1];
      document.getElementById("fat-3").innerText =
          selectFatDetail[3];
      document.getElementById("fat-4").innerText =
          selectFatDetail[4];
      document.getElementById("fat-7").innerText =
          selectFatDetail[7];
      document.getElementById("fat-8").innerText =
          selectFatDetail[8];
      document.getElementById("fat-9").innerText =
          selectFatDetail[9];
      document.getElementById("fat-10").innerText =
          selectFatDetail[10];
      document.getElementById("fat-11").innerText =
          selectFatDetail[11];
      document.getElementById("fat-12").innerText =
          selectFatDetail[12];
      document.getElementById("fat-14").innerText =
          selectFatDetail[14];
      document.getElementById("fat-15").innerText =
          selectFatDetail[15];
      document.getElementById("fat-16").innerText =
          selectFatDetail[16];
      document.getElementById("fat-17").innerText =
          selectFatDetail[17];
      document.getElementById("fat-18").innerText =
          selectFatDetail[18];
      document.getElementById("fat-19").innerText =
          selectFatDetail[19];
      document.getElementById("fat-20").innerText =
          selectFatDetail[20];
      document.getElementById("fat-21").innerText =
          selectFatDetail[21];

    } else {
        console.log("Data untuk key", keyfat, "tidak ditemukan");
    }

}
