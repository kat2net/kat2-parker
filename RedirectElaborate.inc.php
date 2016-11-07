<?php

header('Content-Type: text/plain');

if(isFromAdFly()){
    echo gotoAdultxyz()."\n";
    //header('Location: '.gotoAdultxyz());
}else{
    echo gotoAdFly()."\n";
    //header('Location: '.gotoAdFly());
}

print_r($_SERVER);

function gotoCoinURL(){
    global $domain;
    
    $url = file_get_contents('https://coinurl.com/api.php?uuid=50d6e43d31c22900631610&url='.urlencode('http://'.$domain.'/'));

    return $url;
}

function gotoAdultxyz(){
    global $domain;

    $url = file_get_contents('https://api.adult.xyz/v1/shorten?&_user_id=14921373&_api_key=05eb0cdc706f2cf1035e24ac8eef05e1&domain=zo.ee&url='.urlencode('http://'.$domain.'/'));

    return $url;
}