<?php
require_once $_SERVER['DOCUMENT_ROOT']."/TermProject3/models/boardDao.php";
require_once $_SERVER['DOCUMENT_ROOT']."/TermProject3/controllers/tools.php";

$num = requestValue("num");
$title = requestValue("title");
$content = requestValue("content");

session_start();
$writer = sessionValue("userId");
echo "<script>alert($writer);</script>";

$regtime = date("Y . m . d");
if ($title && $content && $writer) {
    $boardDao = new boardDao();
    $boardDao->updateEditor($num, $title, $writer, $content);
    echo "<script>alert('게시글이 수정되었습니다');location.href='community.php';</script>";
} else {
    echo "<script>alert('빈칸을 모두 채워주세요');history.back();</script>";
}
