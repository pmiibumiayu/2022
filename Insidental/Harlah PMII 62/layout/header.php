<?php
include 'data/dataset.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <title>Tadarus | PMII Bumiayu</title>
    <link rel="shortcut icon" href="<?= baseUrl(); ?>img/logo.png" type="image/x-icon">
    <style>
    .kartu {
        margin-top: 10px;
    }

    .d-grid {
        align-items: left;
    }
    </style>
</head>

<body class="bg-primary">
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col">
                <div class="card bg-warning text-center">
                    <div class="card-body">
                        <h4 class="shadow-lg">
                            <?= $setting['interface']['judul']; ?>
                        </h4>
                        <h6><?= $setting['interface']['subjudul']; ?></h6>
                    </div>
                </div>
            </div>
        </div>