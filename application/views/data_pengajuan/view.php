<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header mt-3">
                        <h4>
                            Data Pengajuan KPR
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
                                        <th>No.</th>
                                        <th>Nama Nasabah</th>
                                        <th>Tgl Pengajuan</th>
                                        <th>Tgl Diterima</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($v_pengajuan->result() as $row) { ?>
                                        <tr class="text-center">
                                            <td scope="row">
                                                <?php echo $no++; ?>
                                            </td>
                                            <td>
                                                <?php echo $row->firstname; ?>
                                                <?php echo $row->lastname; ?>
                                            </td>
                                            <td>
                                                <?php echo $row->date_ordered; ?>
                                            </td>
                                            <td>
                                                <?php echo $row->date_received; ?>
                                            </td>
                                            <td>
                                                <?php echo $row->order_status; ?>
                                            </td>
                                            <?php if ($this->session->userdata('role') == 'super_admin') { ?>
                                                <td>
                                                    <a class="btn btn-primary" href="<?php echo base_url('detail_pengajuan/' . $row->order_id); ?>"><i class="fas fa-info-circle"></i> Detail</a>
                                                    <a class="btn btn-danger" href="<?php echo base_url('delete_pengajuan/' . $row->order_id); ?>">Delete</a>
                                                </td>
                                            <?php } else { ?>
                                                <td>
                                                    <a class="btn btn-primary" href="<?php echo base_url('detail_pengajuan/' . $row->order_id); ?>"><i class="fas fa-info-circle"></i> Detail</a>
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