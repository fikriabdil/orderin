<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="<?php echo base_url('theme/img/kota-cirebon.png') ?>">
    <link href="<?php echo base_url('theme/css/sb-admin-2.css') ?>" rel="stylesheet">

    <title><?php echo SITE_NAME; ?></title>

    <style type="text/css">
        ::selection {
            background-color: #E13300;
            color: white;
        }

        ::-moz-selection {
            background-color: #E13300;
            color: white;
        }

        a {
            color: #003399;
            background-color: transparent;
            font-weight: normal;
        }

        h1 {
            color: #444;
            background-color: transparent;
            border-bottom: 1px solid #D0D0D0;
            font-size: 19px;
            font-weight: normal;
            margin: 0 0 14px 0;
            padding: 14px 15px 10px 15px;
        }

        code {
            font-family: Consolas, Monaco, Courier New, Courier, monospace;
            font-size: 12px;
            background-color: #f9f9f9;
            border: 1px solid #D0D0D0;
            color: #002166;
            display: block;
            margin: 14px 0 14px 0;
            padding: 12px 10px 12px 10px;
        }

        p {
            margin: 12px 15px 12px 15px;
        }

        img {
            width: 100%;
            max-width: 10rem;
        }

        .centered {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center !important;
        }
    </style>
</head>

<body class="bg-babyblue">
    <div class="container centered">

        <img src="<?php echo base_url('theme/img/kota-cirebon.png') ?>">
        <div class="h6 mt-4 page-title"><?= SITE_NAME ?></div>

        <h1>Halaman Tidak Ditemukan</h1>
        Halaman yang anda maksud tidak dapat ditemukan<br>
        <a href="<?php echo site_url('/') ?>" class="m-4 btn btn-darkblue btn-150">Kembali</a>
    </div>
</body>

</html>