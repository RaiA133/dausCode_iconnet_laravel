var kota = {};

// Iterate through the dataArray and convert it to the desired structure
for (var i = 0; i < jsonData.length; i++) {
    var key = jsonData[i][0];
    var coordinates = jsonData[i][1].replace(/,/g, ",");
    kota[key] = coordinates;
}
// Resulting object
console.log(kota);

// rumus hitung haversine = perhitungan jarak
function rumus_haversine(lat1, lon1, lat2, lon2) {
    const R = 6371; // Radius bumi dalam kilometer
    const rlat1 = lat1 * (Math.PI / 180); // Mengubah derajat ke radian
    const rlat2 = lat2 * (Math.PI / 180); // Mengubah derajat ke radian
    const difflat = rlat2 - rlat1; // Perbedaan radian (latitudes)
    const difflon = (lon2 - lon1) * (Math.PI / 180); // Perbedaan radian (longitudes)

    // rumus
    const d =
        2 *
        R *
        Math.asin(
            Math.sqrt(
                Math.sin(difflat / 2) * Math.sin(difflat / 2) +
                    Math.cos(rlat1) *
                        Math.cos(rlat2) *
                        Math.sin(difflon / 2) *
                        Math.sin(difflon / 2)
            )
        );
    return d;
}

// insert lokasi koordinat otomatis
const button = document.getElementById("getLocation");
button.addEventListener("click", () => {
    navigator.geolocation.getCurrentPosition((position) => {
        let { latitude, longitude } = position.coords; // latitude dan longitude USER
        userLatitude = latitude;
        userLongitude = longitude;
        proses(userLatitude, userLongitude);
    });
});
// insert lokasi koordinat manual
const buttonManual = document.getElementById("manualLocBtn");
buttonManual.addEventListener("click", () => {
    navigator.geolocation.getCurrentPosition((position) => {
        let manualLoc = document.getElementById("manualLocInput").value;
        const [userLatitude, userLongitude] = manualLoc
            .split(",")
            .map(parseFloat);
        proses(userLatitude, userLongitude);
    });
});

