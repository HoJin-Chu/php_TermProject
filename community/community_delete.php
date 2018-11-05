<?php
require_once $_SERVER['DOCUMENT_ROOT']."/TermProject3/models/boardDao.php";
require_once $_SERVER['DOCUMENT_ROOT']."/TermProject3/controllers/tools.php";

$num = requestValue("num");

// num값이 있으면 DB를 연결시켜 deleteMsg로 해당 게시글을 삭제한다.
if ($num) {
    $boardDao = new boardDao();
    $boardDao->deleteEditor($num);
    echo "<script>alert('게시글이 삭제되었습니다');location.href='community.php';</script>";
}
