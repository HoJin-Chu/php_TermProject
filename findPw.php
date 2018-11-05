<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
    <title>모두의펫</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" type="text/css" href="css/FormStyle.css">
	<style>
		.main{
			height: 600px;
		}
	</style>
</head>

<body>
    <?php require_once "header.php" ?>
	<!------ Include the above in your HEAD tag ---------->
	<div class="container">
		<div class="col-md-6 col-md-offset-3 left-side main">
			<div class="Imgtitle">
				<h4 class="text-center"><img src="img/findPw.png" width="80%" height="20px"></h4> </div>
			<br>
			<!--Form with header-->
			<form action="findPwOk.php" method="post">
				<div class="form-group">
					<label for="userName">이름</label>
					<input type="text" id="userName" name="userName" class="form-control input-lg" required autofocus> </div>
				<div class="form-group">
					<label for="userId">아이디</label>
					<input type="text" id="userId" name="userId" class="form-control input-lg" required autofocus> </div>
				<div class="form-group">
					<label for="email">이메일</label>
					<input type="email" id="email" name="email" class="form-control input-lg" required> </div>
				<div class="text-center">
					<button class="btn btn-block" type="submit">찾기</button>
				</div>
			</form>
			<div class="box">
				<div class="col-sm-4"><img src="img/join.png" width="100%" height="60%">
					<hr>
					<button class="btn btn-md" onclick="location.href='registerForm.php'">회원가입</button>
				</div>
				<div class="col-sm-4" id="rowCenter"><img src="img/id.png" width="100%" height="60%">
					<hr>
					<button class="btn btn-md" onclick="location.href='findId.php'">아이디찾기</button>
				</div>
				<div class="col-sm-4"><img src="img/pw.png" width="100%" height="60%">
					<hr>
					<button class="btn btn-md" onclick="location.href='findPw.php'">비밀번호찾기</button>
				</div>
			</div>
		</div>
    </div>
</body>

</html>