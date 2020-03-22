<?php
include("db.php");
include("validateerrors.php");

$table = "user";
$admin_users = selectAll($table);

$errors = array();

$id = "";
$admin = "";
$username = "";
$email = "";
$password = "";
$passwordconfirm = "";


function loginUser($user){
  $_SESSION["id"] = $user["id"];
  $_SESSION["username"] = $user["username"];
  $_SESSION["admin"] = $user["admin"];
  $_SESSION["message"] = "You are now logged in.";
  $_SESSION["type"] = "success";

  if ($_SESSION["admin"]) {
    header("location:php/dashboard.php");
  } else {
    header("location:blog.php");
  }
  exit();

};

//register user or adminuser
if (isset($_POST["reg_user"]) || isset($_POST["create-admin"])){
  //var_dump($_POST);
  $errors = validateUser($_POST);

  if(count($errors) == 0){
    unset($_POST["reg_user"], $_POST["passwordconfirm"], $_POST["create-admin"]);
    $_POST["password"] = password_hash($_POST["password"],PASSWORD_DEFAULT);
    //$_POST["password"] = md5($_POST["password]);
    //create user
    if (isset($_POST["admin"])) {
      $_POST["admin"] = 1;
      $user_id = insert($table, $_POST);
      $_SESSION["message"] = "Admin user created successfully.";
      $_SESSION["type"] = "success";
      header("location:user-manage.php");
      exit();
    } else {
      $_POST["admin"] = 0;
      $user_id = insert($table, $_POST);
      $user = selectOne($table, ["id" => $user_id]);
      //dd($user);
      loginUser($user);
    }
  } else {
    $admin = isset($_POST["admin"]) ? 1 : 0;
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordconfirm = $_POST["passwordconfirm"];
  }
}

//login
if (isset($_POST["login_user"])) {
  $errors = validateLogin($_POST);

  if(count($errors) == 0){
    $user = selectOne($table, ["username" => $_POST["username"]]);

    if($user && password_verify($_POST["password"], $user["password"])){
      loginUser($user);
    } else {
      array_push($errors, "Wrong name or password.");
    }
  }
  $username = $_POST["username"];
  $password = $_POST["password"];

}

//edit adminuser
if (isset($_GET["id"])) {
  $user = selectOne($table, ["id" => $_GET["id"]]);
  //dd($user);
  $id = $user["id"];
  $admin = $user["admin"] ==1 ? 1 : 0;
  $username = $user["username"];
  $email = $user["email"];
}

//update user
if (isset($_POST["update-user"])) {
  //dd($_POST);
  $errors = validateUser($_POST);

  if(count($errors) == 0){
    $id = $_POST["id"];
    unset($_POST["update-user"], $_POST["passwordconfirm"], $_POST["id"]);
    $_POST["password"] = password_hash($_POST["password"],PASSWORD_DEFAULT);
    //$_POST["password"] = md5($_POST["password]);
    //dd($_POST);
    //check
    $_POST["admin"] = isset($_POST["admin"]) ? 1 : 0;
    update($table, $id, $_POST);
    $_SESSION["message"] = "Admin user created successfully.";
    $_SESSION["type"] = "success";
    header("location:user-manage.php");
    exit();

  }
}

//delete user
if(isset($_GET["delete_id"])){
  $count = delete($table, $_GET["delete_id"]);
  $_SESSION["message"] = "Admin user deleted successfully.";
  $_SESSION["type"] = "success";
  header("location:user-manage.php");
  exit();
}


 ?>
