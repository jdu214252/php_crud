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



<div class="container">

    <form action="" method="POST">
    <h2 class="mt-5 text-center">Edit</h1>
     <input name="id" value="<?=$posts['id'];?>" type="hidden">
        <div class="mb-3 mt-5">
          <label  class="form-label">Title</label>
          <input name="title" type="text" value="<?= $posts['title']?>" class="form-control">
        </div>
        <div class="mb-3">
          <label  class="form-label">Text</label>
          <textarea name="body" class="form-control" rows="3"><?= $posts['body']?></textarea>
        </div>
        <button  name="update-user" class="btn btn-primary mb-5" type="submit">Save</button>
    </form>
</div>


<?php require 'includes/footer.php' ?>

</body>
</html>