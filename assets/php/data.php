<?php

$public_api = "https://mangayaro-api.vercel.app";

function requests($url) {
    // persiapkan curl
    $ch = curl_init(); 

    // set url 
    curl_setopt($ch, CURLOPT_URL, $url);

    // return the transfer as a string 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

    // $output contains the output string 
    $output = curl_exec($ch); 

    // tutup curl 
    curl_close($ch);      

    // menampilkan hasil curl
    return $output;
}

function search($param, $route) {
    global $public_api;
    if($route=="category") {
        $rt = $public_api . "/api/search/?category={$param}";
    } else {
        $rt = $public_api . "/api/search/?keyword={$param}";
    }

    $result = requests($rt);
    return json_decode($result, true)['results'][0]['data'];
}

function reads($next, $route, $param) {
    global $public_api;
    if($route=="limit") {
        $rt = $public_api . "/api/reads/?url={$next}&limit={$param}";
    } elseif($route=="only_chapter") {
        $rt = $public_api . "/api/reads/?url={$next}&only_chapter={$param}";
    } elseif($route=="reads") {
        $rt = $public_api . "/api/reads/?url={$next}";
    }

    $result = requests($rt);
    return json_decode($result, true)["results"];
}

function read($next) {
    global $public_api;
    $rt = $public_api . "/api/read/?url={$next}";

    $result = requests($rt);
    return json_decode($result, true)['results'];
}
