<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
  <!-- Your Maps Content Goes Here -->
  <div class="row mb-4">
    <div class="col-6">
        <input type="text" class="form-control" placeholder="Insert Coordinates Manualy" id="manualLocInput">
    </div>
    <div class="col-6">
        <button type="button" class="btn btn-dark" id="manualLocBtn">Submit & Calculate nearest branch</button>
    </div>
    <div id="passwordHelpBlock" class="form-text ms-2">
        Masukan Longitude dan Latitude, dan wajib dipisahkan oleh koma ( , ) example : -6.901918368189132,
        107.61895899001425
    </div>
  </div>
  <button type="button" class="btn btn-dark mb-2" id="getLocation">Get Your Location Automatically & Calculate
    nearest branch</button>
  <div id="view-hasil" style="margin-top: 20px; font-size: 25px;"></div>
  <hr>
  <div id="map"
    style="{
  height: 400px;
  width: 600px;
  }
  .container-table {
  height: 500px;
  overflow-y: auto;
  }
  @media only screen and (max-width : 400px) {
  #map {
  height: 400px;
  width: 305px;
  }     
  }">
  
  </div>
  <hr>
  <div id="directionsPanel"></div>
  <p style="margin-top: -10px;" id="hasil-jarak"></p>
  <hr>
  
  <hr>
  <div class="container">
    <h3>Detail FAT</h3>
    <table class="table" id="detail-fat">
        <tbody>
            <tr>
                <th>Label Lapangan</th>
                <td id="index-0"></td>
                <th>LABEL ICRM</th>
                <td id="index-1"></td>
  
            </tr>
            <tr>
                <th>INISIAL ODP</th>
                <td id="index-3"></td>
                <th>JENIS ODP</th>
                <td id="index-4"></td>
            </tr>
            <tr>
                <th>KOORDINAT</th>
                <td id="index-7"></td>
                <th>STATUS FAT</th>
                <td id="index-8"></td>
            </tr>
            <tr>
                <th>HOSTNAME OLT</th>
                <td id="index-9"></td>
                <th>BRAND OLT</th>
                <td id="index-10"></td>
            </tr>
            <tr>
                <th>ASAL OLT</th>
                <td id="index-11"></td>
                <th>BASE OLT</th>
                <td id="index-12"></td>
            </tr>
            <tr>
                <th>KAB/KOTA</th>
                <td id="index-14"></td>
                <th>CLUSTER</th>
                <td id="index-15"></td>
            </tr>
            <tr>
                <th>KAPASITAS</th>
                <td id="index-16"></td>
                <th>HC</th>
                <td id="index-17"></td>
  
            </tr>
            <tr>
                <th>IDLE</th>
                <td id="index-18"></td>
                <th>UTILITY</th>
                <td id="index-19"></td>
            <tr>
                <th>TANGGAL INSTALASI</th>
                <td id="index-20"></td>
                <th>TANGGAL INSTALASI2</th>
                <td id="index-21"></td>
            </tr>
  
            </tr>
        </tbody>
    </table>
  </div>
</div>