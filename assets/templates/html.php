<?php
$navbar = <<<EOD
<nav class="navbar navbar-expand-sm bg-success navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Latip176</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav d-flex ms-auto">
                <li class="nav-item p-1">
                    <a class="nav-link" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item p-1">
                    <a class="nav-link" href="#populer">Populer</a>
                </li>
                <li class="nav-item p-1">
                    <a class="nav-link" href="#proyek">Proyek</a>
                </li>
                <li class="nav-item p-1">
                    <a class="nav-link" href="#terbaru">Terbaru</a>
                </li>
                <li class="nav-item p-1 d-flex">
                    <form action="#" method="get" class="d-flex align-items-center">
                        <input class="form-control me-2" type="text" placeholder="Search komik" style="height: 30px;">
                        <button type="button" style="height: 35px;" class="btn btn-primary">Search</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
EOD;

$footer = <<<EOD
<div class="footer w-100">
    <div class="bg-success w-100" style="width: 100%; height: 100px; text-align: center; ">
        <p class="text-light fw-bold" style="line-height: 100px;">&copy; 2023 Made By ❤️ <a href="https://latipharkat.my.id/" class="latip link-light text-decoration-none">Latip176</a></p>
    </div>
</div>
EOD;
