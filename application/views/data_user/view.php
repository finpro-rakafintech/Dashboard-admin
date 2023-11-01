<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header mt-3">
                        <h4>
                            Data User
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
                        <?php if ($this->session->userdata('role') == 'super_admin') { ?>
                            <a href="<?= base_url('page_create_user'); ?>" class="btn btn-icon icon-left btn-success mb-3">
                                <i class="fas fa-plus"></i> Add User
                            </a>
                        <?php } ?>
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th>Email</th>
                                        <th>Nama Lengkap</th>
                                        <th>Tgl Lahir</th>
                                        <?php if ($this->session->userdata('role') == 'super_admin') { ?>
                                            <th>Action</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($v_user->result() as $row) { ?>
                                        <tr>
                                            <th scope="row">
                                                <?php echo $no++; ?>
                                            </th>
                                            <td>
                                                <?php echo $row->email; ?>
                                            </td>
                                            <td>
                                                <?php echo $row->fullname; ?>
                                            </td>
                                            <td>
                                                <?php echo $row->birthdate; ?>
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