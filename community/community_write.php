<?php
require_once $_SERVER['DOCUMENT_ROOT']."/TermProject3/controllers/tools.php";
session_start();

 if(isset($_POST['content'])){
     $content = $_POST['content'];
     $writer = sessionValue("userId");
     $title = $_POST['title'];
     $uploads_dir = '../img';
     $name = $_FILES['imgFile']['name'];
     move_uploaded_file( $_FILES['imgFile']['tmp_name'], "$uploads_dir/$name");

     // 드래그앤드롭이랑 경로를 모든경로가능하게 바꾸기
     $uploads_dir = '../img/';
     $saveImg = $uploads_dir.$_FILES['imgFile']['name'];

     // connect
     // editor board로 고치자
     require_once $_SERVER['DOCUMENT_ROOT']."/TermProject3/models/boardDao.php";
     $boardDao = new boardDao();

     //insert
     $boardDao->insertEditor($title,$writer,$saveImg,$content);
     echo "<script>location.href='community.php'</script>";
 }
?>  