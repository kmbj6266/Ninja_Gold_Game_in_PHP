<?php
session_start();

//a filter, it grabs the users information  - so if the hidden's value is 'email', this is the code it will run.
if(!isset($_SESSION)){
  $_SESSION['gold_count']=0;
  $_SESSION['activities']=array();
}

if(isset($_POST['reset'])){
  $_SESSION['gold_count']=0;
  $_SESSION['activities']=array();
  header('Location: indexNinja.php');
  die();
}

if(isset($_POST['building'])){

switch ($_POST['building']) {
  case 'farm':
    $gamble=rand(10,20);
    break;
  case 'cave':
    $gamble=rand(5,10);
    break;
  case 'house':
    $gamble=rand(2,5);
    break;
  case 'casino':
    $gamble=rand(-50,50);
    break;
}
  if ($gamble>=0) {
      $outcome="earned";
  } 
  else {
      $outcome="lost";
  }
  
  $_SESSION['activities'][]=array($_POST['building'], $outcome, $gamble);
	$_SESSION['gold_count']+=$gamble;
	header('Location: indexNinja.php');
	die();

}



?>