<div class="card">
    <div class="card-body">
        <div class="row g-2">
            <!--end col-->
            <div class="col">
                <h3>Speakers </h3>
            </div>
            <div class="col-sm-auto ms-auto">
                <div class="list-grid-nav hstack gap-1">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMembers"><i
                            class="ri-add-fill me-1 align-bottom"></i>
                        Add Speakers</button>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
</div>

<div class="row">

    <div class="col-lg-12">
        <div>
            <?php if ($this->session->flashdata("speakers_msg")) { ?>
            <p class="alert alert-success" role="alert">
                <strong><?= $this->session->flashdata("speakers_msg") ?></strong>
            </p>
            <?php } elseif ($this->session->flashdata("speakers_err")) { ?>
            <p class="alert alert-danger" role="alert">
                <strong><?= $this->session->flashdata("speakers_err") ?></strong>
            </p>
            <?php } ?>

            <div class="team-list grid-view-filter row">

                <?php foreach ($dataSet->result() as $user) { ?>
                <div class="col">
                    <div class="card team-box">
                        <div class="card-body p-2">
                            <div class="row align-items-center team-row">
                                <div class="col team-settings">
                                    <div class="row">
                                        <div class="col">
                                        </div>
                                        <div class="col text-end dropdown">
                                            <a href="javascript:void(0);" id="dropdownMenuLink2"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill fs-17 text-dark"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end"
                                                aria-labelledby="dropdownMenuLink2">
                                                <li><a class="dropdown-item global-edit" 
                                                       data-bs-toggle="modal"
                                                       data-id="<?= $user->id ?>" 
                                                       data-controller="speakers"
                                                       data-bs-toggle="modal"
                                                       data-bs-target="#addMembers"
                                                       data-formID="speakerForm"><i
                                                            class="ri-eye-line me-2 align-middle"></i>Edit</a>
                                                </li>
                                                <li><a class="dropdown-item deleteBtn" id="deleteBtn" data-controller="speakers"
                                                        data-id="<?= $user->id ?>" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModals"><i
                                                            class="ri-delete-bin-5-line me-2 align-middle"></i>Delete</a>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-4 col">
                                    <div class="team-profile-img">
                                        <div class="avatar-lg img-thumbnail rounded-circle flex-shrink-0">
                                            <img src="<?= base_url($user->image) ?>" alt=""
                                                class="img-fluid d-block rounded-circle" />
                                        </div>
                                        <div class="team-content">


                                            <h3 class="mb-1">
                                                <?= ucwords($user->name) ?>

                                            </h3>

                                            <p class="text-muted mt-3 text-justify">
                                                <?= substr($user->description, 0, 500) ?>
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col my-3">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end card-->

                    <!--end col-->
                </div>
                <?php } ?>
                <!--end row-->

                <!-- Modal -->
                <!--end modal-->

            </div>
        </div><!-- end col -->
    </div>

</div>
<!--end row-->

<div id="addMembers" data-bs-backdrop="static" class="modal fade" tabindex="-1" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header p-3 bg-primary">
                <h4 class="card-title mb-0 text-white">Create Speaker</h4>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?= form_open(base_url('insert'),array('id' => 'speakerForm')) ?>
                <div class="mb-3">
                    <label for="title" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="title" name="title" required>
                    <input type="hidden" name="controller" value="speakers">
                </div>

                <div class="mb-3">
                    <label for="choices-multiple-default" class="form-label text-muted">webinars</label>

                    <select class="form-control" id="choices-multiple-default webinars" data-choices name="webinar_ids[]"
                        multiple="multiple">
                        <?php foreach ($webinarList->result() as $webinar) { ?>
                        <option value="<?= $webinar->id ?>">
                            <?= $webinar->title ?>
                        </option>

                        <?php  } ?>
                    </select>
                </div>


                <div class="mb-3">
                    <label for="speaker-image" class="form-label">Image</label>
                    <input type="hidden" id="image" name="image">
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

                <div class="mb-3">
                    <label for="">Description</label>

                    <input class="editor" type="hidden" name="description" value="">
                    <div class="snow-editor" style="height: 300px;">

                    </div>
                </div>




            </div>
            <div class="modal-footer">
                <div class="">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal" aria-label="Close">Close</button>
                </div>
                <div class="">
                    <button type="submit" class="btn btn-primary submit-form">Create Speaker</button>
                </div>
            </div>
            <?= form_close() ?>
        </div>
        <!--end modal-content-->
    </div>
    <!--end modal-dialog-->
</div>


<style>
.choices__list--dropdown .choices__item,
.choices__list[aria-expanded] .choices__item {
    padding-left: 25px;
}
</style>