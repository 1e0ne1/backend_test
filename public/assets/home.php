<?php 
    if(isset($_POST['msj']) && isset($_POST['tags'])){
        $msj = $_POST['msj'];
        $tags = $_POST['tags'];
        $tagsArray = explode(',', $tags);
        $bodyParams = json_encode(array("msg" => $msj, "tags" => $tagsArray));
        saveMessage("/message", $bodyParams, "{}");
    }
?>

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
            <p><a href="<?php echo "?id=$curToken"; ?>"><?php echo $curToken; ?></a></p>
            <?php         
        }
        
    ?>
</div>

<div>
    <?php if(isset($_GET['id'])){ ?>
        <h2>Message Requested</h2>
        <?php 
            $id = $_GET['id'];
            $message = json_decode(getMessage("message/:id", "{}", json_encode(array("id" => $id)), $id), true); 
            ?>
            <p><b>ID: </b><?php echo $message[0]['id'] ?></p>
            <p><b>Message: </b><?php echo $message[0]['msg'] ?></p>
            <p><b>Tags: </b><?php print_r($message[0]['tags']); ?></p>
    <?php } ?>
</div>