<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="profile-tab">

    <!-- OLT -->
    <h5 class="card-title pb-2 pt-4">Berdasarkan OLT Hostname</h5>
    <hr class="mt-0 pt-0">

    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
        <div class="datatable-top">

            <div class="datatable-dropdown">
                <label>
                    <select class="datatable-selector me-4 border pb-3">
                        <option value="5">5</option>
                        <option value="10" selected="">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="25">25</option>
                    </select> <span class="form-text">entries per page</span>
                </label>
            </div>

            <!-- FORM SEACRH DATA OLT -->
            <div class="col-md-5 col-sm-6 top-0 end-0">
                <form class="d-flex" role="search">
                    <input id="searchInputOLT" class="form-control me-2" type="search"
                        placeholder="Search" aria-label="Search">
                    <button id="searchButtonOLT" class="btn btn-outline-success me-2"
                        type="submit">Search</button>
                </form>
            </div>
            <!-- end FORM SEACRH DATA OLT -->

        </div>

        <div class="datatable-container">
            <table class="table datatable datatable-table">
                <thead id="olt-search-area">

                    {{-- list modals button (KODE OLT) --}}
                    @for ($i = 1; $i < sizeof($dataRegion); $i++) 
                    @php $dataOLT = $dataRegion[$i][5] @endphp
                    <tr>
                        <td>
                            <label>{{ $i }}. </label>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalOLT" class="olt-code" onclick="oltCode('{{ $dataOLT }}');">{{ $dataOLT }}</a>

                        </td>
                    </th>
                    @endfor

                </tbody>
            </table>
        </div>

        {{-- MODAL OLT --}}
        <div class="modal fade" id="modalOLT" tabindex="-1" aria-labelledby="modalOLTLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header pb-2 mx-2">
                    <h1 class="modal-title fs-5" id="modalOLTLabel">
                        <b>OLT details</b> | <span title="region">{{ $region }}</span>
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="olt-modal-close" style="margin-bottom:-5px;"></button>
                    </div>
                    <div class="modal-body pt-0">
                        <div class="col-12">
                            <div class="row">
                                <div class="d-sm-flex justify-content-start align-items-center mt-3">
                                    <label for="oltModalTitle" class="ms-2 col-form-label fw-bold">OLT Hostname : </label>
                                    <div title="Kode OLT" class="ms-2 col-form-label" id="oltModalTitle" ></div>
                                </div>
                                <div class="col-lg-6 col-sm-12 py-3">
                                    <div id="map" class="border bg-body-secondary"></div>
                                </div>
                                <div class="col-lg-6 col-sm-12 table-responsive pt-lg-3">
                                    <table class="border table table-striped mb-0" id="myTableOLT">

                                        {{-- data OLT detail diulang disini --}}

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
    

</div>