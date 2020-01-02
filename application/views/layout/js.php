<script src="<?php echo base_url('theme/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('theme/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
<script src="<?php echo base_url('theme/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?php echo base_url('theme/js/sb-admin-2.min.js') ?>"></script>
<script src="<?php echo base_url('theme/js/select2.min.js') ?>"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            theme: "bootstrap"
        });

    });
    $(function() {
        $('[data-toggle=" tooltip"]').tooltip()
    });
</script>