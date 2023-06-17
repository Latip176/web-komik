<?php

$url = "https://mangayaro-api-production.up.railway.app";

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
    $url = "https://mangayaro-api-production.up.railway.app";
    if($route=="category") {
        $rt = "https://mangayaro-api-production.up.railway.app/api/search/?category={$param}";
    } else {
        $rt = "https://mangayaro-api-production.up.railway.app/api/search/?keyword={$param}";
    }

    $result = requests($rt);
    return json_decode($result, true)['results'][0]['data'];
}

function reads($url, $route, $param) {
    if($route=="limit") {
        $rt = "https://mangayaro-api-production.up.railway.app/api/reads/?url={$url}&limit={$param}";
    } elseif($route=="only_chapter") {
        $rt = "https://mangayaro-api-production.up.railway.app/api/reads/?url={$url}&only_chapter={$param}";
    } elseif($route=="reads") {
        $rt = "https://mangayaro-api-production.up.railway.app/api/reads/?url={$url}";
    }

    $result = requests($rt);
    return json_decode($result, true)["results"];
}

function read($url) {
    $rt = "https://mangayaro-api-production.up.railway.app/api/read/?url={$url}";

    $result = requests($rt);
    return json_decode($result, true)['results'];
}