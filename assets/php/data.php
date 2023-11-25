<?php

$url = "https://mangayaro-api.vercel.app";

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
    global $url
    if($route=="category") {
        $rt = $url . "/api/search/?category={$param}";
    } else {
        $rt = $url . "/api/search/?keyword={$param}";
    }

    $result = requests($rt);
    return json_decode($result, true)['results'][0]['data'];
}

function reads($next, $route, $param) {
    global $url
    if($route=="limit") {
        $rt = $url . "/api/reads/?url={$next}&limit={$param}";
    } elseif($route=="only_chapter") {
        $rt = $url . "/api/reads/?url={$next}&only_chapter={$param}";
    } elseif($route=="reads") {
        $rt = $url . "/api/reads/?url={$next}";
    }

    $result = requests($rt);
    return json_decode($result, true)["results"];
}

function read($next) {
    global $url
    $rt = $url . "/api/read/?url={$next}";

    $result = requests($rt);
    return json_decode($result, true)['results'];
}
