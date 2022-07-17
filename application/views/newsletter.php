<div class="card">
    <div class="card-body">
        <div class="row g-2">
            <!--end col-->
            <div class="col">
                <h3>Newsletters Subscribers </h3>
            </div>

            <!--end col-->
        </div>
        <!--end row-->
    </div>
</div>
<!--end col-->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0 text-primary">Subscribers List</h5>
            </div>
            <div class="card-body">
                <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Subscribed At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dataSet->result() as $newsletter) { ?>
                        <tr>
                            <td><?= $newsletter->id ?></td>
                            <td><?= $newsletter->email ?></td>
                            <td><?= $newsletter->subscribed_at ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>