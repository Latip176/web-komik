<?php

include '../../assets/php/data.php';
include '../../assets/templates/html.php';
$url = $_GET['url'];

if($url) {
    preg_match('/chapter-(\d+-\d+)/', $url, $matches);
    if (isset($matches[1])) {
        $berada = str_replace('-', '.', $matches[1]);
    } else {
        preg_match('/chapter-(\d+)/', $url, $matches);
        if (isset($matches[1])) {
            $berada = $matches[1];
        } else {
            $berada = "Error";
        }
    }
    $data = read($url)[0]["data"];
    $key = array_keys($data[0])[0];
} else {
    header('Location:../index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baca - <?= $key ?></title>
    <link rel="stylesheet" href="../../assets/templates/global.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
        .content {
            width: 100%;
        }
        .content img {
            width: 100%;
        }
        .row .col-md-6 {
            margin: 10px;
            margin-top: 30px;
            margin-bottom: 20px;
        }
        @media only screen and (min-width: 786px) {
            .content {
                text-align: center;
                margin: auto;
            }
            .content img {
                width: 60%;
            }
        }
    </style>
</head>
<body>    
    <?= $navbar ?>
    <div class="container button">
        <div class="row" style="display: flex; justify-content: center;">
            <div class="col-md-12 mt-3">
                <h5 class="text-center">Chapter <?= $berada ?></h5>
            </div>
            <div class="col-md-6 text-center" style="width: 160px;">
                <a href="?url=<?= $data[0]["prev"] ?>" class="text-decoration-none link-light btn btn-primary fw-bold"> < Sebelumnya</a>
            </div>
            <div class="col-md-6 text-center" style="width: 160px;">
                <a href="?url=<?= $data[0]["next"] ?>" class="text-decoration-none link-light btn btn-primary fw-bold">Selanjutnya > </a>
            </div>
        </div>
    </div>
    <section class="content">
        <?php for($i = 0; $i < count($data[0][$key]); $i++): ?>
            <img src="<?= $data[0][$key][$i] ?>" alt="Panel Image">
        <?php endfor ?>
    </section>
    <div class="container button">
        <div class="row" style="display: flex; justify-content: center;">
            <div class="col-md-6 text-center" style="width: 160px;">
                <a href="?url=<?= $data[0]["prev"] ?>" class="text-decoration-none link-light btn btn-primary fw-bold"> < Sebelumnya</a>
            </div>
            <div class="col-md-6 text-center" style="width: 160px;">
                <a href="?url=<?= $data[0]["next"] ?>" class="text-decoration-none link-light btn btn-primary fw-bold">Selanjutnya > </a>
            </div>    
        </div>
    </div>
    <?= $footer ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>