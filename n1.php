<?php
include_once('function.php');
if(seed($db_name)){
    echo "HI";
}else{
    echo "somethin wrong";
}