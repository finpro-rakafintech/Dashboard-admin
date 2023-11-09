<!-- data_pengajuan/detail.php -->

<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header mt-3">
                        <a href="<?= base_url('view_pengajuan'); ?>" class="btn btn-secondary">Back</a>
                        <h4>Detail Pengajuan KPR</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <!-- Purchase details -->
                                <tr>
                                    <th>Nama Nasabah</th>
                                    <td><?php echo $detail->firstname . ' ' . $detail->lastname; ?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Pengajuan</th>
                                    <td><?php echo $detail->date_ordered; ?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Diterima</th>
                                    <td><?php echo $detail->date_received; ?></td>
                                </tr>
                                <tr>
                                    <th>Order Status</th>
                                    <td><?php echo $detail->order_status; ?></td>
                                </tr>
                                <!-- Nasabah details -->
                                <tr>
                                    <th>Income</th>
                                    <td><?php echo $detail->income; ?></td>
                                </tr>
                                <tr>
                                    <th>Outcome</th>
                                    <td><?php echo $detail->outcome; ?></td>
                                </tr>
                                <tr>
                                    <th>Dokumen KTP</th>
                                    <td>
                                        <!-- Link to the document or display the document inline -->
                                        <a href="<?php echo base_url('path_to_document/' . $detail->dok_ktp); ?>" target="_blank">View Document</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Dokumen KK</th>
                                    <td>
                                        <a href="<?php echo base_url('path_to_document/' . $detail->dok_kk); ?>" target="_blank">View Document</a>
                                    </td>
                                </tr>
                                <!-- Add more document fields as needed -->
                                <!-- Product details -->
                                <tr>
                                    <th>Product Name</th>
                                    <td><?php echo $detail->nm_product; ?></td>
                                </tr>
                                <tr>
                                    <th>Luas Bangunan</th>
                                    <td><?php echo $detail->luas_bangunan; ?></td>
                                </tr>
                                <!-- Add more product details as needed -->
                            </table>
                        </div>
                        <div class="mt-3">
                            <?php if ($this->session->userdata('role') == 'super_admin') { ?>
                                <form action="<?= base_url('PengajuanController/process_pengajuan/' . $detail->order_id); ?>" method="post">
                                    <button type="submit" name="action" value="diterima" class="btn btn-success">Diterima</button>
                                    <button type="submit" name="action" value="ditolak" class="btn btn-danger">Ditolak</button>
                                </form>


                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>