<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php if(keys_set()){ ?>
    <nav>
        <a href="/">Home</a>
        <a href="/?page=search">Search Message</a>
        <a href="/?action=logout">Logout</a>
    </nav>
<?php } ?>