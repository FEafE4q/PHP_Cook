<?php 
    include("config.php");
    if($_POST['rate']>=1 and $_POST['rate']<=5) $rate = $_POST['rate'];
    else $rate='';
    if (is_numeric($_POST["id"])) $id=$_POST["id"];
    else $id='';
    if ($rate!='' and $id>0) {
$ip=$_SERVER['REMOTE_ADDR'];
$Row = mysqli_fetch_assoc(mysqli_query($con, "SELECT `rateusersip` FROM `ratings` WHERE `id` = '$id'"));
    if (in_array($ip, explode(',', $Row['rateusersip']))){
    echo json_encode('You are already rated!');
    die();
    }else{
    mysqli_query($con, "UPDATE `ratings` SET `rate` = CONCAT(rate, ',$rate'), `rateusersip` = CONCAT(rateusersip, ',$ip') WHERE `id` = '$id'");
    }
    }
    $q = 'Your mark ' . $rate;
    echo json_encode($q);
?>