<?php 

    include('functions.php');

    if(isset($_GET['action'])){
        if($_GET['action'] === 'logout'){
            logout();
        }
    }

    include('assets/header.php');
    if(!keys_set()){
        include('assets/init.php');
    } else {
        include('assets/home.php');
    }
    include('assets/footer.php')
?>

    
