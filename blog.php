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
    <style>
        :root {
  --jumbotron-padding-y: 3rem;
}

.jumbotron {
  padding-top: var(--jumbotron-padding-y);
  padding-bottom: var(--jumbotron-padding-y);
  margin-bottom: 0;
  background-color: #fff;
}
@media (min-width: 768px) {
  .jumbotron {
    padding-top: calc(var(--jumbotron-padding-y) * 2);
    padding-bottom: calc(var(--jumbotron-padding-y) * 2);
  }
}

.jumbotron p:last-child {
  margin-bottom: 0;
}

.jumbotron-heading {
  font-weight: 300;
}

.jumbotron .container {
  max-width: 40rem;
}

footer {
  padding-top: 3rem;
  padding-bottom: 3rem;
}

footer p {
  margin-bottom: .25rem;
}

.box-shadow { box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05); }

.btn-group button .edit{
  text-decoration: none;
}
.btn-group button .del{
  text-decoration: none;
  color: red;
}
    </style>
</head>
<body>


<?php require 'includes/header.php' ?>

    <main role="main"> 

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Album example</h1>
          <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
          <p>
            <a href="post-create.php" class="btn btn-primary my-2">Create Post</a>
            <a href="/" class="btn btn-secondary my-2">Home</a>
          </p>
        </div>
      </section>


      <div class="album py-5 bg-light">
        <div class="container">

      
        <?php if(isset($_SESSION['success'])): ?>
           <div class="alert alert-success" role="alert">
              <?= $_SESSION['success'] ?>
              <?php unset($_SESSION['success']) ?>
           </div>
       <?php endif; ?>
       

          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <?php foreach($posts as $post): ?>  
          <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="scale.jpg" alt="Card image cap">
                <div class="card-body">
                  <a href="post.php?id=<?= $post['id'] ?>">
                    <h5><?= $post['title'];?></h5>
                  </a>
                  <p class="card-text"><?= $post['body'];?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary"><a class="edit" href="/post-edit.php?id=<?=$post['id']?>">Edit</a></button>
                      <button type="button" class="btn btn-sm btn-outline-secondary"><a class="del" href="blog.php?del_id=<?=$post['id'];?>">Delete</a></button>
                    </div>
                  </div>
                  <small><?= $post['created'];?></small>
                </div>
              </div>
            </div>
          <?php endforeach; ?>      
          
          </div>
        </div>
      </div>

    </main>

    <?php require 'includes/footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>