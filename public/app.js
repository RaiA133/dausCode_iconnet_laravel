function fetchData(region){
    console.log(region);
    const apiUrl = `https://sheets.googleapis.com/v4/spreadsheets/17JHm_VIMaJG3D_JADeCYWFTxRUiKe7LTTTXCZjAlhmU/values/${region}!A1:AA20?key=AIzaSyCwOuZAm8MkSet-tEv7sYCrkFUx8HSsAnk&majorDimension=ROWS`;

    fetch(apiUrl)
    .then(response => response.json())
    .then(data => {
        // console.log(data.values[0]);
        // console.log(data.values[1]);
    })
    .catch(error => {
        console.error("Error fetching data:", error);
    });
}

// GANTI REGION //
const regionSelect = document.getElementById("regionSelect");
regionSelect.addEventListener("change", function () {
    const selectedRegion = this.value;
    fetchData(selectedRegion);

    // menghapus data sebelumnya ketika ganti region, jadi tidak perlu reload
    const tableBody = document.getElementById("data-table-body");
    const tableHeader = document.querySelector(".table thead tr");
    tableBody.innerHTML = "";
    tableHeader.innerHTML = "";
});

fetchData(regionSelect.value);
// end GANTI REGION //