<div class="main-content">
    <section class="section">
        <h2 class="mb-4">Tambah Data Nasabah</h2>
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- <form action="create_nasabah" method="post"> -->
                            <?php echo form_open_multipart('create_article'); ?>
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
                                        <div class="form-group">
                                            <label>Judul Artikel</label>
                                            <input type="text" class="form-control" name="nm_article" value="<?php echo set_value('nm_article'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Isi Artikel</label>
                                            <textarea id="editor" name="description"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Gambar Artikel</label>
                                            <input type="file" class="form-control" name="img_article" value="<?php echo set_value('img_article'); ?>">
                                        </div>

                                        <button class="btn btn-success mr-1" type="submit">Submit</button>
                                        <button class="btn btn-warning" type="reset">Reset</button>
                                    </div>  
                                </div>
                            <!-- </form> -->
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>