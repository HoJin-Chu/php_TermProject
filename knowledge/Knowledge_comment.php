<?php
require_once $_SERVER['DOCUMENT_ROOT']."/TermProject3/models/boardDao.php";
require_once $_SERVER['DOCUMENT_ROOT']."/TermProject3/controllers/tools.php";

// 게시글번호와 댓글내용 그리고 작성자를 받아온다
$board_num = requestValue("num");
$re_memo = requestValue("re_memo");
session_start();
$writer = sessionValue("userName");

if ($board_num && $re_memo && $writer) {
    $boardDao = new boardDao();
    $boardDao->insertComment($board_num, $writer, $re_memo);
    echo "<script>alert('댓글이 작성되었습니다');location.href='knowledge_view.php?num=$board_num';</script>";
}
