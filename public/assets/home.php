<?php 
    if(isset($_POST['msj']) && isset($_POST['tags'])){
        $msj = $_POST['msj'];
        $tags = $_POST['tags'];
        $tagsArray = explode(',', $tags);
        $bodyParams = json_encode(array("msg" => $msj, "tags" => $tagsArray));
        saveMessage("/message", $bodyParams, "{}");
    }
?>

<nav>
    <a href="/">Home</a>
    <a href="/?page=search">Search Message</a>
    <a href="/?action=logout">Logout</a>
</nav>

<div>
    <form action="" method="post">
        <input type="text" name="msj" placeholder="mensaje">
        <input type="text" name="tags" placeholder="tag1,tag2,...">
        <input type="submit" value="send">
    </form>
</div>
<div>
    <h2>Created Messages</h2>
    <?php 
        
        $tokens = $_SESSION['tokens'];
        foreach($tokens as $id => $token){
            $curToken = $tokens[$id];
            ?>
            <a href="<?php echo "?id=$curToken"; ?>"><?php echo $curToken; ?></a>
            <?php 
            
        }
        
    ?>
</div>

<div>
    <?php if(isset($_GET['id'])){ ?>
        <h2>Message Requested</h2>
        <?php 
            $id = $_GET['id'];
            $message = getMessage("message/:id", "{}", json_encode(array("id" => $id)), $id); 
            print_r($message);
            ?>
    <?php } ?>
</div>