function proses(latitude, longitude) {
    const results = []; // array penampung untuk DOM

    // API CEK ALAMAT
    const url = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${latitude}&lon=${longitude}`;
    fetch(url)
        .then((res) => res.json())
        .then((data) => {
            let alamat = data.display_name;
            // console.table(data);
            document.getElementById("view-hasil").innerHTML =
                "<b>Titik Koordinatmu : </b>" +
                latitude +
                ", " +
                longitude +
                "<br>" +
                "<b>Anda sedang berada di : </b>" +
                alamat;

            // Call initMap with the retrieved latitude and longitude
            initMap(latitude, longitude);
        });
}

let map;

function initMap(userLatitude, userLongitude) {
    // The map, centered on user's location
    const center = { lat: userLatitude, lng: userLongitude };
    const options = { zoom: 11, scaleControl: true, center: center };
    map = new google.maps.Map(document.getElementById("map"), options);
    const directionsService = new google.maps.DirectionsService();
    const directionsRenderer = new google.maps.DirectionsRenderer({
        map: map,
        panel: document.getElementById("directionsPanel"),
    });
    const markers = [];

    // Menambahkan marker untuk lokasi pengguna
    const userMarker = new google.maps.Marker({
        position: center,
        map: map,
        title: "Lokasi Saya Sekarang!!!",
        // icon: {
        //     url: "https://dashboard.iconnet-operation.com/assets/img/iconnet/myMarker.png",
        //     scaledSize: new google.maps.Size(30, 30),
        // },
    });

    // Menambahkan event listener untuk marker pengguna
    userMarker.addListener("click", () => {
        // Lakukan sesuatu saat marker pengguna diklik
    });

    markers.push(userMarker); // Tambahkan marker pengguna ke dalam array markers

    for (let key in kota) {
        if (kota.hasOwnProperty(key)) {
            const nilai = kota[key];
            const [latTujuan, lonTujuan] = nilai.split(",").map(parseFloat);

            // Ganti URL gambar sesuai dengan lokasi gambar yang Anda ingin gunakan
            const customIcon1 =
                "https://dashboard.iconnet-operation.com/assets/img/iconnet/Iconnet.png"; // Ganti dengan URL gambar yang diinginkan
            const customIcon2 =
                "https://dashboard.iconnet-operation.com/assets/img/iconnet/myMarker.png"; // Ganti dengan URL gambar yang diinginkan

            // Menentukan ikon berdasarkan lokasi
            const iconUrl = key === center ? customIcon2 : customIcon1;

            // Menambahkan marker untuk setiap lokasi dengan gambar kustom
            const marker = new google.maps.Marker({
                position: { lat: latTujuan, lng: lonTujuan },
                map: map,
                title: key,
                icon: {
                    url: iconUrl,
                    scaledSize: new google.maps.Size(30, 30), // Sesuaikan ukuran gambar sesuai kebutuhan
                },
            });

            // Menambahkan event listener untuk setiap marker
            marker.addListener("click", () => {
                calculateAndDisplayRoute(
                    directionsService,
                    directionsRenderer,
                    userLatitude,
                    userLongitude,
                    latTujuan,
                    lonTujuan
                );

                // ============================== untuk mencari detail sebuah icon berdasarkan icon
                // yang sudah di klik=============
                // Misalnya, kita ingin mencetak jsonDataDetail berdasarkan key yang tidak diketahui
                const targetKey = key; // Ganti dengan key yang sesuai

                const foundElement = jsonDataDetail.find(
                    (element) => element[0] === targetKey
                );

                if (foundElement) {
                    console.log("Data untuk key", targetKey, ":", foundElement);

                    // Ambil nilai dengan indeks 0, 1, 2, dan 3
                    const selectedValues = foundElement.slice(0, 22);

                    // Update nilai pada tabel HTML
                    document.getElementById("index-0").innerText =
                        selectedValues[0];
                    document.getElementById("index-1").innerText =
                        selectedValues[1];
                    document.getElementById("index-3").innerText =
                        selectedValues[3];
                    document.getElementById("index-4").innerText =
                        selectedValues[4];
                    document.getElementById("index-7").innerText =
                        selectedValues[7];
                    document.getElementById("index-8").innerText =
                        selectedValues[8];
                    document.getElementById("index-9").innerText =
                        selectedValues[9];
                    document.getElementById("index-10").innerText =
                        selectedValues[10];
                    document.getElementById("index-11").innerText =
                        selectedValues[11];
                    document.getElementById("index-12").innerText =
                        selectedValues[12];
                    document.getElementById("index-14").innerText =
                        selectedValues[14];
                    document.getElementById("index-15").innerText =
                        selectedValues[15];
                    document.getElementById("index-16").innerText =
                        selectedValues[16];
                    document.getElementById("index-17").innerText =
                        selectedValues[17];
                    document.getElementById("index-18").innerText =
                        selectedValues[18];
                    document.getElementById("index-19").innerText =
                        selectedValues[19];
                    document.getElementById("index-20").innerText =
                        selectedValues[20];
                    document.getElementById("index-21").innerText =
                        selectedValues[21];
                } else {
                    console.log(
                        "Key",
                        targetKey,
                        "tidak ditemukan dalam jsonDataDetail"
                    );
                }
            });
            markers.push(marker);
        }
    }
}

// Fungsi untuk menghitung dan menampilkan rute
function calculateAndDisplayRoute(
    directionsService,
    directionsRenderer,
    userLatitude,
    userLongitude,
    latTujuan,
    lonTujuan
) {
    const request = {
        origin: { lat: userLatitude, lng: userLongitude },
        destination: { lat: latTujuan, lng: lonTujuan },
        travelMode: "DRIVING",
    };

    directionsService.route(request, (result, status) => {
        if (status == "OK") {
            directionsRenderer.setDirections(result);
        } else {
            console.error(`Error getting directions: ${status}`);
        }
    });
}
