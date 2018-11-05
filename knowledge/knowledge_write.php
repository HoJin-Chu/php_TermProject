<?php
require_once $_SERVER['DOCUMENT_ROOT']."/TermProject3/models/boardDao.php";
require_once $_SERVER['DOCUMENT_ROOT']."/TermProject3/controllers/tools.php";

$title = requestValue("title");
$content = requestValue("content");

session_start();
$writer = sessionValue("userId");

if ($title && $content && $writer) {
    $boardDao = new boardDao();
    $boardDao->insertBoard($title, $writer, $content);
    echo "<script>alert('게시글이 작성되었습니다');location.href='knowledge_board.php';</script>";
} else {
    echo "<script>alert('로그인후 작성이 가능합니다');history.back();</script>";
}
