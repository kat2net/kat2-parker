<?php
if((isFromAdFly()) || (isFromAdultxyz()) || (isFromCoinURL()) || (isFromShortest())){
    if((isFromAdultxyz()) || (isFromCoinURL()) || (isFromShortest())){
        if((isFromCoinURL()) || (isFromShortest())){
            if(isFromShortest()){
                require_once('ParkSimple.inc.php');
            }else{
                //echo gotoShortest()."\n";
                header('Location: '.gotoShortest());
            }
        }else{
            //echo gotoCoinURL()."\n";
            header('Location: '.gotoCoinURL());
        }
    }else{
        //echo gotoAdultxyz()."\n";
        header('Location: '.gotoAdultxyz());
    }
}else{
    //echo gotoAdFly()."\n";
    header('Location: '.gotoAdFly());
}