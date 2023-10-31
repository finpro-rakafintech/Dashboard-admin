<div class="main-content">
    <section class="section">
        <h2 class="mb-4">Edit Data User</h2>
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?php echo base_url('update_user'); ?>" method="post">
                            <div class="row">
                                    <div class="col-md-6">
                                            <input type="hidden" class="form-control" name="user_id" value="<?php echo $user_id; ?>">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password" value="<?php echo $password; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Level</label>
                                            <select name="level" class="form-control"?>
                                                <option></option>
                                                <option value="super_admin" <?php if ($level == "super_admin") echo "selected"; ?>>Super Admin</option>
                                                <option value="admin" <?php if ($level == "admin") echo "selected"; ?>>Admin</option>
                                            </select>
                                        </div>

                                        <button class="btn btn-success mr-1" type="submit">Submit</button>
                                        <button class="btn btn-warning" type="reset">Reset</button>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input type="text" class="form-control" name="fullname" value="<?php echo $fullname; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Tgl Lahir</label>
                                            <input type="date" class="form-control" name="birthdate" value="<?php echo $birthdate; ?>">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>