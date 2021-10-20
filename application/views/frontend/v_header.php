<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/35bddabfd3.js" crossorigin="anonymous"></script>
    <title><?php echo $setweb->nama ?></title>
</head>

<body>
    <!-- Navbar -->
    <!-- Image and text -->
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm mb-0 bg-white rounded-0 fixed-top pb-2 pt-5"
        style="opacity: 0.9;">
        <div class="container-sm">
            <a class="navbar-brand" href="<?php echo base_url(); ?>">
                <img src="<?php echo base_url(); ?>assets_frontend/img/Logo D&C Productions only 2.png" width="50" height="50" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="<?php echo base_url();?>">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll" href="<?php echo base_url(); ?>produk">Produk</a>
                      </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll" href="<?php echo base_url(); ?>artikel">Artikel</a>
                      </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tentangkami.html">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kontak.html">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->


    <!-- Nav info email -->
    <div class="nav p-1 fixed-top bg-dark">
        <div class="container-sm">
            <div class="minikontak">
                <i class="fas fa-tty text-white mr-3"> | <?php echo $setweb->nowa ?></i>
                <i class="fas fa-envelope-open-text text-white"> | <?php echo $setweb->email ?></i>
            </div>
        </div>
    </div>
    <!-- End nav -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>