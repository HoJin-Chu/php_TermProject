<?php
require_once $_SERVER['DOCUMENT_ROOT']."/TermProject3/models/boardDao.php";
require_once $_SERVER['DOCUMENT_ROOT']."/TermProject3/controllers/tools.php";

$num = requestValue("num");
$page = requestValue("page");
$boardDao = new boardDao();
$result = $boardDao->getSelectBoard($num);
?>
	<!doctype html>
	<html>

	<head>
		<meta charset="UTF-8">
		<title>Untitled Document</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="/TermProject3/css/knowledgeboard.css">
        <link rel="stylesheet" href="/TermProject3/css/knowledgeBoard.csss">
		<style>
			body {
				zoom: 90%;
			}
			.comment{
				width: 100%;
				height: 100px;
			}
		</style>
		<script>
			function deleteOk(num){
				var result = confirm('정말로 게시물을 삭제하시겠습니까?');
				if(result){
					location.href="knowledge_delete.php?num="+num;
				}
			}
		</script>
	</head>

	<body>
    <?php require_once $_SERVER['DOCUMENT_ROOT']."/TermProject3/header.php" ?>
		<div class="container">
			<div class="titleImg"><img src="/TermProject3/img/종합지식.png" alt=""></div>
            <?php require_once $_SERVER['DOCUMENT_ROOT']."/TermProject3/nav.php" ?>
			<br>
			<table class="table">
				<tr>
					<td>
						<h3><b><?=$result["title"]?></b></h3> &nbsp;
						<?=$result["regtime"]?>
					</td>
					<td>좋아요
						<h3><?=$result["likes"]?></h3></td>
					<td>조회수
						<h3><?=$result["hits"]?></h3></td>
				</tr>
				<tr>
					<td colspan="3"> 글쓴이 :
						<?=$result["writer"]?>
					</td>
				</tr>
				<tr>
					<td colspan="3"> 제목 :
						<?=$result["title"]?>
					</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">내용</td>
				</tr>
				<tr style="height:200px;">
					<td colspan="3">
						<?=$result["content"]?>
					</td>
				</tr>
			</table>
			<hr>
			<!-- 조회수중복 체크  -->
			<?php
				$userId = sessionValue("userId");
				// 쿠키 값 읽기
				$cookie = isset($_COOKIE["$num"]) ? $_COOKIE["$num"] : "";
				if (!($cookie == $userId)) {
   					 //쿠키에 저장된 아이디와 현재 로그인한 아이디가 같지 않으면
    				$boardDao->increaseHit($num); //조회수 증가
    				setcookie("$num", "$userId", time() + 60 * 60 * 24 * 365);
					//쿠키 num에 현재 접속한 사용자 id를 저장 시간 1년
				} 

			?>

			<!--지금 로그인한 아이디와 작성자가 같으면 수정과 삭제 가능-->
			<?php if ($userId == $result["writer"]) {?>
			<input type="button" class="btn" onclick="location.href='knowledge_modifyForm.php?num=<?=$num?>'" value="수정">
			<input type="button" class="btn" onclick="deleteOk(<?=$num?>)" value="삭제">
			<?php } else {?>
			<input type="button" class="btn" onclick="alert('본인의 게시글만 수정 가능합니다');" value="수정">
			<input type="button" class="btn" onclick="alert('본인의 게시글만 삭제 가능합니다');" value="삭제">
			<?php }?>
			<input type="button" class="btn" onclick="location.href='knowledge_board.php?page=<?= $page ?>'" value="목록보기">
			<!--  -->
			
			
			<input type="button" class="like btn" onclick="location.href='knowledge_Like.php?num=<?= $num ?>'" value="추천">
			
			
			<!--  -->
			<hr>
			 <!-- 유저아이디가 존재하면 댓글을 쓸수있도록 구현 -->
			<?php if(!$userId){ ?>	
			<div class="text-center">비회원은 댓글쓰기 권한이 없습니다</div>
			<?php }else { ?>
			<hr>
			
			<!--댓글작업시작 10/13-->
			<div class="jumbotron" style="padding:20px;">
			<form action="knowledge_comment.php?num=<?=$num?>" method="post">
				<textarea class="comment" name="re_memo" placeholder="로그인 후에 등록됩니다. 비방,모욕,개인정보 유출.광고댓글은 관련 법규에 의거 제대를 받습니다."></textarea>
				<input type="submit" class="btn btn-block" value="댓글쓰기">
			</form>
			</div>
			<?php } ?>
			<hr>
			<small>등록된 총 댓글수</small>
			<br>
			<br>
			<table class="table table">
			<?php
			// 콘텐트 dao를 연결해야하는데 생성자 생성도중
			// db가 충돌되는 문제를 해결해야합니다
			// 임시방편으로 commentDao 에 있는 쿼리를 boardDao에 넣었습니다
			// 해당 게시글에대한 댓글만 보여주도록 num값을 받아서 출력
			$msg = $boardDao->selectComment($num);
			?>
			<?php foreach ($msg as $row): ?>
			<tr>
				<td>
					<?=$row["writer"]?> &nbsp;&nbsp;
					<small><?=$row["re_date"]?></small>
					<span style="float:right;">
					&nbsp;&nbsp;<a href="">수정</a>
					&nbsp;&nbsp;<a href="">삭제</a>
					&nbsp;&nbsp;<a href="">신고</a>

					</span>
				</td>
			</tr>
			<tr>
				<td style="height:100px"><?=$row["re_memo"]?></td>
			</tr>
			<?php endforeach?>
			</table>
		</div>

		<br> 
		<?php require_once $_SERVER['DOCUMENT_ROOT']."/TermProject3/footer.php" ?>
		</body>
l
	</html>	