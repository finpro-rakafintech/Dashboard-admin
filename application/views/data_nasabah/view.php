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
                        <?php if ($this->session->flashdata('success')) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo $this->session->flashdata('success'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php elseif ($this->session->flashdata('failed')) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo $this->session->flashdata('failed'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                    
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr class="text-center">
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
                                        <tr class="text-center">
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
                                                    <a class="btn btn-warning" href="<?php echo base_url('page_update_nasabah/' . $row->nasabah_id); ?>">Update</a>
                                                    <a class="btn btn-danger" href="<?php echo base_url('delete_nasabah/' . $row->nasabah_id); ?>">Delete</a>
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