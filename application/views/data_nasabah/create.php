<div class="main-content">
    <section class="section">
        <h2 class="mb-4">Tambah Data User</h2>
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="create_nasabah" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" name="firstname">
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" name="lastname">
                                        </div>
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="text" class="form-control" name="phone_number">
                                        </div>
                                        <div class="form-group">
                                            <label>User ID</label>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>NIK</label>
                                            <input type="text" class="form-control" name="nik">
                                        </div>

                                        <button class="btn btn-success mr-1" type="submit">Submit</button>
                                        <button class="btn btn-warning" type="reset">Reset</button>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>No. Kredit</label>
                                            <input type="text" class="form-control" name="no_kredit">
                                        </div>
                                        <div class="form-group">
                                            <label>NPWP</label>
                                            <input type="date" class="form-control" name="npwp">
                                        </div>
                                        <div class="form-group">
                                            <label>Income</label>
                                            <input type="date" class="form-control" name="income">
                                        </div>
                                        <div class="form-group">
                                            <label>Outcome</label>
                                            <input type="date" class="form-control" name="outcome">
                                        </div>
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