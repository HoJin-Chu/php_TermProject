<?php 
 require_once $_SERVER['DOCUMENT_ROOT']."/TermProject3/models/boardDao.php";
 $boardDao = new boardDao();
 $msg = $boardDao->selectEditor();
 ?>

<!doctype html>
	<html>
	<head>
		<meta charset="UTF-8">
		<title>Untitled Document</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<style>
		body {
    zoom: 90%;
}

.nav2 {
    margin-top: 100px;
    border: 1px solid #C0C0C0;
    text-align: center;
    padding: 15px;
}

.nav2 a {
    margin-left: 30px;
    text-decoration: none;
}
.titleDogImg {
    zoom: 90%;
    background-image: url(/TermProject3/img/dog.png);
    width: 100%;
    height: 300px;
}
.img_spot{
	border: 5px solid #D5D5D5;
	width : 230px;
	margin : 2%;
    height: 200px;
    float : left;
    text-align : center;
    max-width: none !important;
    max-height: none !important;
}
.imgTitle{
	color:black;
	font-family : '맑은고딕';
	font-size:18px;
	line-height:40px;
}
		</style>
	</head>
	<body>
    <?php require_once $_SERVER['DOCUMENT_ROOT']."/TermProject3/header.php"; ?>
	</body>
    <div class="container-fruid titleDogImg"></div>
	<div class="container">
    <?php require_once $_SERVER['DOCUMENT_ROOT']."/TermProject3/nav.php"; ?><br>
	<!-- 이곳으로 토스트에디터로 작성한 첨부한 사진으로 이미지를 
	따서 여기다가 보여준다  -->
	<?php foreach ($msg as $row): ?>
        <a href="community_view.php?num=<?= $row['num'] ?>"><div class="img_spot"><img src="<?= $row['imgTitle'] ?>" width="99%" height="80%" alt="프로필을 지정해주세요"><div class="imgTitle"><?= $row["title"] ?></div></div>
		</a>
    <?php endforeach ?>
	</div>
	<br>
	<hr>
	<div class="container">
	<button type="button" class="btn btn-block btn-lg" onclick="location.href='community_writeForm.php'">작성하기</button>	
	</div>
	
	<br>
	<br>
    <?php require_once $_SERVER['DOCUMENT_ROOT']."/TermProject3/footer.php"; ?>
	</html>