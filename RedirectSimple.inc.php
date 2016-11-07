<?php

if(isFromAdFly()){
    require_once('ParkSimple.inc.php');
}else{
    header('Location: '.gotoAdFly());
}