<?php 
    session_start();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <?php foreach($_SESSION['json'] as $index => $item) { ?>
            <li><b><?= $index ?></b>:<?= $item ?></li>
        <?php } ?>    
    </ul>
</body>
</html>


