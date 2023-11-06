<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header mt-3">
                        <h4>
                            Data Article
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
                        <a href="<?= base_url('page_create_article'); ?>" class="btn btn-icon icon-left btn-success mb-3">
                            <i class="fas fa-plus"></i> Add Article
                        </a>
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr class="text-center">
                                        <th>No.</th>
                                        <th>Judul Artikel</th>
                                        <th>Gambar Artikel</th>
                                        <?php if ($this->session->userdata('role') == 'super_admin') { ?>
                                            <th>Action</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($v_article->result() as $row) { ?>
                                        <tr class="text-center">
                                            <td scope="row">
                                                <?php echo $no++; ?>
                                            </td>
                                            <td>
                                                <?php echo $row->nm_article; ?>
                                            </td>
                                            <td>
                                                <img src="<?php echo base_url() . '/uploads/' . $row->gambar; ?>" alt="" width="100">
                                            </td>
                                            <?php if ($this->session->userdata('role') == 'super_admin') { ?>
                                                <td>
                                                    <a class="btn btn-warning" href="<?php echo base_url('page_update_article/' . $row->article_id); ?>">Update</a>
                                                    <a class="btn btn-danger" href="<?php echo base_url('delete_article/' . $row->article_id); ?>">Delete</a>
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