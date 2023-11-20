<div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="home-tab">

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


    <!-- FAT -->
    <h5 class="card-title pb-2 pt-4">Berdasarkan Kode FAT</h5>
    <hr class="mt-0 pt-0">

    <!-- LIST FAT -->
    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">

        <div class="datatable-top">

            <div class="datatable-dropdown">
                <label>
                    <select class="datatable-selector me-4 border">
                        <option value="5">5</option>
                        <option value="10" selected="">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="25">25</option>
                    </select> <span class="form-text">entries per page</span>
                </label>
            </div>

            <!-- FORM SEACRH DATA FAT-->
            <div class="col-md-5 col-sm-6 top-0 end-0">
                <form class="d-flex" role="search">
                    <input id="searchInputFAT" class="form-control me-2" type="search" placeholder="Search"
                        aria-label="Search">
                    <button id="searchButtonFAT" class="btn btn-outline-success me-2" type="submit">Search</button>
                </form>
            </div>
            <!-- end FORM SEACRH DATA FAT -->

        </div>

        <div class="datatable-container">
            <table class="table datatable datatable-table">
                <thead id="fat-search-area">

                    <!-- script untuk menerima $data
                    yang berisi data lokasi
                    dari controller dan mengirimnya ke file javascpt -->
                    <script>
                        // Simpan jsonData sebagai variabel global
                        window.jsonData = {!! json_encode($mapsData) !!};
                    </script>


                    <!-- list modals button (KODE FAT)-->
                    <table class="table">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>OLT</th>
                              <th>FDT</th>
                              <th>FAT</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($data as $i => $row)
                              @php $dataOLT = $row[9] @endphp
                              @php $dataFDT = $row[0] @endphp
                              @php $dataFAT = $row[0] @endphp
                              <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalFAT" class="fat-code"
                                        onclick="fatCode('{{ $dataOLT }}');">{{ $dataOLT }}</a>
                                </td>
                                  <td>
                                      <a href="#" data-bs-toggle="modal" data-bs-target="#modalFAT" class="fat-code"
                                          onclick="fatCode('{{ $dataFAT }}');">{{ $dataFAT }}</a>
                                  </td>

                              </tr>
                          @endforeach
                      </tbody>
                  </table>
                  

            </table>
        </div>


        <!-- MODAL FAT-->
        <div class="modal fade" id="modalFAT" tabindex="-1" aria-labelledby="modalFATLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header pb-2 mx-2">
                        <h1 class="modal-title fs-5" id="modalFATLabelLabel">
                            <b>FAT REGION</b> | <span title="region">{{ $region }}</span>
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="fat-modal-close" style="margin-bottom:-5px;"></button>
                    </div>
                    <div class="modal-body pt-0">
                        <div class="col-12">
                            <div class="row">
                                <div class="d-sm-flex justify-content-start align-items-center my-3">
                                    <label for="fatModalTitle" class="ms-2 col-form-label fw-bold">Fat Code : </label>
                                    <div title="Kode FAT" class="ms-2 col-form-label" id="fatModalTitle"></div>
                                </div>
                                <hr class="mb-0">
                                </div>
                                <div class="col-lg-12 col-sm-12 table-responsive pt-lg-3">
                                    <table class="border table table-striped mb-0" id="myTableFAT">
                                        <!-- data FAT details diulang disini-->

                                    </table>
                                </div>
                                <div id="result" class="col-lg-12 col-sm-12 table-responsive pt-lg-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="datatable-bottom">
            <div class="datatable-info form-text">Showing 1 to 5 of 5 entries</div>
            <nav class="datatable-pagination">
                <ul class="datatable-pagination-list"></ul>
            </nav>
        </div>

    </div>
    <!-- end LIST FAT -->

</div>
