<?php
//register error
function validateUser($user){
  $errors = array();

  if(empty($user["username"])){
    array_push($errors, "Name required");
  }
  if(empty($user["email"])){
    array_push($errors, "Email required");
  }
  if(empty($user["password"])){
    array_push($errors, "Password required.");
  }
  if ($user["password"] <> $user["passwordconfirm"] ) {
    array_push($errors, "Password do not match.");
  }
  //check email exist
  /*  $existingUser = selectOne("user", ["email"=> $user["email"]]);
  if(isset($existingUser)){
    array_push($errors, "Email is already exists.");
  }
  */
  return $errors;
}

//login error
function validateLogin($user){
  $errors = array();

  if(empty($user["username"])){
    array_push($errors, "Name required");
  }
  if(empty($user["password"])){
    array_push($errors, "Password required.");
  }
  return $errors;
}

//post blog error
function validatePost($POST){
  $errors = array();

  if(empty($POST["title"])){
    array_push($errors, "Title required");
  }
  if(empty($POST["content"])){
    array_push($errors, "Content required");
  }
  return $errors;
}

//post message error
function validateMsg($msg){
  $errors = array();

  if(empty($msg["message"])){
    array_push($errors, "Message required");
  }
  if(empty($POST["username"])){
    array_push($errors, "Username required");
  }
  return $errors;
}

 ?>
