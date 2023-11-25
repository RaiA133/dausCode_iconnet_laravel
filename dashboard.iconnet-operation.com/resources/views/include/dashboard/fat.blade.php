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
                                  <th>OLT</th>
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
                                    $oltTracker = [];
                                    $nomorUrut = 1;
                                @endphp
                            
                                @foreach ($data as $i => $row)
                                    @php 
                                        $dataOLT = $row[9];
                                    @endphp
                            
                                    @if (!in_array($dataOLT, $oltTracker))
                                        <tr>
                                            <td>{{ $nomorUrut }}</td>
                                            <td>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#modalFAT" class="fat-code"
                                                    onclick="fatCode('{{ $dataOLT }}');">{{ $dataOLT }}</a>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-info btn-sm">Lihat</a>
                                            </td>
                                        </tr>
                            
                                        @php
                                            $oltTracker[] = $dataOLT;
                                            $nomorUrut++;
                                        @endphp
                                    @endif
                                @endforeach
                            </tbody>
                        
                      </table>
              </table>
          </div>
</div>
