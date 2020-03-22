<?php   //连接数据库的PHP文件

$serverName = "localhost";  //主机名或IP地址
$userName = "root";         //用户名 root
$passWord = "";             //密码  root
$dataBase = "performance_schema";  //数据库名称

//create connection
$conn = new mysqli($serverName, $userName, $passWord, $dataBase);
//create database
$create_database = "CREATE DATABASE art";
//use mydatabase
$use_db = "use art;";
//check connection
if ($conn -> connect_error <> 0){
  die("Connection Failed.");
} else {
  echo "Connection success.";
}
if($conn->query($create_database)==TRUE){
  echo "CREATE DATABASE has been ran.<br>";
}
if($conn->query($use_db)==TRUE){
 echo "USE art.<br>";
}

//create table
//user table
 $create_table_user = "CREATE TABLE user(
   id    int(11) NOT NULL AUTO_INCREMENT,
   admin      tinyint NOT NULL,
   username   varchar(255) NOT NULL,
   email      varchar(255) NOT NULL unique,
   password   varchar(255)NOT NULL,
   created_time timestamp,
   PRIMARY KEY (id)
 );";

//blog table
 $create_table_blog = "CREATE TABLE blog(
   id         int NOT NULL AUTO_INCREMENT,
   user_id    int NOT NULL,
   title      varchar(255),
   image      varchar(255),
   content    varchar(65535),
   posttime   timestamp NOT NULL,
   published  tinyint,
   PRIMARY KEY (id),
   FOREIGN KEY (user_id) REFERENCES user(id)
 );";


//message table
  $create_table_msg = "CREATE TABLE msg(
    id        int NOT NULL AUTO_INCREMENT,
    user_id   int NOT NULL,
    message   varchar(65535) NOT NULL,
    username  varchar(255) NOT NULL,
    intime    timestamp NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES user(id)
  );";


 if($conn->query($create_table_user)==TRUE){
   echo 'CREATE TABLE has been ran.<br>';
 }
 if($conn->query($create_table_blog)==TRUE){
   echo 'CREATE TABLE has been ran.<br>';
 }
 if($conn->query($create_table_msg)==TRUE){
   echo 'CREATE TABLE has been ran.<br>';
 }

//设定数据传输的编码
$conn->query("SET NAME UTF8");

 ?>
