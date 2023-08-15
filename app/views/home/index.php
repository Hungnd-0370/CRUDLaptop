<?php 
	session_start(); 
    include_once __DIR_ROOT.'/app/views/components/Header.php'
?>
    <h1 id="index-text">Welcome, <?php
	if(isset($_SESSION['userId'])){
        echo explode(" ", $_SESSION['userName'])[0];
    }else{
        echo 'Guest';
    } 
    ?> </h1>
    

<?php 
    include_once __DIR_ROOT.'/app/views/components/Footer.php'
?>