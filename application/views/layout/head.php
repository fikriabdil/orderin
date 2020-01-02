<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>
    <?php
    if ($this->uri->segment(2)) {
        echo ucwords(str_replace('_', ' ', $this->uri->segment(2)));
    } else {
        if ($this->uri->segment(1)) {
            echo ucwords(str_replace('_', ' ', $this->uri->segment(1)));
        }
    }
    ?>
</title>

<link href="<?php echo base_url('theme/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('theme/css/sb-admin-2.css') ?>" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
<link href="<?php echo base_url('theme/css/select2.min.css') ?>" rel="stylesheet" />
<link href="<?php echo base_url('theme/css/select2-bootstrap.css') ?>" rel="stylesheet" />

<style>
    .full-bg {
        background-image: url("<?= site_url('theme/img/logo-bg.jpg') ?>");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    html,
    body {
        margin: 0;
        padding: 0;
        height: 100%;
    }

    #container {
        min-height: 100%;
        position: relative;
    }

    #header {
        background: #ff0;
    }

    #body {
        padding-top: 15px;
        padding-bottom: 60px;
    }

    #footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        font-size: 12px;
        padding: 0.75rem;
    }

    @media (max-width: 992px) {
        #footer {
            font-size: 10px;
        }

        h1 {
            font-size: 28px;
        }

        h2 {
            font-size: 24px;
        }

        h3 {
            font-size: 20px;
        }

        h4 {
            font-size: 16px;
        }

        h5 {
            font-size: 14px;
        }

        h6 {
            font-size: 12px;
        }
    }
</style>