// function initMap() {
//   const directionsRenderer = new google.maps.DirectionsRenderer();
//   const directionsService = new google.maps.DirectionsService();
//   const map = new google.maps.Map(document.getElementById("map"), {
//     zoom: 11,
//     center: { lat: -6.896264, lng: 107.608807},
//     disableDefaultUI: false,
//   });

//   directionsRenderer.setMap(map);
//   directionsRenderer.setPanel(document.getElementById("result"));

//   const control = document.getElementById("floating-panel");

//   map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);

//   const onChangeHandler = function () {
//     calculateAndDisplayRoute(directionsService, directionsRenderer);
//   };

//   document.getElementById("start").addEventListener("change", onChangeHandler);
//   document.getElementById("end").addEventListener("change", onChangeHandler);
// }

// function calculateAndDisplayRoute(directionsService, directionsRenderer) {
//   const start = document.getElementById("start").value;
//   const end = document.getElementById("end").value;

//   directionsService
//     .route({
//       origin: start,
//       destination: end,
//       travelMode: google.maps.TravelMode.DRIVING,
//     })
//     .then((response) => {
//       directionsRenderer.setDirections(response);
//     })
//     .catch((e) => window.alert("Directions request failed due to " + status));
// }

// window.initMap = initMap;


var kota = {};

// Iterate through the dataArray and convert it to the desired structure
for (var i = 0; i < jsonData.length; i++) {
    var key = jsonData[i][0];
    var coordinates = jsonData[i][1].replace(/,/g, ',');
    kota[key] = coordinates;
}

// Resulting object
console.log(kota);

        

    
    // rumus hitung haversine = perhitungan jarak
    function rumus_haversine(lat1, lon1, lat2, lon2) {
        const R = 6371; // Radius bumi dalam kilometer 
        const rlat1 = lat1 * (Math.PI/180); // Mengubah derajat ke radian
        const rlat2 = lat2 * (Math.PI/180); // Mengubah derajat ke radian
        const difflat = rlat2 - rlat1; // Perbedaan radian (latitudes)
        const difflon = (lon2 - lon1) * (Math.PI/180); // Perbedaan radian (longitudes)
        
        // rumus
        const d = 2 * R * Math.asin(Math.sqrt(Math.sin(difflat/2) * Math.sin(difflat/2) + Math.cos(rlat1) * Math.cos(rlat2) * Math.sin(difflon/2) * Math.sin(difflon/2)));
        return d;
    }



    // insert lokasi koordinat otomatis
    const button = document.getElementById("getLocation");
    button.addEventListener("click", () => {

        navigator.geolocation.getCurrentPosition(position => {
            let { latitude, longitude } = position.coords;    // latitude dan longitude USER 
            userLatitude = latitude;
            userLongitude = longitude;
            proses(userLatitude, userLongitude);
        });
    });
    // insert lokasi koordinat manual
    const buttonManual = document.getElementById("manualLocBtn");
    buttonManual.addEventListener("click", () => {

        navigator.geolocation.getCurrentPosition(position => {
            let manualLoc = document.getElementById("manualLocInput").value;
            const [userLatitude, userLongitude] = manualLoc.split(',').map(parseFloat);
            proses(userLatitude, userLongitude);
        });
    });



    function proses(latitude, longitude) {
        const results = [];                                 // array penampung untuk DOM       

        // API CEK ALAMAT
        const url = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${latitude}&lon=${longitude}`;
        fetch(url).then(res => res.json()).then(data => {
            let alamat = data.display_name;
            // console.table(data);
            document.getElementById("view-hasil").innerHTML = "<b>Titik Koordinatmu : </b>" + latitude +", " + longitude + "<br>" + "<b>Anda sedang berada di : </b>" + alamat;

            // Call initMap with the retrieved latitude and longitude
            initMap(latitude, longitude);
        })

    }


    var map;

    function initMap(userLatitude, userLongitude) {
        // The map, centered on user's location
        const center = { lat: userLatitude, lng: userLongitude };
        const options = { zoom: 11, scaleControl: true, center: center };
        const map = new google.maps.Map(document.getElementById('map'), options);
        const directionsService = new google.maps.DirectionsService();
        const directionsRenderer = new google.maps.DirectionsRenderer({ map: map, panel: document.getElementById('directionsPanel') });
        const markers = [];
    
        for (let key in kota) {
            if (kota.hasOwnProperty(key)) {
                const nilai = kota[key];
                const [latTujuan, lonTujuan] = nilai.split(',').map(parseFloat);
    
                // Ganti URL gambar sesuai dengan lokasi gambar yang Anda ingin gunakan
                const customIcon = 'https://dashboard.iconnet-operation.com/assets/img/iconnet/icon-maps.png'; // Ganti dengan URL gambar yang diinginkan
                // const customIcon = 'https://cdn-icons-png.flaticon.com/512/5988/5988246.png'; // Ganti dengan URL gambar yang diinginkan
    
                // Menambahkan marker untuk setiap lokasi dengan gambar kustom
                const marker = new google.maps.Marker({
                    position: { lat: latTujuan, lng: lonTujuan },
                    map: map,
                    title: key,
                    icon: {
                        url: customIcon,
                        scaledSize: new google.maps.Size(30, 30) // Sesuaikan ukuran gambar sesuai kebutuhan
                    },
                });
    
                // Menambahkan event listener untuk setiap marker
                marker.addListener('click', () => {
                    calculateAndDisplayRoute(directionsService, directionsRenderer, userLatitude, userLongitude, latTujuan, lonTujuan);
                });
    
                markers.push(marker);
            }
        }
    }
    

// Fungsi untuk menghitung dan menampilkan rute
function calculateAndDisplayRoute(directionsService, directionsRenderer, userLatitude, userLongitude, latTujuan, lonTujuan) {
    const request = {
        origin: { lat: userLatitude, lng: userLongitude },
        destination: { lat: latTujuan, lng: lonTujuan },
        travelMode: 'DRIVING',
    };

    directionsService.route(request, (result, status) => {
        if (status == 'OK') {
            directionsRenderer.setDirections(result);
        } else {
            console.error(`Error getting directions: ${status}`);
        }
    });
}
