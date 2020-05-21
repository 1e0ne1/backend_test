<?php 

    include('functions.php');

    if(isset($_GET['action'])){
        if($_GET['action'] === 'logout'){
            logout();
            header('location: /');
        }
    }

    $page = "";

    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }

    include('assets/header.php');
    if(!keys_set()){
        include('assets/init.php');
    } else {
        if($page === "search"){
            include('assets/search.php');
        } else {
            include('assets/home.php');
        }
    }
    include('assets/footer.php')
?>

    
