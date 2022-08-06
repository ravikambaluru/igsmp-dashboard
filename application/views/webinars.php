<div class="row">
    <div class="col-md-12">
        <?php if ($this->session->flashdata("webinars_msg")) { ?>
        <div class="alert alert-success" role="alert">
            <strong> <?= $this->session->flashdata("webinars_msg") ?></strong>
        </div>

        <?php } elseif ($this->session->flashdata("webinars_err")) { ?>
        <!-- danger Alert -->
        <div class="alert alert-danger" role="alert">
            <strong> error in creating webinar </strong>Try again after sometime.
        </div>
        <?php } ?>

        <div class="card card-height-100">
            <div class="card-header align-items-center d-flex">
                <h3 class="mb-0 flex-grow-1">Webinars List</h3>
                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#signupModals">
                    Create Webinar
                </button>
            </div>

            <div class="card-body">

                <!-- success Alert -->
                <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Query Email</th>
                            <th>Registered users</th>
                            <th>Abstract Submissions</th>

                            <th>Scheduled Date</th>
                            <!-- <th>Scheduled Time</th> -->
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dataSet->result() as $webinar) { ?>
                        <tr>

                            <td>
                                <h6 class="<?= $webinar->active == 1 ? "text-primary" : "text-muted"  ?>">
                                    <?= $webinar->title ?></h6>

                            </td>
                            <td> <span
                                    class="badge rounded-pill  <?= $webinar->active == 1 ? ' badge-soft-secondary' : ' badge-soft-danger' ?>"><?= $webinar->active == 1 ? 'Active' : 'Inactive' ?></span>
                            </td>


                            <td><?= $webinar->query_email ?></td>
                            <td><?= $webinar->registered_users ?></td>
                            <td><?= $webinar->abstract_submission_count ?></td>

                            <td><?= date("M-d", strtotime($webinar->start_date)) . " to " . date("M-d", strtotime($webinar->end_date)) ?>
                            </td>
                            <!-- <td><?= $webinar->schedules ?></td> -->
                            <td>
                                <!-- Base Switchs -->
                                <div class="hstack gap-3">
                                    <div class="form-check form-switch">
                                        <input data-id="<?= $webinar->id ?>" data-controller="webinars"
                                            class="toggleStatus form-check-input" type="checkbox"
                                            value="<?= $webinar->active ?>" role="switch"
                                            <?= $webinar->active == 1 ? "checked" : ""  ?>>
                                    </div>
                                    <a class=" ri global-edit" data-id="<?= $webinar->id ?>" data-controller="webinars"
                                        data-bs-target="#signupModals" data-formID="webinarForm">
                                        <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                    </a>
                                    <a class="ri " id="deleteBtn" data-controller="webinars"
                                        data-id="<?= $webinar->id ?>" data-bs-toggle="modal"
                                        data-bs-target="#deleteModals"><i
                                            class="ri-delete-bin-fill align-bottom me-2 text-muted"></i></a>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>


        </div><!-- end card -->
    </div> <!-- end col-->
</div>




<div id="signupModals" data-bs-backdrop="static" class="modal fade" tabindex="-1" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header p-3 bg-primary">
                <h4 class="card-title mb-0 text-white">Create Webinar</h4>
                <!-- <button type="button" data-form-ref="webinarForm" class="btnClose btn-close text-white"
                    data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
                <?= form_open(base_url('insert'), array("id" => "webinarForm")) ?>
                <div class="mb-3">
                    <label for="title" class="form-label">Webinar Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Enter webinar title"
                        name="title" required>
                </div>
                <div class="mb-3">
                    <label for="theme" class="form-label">Webinar Theme</label>
                    <input type="text" class="form-control" id="theme" placeholder="Enter webinar theme" name="theme"
                        required>
                </div>
                <div class="mb-3">
                    <label for="queryEmail" class="form-label">Query Email</label>
                    <input type="email" class="form-control" id="queryEmail" placeholder="Enter Query Email Address"
                        name="query_email" required>
                </div>
                <div class="mb-3">
                    <label for="theme" class="form-label">Speaker Price [$]</label>
                    <input type="text" name="speaker_price" class="form-control" id="speaker_price" required
                        placeholder="Enter speaker price">
                </div>
                <div class="mb-3">
                    <label for="theme" class="form-label">Delegate Price [$]</label>
                    <input type="text" name="delegate_price" class="form-control" id="delegate_price" required
                        placeholder="Enter delegate price">
                </div>
                <div class="mb-3">
                    <label for="theme" class="form-label">Presentation Price [$]</label>
                    <input type="text" name="presentation_price" class="form-control" id="presentation_price" required
                        placeholder="Enter presentation price">
                </div>
                <div class="mb-3">
                    <label for="theme" class="form-label">Sponsers Price [$]</label>
                    <input type="text" name="sponsers_price" class="form-control" id="sponsers_price" required
                        placeholder="Enter sponsers price">
                </div>
                <div class="mb-3">
                    <label for="choices-text-unique-values" class="form-label">Key Topics</label>
                    <input class="form-control choices" name="keytopics" id="choices-text-unique-values" data-choices
                        data-choices-text-unique-true type="text" value="" required />
                </div>
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="date-field" class="form-label">Start Date</label>
                        <input type="date" id="start_date" class="form-control" name="start_date"
                            data-provider="flatpickr" data-date-format="d M, Y" placeholder="Select Date" required />
                    </div>
                    <div class="col-md-6">
                        <label for="date-field" class="form-label">End Date</label>
                        <input type="date" id="end_date" nagme="end_date" class="form-control" data-provider="flatpickr"
                            data-date-format="d M, Y" placeholder="Select Date" required />
                    </div>
                </div>


                <div class="row mb-3" id="schedule-block">
                    <label for="" class="form-label">Time Schedules</label>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label">Start Time</label>
                            <div class="input-group ">
                                <input type="datetime-local" name="startTime[]" class="form-control "
                                    placeholder="Select start time">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label">End Time</label>
                            <div class="input-group ">
                                <input type="datetime-local" name="endTime[]" class="form-control "
                                    placeholder="Select end time">
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex justify-content-between align-items-center">
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <input class="form-control" type="text" name="schedDesc[]" id="">
                        </div>
                        <i class=" ri-add-circle-line ml-3" style="font-size: 25px;" onclick="addSlotHandler()"></i>

                    </div>

                </div>

                <div id="dynamicControls"></div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Thumbnail Image</label>
                    <div class="row">

                        <img src="" id="thumbnail-preview" alt="">
                    </div>
                    <input type="hidden" id="thumbnail-image" name="thumbnail_image">
                    <div class="dropzone" data-hidden-element="thumbnail-image">
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
                    <label for="formFile" class="form-label">Banner Image</label>
                    <div class="row">
                        <img src="" id="banner-preview" alt="">
                    </div>
                    <input type="hidden" name="controller" value="webinars">
                    <input type="hidden" id="banner-image" name="banner_image">

                    <div class="dropzone" data-hidden-element="banner-image">
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
                    <label for="description">Description</label>
                    <input class="editor" type="hidden" name="description" value="">

                    <input type="hidden" name="id" class="id" style="display: none;">
                    <div class="snow-editor" style="height: 300px;">

                    </div>


                </div>


                <div class="modal-footer d-flex justify-content-between">
                    <div class="">
                        <button data-form-ref="webinarForm" type="button" class="btnClose btn btn-dark"
                            data-bs-dismiss="modal" aria-label="Close">Close</button>
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-primary submit-form">Add Webinar</button>
                    </div>
                </div>

                <?= form_close() ?>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<style>
.choices__list--multiple .choices__item {
    background-color: #695eef !important;
}
</style>