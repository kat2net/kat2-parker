<?php

header('Content-Type: text/plain');

if((isFromAdFly()) || (isFromAdultxyz()) || (isFromCoinURL()) || (isFromShortest())){
    if((isFromAdultxyz()) || (isFromCoinURL()) || (isFromShortest())){
        if((isFromCoinURL()) || (isFromShortest())){
            if(isFromShortest()){
                echo 'done';
            }else{
                echo gotoShortest()."\n";
                //header('Location: '.gotoShortest());
            }
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