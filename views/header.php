<?php Session::init();?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>MVC Training</title>
    <!-- <link rel="stylesheet" href="<?=URL?>public/css/default.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://raw.githubusercontent.com/StartBootstrap/startbootstrap-sb-admin-2/master/css/sb-admin-2.min.css" type="text/css"> -->
    <script type='text/javascript' src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->
    <?php
        if(isset($this->js)){
            foreach($this->js as $js){
                echo "<script type='text/javascript' src='".URL."views/$js'></script>";
            }
        }
    ?>
</head>
<body>
    <div class="container">
    <div class="bg-info rounded-top">
    <a class="btn m-1 <?php echo $this->controller_name=="index"?"btn-primary":"btn-secondary"?>" href="<?=URL?>index">Home</a>
        <?php if( !Session::get("logged_in") ):?>
            <a class="btn m-1 <?php echo $this->controller_name=="help"?"btn-primary":"btn-secondary"?>" href="<?=URL?>help">Help</a>
            <a class="float-right m-1 btn <?php echo $this->controller_name=="login"?"btn-primary":"bg-white"?>" href="<?=URL?>login">Login</a>
        <?php else:?>
            <a class="btn m-1 <?php echo $this->controller_name=="dashboard"?"btn-primary":"btn-secondary"?>" href="<?=URL?>dashboard">Dashboard</a>
            <?php if( Session::get("role") == 'owner'): ?>
                <a class="btn m-1 <?php echo $this->controller_name=="user"?"btn-primary":"btn-secondary"?>" href="<?=URL?>user">User</a>
            <?php endif;?>
            <a class="btn m-1 float-right btn-danger" href="<?=URL?>dashboard/logout">Logout</a>
        <?php endif;?>
        </div>
    <div id="content" class="bg-dark text-light p-3">