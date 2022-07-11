<div class="row">
    <div class="col-md-12">
        <div class="card card-height-100">
            <div class="card-header align-items-center d-flex">
                <h3 class="mb-0 flex-grow-1">Webinars List</h3>
                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#signupModals">
                    Create Webinar
                </button>
            </div>


            <div class="card-body pt-0">
                <ul class="list-group list-group-flush border-dashed">
                    <li class="list-group-item ps-0">
                        <div class="row align-items-center g-3">
                            <div class="col-auto">
                                <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">
                                    <div class="text-center">
                                        <h5 class="mb-0">25</h5>
                                        <div class="text-muted">Tue</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <h5 class="text-muted mt-0 mb-1 fs-13">12:00am - 03:30pm</h5>
                                <a href="#" class="text-reset fs-14 mb-0">Meeting for campaign with sales team</a>
                            </div>
                            <div class="col-sm-auto">
                                <div class="flex-shrink-0">
                                    <div class="dropdown card-header-dropdown">
                                        <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <span class="text-muted fs-18"><i class="mdi mdi-dots-vertical"></i></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <!-- end row -->
                    </li><!-- end -->
                </ul><!-- end -->


                <div class="align-items-center mt-2 row text-center text-sm-start">
                    <div class="col-sm">
                        <div class="text-muted">Showing<span class="fw-semibold">4</span> of <span
                                class="fw-semibold">125</span> Results</div>
                    </div>
                    <div class="col-sm-auto">
                        <ul
                            class="pagination pagination-separated pagination-sm justify-content-center justify-content-sm-start mb-0">
                            <li class="page-item disabled">
                                <a href="#" class="page-link">←</a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link">1</a>
                            </li>
                            <li class="page-item active">
                                <a href="#" class="page-link">2</a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link">3</a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link">→</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div> <!-- end col-->
</div>




<div id="signupModals" data-bs-backdrop="static" class="modal fade" tabindex="-1" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 overflow-hidden">
            <div class="modal-header p-3 bg-primary">
                <h4 class="card-title mb-0 text-white">Create Webinar</h4>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="alert alert-success d-none rounded-0 mb-0">
                <p class="mb-0">Up to <span class="fw-semibold">50% OFF</span>, Hurry up before the stock ends</p>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="title" class="form-label">Webinar Title</label>
                        <input type="text" name="title" class="form-control" id="title"
                            placeholder="Enter webinar title">
                    </div>
                    <div class="mb-3">
                        <label for="theme" class="form-label">Webinar Theme</label>
                        <input type="text" class="form-control" id="theme" placeholder="Enter webinar theme">
                    </div>
                    <div class="mb-3">
                        <label for="queryEmail" class="form-label">Query Email</label>
                        <input type="email" class="form-control" id="queryEmail"
                            placeholder="Enter Query Email Address1">
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="date-field" class="form-label">Start Date</label>
                            <input type="date" id="date-field" class="form-control" data-provider="flatpickr"
                                data-date-format="d M, Y" placeholder="Select Date" required />
                        </div>
                        <div class="col-md-6">
                            <label for="date-field" class="form-label">End Date</label>
                            <input type="date" id="date-field" class="form-control" data-provider="flatpickr"
                                data-date-format="d M, Y" placeholder="Select Date" required />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Thumbnail Image</label>
                        <input class="form-control" name="thumbnail_image" type="file" id="formFile">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Banner Image</label>
                        <input class="form-control" name="banner_image" type="file" id="formFile">
                    </div>
                    <div class="mb-3 flex-grow-1">
                        <label for="formFile" class="form-label">Key Topics</label>
                        <div class="hstack gap-3 align-items-start">
                            <div class="flex-grow-1">
                                <input class="form-control" data-choices data-choices-multiple-remove="true"
                                    placeholder="Enter tags" type="text" value="Cotton" />
                            </div>
                        </div>

                    </div>


                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="checkTerms">
                        <label class="form-check-label" for="checkTerms">I agree to the <span class="fw-semibold">Terms
                                of Service</span> and Privacy Policy</label>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Sign Up Now</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->