<?php 

if(isset($_POST['key']) && isset($_POST['secret'])){
    $key = $_POST['key'];
    $shared = $_POST['secret'];
    if(setCredentials($key, $shared)){
        $_SESSION['key'] = $key;
        $_SESSION['shared'] = $shared;
        header('location: index.php');
    }

}

    

?>



    <div>
        <h2>Please enter your credentials:</h2>
        <form action="" method="post">
            <input type="text" name="key" placeholder="key">
            <input type="text" name="secret" placeholder="secret shared">
            <input type="submit" name="submit" value="submit">
        </form>
    </div>
