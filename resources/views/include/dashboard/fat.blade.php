<div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="home-tab">
    <!-- FAT -->
    <h5 class="card-title pb-2 pt-4">Berdasarkan Kode FAT</h5>
    <hr class="mt-0 pt-0">
    
    <!-- LIST FAT -->
    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">

        <div class="datatable-top mb-3">
            
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
                    <input id="searchInputFAT" class="form-control me-2" type="search"
                        placeholder="Search" aria-label="Search">
                    <button id="searchButtonFAT" class="btn btn-outline-success me-2"
                        type="submit">Search</button>
                </form>
            </div>
            <!-- end FORM SEACRH DATA FAT -->

        </div>

        <div class="datatable-container">
            <table class="table datatable datatable-table">
                <thead id="fat-search-area">

                    {{-- list modals button (KODE FAT) --}}
                    @for ($i = 1; $i < sizeof($dataRegion); $i++) 
                    @php $dataFAT = $dataRegion[$i][0] @endphp
                    <tr>
                        <td>
                            <label>{{ $i }}. </label>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalFAT" class="fat-code" onclick="fatCode('{{ $dataFAT }}');">{{ $dataFAT }}</a>

                        </td>
                    </th>
                    @endfor

                </tbody>
            </table>
        </div>


        {{-- MODAL FAT --}}
        <div class="modal fade" id="modalFAT" tabindex="-1" aria-labelledby="modalFATLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header pb-2 mx-2">
                        <h1 class="modal-title fs-5" id="modalFATLabelLabel">
                            <b>FAT details</b> | <span title="region">{{ $region }}</span> | <span title="Kode FAT" id="fatModalTitle" ></span>
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="fat-modal-close" style="margin-bottom:-5px;"></button>
                    </div>
                    <div class="modal-body pt-0">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12 py-3">
                                    <div id="map" class="border bg-body-secondary"></div>
                                </div>
                                <div class="col-lg-6 col-sm-12 table-responsive pt-lg-3">
                                    <table class="border table table-striped mb-0" id="myTableFAT">

                                        {{-- data FAT detail diulang disini --}}

                                    </table>
                                </div>
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