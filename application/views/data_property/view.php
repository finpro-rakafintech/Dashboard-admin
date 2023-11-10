<div class="main-content">
    <section class="section">
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
        <h2 class="mb-3">Data Properti</h2>
        <a href="<?=base_url('page_create_property'); ?>" class="btn btn-icon icon-left btn-success">
            <i class="fas fa-plus"></i> Add Property
        </a>

        <div class="row g-5 justify-content-center mt-4">
            <?php foreach ($v_property->result() as $row) : ?>
                <div class="col-lg-4">
                    <div class="card card-info">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="<?= base_url('assets/'); ?>template/img/995.jpg" width="auto" height="200">
                            </div>
                            <h6 class="card-title fw-bold mt-3"><?php echo $row->nm_product; ?></h6>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="card-text text-muted mb-1 font-sm">
                                    <i class="fas fa-donate"></i> <span class="price">Rp. <?php echo $row->price; ?></span>
                                </p>
                                <p class="card-text text-muted font-sm">
                                    <i class="fas fa-map-marker-alt me-1"></i> <span class="location">Jakarta Selatan</span>
                                </p>
                            </div>
                            <hr class="fw-bold border-1">
                            <!-- <a href="<?= site_url('DataPropertiController/detailadmin') ?>" class="btn btn-icon icon-left btn-info"><i class="fas fa-info-circle"></i> Info</a> -->
                            <a href="<?php echo base_url('page_update_property/' . $row->product_id); ?>" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Edit</a>
                            <a href="<?php echo base_url('delete_property/' . $row->product_id); ?>" class="btn btn-icon icon-left btn-danger"><i class="fas fa-times"></i> Delete</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php echo $this->pagination->create_links(); ?>

        <!-- <nav aria-label="Page navigation example" class="mt-5">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                    <li class="page-item">
                        <a class= "page-link" href="#">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                    </li>
                </ul>
            </nav> -->
    </section>
</div>