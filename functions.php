<?php

function dataBaseConnection(){
    $db = mysqli_connect('localhost', 'root', '', 'experimentdatabase');
    if(!$db) {die("Connection failed: " . mysqli_connect_error());}
    return $db;
}

function missingParam($param, $type){
    global $errorListVar;
    if(empty($param)){array_push($errorListVar, "$type is required");}
}

function checkForExistence($db, $query){
    $result = mysqli_query($db, $query);
    if(mysqli_num_rows($result) > 0){
        return true;
    }
    return false;
}

function getTextS($id){
    global $DataBase;
    $res = mysqli_query($DataBase, "SELECT text FROM texts WHERE id_text='$id'");
    return  mysqli_fetch_assoc($res)['text'];
}

function isLoggedIn(){
    if(!isset($_SESSION['variant'])) {
        header('location: login.php');
    }
}


