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

function handleLihatClickOlt(keyOlt) {
  console.log("key adalah " + keyOlt);

  // Variabel untuk menyimpan data yang sesuai dengan keyOlt
  let selectedDataOlt = null;
  

  for (const propKey in jsonOltDetail) {
    const value = jsonOltDetail[propKey]?.[1];

    if (value === keyOlt) {
      selectedDataOlt = jsonOltDetail[propKey];
      break;
    }
  }

  const turPercentage = selectedDataOlt[18] / 100;
  const sisa = selectedDataOlt[11] - selectedDataOlt[12];


  document.getElementById("olt-3").innerText = sisa;
  document.getElementById("olt-4").innerText = turPercentage;


  // Mengirim data ke elemen HTML
  if (selectedDataOlt) {
    document.getElementById("olt-1").innerText = selectedDataOlt[1];
    document.getElementById("olt-11").innerText = selectedDataOlt[11];
    document.getElementById("olt-12").innerText = selectedDataOlt[12];
  } else {
    console.log(`Data tidak ditemukan untuk keyOlt '${keyOlt}'.`);
  }
}







// console.log("key adalah " +keyOlt)