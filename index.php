<?php
echo getDomain();

function getDomain(){
    global $_SERVER;

    return str_replace('www.', '', $_SERVER['HTTP_HOST']);
}