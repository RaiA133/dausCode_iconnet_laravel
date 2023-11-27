// REALTIME SEARCH FDT //

const searchFDT = document.getElementById('searchInputFDT');
const itemsFDT = document.querySelectorAll('#tbodyFDT tr');

searchFDT.addEventListener('input', (e) => searchDataFDT(e.target.value));

function searchDataFDT(search) {
    itemsFDT.forEach((item) => {
        const fdtText = item.querySelector('td:nth-child(2)').textContent.toLowerCase();

        if (fdtText.includes(search.toLowerCase())) {
            item.classList.remove('d-none');
        } else {
            item.classList.add('d-none');
        }
    });
}


// Fungsi untuk menangani klik pada tombol Lihat
function handleLihatClickFDT(dataFDT) {
  // Mendapatkan key dari dataFAT yang diklik
  const keyfdt = dataFDT;

      // function untuk mencari jumlah fat dari satu fdt
      const jumlahFatPadaFdt = jsonDataDetail.filter(
        (element) => element[2] === keyfdt
    ).length;

    document.getElementById("fdt-22").innerHTML = jumlahFatPadaFdt

  // Mencari detail dari jsonDataDetail berdasarkan key
  const cariDetailFDT = jsonDataDetail.find(
      (element) => element[2] === keyfdt
  );

  if (cariDetailFDT) {

    // Ambil nilai dengan indeks 0, 1, 2, dan 3
    const selectFdtDetail = cariDetailFDT.slice(0, 22);

    // Update nilai pada tabel HTML
    document.getElementById("fdt-0").innerText =
        selectFdtDetail[0];
    document.getElementById("fdt-1").innerText =
        selectFdtDetail[1];
    document.getElementById("fdt-3").innerText =
        selectFdtDetail[3];
    document.getElementById("fdt-4").innerText =
        selectFdtDetail[4];
    document.getElementById("fdt-7").innerText =
        selectFdtDetail[7];
    document.getElementById("fdt-8").innerText =
        selectFdtDetail[8];
    document.getElementById("fdt-9").innerText =
        selectFdtDetail[9];
    document.getElementById("fdt-10").innerText =
        selectFdtDetail[10];
    document.getElementById("fdt-11").innerText =
        selectFdtDetail[11];
    document.getElementById("fdt-12").innerText =
        selectFdtDetail[12];
    document.getElementById("fdt-14").innerText =
        selectFdtDetail[14];
    document.getElementById("fdt-15").innerText =
        selectFdtDetail[15];
    document.getElementById("fdt-16").innerText =
        selectFdtDetail[16];
    document.getElementById("fdt-17").innerText =
        selectFdtDetail[17];
    document.getElementById("fdt-18").innerText =
        selectFdtDetail[18];
    document.getElementById("fdt-19").innerText =
        selectFdtDetail[19];
    document.getElementById("fdt-20").innerText =
        selectFdtDetail[20];
    document.getElementById("fdt-21").innerText =
        selectFdtDetail[21];

  } else {
      console.log("Data untuk key", keyfdt, "tidak ditemukan");
  }

}
