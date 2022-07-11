<div class="card">
    <div class="card-body">
        <div class="row g-2">
            <!--end col-->
            <div class="col">
                <h3>Collabrators </h3>
            </div>
            <div class="col-sm-auto ms-auto">
                <div class="list-grid-nav hstack gap-1">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#showModal"><i
                            class="ri-add-fill me-1 align-bottom"></i>
                        Add Collabrators</button>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
</div>
<!--end col-->
<div class="row">
    <div class="col-xxl-12">
        <div class="card" id="companyList">
            <div class="card-header">
                <div class="row g-2">
                    <div class="col-md-3">
                        <div class="search-box">
                            <input type="text" class="form-control search" placeholder="Search for company...">
                            <i class="ri-search-line search-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <div class="table-responsive table-card mb-3">
                        <table class="table align-middle table-nowrap mb-0" id="customerTable">
                            <thead class="table-light">
                                <tr>
                                    <th class="sort" data-sort="owner" scope="col">Name</th>
                                    <th class="sort" data-sort="industry_type" scope="col">Status</th>

                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">

                                <?php foreach ($collabrators->result() as $collabrator) { ?>
                                <tr>
                                    <td class="owner">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <img src="<?= $webUrl . $collabrator->image ?>" alt=""
                                                    class="avatar-xxs rounded-circle image_src object-cover">
                                            </div>
                                            <div class="flex-grow-1 ms-2 name"><?= $collabrator->name ?>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span
                                            class="badge rounded-pill  <?= $collabrator->active == 1 ? ' badge-soft-secondary' : ' badge-soft-danger' ?>"><?= $collabrator->active == 1 ? 'Active' : 'Inactive' ?></span>
                                    </td>

                                    <td>
                                        <ul class="list-inline hstack gap-2 mb-0 d-flex justify-content-between">
                                            <li class="list-inline-item" data-bs-toggle="tooltip"
                                                data-bs-trigger="hover" data-bs-placement="top" title="View">
                                                <a href="javascript:void(0);" class="view-item-btn"><i
                                                        class="ri-eye-fill align-bottom text-muted"></i></a>
                                            </li>
                                            <li class="list-inline-item" data-bs-toggle="tooltip"
                                                data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                <a class="edit-item-btn" href="#showModal" data-bs-toggle="modal"><i
                                                        class="ri-pencil-fill align-bottom text-muted"></i></a>
                                            </li>
                                            <li class="list-inline-item" data-bs-toggle="tooltip"
                                                data-bs-trigger="hover" data-bs-placement="top" title="Delete">
                                                <a class="remove-item-btn" data-bs-toggle="modal"
                                                    href="#deleteRecordModal">
                                                    <i class="ri-delete-bin-fill align-bottom text-muted"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div class="noresult" style="display: none">
                            <div class="text-center">
                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                    colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                </lord-icon>
                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                <p class="text-muted mb-0">We've searched more than 150+ companies
                                    We did not find any companies for you search.</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <div class="pagination-wrap hstack gap-2">
                            <a class="page-item pagination-prev disabled" href="#">
                                Previous
                            </a>
                            <ul class="pagination listjs-pagination mb-0"></ul>
                            <a class="page-item pagination-next" href="#">
                                Next
                            </a>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content border-0">
                            <div class="modal-header bg-soft-info p-3">
                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    id="close-modal"></button>
                            </div>
                            <form action="#">
                                <div class="modal-body">
                                    <input type="hidden" id="id-field" />
                                    <div class="row g-3">
                                        <div class="col-lg-12">
                                            <div class="text-center">
                                                <div class="position-relative d-inline-block">
                                                    <div class="position-absolute bottom-0 end-0">
                                                        <label for="company-logo-input" class="mb-0"
                                                            data-bs-toggle="tooltip" data-bs-placement="right"
                                                            title="Select Image">
                                                            <div class="avatar-xs cursor-pointer">
                                                                <div
                                                                    class="avatar-title bg-light border rounded-circle text-muted">
                                                                    <i class="ri-image-fill"></i>
                                                                </div>
                                                            </div>
                                                        </label>
                                                        <input class="form-control d-none" value=""
                                                            id="company-logo-input" type="file"
                                                            accept="image/png, image/gif, image/jpeg">
                                                    </div>
                                                    <div class="avatar-lg p-1">
                                                        <div class="avatar-title bg-light rounded-circle">
                                                            <img src="assets/images/users/multi-user.jpg"
                                                                id="companylogo-img"
                                                                class="avatar-md rounded-circle object-cover" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <h5 class="fs-13 mt-3">Company Logo</h5>
                                            </div>
                                            <div>
                                                <label for="companyname-field" class="form-label">Name</label>
                                                <input type="text" id="companyname-field" class="form-control"
                                                    placeholder="Enter company name" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div>
                                                <label for="owner-field" class="form-label">Owner
                                                    Name</label>
                                                <input type="text" id="owner-field" class="form-control"
                                                    placeholder="Enter owner name" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div>
                                                <label for="industry_type-field" class="form-label">Industry
                                                    Type</label>
                                                <select class="form-select" id="industry_type-field">
                                                    <option value="">Select industry type</option>
                                                    <option value="Computer Industry">Computer
                                                        Industry</option>
                                                    <option value="Chemical Industries">Chemical
                                                        Industries</option>
                                                    <option value="Health Services">Health Services
                                                    </option>
                                                    <option value="Telecommunications Services">
                                                        Telecommunications Services</option>
                                                    <option value="Textiles: Clothing, Footwear">
                                                        Textiles: Clothing, Footwear</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div>
                                                <label for="star_value-field" class="form-label">Rating</label>
                                                <input type="text" id="star_value-field" class="form-control"
                                                    placeholder="Enter rating" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div>
                                                <label for="location-field" class="form-label">Location</label>
                                                <input type="text" id="location-field" class="form-control"
                                                    placeholder="Enter location" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div>
                                                <label for="employee-field" class="form-label">Employee</label>
                                                <input type="text" id="employee-field" class="form-control"
                                                    placeholder="Enter employee" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div>
                                                <label for="website-field" class="form-label">Website</label>
                                                <input type="text" id="website-field" class="form-control"
                                                    placeholder="Enter website" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div>
                                                <label for="contact_email-field" class="form-label">Contact
                                                    Email</label>
                                                <input type="text" id="contact_email-field" class="form-control"
                                                    placeholder="Enter contact email" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div>
                                                <label for="since-field" class="form-label">Since</label>
                                                <input type="text" id="since-field" class="form-control"
                                                    placeholder="Enter since" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="button" class="btn btn-light"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" id="add-btn">Add Company</button>
                                        <button type="button" class="btn btn-primary" id="edit-btn">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--end add modal-->

                <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-labelledby="deleteRecordLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    id="btn-close"></button>
                            </div>
                            <div class="modal-body p-5 text-center">
                                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                    colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px">
                                </lord-icon>
                                <div class="mt-4 text-center">
                                    <h4 class="fs-semibold">You are about to delete a company ?</h4>
                                    <p class="text-muted fs-14 mb-4 pt-1">Deleting your company will
                                        remove all of your information from our database.</p>
                                    <div class="hstack gap-2 justify-content-center remove">
                                        <button class="btn btn-link link-info fw-semibold text-decoration-none"
                                            data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i>
                                            Close</button>
                                        <button class="btn btn-primary" id="delete-record">Yes,
                                            Delete It!!</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end delete modal -->

            </div>
        </div>
        <!--end card-->
    </div>
    <!--end col-->
    <!--end col-->
</div>