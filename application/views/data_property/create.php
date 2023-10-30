<div class="main-content">
    <section class="section">
        <h2 class="mb-4">Tambah Data Properti</h2>
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                        <form action="create_property" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Property</label>
                                        <input type="text" class="form-control" name="nm_property">
                                    </div>
                                    <div class="form-group">
                                        <label>Luas Tanah</label>
                                        <input type="text" class="form-control" name="ls_tanah">
                                    </div>
                                    <div class="form-group">
                                        <label>Luas Bangunan</label>
                                        <input type="text" class="form-control" name="ls_bangunan">
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Kamar Tidur</label>
                                        <input type="text" class="form-control" name="jum_kamartidur">
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Kamar mandi</label>
                                        <input type="text" class="form-control" name="jum_kamarmandi">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jumlah Garasi</label>
                                        <input type="text" class="form-control" name="jum_garasi">
                                    </div>
                                    <!-- <div class="form-group">
                                                <label>Lokasi</label>
                                                <input type="text" class="form-control">
                                            </div> -->
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input type="number" class="form-control" name="price">
                                    </div>
                                    <!-- <div class="section-title">Gambar</div>
                                            <div class="custom-file">
                                              <input type="file" class="custom-file-input" id="customFile">
                                              <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div> -->
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea id="editor" name="deskripsi"></textarea>
                                    </div>

                                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                    <button class="btn btn-danger" type="reset">Reset</button>
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