<div class="card">
    <div class="card-body">
        <div class="row g-2">
            <!--end col-->
            <div class="col">
                <h3>Schedules </h3>
            </div>

            <div class="col-3">
            </div>
            <div class="col-sm-auto ms-auto">
                <div class="list-grid-nav hstack gap-1">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#event-modal"><i
                            class="ri-add-fill me-1 align-bottom"></i>
                        Create Schedule</button>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
</div>



<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <div class="card card-h-100">
                    <div class="card-body">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div><!-- end col -->
        </div>
        <!--end row-->

        <div style='clear:both'></div>

        <!-- Add New Event MODAL -->
        <div class="modal fade" id="event-modal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0">
                    <div class="modal-header p-3 bg-primary">
                        <h5 class="modal-title text-white" id="modal-title"> Add Schedule</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body p-4">
                        <form class="needs-validation" name="event-form" id="form-event" novalidate>

                            <div class="row event-form">
                                <!--end col-->
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Webinar Name</label>
                                        <select class="form-control " name="webinar">
                                            <?php foreach ($webinarList->result() as $webinar) { ?>
                                            <option value="<?= $webinar->id ?>">
                                                <?= $webinar->title ?>
                                            </option>

                                            <?php  } ?>
                                        </select>

                                    </div>
                                </div>

                                <!-- schedule block section -->

                                <div id="schedule-block">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label class="form-label">Start Time</label>
                                                    <div class="input-group ">
                                                        <input type="time" name="startTime[]" class="form-control "
                                                            placeholder="Select start time">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label class="form-label">End Time</label>
                                                    <div class="input-group ">
                                                        <input type="time" name="endTime[]" class="form-control "
                                                            placeholder="Select end time">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label class="form-label">Description</label>
                                                    <input class="form-control" type="text" name="description[]" id="">
                                                </div>
                                            </div>
                                            <div class="col-1 d-flex align-items-center">
                                                <div class="mb-3">
                                                    <i onclick="removeSlot(event)"
                                                        class=" ri-delete-bin-5-line text-danger"
                                                        style="font-size: 25px;"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- scheudle block section ends -->

                                <div class="col my-2 d-flex align-items-center justify-content-center">
                                    <button type="button" onclick="addSlotHandler()"
                                        class="btn btn-outline-primary waves-effect waves-light">
                                        <i class=" ri-add-circle-line"></i>
                                        Add Slot</button>
                                </div>
                                <!--end col-->
                                <input type="hidden" id="eventid" name="eventid" value="" />
                                <!--end col-->
                            </div>
                            <!--end row-->
                            <div class="hstack gap-2 justify-content-end">

                                <button type="submit" class="btn btn-success" id="btn-save-event">Add Event</button>
                            </div>
                        </form>
                    </div>
                </div> <!-- end modal-content-->
            </div> <!-- end modal dialog-->
        </div> <!-- end modal-->
        <!-- end modal-->
    </div>
</div>