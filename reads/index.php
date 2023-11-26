<?php

include '../assets/php/data.php';
include '../assets/templates/html.php';
$url = $_GET['url'];

if($url) {
    $data = reads($url, "reads", "awokawok")[0]["data"];
} else {
    header('Location:../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reads <?php foreach($data as $info) { echo $info['title']; } ?></title>
    <style>
        <?php
        foreach($data as $info)
            if($info['chapter_count'] <=30) {
        ?>
                .footer {
                    height: 100vh;
                }
                .footer div {
                    position: absolute;
                    bottom: 0;
                }
        <?php
            } else {
        ?>
                .footer {
                    margin-top: 30px;
                }
        <?php
            }
        ?>
    </style>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../assets/templates/global.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body style="background-image: url(<?php foreach($data as $info) { echo $info['bg_url']; } ?>);">
    <?= $navbar ?>

    <div class="bg w-100" style="
      background-image: url(<?php foreach($data as $info) { echo $info['bg_url']; }?>);
      height: 200px;
      background-repeate: no-repeate;
      background-size: cover;
      position: absolute;
    "></div>
    <section class="container-fluid" id="data" style="position: relative;">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-4 text-center">
                    <?php foreach($data as $info): ?>
                        <img src="<?= $info['bg_url'] ?>" alt="<?= $info['title'] ?>" style="width: 200px; height: 300px; object-fit: cover;">
                    <?php endforeach ?>
                </div>
                <div class="col-md-8 rounded p-3">
                    <?php foreach($data as $info): ?>
                        <h5 style="margin-top: 10px;"><?= $info['title'] ?></h5>
                        <p class='text-muted fst-italic'>Genre: <?= implode(", ", $info['genres']) ?></p>
                        <h6>Sinopsis: </h6>
                        <p><?= $info['sinopsis'] ?></p>
                    <?php endforeach ?>
                </div>
                <div class="col-md-12 mt-3 p-3 rounded">
                  <h5 class="text-center">Chapter List</h5>
                  <p class="text-muted text-center">Click Chapter untuk Membaca</p>
                    <?php
                        foreach($data as $info) {
                            foreach($info['chapter_content'] as $content) {
                    ?>
                                <div class="container border-bottom border-success" style="height: 55px;">
                                    <a href="read/?url=<?= $content['url'] ?>" class="link-dark"><?= $content['chapter'] ?></a>
                                    <p class="text-muted fst-italic"> <?= $content['releases_date']?></p>
                                </div>
                    <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <?= $footer ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>