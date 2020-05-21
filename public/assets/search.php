<?php 
    $messages = "";
    if(isset($_POST['tag'])){
        $tag = $_POST['tag'];
        $messages = json_decode(getMessagesByTag("/messages/:tag", '{}', json_encode(array("tag" => $tag)), $tag), true);
    }
?>

<div>
    <h2>Search Messages By Tag</h2>
    <form action="" method="post">
        <input type="text" name="tag" placeholder="Tag">
        <input type="submit" value="search">
    </form>
</div>
<div>
    <?php if($messages != ""){ ?>
    <h3>Messages that match with your criteria</h3>
    <?php 
        foreach($messages as $message){
            ?>
            <br>
            <p><b>ID: </b><?php echo $message['id'] ?></p>
            <p><b>Message: </b><?php echo $message['msg'] ?></p>
            <p><b>Tags: </b><?php print_r($message['tags']); ?></p>
            <br>
            <br>
            <?php 
        }
    } 
    ?>
</div>