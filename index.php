<?php
echo getHandler(getDomain());

function getHandler($domain){
    $types = array(
        '1' => 'RedirectSimple',
        '2' => 'RedirectElaborate',
        '3' => 'ParkSimple',
        '4' => 'ParkElaborate'
    );

    $type = '1';
    if($domain == 'kat2-parker.herokuapp.com'){$type = '1';}
    if($domain == 'empetree.com'){$type = '1';}
    if($domain == 'qloud.live'){$type = '1';}
    if($domain == 'qloud.site'){$type = '1';}
    if($domain == 'ratdir.com'){$type = '1';}

    return $types[$type];
}

function getDomain(){
    global $_SERVER;

    return str_replace('www.', '', $_SERVER['HTTP_HOST']);
}