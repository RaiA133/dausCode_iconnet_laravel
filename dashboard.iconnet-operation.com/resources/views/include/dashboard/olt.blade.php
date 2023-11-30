<!-- OLT Tab Pane -->
<div class="tab-pane fade" id="olt" role="tabpanel" aria-labelledby="olt-tab">
    <!-- Your OLT Content Goes Here -->
    <h5 class="card-title pb-2 pt-4">Berdasarkan Data OLT</h5>
    <hr class="mt-0 pt-0">
    <!-- OLT -->
    <!-- Pilihan Kota -->
    <div class="row mb-3">
        <div class="col-md-6 top-0 end-0 mb-2">
            <select id="selectCity" class="form-select" aria-label="Default select example">
                <option selected>== Pilih Kota ==</option>
                @php
                    $uniqueCities = array_unique(array_column($dataOlt, 2));
                @endphp
                @foreach ($uniqueCities as $city)
                    <option value="{{ $city }}">{{ $city }}</option>
                @endforeach
            </select>
        </div>

        <!-- Pilihan Type -->
        <div class="col-md-6 top-0 end-0 mb-2">
            <select id="selectType" class="form-select" aria-label="Default select example">
                <option selected>== Asal OLT ==</option>
                @php
                    $uniqueTypes = array_unique(array_column($dataOlt, 7));
                @endphp
                @foreach ($uniqueTypes as $type)
                    <option value="{{ $type }}">{{ $type }}</option>
                @endforeach
            </select>
        </div>
    </div>


    <!-- FORM SEACRH DATA OLT-->
    <div class="col-md-12 top-0 end-0">
        <input id="searchInputOLT" class="form-control me-2" type="search" placeholder="Search...."
            aria-label="Search">
    </div>
    <!-- end FORM SEACRH DATA OLT -->

    <div class="datatable-container table-responsive">
      <table class="table datatable datatable-table tableOLT" style="font-size: 12px">
          <thead>
              <tr>
                  <th>No</th>
                  <th>Nama Olt</th>
                  <th>Hostname</th>
                  <th>Kota</th>
                  <th>Kecamatan</th>
                  <th>UP3</th>
                  <th>ULP</th>
                  <th>Asal Olt</th>
                  <th>Jenis Olt</th>
                  <th>Brand Olt</th>
                  <th>Type Olt</th>
                  <th>Jumlah Port Olt</th>
                  <th>Jumlah Port Terpakai</th>
                  <th>Kapasitas</th>
                  <th>Installation OLT</th>
                  <th>NMS Olt</th>
                  <th>L3 Switch</th>
                  <th>Status OLT</th>
                  <th>Kat. Tur</th>
                  <th>Koordinat</th>
                  <th>ACTION</th>
              </tr>
          </thead>
          <tbody id="tbodyOLT">
              @foreach ($dataOlt as $item)
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $item[0] }}</td>
                      <td>{{ $item[1] }}</td>
                      <td id="cityData">{{ $item[2] }}</td>
                      <td>{{ $item[3] }}</td>
                      <td>{{ $item[5] }}</td>
                      <td>{{ $item[6] }}</td>
                      <td id="asalOLT">{{ $item[7] }}</td>
                      <td>{{ $item[8] }}</td>
                      <td>{{ $item[9] }}</td>
                      <td>{{ $item[10] }}</td>
                      <td>{{ $item[11] }}</td>
                      <td>{{ $item[12] }}</td>
                      <td>{{ $item[14] }}</td>
                      <td>{{ $item[19] }}</td>
                      <td>{{ $item[20] }}</td>
                      <td>{{ $item[21] }}</td>
                      <td>{{ $item[22] }}</td>
                      <td>{{ $item[26] }}</td>
                      <td>
                          @if (isset($item[28]))
                              {{ $item[28] }}
                          @else
                              -
                          @endif
                      </td>
                      {{-- {{ $paramsOlt = $item[2] }} --}}
                      <td><a href="#" data-bs-toggle="modal" data-bs-target="#modalFDT"
                        class="btn btn-info btn-sm fdt-code"
                        onclick="handleLihatClickOLT({{ $item[2] }});">Lihat</td>
                  </tr>
              @endforeach
          </tbody>
      </table>
  </div>

      <!-- MODAL FDT-->
      <div class="modal fade" id="modalFDT" tabindex="-1" aria-labelledby="modalFDTLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header pb-2 mx-2">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="fat-modal-close" style="margin-bottom:-5px;"></button>
                </div>
                <div class="modal-body pt-0">
                    <div class="col-12">
                        <div class="row">
                            <div class="d-sm-flex justify-content-start align-items-center my-3">
                                {{-- <label for="fatModalTitle" class="ms-2 col-form-label fw-bold">Fdt Code :<h4
                                  id="fdt-2" class="ms-2 col-form-label fw-bold"></h4> </label> --}}
                                <div title="Kode FAT" class="ms-2 col-form-label" id="fatModalTitle"></div>
                            </div>
                            <hr class="mb-0">
                        </div>
                        <div class="col-lg-12 col-sm-12 table-responsive pt-lg-3">
                          <div class="col-lg-12 col-sm-12 table-responsive pt-lg-3" id="myTableFDT">
                            <table class="table" id="detail-fdt">
                                <tbody>
                                    <tr>
                                        <th>Label Lapangan</th>
                                        <td id="fdt-0"></td>
                                        <th>LABEL ICRM</th>
                                        <td id="fdt-1"></td>

                                    </tr>
                                    <tr>
                                        <th>INISIAL ODP</th>
                                        <td id="fdt-3"></td>
                                        <th>JENIS ODP</th>
                                        <td id="fdt-4"></td>
                                    </tr>
                                    <tr>
                                        <th>KOORDINAT</th>
                                        <td id="fdt-7"></td>
                                        <th>STATUS FAT</th>
                                        <td id="fdt-8"></td>
                                    </tr>
                                    <tr>
                                        <th>HOSTNAME OLT</th>
                                        <td id="fdt-9"></td>
                                        <th>BRAND OLT</th>
                                        <td id="fdt-10"></td>
                                    </tr>
                                    <tr>
                                        <th>ASAL OLT</th>
                                        <td id="fdt-11"></td>
                                        <th>BASE OLT</th>
                                        <td id="fdt-12"></td>
                                    </tr>
                                    <tr>
                                        <th>KAB/KOTA</th>
                                        <td id="fdt-14"></td>
                                        <th>CLUSTER</th>
                                        <td id="fdt-15"></td>
                                    </tr>
                                    <tr>
                                        <th>KAPASITAS</th>
                                        <td id="fdt-16"></td>
                                        <th>HC</th>
                                        <td id="fdt-17"></td>

                                    </tr>
                                    <tr>
                                        <th>IDLE</th>
                                        <td id="fdt-18"></td>
                                        <th>UTILITY</th>
                                        <td id="fdt-19"></td>
                                    <tr>
                                        <th>TANGGAL INSTALASI</th>
                                        <td id="fdt-20"></td>
                                        <th>TANGGAL INSTALASI2</th>
                                        <td id="fdt-21"></td>
                                    </tr>
                                    <tr>
                                        <th>Jumlah Fat di FDT ini</th>
                                        <td id="fdt-22"></td>
                                    </tr>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        </div>
                        <div id="result" class="col-lg-12 col-sm-12 table-responsive pt-lg-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
