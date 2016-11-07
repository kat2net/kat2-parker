<?php

header('Content-Type: text/plain');

if((isFromAdFly()) || (isFromAdultxyz()) || (isFromCoinURL())){
    if(isFromAdultxyz()){
        if(isFromCoinURL()){
            echo gotoShortest()."\n";
            //header('Location: '.gotoShortest());
        }else{
            echo gotoCoinURL()."\n";
            //header('Location: '.gotoCoinURL());
        }
    }else{
        echo gotoAdultxyz()."\n";
        //header('Location: '.gotoAdultxyz());
    }
}else{
    echo gotoAdFly()."\n";
    //header('Location: '.gotoAdFly());
}

print_r($_SERVER);