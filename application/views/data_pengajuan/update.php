<div class="main-content">
    <section class="section">
        <h2 class="mb-4">Edit Data Pengajuan</h2>
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <?php echo form_open_multipart('update_article'); ?>
                                <?php if ($this->session->flashdata('error')) : ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <?php echo $this->session->flashdata('error'); ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php endif; ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" class="form-control" name="order_id" value="<?php echo $order_id; ?>">
                                        <div class="form-group">
                                            <label>Nama Nasabah</label>
                                            <input type="text" class="form-control" name="nm_article" value="<?php echo $nm_article; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Isi Artikel</label>
                                            <textarea id="editor" name="description"><?php echo $description; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Gambar Artikel</label><br>
                                            <img src="<?php echo base_url('uploads/' . $gambar); ?>" alt="Gambar Artikel" width="100"><br>
                                            <input type="file" name="userfile" size="20" style="margin-top: 10px;">
                                            <p style="color: red;">*Ukuran file tidak lebih dari 2MB</p>
                                        </div>

                                        <button class="btn btn-success mr-1" type="submit">Submit</button>
                                        <button class="btn btn-warning" type="reset">Reset</button>
                                    </div>
                                </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>