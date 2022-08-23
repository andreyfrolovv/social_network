<?php

session_start();

echo <<<_INIT
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" 
    <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="javascript.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.js"></script>
    <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
_INIT;

require_once 'functions.php';

$userStr = 'welcome Guest';

if (isset($_SESSION['user']))
{
    $user = $_SESSION['user'];
    $loggEdin = TRUE;
    $userStr = 'Logged in as: $user';
}

else $loggEdin = FALSE;

echo <<<_MAIN
    <title >Robins Nest: $userStr</title>
  </head>
  <body>
    <div data-role="page">
     <div data-role="header">
       <div id="logo"
        class="center">R<img src="robin.gif">bin's Nest</div>
        <div class="username">$userStr</div>
     <div>
     </div data-role='content'>

_MAIN;

  if ($loggEdin)
  {
echo <<<_LOGGEDIN
    <div class="center">
      <a data-role="button" data-inline="true" data-icon="home"
        data-transit="slide" href="members.php?view=$user">home</a>
      <a data-role="button" data-inline="true"
        data-transit="slide" href="members.php">Members</a>
      <a data-role="button" data-inline="true"
        data-transit="slide" href="friends.php">Friends</a>
      <a data-role="button" data-inline="true"
         data-transit="slide" href="message.php">Message</a>
      <a data-role="button" data-inline="true"
        data-transit="slide" href="profile.php">Edit Profil</a>
      <a data-role="button" data-inline="true"
        data-transit="slide" href="logout.php">Log Out</a>
    </div>
_LOGGEDIN;
  }
  else
  {
echo <<<_GUEST
    <div class="center">
      <button data-role="button" data-inline="true" data-icon="home"
        data-transit="slide" href="index.php">Home</button>
      <button data-role="button" data-inline="true" data-icon="plus"
        data-transit="slide" href="singup.php">Sing Up</button>
      <button data-role="button" data-inline="true" data-icon="check"
         data-transit="slide" href="login.php">Log Out</button>
    </div>
    <p class="info">(You must be logged in to use this app)</p>
_GUEST;
  }
