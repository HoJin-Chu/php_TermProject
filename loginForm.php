<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<title>모두의 펫</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/FormStyle.css">
</head>

<body>
    <?php require_once "header.php"  ?>
	<div>
		<div class="container">
			<div class="col-md-6 col-md-offset-3 left-side main">
				<h4 class="text-center"><img src="/TermProject3/img/login.jpg" width="50%" height="50px"></h4>
				<!--Form with header-->
				<form action="login.php" method="post">
					<div class="form-group">
						<label for="userId">아이디</label>
						<input type="text" id="userId" name="userId" class="form-control input-lg" required autofocus> </div>
					<div class="form-group">
						<label for="userPw">비밀번호</label>
						<input type="password" id="userPw" name="userPw" class="form-control input-lg" required> </div>
					<div class="text-center">
						<button class="btn btn-block" type="submit">Login</button>
					</div>
				</form>
				<div class="box">
					<div class="col-sm-4"><img src="/TermProject3/img/join.png" width="100%" height="60%">
						<hr>
						<button class="btn btn-md" onclick="location.href='registerForm.php'">회원가입</button>
					</div>
					<div class="col-sm-4" id="rowCenter"><img src="/TermProject3/img/id.png" width="100%" height="60%">
						<hr>
						<button class="btn btn-md" onclick="location.href='FindIDForm.php'">아이디찾기</button>
					</div>
					<div class="col-sm-4"><img src="/TermProject3/img/pw.png" width="100%" height="60%">
						<hr>
						<button class="btn btn-md" onclick="location.href='FindPWForm.php'">비밀번호찾기</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	
    <?php require_once "footer.php"  ?>
</body>

</html>