<?php

if(isset($_GET['forceHome'])){
    header('Location: /');
    exit();
    die();
}

$domain = getDomain();
$handler = getHandler();

function handleRedirectSimple(){
    global $domain;
}

function getHandler(){
    global $domain;

    $types = array(
        '1' => 'RedirectSimple',
        '2' => 'RedirectElaborate',
        '3' => 'ParkSimple',
        '4' => 'ParkElaborate'
    );

    $type = 'RedirectElaborate';

    $call = kat2APICall('http://intern.kat2.net/api/parker/?domain='.$domain.'&noViewUpdate&noHTML');
    $arr = json_decode($call, true);
    if($arr['success']){
        if(($arr['option'] == 'RedirectSimple') || ($arr['option'] == 'RedirectElaborate') ||  ($arr['option'] == 'ParkSimple') || ($arr['option'] == 'ParkElaborate')){
            $type = $arr['option'];
        }
    }

    require_once($type.'.inc.php');
}

function getDomain(){
    global $_SERVER;

    return str_replace('www.', '', $_SERVER['HTTP_HOST']);
}

function kat2APICall($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $buffer = curl_exec($ch);
    curl_close($ch);

    return $buffer;
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
function isFromAdultxyz(){
    global $_SERVER;

    $re = false;
    if(isset($_SERVER['HTTP_REFERER'])){
        if(stristr($_SERVER['HTTP_REFERER'], 'http://zo.ee/')){
            $re = true;
        }
    }

    return $re;
}
function isFromCoinURL(){
    global $_SERVER;

    $re = false;
    if(isset($_SERVER['HTTP_REFERER'])){
        if(stristr($_SERVER['HTTP_REFERER'], 'http://cur.lv/')){
            $re = true;
        }
    }

    return $re;
}
function isFromShortest(){
    global $_SERVER;

    $re = false;
    if(isset($_SERVER['HTTP_REFERER'])){
        if(stristr($_SERVER['HTTP_REFERER'], 'http://sh.st/')){
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
function gotoAdultxyz(){
    global $domain;

    $url = file_get_contents('https://api.adult.xyz/v1/shorten?&_user_id=14921373&_api_key=05eb0cdc706f2cf1035e24ac8eef05e1&domain=zo.ee&url='.urlencode('http://'.$domain.'/'));

    return $url;
}
function gotoCoinURL(){
    global $domain;
    
    $url = file_get_contents('https://coinurl.com/api.php?uuid=50d6e43d31c22900631610&url='.urlencode('http://'.$domain.'/'));

    return $url;
}
function gotoShortest(){
    global $domain;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.shorte.st/v1/data/url');
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'urlToShorten='.urlencode('http://'.$domain.'/'));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'public-api-token: fd38e32ea208fe04fdf17aab978f0b51'
    ));
    $buffer = curl_exec($ch);
    curl_close($ch);

    $buffer = json_decode($buffer, true);

    return $buffer['shortenedUrl'];
}