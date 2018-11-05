
<style>
    nav {
	    background-color: #1245AB;
	    border: 1px solid;
	}
	nav a {
		float: left;
		color: white;
		padding: 10px 10px;
		font-family: '나눔고딕';
	}
	nav a:hover {
		text-decoration: none;
	}
	nav .nav-right {
		float: right;
	}
</style>

<?php
	require_once $_SERVER['DOCUMENT_ROOT']."/TermProject3/models/boardDao.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/TermProject3/controllers/tools.php";

	session_start();
	$userId = sessionValue("userId");
	$userName = sessionValue("userName");
?>

<nav>
	<div class="container"><b>
		<div class="nav-left">
		  	<a href="/TermProject3/index.php"><img src="/TermProject3/img/title.png" width="100px" height="25px;"></a> <a href="#news">새소식</a>
		</div>
	    <div class="nav-right">
		<?php
        if ($userId && $userName) {
        ?>
			<a style="color:yellow;"><?=$userId?>&nbsp;( <?=$userName?> ) 님 환영합니다<a>
			<a href="myPage.php">마이페이지</a>
			<a href="/TermProject3/logout.php">로그아웃</a>
		<?php } else { ?>
			<a href="/TermProject3/loginForm.php">로그인</a>
			<a href="/TermProject3/FindId.php">아이디찾기</a>
			<a href="/TermProject3/FindPw.php">비밀번호찾기</a>
		<?php } ?>
			<a href="#about">이벤트</a>
		</div> </b> 
    </div>
</nav>