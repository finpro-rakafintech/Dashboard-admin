
<!-- General JS Scripts -->
<script src="<?=base_url('assets/')?>template/js/app.min.js"></script>
<script src="<?=base_url('assets/')?>template/bundles/apexcharts/apexcharts.min.js"></script>
<script src="<?=base_url('assets/')?>template/js/page/index.js"></script>
<script src="<?=base_url('assets/')?>template/js/scripts.js"></script>
<script src="<?=base_url('assets/')?>template/js/custom.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
</body>

</html>