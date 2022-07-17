<div class="card">
    <div class="card-body">
        <div class="row g-2">
            <!--end col-->
            <div class="col">
                <h3>Contact Message</h3>
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
                <h5 class="card-title mb-0 text-primary">Visitors Messages</h5>
            </div>
            <div class="card-body">
                <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Contacted Timestamp</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dataSet->result() as $contact) { ?>
                        <tr>
                            <td><?= $contact->id ?></td>
                            <td><?= $contact->name ?></td>
                            <td><?= $contact->email ?></td>
                            <td><?= $contact->mobile ?></td>
                            <td><?= $contact->subject ?></td>
                            <td><?= $contact->message ?></td>
                            <td><?= $contact->contact_at ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>