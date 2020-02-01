<?php
include_once 'functions.php';

session_start();

$DataBase = dataBaseConnection();

$userEmail = "";
$userSex = "";
$userNativeSpeaker = "";
$errorListVar = array();

if (isset($_POST['BeginExperiment'])) {
    beginExperiment();
}

//if (isset($_POST['ResumeExperiment'])) {
    //resumeExperiment();
//}

function beginExperiment()
{
    global $DataBase, $userEmail, $userSex, $userNativeSpeaker, $errorListVar;

    //Get the values from the fields
    $userEmail = mysqli_real_escape_string($DataBase, $_POST['email']);
    $userSex = mysqli_real_escape_string($DataBase, $_POST['sex']);
    $userNativeSpeaker = mysqli_real_escape_string($DataBase, $_POST['nativeSpeaker']);

    //Check for missing values
    missingParam($userEmail, "Email ");
    missingParam($userSex, "Sex ");
    missingParam($userNativeSpeaker, "Native language ");

    //Check for existing user
    $sql_q_emailExistence = "SELECT email FROM subject WHERE email='$userEmail'";
    if(checkForExistence($DataBase, $sql_q_emailExistence)){
        array_push($errorListVar, "Email is already taken!");
    }

    //Begin experiment
    if (empty($errorListVar)) {
        $variant = mysqli_fetch_assoc(mysqli_query($DataBase, "SELECT next_variant FROM nextvarianttable"))['next_variant'];
        $_SESSION['variant'] = $variant;
        $DBRegQuery = "INSERT INTO subject (email, sex, native_speaker_of) VALUES('$userEmail', '$userSex', '$userNativeSpeaker')";
        $DBSecRegQuery = "INSERT INTO userchosenvariants (user_id, variant_id) VALUES('$userEmail', '$variant')";
        mysqli_query($DataBase, $DBRegQuery);
        mysqli_query($DataBase, $DBSecRegQuery);
        //Rolling over 1
        if($variant == 101){
            mysqli_query($DataBase, "UPDATE nextvarianttable SET next_variant = 1");
        }
        else {
            mysqli_query($DataBase, "UPDATE nextvarianttable SET next_variant = next_sequence + 1");
        }
        header('location: experiment.php');
    }
}

