<?php
// To allow CORS request
header('Access-Control-Allow-Origin: *');

//To load autoload and other custom classes
require_once('inc/connectionClass.php');
require_once('./vendor/autoload.php');

// TO load env file
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// read labels
if(isset($_GET['readLabels'])){
    $con2Db = new conx2DB(getenv('DB_SERVER'),getenv('DB_USER'),getenv('DB_PASSWORD'),getenv('DB_NAME'));
    if($con2Db){
        echo json_encode($con2Db->getCrimeLabels());
    }

}

// read datasets
if(isset($_GET['readDataSets'])){
    $con2Db = new conx2DB(getenv('DB_SERVER'),getenv('DB_USER'),getenv('DB_PASSWORD'),getenv('DB_NAME'));
    if($con2Db){
        $con2Db->getCrimeCategories();
        echo json_encode($con2Db->getCrimeData());
    }

}
