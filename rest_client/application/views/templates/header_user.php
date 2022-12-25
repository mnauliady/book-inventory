<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?> </title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>">
    
    <script src="<?= base_url('assets/js/jquery-3.3.1.slim.min.js') ?>"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?= base_url() ?>">Katalog Buku</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor03">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategori</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?php echo site_url('Main/kategori?kategori=Novel'); ?>">Novel</a>
                <a class="dropdown-item" href="<?php echo site_url('Main/kategori?kategori=Komik'); ?>">Komik</a>
                <a class="dropdown-item" href="<?php echo site_url('Main/kategori?kategori=Biografi'); ?>">Biografi</a>
                <a class="dropdown-item" href="<?php echo site_url('Main/kategori?kategori=Buku'); ?>">Buku Pelajaran</a> 
            </div>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="#"><?php echo $this->session->userdata('username')?><span class="sr-only"></span></a>
        </li>

        </ul>

        <a href="<?= site_url('main/logout') ?>"><button class="btn btn-danger my-2 my-sm-0 mr-5" type="button">Logout</button></a>
    </div>
    </nav>
    <div class="container main-panel">
    