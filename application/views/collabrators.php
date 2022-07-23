<?php if ($this->session->flashdata("collabrators_msg")) { ?>
<div class="alert alert-success" role="alert">
    <strong> <?= $this->session->flashdata("collabrators_msg") ?></strong>
</div>

<?php } elseif ($this->session->flashdata("collabrators_err")) { ?>
<!-- danger Alert -->
<div class="alert alert-danger" role="alert">
    <strong> some error occured </strong>
</div>
<?php } ?>

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
        <div class="card">
            <div class="card-body">
                <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                    <thead class="table-light">
                        <tr>
                            <th class="sort" data-sort="owner" scope="col">Name</th>
                            <th class="sort" data-sort="industry_type" scope="col">Status</th>

                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="list form-check-all">

                        <?php foreach ($dataSet->result() as $collabrator) { ?>
                        <tr>
                            <td class="owner">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <img src="<?= base_url($collabrator->image) ?>" alt=""
                                            class="avatar-xxs rounded-circle image_src object-cover">
                                    </div>
                                    <div class="flex-grow-1 ms-2 name text-primary"><?= $collabrator->name ?>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span
                                    class="badge rounded-pill  <?= $collabrator->active == 1 ? ' badge-soft-secondary' : ' badge-soft-danger' ?>"><?= $collabrator->active == 1 ? 'Active' : 'Inactive' ?></span>
                            </td>

                            <td>
                                <div class="hstack gap-3">
                                    <div class="form-check form-switch">
                                        <input data-id="<?= $collabrator->id ?>" data-controller="collabrators"
                                            class="toggleStatus form-check-input" type="checkbox"
                                            value="<?= $collabrator->active ?>" role="switch"
                                            <?= $collabrator->active == 1 ? "checked" : ""  ?>>
                                    </div>
                                    <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                        data-bs-placement="top" title="Edit">
                                        <a class="edit-item-btn" href="#showModal" data-bs-toggle="modal"><i
                                                class="ri-pencil-fill align-bottom text-muted"></i></a>
                                    </li>
                                    <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                        data-bs-placement="top" title="Delete">
                                        <a class="ri " id="deleteBtn" data-controller="collabrators"
                                            data-id="<?= $collabrator->id ?>" data-bs-toggle="modal"
                                            data-bs-target="#deleteModals">
                                            <i class="ri-delete-bin-fill align-bottom text-muted"></i>
                                        </a>
                                    </li>
                                    </ul>
                                </div>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <div id="showModal" data-bs-backdrop="static" class="modal fade" tabindex="-1" aria-hidden="true"
                    style="display: none;">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header p-3 bg-primary">
                                <h4 class="card-title mb-0 text-white">Create Collabrator</h4>
                                <button type="button" data-form-ref="collabratorForm"
                                    class="btnClose btn-close text-white" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?= form_open(base_url('insert'), array("id" => "collabratorForm")) ?>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="title"
                                        placeholder="Enter webinar title" name="title" required>
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Image</label>
                                    <input type="hidden" name="controller" value="collabrators">
                                    <input type="hidden" id="image" name="image">
                                    <input type="hidden" name="active" value="1">

                                    <div class="dropzone" data-hidden-element="image">
                                        <div class="fallback">
                                            <input name="file" type="file">
                                        </div>
                                        <div class="dz-message needsclick">
                                            <div class="mb-3">
                                                <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                            </div>

                                            <h4>Drop files here or click to upload.</h4>
                                        </div>
                                    </div>


                                </div>



                                <div class="modal-footer d-flex justify-content-between">
                                    <div class="">
                                        <button data-form-ref="collabratorForm" type="button"
                                            class="btnClose btn btn-dark" data-bs-dismiss="modal"
                                            aria-label="Close">Close</button>
                                    </div>
                                    <div class="">
                                        <button type="submit" class="btn btn-primary">Add Collabrator</button>
                                    </div>
                                </div>

                                <?= form_close() ?>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

            </div>
        </div>
        <!--end card-->
    </div>
    <!--end col-->
    <!--end col-->
</div>