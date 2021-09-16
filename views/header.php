<?php Session::init();?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>😎📋</title>
    <link rel="stylesheet" href="<?=URL?>public/css/default.css">
    <script type='text/javascript' src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
    <?php
        if(isset($this->js)){
            foreach($this->js as $js){
                echo "<script type='text/javascript' src='".URL."views/$js'></script>";
            }
        }
    ?>
</head>
<body>
    <div id="header">
        Beatiful header<br>
        <a href="<?=URL?>index">Home</a>
        <a href="<?=URL?>help">Help</a>
        <?php if(Session::get("logged_in")):?>
            <a href="<?=URL?>dashboard/logout">Logout</a>
        <?php else:?>
            <a href="<?=URL?>login">Login</a>
        <?php endif;?>
    </div>
    <div id="content">