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

    $type = 'RedirectSimple';

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
    curl_setopt($ch, CURLOPT_USERPWD, 'god:82STHSUVPhr*!*');  
    $buffer = curl_exec($ch);
    curl_close($ch);

    return $buffer;
}