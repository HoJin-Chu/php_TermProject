<?php
require_once $_SERVER['DOCUMENT_ROOT']."/TermProject3/controllers/tools.php";
require_once $_SERVER['DOCUMENT_ROOT']."/TermProject3/models/memberDao.php";
require_once $_SERVER['DOCUMENT_ROOT']."/TermProject3/phpMailer/mailer.lib.php";

// mailer("보내는 사람 이름", "보내는 사람 메일주소", "받는 사람 메일주소", "제목", "내용", "1");
$userId = requestValue("userId");
$email = requestValue("email");
$userName = requestValue("userName");

/*
입력받은 이름과 이메일이있으면
db를 연결해 이름으로 조회를 한다
조회를 한값이 있고 조회한 이메일과 입력받은 이메일이 같으면
userId라는 변수에 조회한 아이디를 저장한다
 */

if ($userId && $email) {
    $memberDao = new memberDao();
    $result = $memberDao->FindPwMember($userId);
    if ($result && $email == $result["email"]) {
        $userPw = $result["userPw"];
        $impormation = "찾으시는 비밀번호는 <b style='font-size : 20px'>$userPw</b> 입니다";
        mailer("모두의 펫", "cnghwls12@naver.com", $email, "[ 모두의 펫 ] $userName 님의 비밀번호", $impormation, 1);
        echo "<script>alert('비밀번호를 메일로 발송했습니다');location.href ='index.php';</script>";
    }
} else {
    echo "<script>alert('다시 확인해주세요');history.back();</scripat>";
}
