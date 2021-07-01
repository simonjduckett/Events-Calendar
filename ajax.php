<?php

if($_REQUEST['saveJSON'] == 1) {
    $calData = $_REQUEST['calData'];

    if(file_put_contents('calData.json', $calData)){
        echo 'written';
    }
    else {
        echo 'something gone wrong mate';
    }
    
}