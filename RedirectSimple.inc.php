<?php
echo gotoAdFly();

function gotoAdFly(){
    global $domain;

    $url = file_get_contents('https://api.adf.ly/v1/shorten?&_user_id=7321466&_api_key=f9e524c57f6696b19bf7bb121d094fb8*domain=adf.ly&url='.urlencode('http://'.$domain.'/'));

    return $url;
}