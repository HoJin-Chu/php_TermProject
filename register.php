<?php
require_once $_SERVER['DOCUMENT_ROOT']."/TermProject3/models/memberDao.php";
require_once $_SERVER['DOCUMENT_ROOT']."/TermProject3/controllers/tools.php";

$userName = requestValue("userName");
$userId = requestValue("userId");
$userPw = requestValue("userPw");
$email = requestValue("email");

// 디비에서 조회할수있는 기능을 구현했을경우 받은 아이디값과 디비에 있는 아이디값을
// 비교해서 같으면 같은 아이디입니다 구현하기
if ($userName && $userId && $userPw && $email) {
    $memberDao = new memberDao();
    $memberDao->insertMember($userName, $userId, $userPw, $email);
    echo "<script>alert('회원가입이 완료되었습니다');location.href ='loginForm.php';</script>";
} else {
    echo "<script>alert('모든빈칸을 채워주세요');history.back();</script>";
}
