<?php
include("db.php");
include("validateerrors.php");

$table = "blog";
$blogs = selectAll($table);
$errors = array();
//$blog_id = "";
$id = "";
$title = "";
$image = "";
$content = "";
$published = "";

//insert blog
if (isset($_POST["add-blog"])) {
  //dd($_FILES["image"]["name"]);
  $errors = validatePost($_POST);
  if (!empty($_FILES["image"]["name"])) {
     $image_name = $_FILES["image"]["name"];
     $destination = "../image" . $image_name;
     $result = move_uploaded_file($_FILES["image"]["tmp_name"], $destination);
     if ($result) {
       $_POST["image"] = $image_name;
     } else {
       array_push($errors,"Failed to upload image.");
     }
   } else {
     array_push($errors, "Image required.");
   }

  if(count($errors) == 0){
    unset($_POST["add-blog"]);
    $_POST["user_id"] = $_SESSION["id"];
    $_POST["content"] = htmlentities($_POST["content"]); //for security
    //if select published it is 1(boolen= true), if not select it is 0(false)
    $_POST["published"] = isset($_POST["published"]) ? 1 : 0;
    //dd($_POST);
    $blog_id = insert($table, $_POST);
    $_SESSION["message"] = "Blog posted successfully.";
    $_SESSION["type"] = "success";
    header("location:blog-manage.php");
    exit();
  } else {
    $title = $_POST["title"];
    $content = $_POST["content"];
    $image = $_POST["image"];
    $_POST["published"] = isset($_POST["published"]) ? 1 : 0;
  }
}

//edit blog
if (isset($_GET["id"])) {
  $id= $_GET["id"];
  $blog = selectOne($table, ["id"=>$id]);
  //dd($blog);
  $id = $blog["id"];
  $title = $blog["title"];
  $image = $blog["image"];
  $content = $blog["content"];
  $published = $blog["published"];
}

//update topic
if (isset($_POST["update-blog"])) {
  if (!empty($_FILES["image"]["name"])) {
     $image_name = $_FILES["image"]["name"];
     $destination = "../image" . $image_name;
     $result = move_uploaded_file($_FILES["image"]["tmp_name"], $destination);
     if ($result != 0) {
       $_POST["image"] = $image_name;
     } else {
       array_push($errors,"Failed to upload image.");
     }
   }
  $id = $_POST["id"];
  unset($_POST["update-blog"], $_POST["id"]);
  $_POST["user_id"] = $_SESSION["id"];
  $_POST["content"] = htmlentities($_POST["content"]); //for security
  $_POST["published"] = isset($_POST["published"]) ? 1 : 0;
  update($table, $id, $_POST);
  $_SESSION["message"] = "Blog updated successfully.";
  $_SESSION["type"] = "success";
  header("location:blog-manage.php");
  exit();
}



if (isset($_GET["delete_id"])) {
  $blog_id = $_GET["delete_id"];
  //$count =
  delete($table, $blog_id);
  $_SESSION["message"] = "Blog deleted successfully.";
  $_SESSION["type"] = "success";
  header("location:blog-manage.php");
  exit();
}

 ?>
