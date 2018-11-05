<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>모두의펫</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="icon" type="image/png" sizes="96x96" href="img/favicon/favicon-96x96.png">
    <style>
        body {
			margin: 0;
			zoom: 90%;
		}
        header {
			margin: 0 auto;
			background-image: url(img/main2.jpg);
			width: 100%;
			height: 310px;
		}
		header p {
			text-align: center;
		}
    </style>
</head>
<body>
	<?php require_once("header.php") ?>
    <header>
	    <p><img src="/TermProject3/img/head.png" style="margin-top:70px;"></p>
	</header>
	<?php require_once("nav.php") ?>
    <!-- 부트스트랩 캐러셀 가져오기 -->
	<div class="container" style="margin-top:7px;">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
		    <!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>
			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<div class="item active"> <img src="/TermProject3/img/main2.jpg" alt="Los Angeles" style="width:100%;"> </div>
				<div class="item"> <img src="img/main2.jpg" alt="Chicago" style="width:100%;"> </div>
				<div class="item"> <img src="img/main2.jpg" alt="New york" style="width:100%;"> </div>
			</div>
			<!-- Left and right controls -->
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right">
				</span> <span class="sr-only">Next</span>
			</a>
		</div>
	</div>
	<br><br><br>
	<?php require_once("footer.php") ?>
</body>
</html>