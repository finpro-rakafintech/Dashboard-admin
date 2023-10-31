<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header mt-3">
                        <h4>
                            Data Nasabah
                        </h4>
                        <div class="card-header-form">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" name="keyword">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                            <a href="<?= base_url('page_create_user'); ?>" class="btn btn-icon icon-left btn-success mb-3">
                                <i class="fas fa-plus"></i> Add Nasabah
                            </a>
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th>Nama Lengkap</th>
                                        <th>Phone Number</th>
                                        <th>NIK</th>
                                        <th>No. Kredit</th>
                                        <th>NPWP</th>
                                        <th>Income</th>
                                        <th>Outcome</th>
                                        <?php if ($this->session->userdata('role') == 'super_admin') { ?>
                                            <th>Action</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($v_nasabah->result() as $row) { ?>
                                        <tr>
                                            <th scope="row">
                                                <?php echo $no++; ?>
                                            </th>
                                            <td>
                                                <?php echo $row->firstname; ?>
                                                <?php echo $row->lastname; ?>
                                            </td>
                                            <td>
                                                <?php echo $row->phone_number; ?>
                                            </td>
                                            <td>
                                                <?php echo $row->nik; ?>
                                            </td>
                                            <td>
                                                <?php echo $row->no_kredit; ?>
                                            </td>
                                            <td>
                                                <?php echo $row->npwp; ?>
                                            </td>
                                            <td>
                                                <?php echo $row->income; ?>
                                            </td>
                                            <td>
                                                <?php echo $row->outcome; ?>
                                            </td>
                                            <?php if ($this->session->userdata('role') == 'super_admin') { ?>
                                                <td>
                                                    <a class="btn btn-warning" href="<?php echo base_url('page_update_user/' . $row->user_id); ?>">Update</a>
                                                    <a class="btn btn-danger" href="<?php echo base_url('delete_user/' . $row->user_id); ?>">Delete</a>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>