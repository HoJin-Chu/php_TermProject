<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Untitled Document</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>
	<body>
        <?php require_once "header.php"  ?>
		<br><br><br>
		<form method="post" action="register.php"> 이름
			<input type="text" name="userName" autofocus required/> 아이디
			<input type="text" name="userId" required/> 비밀번호
			<input type="password" name="userPw" required/> 이메일
			<input type="email" name="email" required/> 
			<input type="submit" value="로그인"/>
		</form>
        <?php require_once "footer.php"  ?>
	</body>
</html>

