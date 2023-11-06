<div class="main-content">
    <section class="section">
        <h2 class="mb-4">Tambah Data Property</h2>
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="create_property" method="post">
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
                                            <label>Nama Property</label>
                                            <input type="text" class="form-control" name="nm_property" value="<?php echo set_value('nm_property'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Luas Tanah</label>
                                            <input type="text" class="form-control" name="ls_tanah" value="<?php echo set_value('ls_tanah'); ?>" onkeypress="return hanyaAngka(event)">
                                        </div>
                                        <div class="form-group">
                                            <label>Luas Bangunan</label>
                                            <input type="text" class="form-control" name="ls_bangunan" value="<?php echo set_value('ls_bangunan'); ?>" onkeypress="return hanyaAngka(event)">
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Kamar Tidur</label>
                                            <input type="text" class="form-control" name="jum_kamartidur" value="<?php echo set_value('jum_kamartidur'); ?>" onkeypress="return hanyaAngka(event)">
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Kamar mandi</label>
                                            <input type="text" class="form-control" name="jum_kamarmandi" value="<?php echo set_value('jum_kamarmandi'); ?>" onkeypress="return hanyaAngka(event)">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Jumlah Garasi</label>
                                            <input type="text" class="form-control" name="jum_garasi" value="<?php echo set_value('jum_garasi'); ?>" onkeypress="return hanyaAngka(event)">
                                        </div>
                                        <!-- <div class="form-group">
                                                <label>Lokasi</label>
                                                <input type="text" class="form-control">
                                            </div> -->
                                        <div class="form-group">
                                            <label>Harga</label>
                                            <input type="text" class="form-control" name="price" value="<?php echo set_value('price'); ?>" onkeypress="return hanyaAngka(event)">
                                        </div>
                                        <!-- <div class="section-title">Gambar</div>
                                            <div class="custom-file">
                                              <input type="file" class="custom-file-input" id="customFile">
                                              <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div> -->
                                        <div class="form-group">
                                            <label>Deskripsi</label>
                                            <textarea id="editor" name="deskripsi"><?php echo set_value('deskripsi'); ?></textarea>
                                        </div>

                                        <button class="btn btn-success mr-1" type="submit">Submit</button>
                                        <a href="page_create_property" class="btn btn-warning">Reset</a>
                                        <!-- <button class="btn btn-warning" type="reset">Reset</button> -->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    function hanyaAngka(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
            return false;
        return true;
    }
</script>