<?php

if(isFromAdFly()){
    require_once('ParkSimple.inc.php');
}else{
    header('Location: '.gotoAdFly());
}

function isFromAdFly(){
    global $_SERVER;

    $re = false;
    if(isset($_SERVER['HTTP_REFERER'])){
        if(stristr($_SERVER['HTTP_REFERER'], 'http://adf.ly/')){
            $re = true;
        }
    }

    return $re;
}

function gotoAdFly(){
    global $domain;

    $url = file_get_contents('https://api.adf.ly/v1/shorten?&_user_id=7321466&_api_key=f9e524c57f6696b19bf7bb121d094fb8&domain=adf.ly&url='.urlencode('http://'.$domain.'/'));

    return $url;
}