<!-- FDT Tab Pane -->
<div class="tab-pane fade" id="FDT" role="tabpanel" aria-labelledby="FDT-tab">
    <!-- Your FDT Content Goes Here -->
    <h5 class="card-title pb-2 pt-4">Berdasarkan Data FDT</h5>
    <hr class="mt-0 pt-0">

    <!-- FORM SEACRH DATA fdt-->
    <div class="col-md-8 top-0 end-0">
        <input id="searchInputFDT" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
    </div>
    <!-- end FORM SEACRH DATA fdt -->


    <div class="datatable-container">
        <table class="table datatable datatable-table">
            <thead id="olt-search-area">

                <!-- list modals button (KODE olt)-->
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>FDT</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyFDT">
                        {{-- looping olt tracker untuk me$oltTracker adalah array sementara 
                          yang melacak OLT yang sudah ditampilkan. Sebelum menampilkan baris baru, 
                          kita memeriksa apakah OLT tersebut sudah ada dalam $oltTracker. Jika belum, 
                          kita menampilkan baris dan menambahkan OLT ke dalam $oltTracker. 
                          Ini akan memastikan bahwa OLT yang sama hanya ditampilkan sekali. --}}
                        @php
                            $fdtTracker = [];
                            $nomorUrut = 1;
                            $jsonDataFdtKey = [];
                        @endphp

                        @foreach ($data as $i => $row)
                            @php
                                $dataFDT = $row[3];
                            @endphp

                            @if (!in_array($dataFDT, $fdtTracker))
                                <tr>
                                    <td>{{ $nomorUrut }}</td>
                                    <td>{{ $dataFDT }}</td>
                                    <td>
                                      <a href="#" data-bs-toggle="modal" data-bs-target="#modalFDT"
                                      class="btn btn-info btn-sm fdt-code"
                                      onclick="handleLihatClickFDT('{{ $dataFDT }}');">Lihat</a>
                                    </td>
                                </tr>

                                @php
                                    $fdtTracker[] = $dataFDT;
                                    $nomorUrut++;
                                @endphp
                            @endif
                        @endforeach
                    </tbody>

                </table>
        </table>
    </div>

    <!-- MODAL FDT-->
    <div class="modal fade" id="modalFDT" tabindex="-1" aria-labelledby="modalFDTLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header pb-2 mx-2">
                    <h1 class="modal-title fs-5" id="modalFDTLabelLabel">
                        <b>FDT REGION</b> | <span title="region">{{ $region }}</span>
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="fat-modal-close" style="margin-bottom:-5px;"></button>
                </div>
                <div class="modal-body pt-0">
                    <div class="col-12">
                        <div class="row">
                            <div class="d-sm-flex justify-content-start align-items-center my-3">
                                <label for="fatModalTitle" class="ms-2 col-form-label fw-bold">Fdt Code :<h4
                                  id="fdt-3" class="ms-2 col-form-label fw-bold"></h4> </label>
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
