<?php
session_start();

$serverName = "localhost";  //主机名或IP地址
$userName = "root";         //用户名 root
$passWord = "";             //密码  root
$dataBase = "art";          //数据库名称

//create connection
$conn = new mysqli($serverName, $userName, $passWord, $dataBase);

$sql = "SELECT * FROM user";
$stmt = $conn->prepare($sql);
$stmt->execute();
$guest = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

function executeQuery($sql, $data){
  global $conn;
  $stmt = $conn->prepare($sql);
  $values = array_values($data);
  $types = str_repeat("s", count($values));       //有几个value值就重复几次 s
  $stmt->bind_param($types, ...$values);
  $stmt->execute();
  return $stmt;
}

//select all function
function selectAll($table, $conditions = []){     // optional: $conditions = []
  global $conn;
  $sql = "SELECT * FROM $table";
  if(empty($conditions)){
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
  }else {
    $i = 0;
    foreach ($conditions as $key => $value) {
      if($i == 0){
        $sql = $sql . " WHERE $key = ?";
      } else {
        $sql = $sql . " AND $key = ?";
      }
      $i++;
    }
    $stmt = executeQuery($sql, $conditions);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
  }
}

//select one function
function selectOne($table, $conditions){      // optional: $conditions = []
  global $conn;
  $sql = "SELECT * FROM $table";
  $i = 0;
  foreach ($conditions as $key => $value) {
    if($i == 0){
      $sql = $sql . " WHERE $key=?";
    } else {
      $sql = $sql . " AND $key=?";
    }
    $i++;
  }
  $sql = $sql . " LIMIT 1";
  $stmt = executeQuery($sql, $conditions);
  $records = $stmt->get_result()->fetch_assoc();
  return $records;
}

//connect different table from database
function connTable(){
  global $conn;
  //select all colume from blog table, colume username from user table.
  //blog short for p, user short for u.
  //$sql = "SELECT b.*, u.username FROM blog AS b Join user AS u ON b.user_id=u.id WHERE p.user_id=1";
  $sql = "SELECT b.*, u.username FROM blog AS b JOIN user AS u ON b.user_id=u.id WHERE b.published=? ORDER BY posttime DESC";
  $stmt = executeQuery($sql, ["published"=> 1]);
  $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
}

//insert function
function insert($table, $data){
  global $conn;
  //$sql = "insert into table set name=?"
  $sql = "INSERT INTO $table SET ";
  $i = 0;
  foreach ($data as $key => $value) {
    if($i == 0){
      $sql = $sql . " $key=?";
    } else {
      $sql = $sql . ", $key=?";
    }
    $i++;
  }
  $stmt = executeQuery($sql, $data);
  $id = $stmt->insert_id;
  return $id ;
}

//update
function update($table, $id, $data){
  global $conn;
  //UPDATE user SET userID=?,
  $sql = "UPDATE $table SET ";
  //loop for table information
  $i = 0;
  foreach ($data as $key => $value) {
    if($i == 0){
      $sql = $sql . " $key=?";
    } else {
      $sql = $sql . ", $key=?";
    }
    $i++;
  }
  $sql = $sql . " WHERE id=?";
  //  $sql = $sql . " WHERE topicID=?";
  $data["id"] = $id;
  $stmt = executeQuery($sql, $data);
  return $stmt->affected_rows;
}

//deleted fuction
function delete($table, $id){
  //$sql = "delete from user where id=?";
  global $conn;
  $sql = "DELETE FROM $table WHERE id=?";

  //$sql = "DELETE FROM $table WHERE topicID=?";
  $stmt = executeQuery($sql, ["id"=>$id]);
  return $stmt->affected_rows;
}
 ?>
