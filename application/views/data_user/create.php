<div class="main-content">
    <section class="section">
        <h2 class="mb-4">Tambah Data User</h2>
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="create_user" method="post">
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
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password" value="<?php echo set_value('password'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Level</label>
                                            <select name="level" class="form-control">
                                                <option></option>
                                                <option value="super_admin" <?php echo set_select('level', 'super_admin'); ?>>Super Admin</option>
                                                <option value="admin" <?php echo set_select('level', 'admin'); ?>>Admin</option>
                                            </select>
                                        </div>

                                        <button class="btn btn-success mr-1" type="submit">Submit</button>
                                        <a href="page_create_user" class="btn btn-warning">Reset</a>
                                        <!-- <button class="btn btn-warning" type="reset">Reset</button> -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input type="text" class="form-control" name="fullname" value="<?php echo set_value('fullname'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Tgl Lahir</label>
                                            <input type="date" class="form-control" name="birthdate" value="<?php echo set_value('birthdate'); ?>">
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