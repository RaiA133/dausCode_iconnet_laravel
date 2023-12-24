<div class="tab-pane fade" id="fat" role="tabpanel" aria-labelledby="fat-tab">
    <!-- Your FAT Content Goes Here -->
    <h5 class="card-title pb-2 pt-4">Berdasarkan Data FAT</h5>
    <hr class="mt-0 pt-0">

    <!-- FORM SEACRH DATA fat-->
    <div class="col-md-8 top-0 end-0">
        <input id="searchInputFAT" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
    </div>
    <!-- end FORM SEACRH DATA fat -->


    <div class="datatable-container">
        <table class="table datatable datatable-table">
            <thead id="olt-search-area">

                <!-- list modals button (KODE olt)-->
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>FAT</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyFAT">
                        {{-- looping olt tracker untuk me$oltTracker adalah array sementara 
                              yang melacak OLT yang sudah ditampilkan. Sebelum menampilkan baris baru, 
                              kita memeriksa apakah OLT tersebut sudah ada dalam $oltTracker. Jika belum, 
                              kita menampilkan baris dan menambahkan OLT ke dalam $oltTracker. 
                              Ini akan memastikan bahwa OLT yang sama hanya ditampilkan sekali. --}}
                        @php
                            $fatTracker = [];
                            $nomorUrut = 1;
                            $jsonDataFatKey = [];
                        @endphp

                        @foreach ($data as $i => $row)
                            @php
                                $dataFAT = $row[1];
                            @endphp

                            @if (!in_array($dataFAT, $fatTracker))
                                <tr>
                                    <td>{{ $nomorUrut }}</td>
                                    <td>{{ $dataFAT }}</td>
                                    <td>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalFAT"
                                            class="btn btn-info btn-sm fat-code"
                                            onclick="handleLihatClick('{{ $dataFAT }}');">Lihat</a>
                                    </td>
                                </tr>

                                @php
                                    $fatTracker[] = $dataFAT;
                                    $nomorUrut++;
                                    $jsonDataFatKey[] = $dataFAT;
                                @endphp
                            @endif
                        @endforeach

                        <script>
                            // Mengirimkan jsondatafatkey ke javascript, yang nantinya akan di jadikan
                            // key detail 
                            window.jsonDataFatKey = {!! json_encode($jsonDataFatKey) !!};
                        </script>

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
                                <label for="fatModalTitle" class="ms-2 col-form-label fw-bold">Fat Code : <h4
                                        id="fat-1" class="ms-2 col-form-label fw-bold"></h4> </label>
                                <div title="Kode FAT" class="ms-2 col-form-label" id="fatModalTitle"></div>
                            </div>
                            <hr class="mb-0">
                        </div>
                        <div class="col-lg-12 col-sm-12 table-responsive pt-lg-3" id="myTableFAT">
                            <table class="table" id="detail-fat">
                                <tbody>
                                    <tr>
                                        <th>Label Lapangan</th>
                                        <td id="fat-0"></td>
                                        <th>LABEL ICRM</th>
                                        <td id="fat-1"></td>

                                    </tr>
                                    <tr>
                                        <th>INISIAL ODP</th>
                                        <td id="fat-3"></td>
                                        <th>JENIS ODP</th>
                                        <td id="fat-4"></td>
                                    </tr>
                                    <tr>
                                        <th>KOORDINAT</th>
                                        <td id="fat-7"></td>
                                        <th>STATUS FAT</th>
                                        <td id="fat-8"></td>
                                    </tr>
                                    <tr>
                                        <th>HOSTNAME OLT</th>
                                        <td id="fat-9"></td>
                                        <th>BRAND OLT</th>
                                        <td id="fat-10"></td>
                                    </tr>
                                    <tr>
                                        <th>ASAL OLT</th>
                                        <td id="fat-11"></td>
                                        <th>BASE OLT</th>
                                        <td id="fat-12"></td>
                                    </tr>
                                    <tr>
                                        <th>KAB/KOTA</th>
                                        <td id="fat-14"></td>
                                        <th>CLUSTER</th>
                                        <td id="fat-15"></td>
                                    </tr>
                                    <tr>
                                        <th>KAPASITAS</th>
                                        <td id="fat-16"></td>
                                        <th>HC</th>
                                        <td id="fat-17"></td>

                                    </tr>
                                    <tr>
                                        <th>IDLE</th>
                                        <td id="fat-18"></td>
                                        <th>UTILITY</th>
                                        <td id="fat-19"></td>
                                    <tr>
                                        <th>TANGGAL INSTALASI</th>
                                        <td id="fat-20"></td>
                                        <th>TANGGAL INSTALASI2</th>
                                        <td id="fat-21"></td>
                                    </tr>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="result" class="col-lg-12 col-sm-12 table-responsive pt-lg-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
