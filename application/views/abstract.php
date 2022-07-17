<div class="row">
    <div class="col-md-12">
        <div class="card card-height-100">
            <div class="card-header align-items-center d-flex">
                <h3 class="mb-0 flex-grow-1">Abstract Submissions</h3>

            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Abstract Submissions</h5>
            </div>
            <div class="card-body">
                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                    style="width:100%">
                    <thead>
                        <tr>


                            <th>ID</th>
                            <th>Name</th>
                            <th>Organization</th>
                            <th>Affliation</th>
                            <th> Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Keynote Title</th>
                            <th>Biography</th>
                            <th>PDF</th>
                            <th>Submitted On</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dataSet->result() as $abstract) { ?>
                        <tr>
                            <td><?= $abstract->id ?></td>
                            <td><?= $abstract->name ?></td>
                            <td><?= $abstract->organization ?></td>
                            <td><?= $abstract->affiliation ?></td>
                            <td><?= $abstract->email ?></td>
                            <td><?= $abstract->phone ?></td>
                            <td><?= $abstract->address ?></td>
                            <td><?= $abstract->keynote_title ?></td>
                            <td><?= $abstract->biography ?></td>
                            <td><a download href="<?= $abstract->abstract_pdf ?>"><i
                                        class=" ri-download-cloud-2-fill"></i></a></td>
                            <td>
                                <?= $abstract->submitted_at ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>