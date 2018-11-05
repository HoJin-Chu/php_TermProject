<?php
require_once $_SERVER['DOCUMENT_ROOT']."/TermProject3/models/boardDao.php";
require_once $_SERVER['DOCUMENT_ROOT']."/TermProject3/controllers/tools.php";
$boardDao = new boardDao();
$num = requestValue("num");
$result = $boardDao->getSelectEditor($num);
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>게시판</title>
	<!--부트스트랩 링크-->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
    <script src="/TermProject3/ckeditor/ckeditor.js"></script>
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
		<div class="col-md-8">
			<form method="post" action="community_modify.php?num=<?= $num ?>" enctype='multipart/form-data'>
				<table border="2" class="table table-hover">
					<tr>
						<td>제목</td>
						<td>
                        <input type="text" class="form-control" name="title" value="<?=$result["title"]?>" readonly> </td>
					</tr>
					<tr>
						<td>타이틀 사진</td>
						<td>
							<input type="file" class="form-control" name="imgFile" value="<?= $result["imgTitle"] ?>" disabled> </td>
					</tr>
					<tr>
						<td colspan="2">
							<textarea name="content" class="ckeditor" rows="20" cols="60">
                            <?= $result["content"] ?></textarea>
						</td>
					</tr>
				</table>
				<input type="submit" class="btn btn-default btn-block" value="수정">
			</form>
			<button onclick="location.href='community.php'" class="btn btn-danger btn-block">수정취소</a>
		</div>
	</div>	

<script type="text/javascript">
CKEDITOR.config.height = 300;
CKEDITOR.replace('content', {
    toolbar: 'Full',
    uiColor: '#eaebe7',
    filebrowserBrowseUrl: '/TermProject3/ckeditor/kcfinder/browse.php?opener=ckeditor&type=files',
    filebrowserImageBrowseUrl: '/TermProject3/ckeditor/kcfinder/browse.php?opener=ckeditor&type=images',
    filebrowserFlashBrowseUrl: '/TermProject3/ckeditor/kcfinder/browse.php?opener=ckeditor&type=flash',
    filebrowserUploadUrl: '/TermProject3/ckeditor/kcfinder/upload.php?opener=ckeditor&type=files',
    filebrowserImageUploadUrl: '/TermProject3/ckeditor/kcfinder/upload.php?opener=ckeditor&type=images',
    filebrowserFlashUploadUrl: '/TermProject3/ckeditor/kcfinder/upload.php?opener=ckeditor&type=flash'
  });
</script>
</body>

</html>

