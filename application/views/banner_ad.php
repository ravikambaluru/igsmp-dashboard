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
                <h3 class="mb-0 flex-grow-1">Promotions / Banner Ad</h3>
                
                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#signupModals">
                    Create banner ad
                </button>
            </div>

            <div class="card-body">

                <!-- success Alert -->
                <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Banner text</th>
                            <th>Banner url</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dataSet->result() as $promotion) { ?>
                        <tr>
                            <td>
                                <p>1</p>
                            </td>
                            <td>
                                <h5 class="text-primary"><?= $promotion->banner_text ?></h5>
                            </td>

                            <td>
                                <h5 class="text-primary"><?= $promotion->banner_url ?></h5>
                            </td>
                            
                            <td>
                                <a class=" ri global-edit" data-id="<?= $promotion->id ?>" data-controller="banner_ad"
                                    data-bs-target="#signupModals" data-bs-toggle="modal" data-formID="bannerForm">

                                    <i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit
                                </a>
                                <a class="ri deleteBtn" id="deleteBtn" data-controller="banner_ad" data-id="<?= $promotion->id ?>"
                                    data-bs-toggle="modal" data-bs-target="#deleteModals"><i
                                        class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                </a>
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
                <h4 class="card-title mb-0 text-white">Create Banner Ad</h4>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <?= form_open(base_url('insert'), array("id" => "bannerForm")) ?>

                <input type="hidden" name="controller" value="banner_ad">
                <div id="banner">
                    <div class="mb-3">
                        <label for="title" class="form-label">Banner Title</label>
                        <input class="editor" type="hidden" name="banner_text" value="">
                        
                        <div class="snow-editor" style="height: 300px;">

                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Banner URL</label>
                        <input type="url" class="form-control" id="title" placeholder="Enter Banner url"
                            name="banner_url" required>
                    </div>
                    <input type="hidden" name="id" class="id" style="display: none;">
                </div>

                <!-- <div id="bottombar" style="display:none">
                    <div class="mb-3">
                        <label for="title" class="form-label">Bottombar text</label>
                        <input type="text" name="banner_text" class="form-control" id="title" placeholder="Enter Banner text"
                            name="banner_title" required>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Bottombar URL</label>
                        <input type="url" name="banner_text" class="form-control" id="title" placeholder="Enter Banner url"
                            name="banner_url" required>
                    </div>
                </div>

                <div id="dongle" style="display:none">
                    <div class="mb-3">
                        <label for="title" class="form-label">Dongle image</label>
                        <input type="file" name="banner_text" class="form-control" id="title" placeholder="Enter Banner text"
                            name="banner_title" required>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Dongle URL</label>
                        <input type="url" name="banner_text" class="form-control" id="title" placeholder="Enter Banner url"
                            name="banner_url" required>
                    </div>
                </div> -->
                


                <div class="modal-footer d-flex justify-content-between">
                    <div class="">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal"
                            aria-label="Close">Close</button>
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-primary submit-form">Add Banner Ad</button>
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
