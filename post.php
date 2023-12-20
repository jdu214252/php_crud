<?php 
    include ("controls/post.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="assets/style.css" >

</head>
<body>
<?php require 'includes/header.php' ?>
<div class="col-lg-8 mx-auto p-3 py-md-5">
    <h1><?= $posts['title']?></h1>
    <p class="fs-5 col-md-8"><?= $posts['body']?></p>
    <p class=""><?= $posts['created']?></p>
</div>
    


<?php require 'includes/footer.php' ?>

</body>
</html>