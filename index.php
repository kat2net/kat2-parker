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
    if($domain == 'kat2-parker.herokuapp.com'){$type = 'RedirectSimple';}
    if($domain == 'empetree.com'){$type = 'RedirectSimple';}
    if($domain == 'qloud.live'){$type = 'RedirectSimple';}
    if($domain == 'qloud.site'){$type = 'RedirectSimple';}
    if($domain == 'ratdir.com'){$type = 'RedirectSimple';}

    require_once($type.'.inc.php');
}

function getDomain(){
    global $_SERVER;

    return str_replace('www.', '', $_SERVER['HTTP_HOST']);
}