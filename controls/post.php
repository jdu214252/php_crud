<?php
require("./database/database.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['create-user'])) {
    $title = isset($_POST['title']) ? $_POST['title'] : null;
    $body = isset($_POST['body']) ? $_POST['body'] : null;


    if ($title !== null) {
        $statement = $pdo->prepare("INSERT INTO posts(title, body) VALUES (:title, :body)");
        $statement->execute([
            'title' => $title,
            'body' => $body
        ]);

        $_SESSION['success'] = 'Post added successfully';
        header('Location: blog.php');
        exit();
    } else {
        $_SESSION['error'] = 'Title cannot be empty';
        header('Location: blog.php');
        exit();
    }
}
//Select All Posts
$statement = $pdo->prepare("SELECT * FROM posts");
$statement->execute();
$posts = $statement->fetchAll();

// Select One Post
function selectOne($table, $id){
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM $table WHERE id = :id");
    $statement->execute(['id' => $id]);
    $post = $statement->fetch();
    return $post; 
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $postId = $_GET['id'];
    $posts = selectOne('posts', $postId);
}

// function delete($table, $id){
//     global $pdo;
//     $statement = $pdo->prepare("DELETE FROM $table WHERE id = ?");
//     $success = $statement->execute([$id]);
//     return $success; 
// }


function delete($table, $id){
    global $pdo;
    
    $sql = "DELETE FROM $table WHERE id=$id";    

    $query = $pdo->prepare($sql);
    $query->execute();
    
}

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])){

    $id = $_GET['del_id'];
    
    delete('posts', $id);

    $_SESSION['success'] = 'Post DELETED successfully';
    header('location: blog.php');
    exit();
}



function update($table, $id, $title, $body){
    global $pdo;

    $statement = $pdo->prepare("UPDATE $table SET title = :title, body = :body WHERE id = :id");
    $statement->execute([
        'title' => $title,
        'body' => $body,
        'id' => $id
    ]);
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update-user'])){
    $id = $_POST['id'];
    $title = trim($_POST['title']);
    $body = trim($_POST['body']);

    // Assuming $admin, $login, and $pass are defined elsewhere in your code

    update('posts', $id, $title, $body);
    header('location: blog.php');
}



?>
