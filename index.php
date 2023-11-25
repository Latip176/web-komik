<?php
include 'assets/php/data.php';
include 'assets/templates/html.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baca Komik - Bahasa Indonesia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/templates/global.css">
    <script src="assets/js/style.js"></script>
</head>
<body>
    
    <?= $navbar ?>

    <div class="container-fluid mt-5">
        <h3 class="fw-bold">Baca Komik - Bahasa Indonesia</h3>
        <p class="text-muted">Ini adalah sebuah Website untuk membaca komik terlengkap dan gratis tanpa Iklan! Note: Beli komik aslinya jika sudah tersedia di Kotamu! | Semua data adalah hasil scraping dari (mangayaro.net)</p>
    </div>

    <section class="container-fluid w-100" id="populer">
        <h4 class="text-dark">Populer</h4>
        <div class="panel overflow-auto">
            <div class="row flex-nowrap flex-md-wrap py-3 mx-auto">
                <?php
                    $data_populer = search("populer", "category");
                    foreach ($data_populer as $data) {
                ?>
                    <?php
                        $len = strlen($data['title']);
                        $title = $len <= 30 ? $data['title'] : substr($data['title'], 0, 30) . '...';
                    ?>
                        <div class="card overflow-hidden">
                            <a href="reads/?url=<?= $data['url'] ?>"><img class="card-img-top" src="<?= $data['bg_url'] ?>" alt="Cover of Comic" style="object-fit: cover;"></a>
                            <div class="card-body" style="height: 200px;">
                                <a class="card-title fw-bold link-dark" href="reads/?url=<?= $data['url'] ?>"><?= $title ?></a>
                                <p class="text-muted">Chapter <?= $data['chapter'] ?></p>
                                <p class="text-muted"><img src="assets/img/star.png" style="width: 20px; height: 20px;"> Ratings: <?= $data['rating'] ?></p>
                            </div>
                        </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </section>

    <section class="container-fluid" id="proyek">
        <h4 class="text-dark">Proyek</h4>
        <div class="panel overflow-auto">
            <div class="row flex-nowrap flex-md-wrap py-3 mx-auto">
                <?php
                    $data_proyek = search("proyek", "category");
                    foreach ($data_proyek as $data) {
                ?>
                    <?php
                        $len = strlen($data['title']);
                        $title = $len <= 30 ? $data['title'] : substr($data['title'], 0, 30) . '...';
                    ?>
                        <div class="card overflow-hidden">
                            <a href="reads/?url=<?= $data['url'] ?>"><img class="card-img-top" src="<?= $data['bg_url'] ?>" alt="Cover of Comic" style="object-fit: cover;"></a>
                            <div class="card-body" style="height: 200px;">
                                <a class="card-title fw-bold link-dark" href="reads/?url=<?= $data['url'] ?>"><?= $title ?></a>
                    <?php
                        foreach($data['update'] as $update) {
                    ?>
                            <p class="text-muted"><?= $update[1]['chapter'] . ': ' . $update[1]['time'] ?></p>
                    <?php
                        }
                    ?>
                            </div>
                        </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </section>
    <section class="container-fluid" id="terbaru">
        <h4 class="text-dark">Terbaru</h4>
        <div class="panel overflow-auto">
            <div class="row flex-nowrap flex-md-wrap py-3 mx-auto">
                <?php
                    $data_terbaru = search("terbaru", "category");
                    foreach ($data_terbaru as $data) {
                ?>
                    <?php
                        $len = strlen($data['title']);
                        $title = $len <= 30 ? $data['title'] : substr($data['title'], 0, 30) . '...';
                    ?>
                        <div class="card overflow-hidden">
                            <a href="reads/?url=<?= $data['url'] ?>"><img class="card-img-top" src="<?= $data['bg_url'] ?>" alt="Cover of Comic" style="object-fit: cover;"></a>
                            <div class="card-body" style="height: 200px;">
                                <a class="card-title fw-bold link-dark" href="reads/?url=<?= $data['url'] ?>"><?= $title ?></a>
                    <?php
                        foreach($data['update'] as $update) {
                    ?>
                            <p class="text-muted"><?= $update[1]['chapter'] . ': ' . $update[1]['time'] ?></p>
                    <?php
                        }
                    ?>
                            </div>
                        </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </section>

    <?= $footer ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>