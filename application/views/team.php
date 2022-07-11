<div class="card">
    <div class="card-body">
        <div class="row g-2">
            <!--end col-->
            <div class="col">
                <h3>Teams </h3>
            </div>
            <div class="col-sm-auto ms-auto">
                <div class="list-grid-nav hstack gap-1">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addmembers"><i
                            class="ri-add-fill me-1 align-bottom"></i>
                        Add Members</button>
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
            <?php if ($this->session->flashdata("teams_msg")) { ?>
            <p class="alert alert-success" role="alert"><strong><?= $this->session->flashdata("teams_msg") ?></strong>
            </p>
            <?php } elseif ($this->session->flashdata("teams_err")) { ?>
            <p class="alert alert-danger" role="alert"><strong><?= $this->session->flashdata("teams_err") ?></strong>
            </p>
            <?php } ?>

            <div class="team-list grid-view-filter row">

                <?php foreach ($team->result() as $user) { ?>
                <div class="col">
                    <div class="card team-box">
                        <div class="team-cover">
                            <img src="assets/images/small/img-5.jpg" alt="" class="img-fluid" />
                        </div>
                        <div class="card-body p-4">
                            <div class="row align-items-center team-row">
                                <div class="col team-settings">
                                    <div class="row">
                                        <div class="col">
                                            <div class="bookmark-icon flex-shrink-0 me-2">

                                            </div>
                                        </div>
                                        <div class="col text-end dropdown">
                                            <a href="javascript:void(0);" id="dropdownMenuLink2"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill fs-17"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end"
                                                aria-labelledby="dropdownMenuLink2">
                                                <li><a class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#addmembers"><i
                                                            class="ri-eye-line me-2 align-middle"></i>Edit</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="<?= 'teams/delete/' . $user->id ?>"><i
                                                            class="ri-delete-bin-5-line me-2 align-middle"></i>Delete</a>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-4 col">
                                    <div class="team-profile-img">
                                        <div class="avatar-lg img-thumbnail rounded-circle flex-shrink-0">
                                            <img src="assets/images/users/avatar.png" alt=""
                                                class="img-fluid d-block rounded-circle" />
                                        </div>
                                        <div class="team-content">


                                            <h3 class="mb-1">
                                                <?= ucwords($user->user_name) ?>

                                                <?php if ($user->is_admin) { ?>
                                                <i class="ri-shield-user-fill ri-1x text-primary"></i>
                                                <?php } ?>

                                            </h3>


                                            <p class="text-muted mb-0"><?= $user->designation ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col my-3">
                                    <div class="row text-muted text-center">
                                        <div class="col-12 border-end border-end-dashed d-flex justify-content-between">
                                            <a href="mailto:<?= $user->gmail_link ?>"><i
                                                    class="ri-mail-fill ri-2x text-danger"></i></a>
                                            <a href="<?= $user->linkedin_link ?>"><i
                                                    class="ri-linkedin-box-fill ri-2x text-primary"></i></a>
                                            <a href="tel:<?= $user->mobile ?>"><i
                                                    class="ri-smartphone-fill ri-2x text-dark"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end card-->
                </div>
                <?php } ?>
                <!--end col-->
            </div>
            <!--end row-->

            <!-- Modal -->
            <div class="modal fade" id="addmembers" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">Add New Members</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?= form_open('teams/register') ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="teammembersName" class="form-label">Name</label>
                                        <input type="text" name="user_name" class="form-control" id="teammembersName"
                                            placeholder="Enter name" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="designation" class="form-label">Designation</label>
                                        <input type="text" name="designation" class="form-control" id="designation"
                                            placeholder="Enter designation" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <label for="">User Previllage</label>
                                    <!-- Switches Color -->
                                    <select class="form-select mb-3" name="is_admin"
                                        aria-label="Default select example">
                                        <option value="1">Admin</option>
                                        <option value="0">User</option>
                                    </select>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="user_email" class="form-control" id="email"
                                            placeholder="Enter email" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="user_password" class="form-control" id="password"
                                            placeholder="Enter password" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="mobile" class="form-label">Mobile</label>
                                        <input type="text" maxlength="10" name="mobile" class="form-control" id="mobile"
                                            placeholder="Enter mobile" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="gmail" class="form-label">Gmail Link</label>
                                        <input type="text" name="gmail_link" class="form-control" id="gmail"
                                            placeholder="Enter Gmail Address">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="linkedin" class="form-label">Linkedin Link</label>
                                        <input type="text" name="linkedin_link" class="form-control" id="linkedin"
                                            placeholder="Enter Linkedin Address">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="button" class="btn btn-info"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Add
                                            Member</button>
                                    </div>
                                </div>
                            </div>
                            <?= form_close() ?>
                        </div>
                    </div>
                    <!--end modal-content-->
                </div>
                <!--end modal-dialog-->
            </div>
            <!--end modal-->

        </div>
    </div><!-- end col -->
</div>
<!--end row-->