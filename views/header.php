<?php Session::init();?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>MVC Training</title>
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
        <?php if( !Session::get("logged_in") ):?>
            <a class="dlink" href="<?=URL?>index">Home</a>
            <a class="dlink" href="<?=URL?>help">Help</a>
            <a class="dlink" href="<?=URL?>login">Login</a>
        <?php else:?>
            <a class="dlink" href="<?=URL?>dashboard">Dashboard</a>
            <?php if( Session::get("role") == 'owner'): ?>
                <a class="dlink" href="<?=URL?>user">User</a>
            <?php endif;?>
            <a class="dlink" href="<?=URL?>dashboard/logout">Logout</a>
        <?php endif;?>
    </div>
    <div id="content">