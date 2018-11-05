<?php
require_once $_SERVER['DOCUMENT_ROOT']."/TermProject3/models/memberDao.php";
require_once $_SERVER['DOCUMENT_ROOT']."/TermProject3/controllers/tools.php";

$userId = requestValue("userId");
$userPw = requestValue("userPw");

if ($userId && $userPw) {
    $memberDao = new memberDao();
    $member = $memberDao->getMember($userId);
    if ($member && $member["userPw"] == $userPw) {
        session_start();
        $_SESSION["userId"] = $userId;
        $_SESSION["userName"] = $member["userName"];
        echo "<script>location.href='index.php';</script>";
    } else {
        echo "<script>alert('아이디와 비밀번호를 다시 확인해주세요');history.back();</script>";
    }
} else {
    echo "<script>alert('입력하지 않은 정보가 있습니다');history.back();</script>";
}
