<?php
require_once $_SERVER['DOCUMENT_ROOT']."/TermProject3/models/boardDao.php";
require_once $_SERVER['DOCUMENT_ROOT']."/TermProject3/controllers/tools.php";
$boardDao = new boardDao();
$num = requestValue('num');
$result = $boardDao->getSelectBoard($num);
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>게시판</title>
		<!--부트스트랩 링크-->
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
		<style>
			body {
				padding: 5%;
			}
			table tr>td:nth-child(1) {
				text-align: center;
			}
			textarea {
				height: 200px;
			}
		</style>
	</head>

	<body class="container">
		<h1 class="text-center">Modify</h1>
		<br>
		<div class="row justify-content-center">
			<div class="col-md-6">
				<form method="post" action="Knowledge_modify.php?num=<?=$num?>">
					<table border="2" class="table table-hover">
						<tr>
							<td>Title</td>
							<td>
								<input type="text" class="form-control" name="title" value="<?=$result["title"]?>" readonly> </td>
						</tr>
						<tr>
							<td colspan="2">
								<textarea name="content" class="form-control" placeholder="comment"><?=$result["content"]?></textarea>
							</td>
						</tr>
					</table>
					<button type="submit" class="btn btn-default btn-block">수정</button>
				</form>
				<button onclick="location.href='board.php'" class="btn btn-danger btn-block">수정취소</a>
			</div>
		</div>
	</body>

</html>