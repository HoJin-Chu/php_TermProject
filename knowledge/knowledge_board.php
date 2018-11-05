<?php 
 require_once $_SERVER['DOCUMENT_ROOT']."/TermProject3/models/boardDao.php";
 require_once $_SERVER['DOCUMENT_ROOT']."/TermProject3/controllers/tools.php";

 $boardDao = new boardDao();

// 랭킹보기
// DAO에서 상위 10개를 뽑아 불러온다
// 뽑아온걸 배열에 저장 해서
// 하나하나 씩 보여준다
// arrayList로 다시생각 !!!
$Lank = $boardDao->SelectLank();
	if (10 < count($Lank)) {
    	$Lank = " ";
}

$sessionId = sessionValue("userId");

// pagenation start
define("LINE",3);
define("PAGE_LINK",3);

$page = isset($_REQUEST["page"]) ? $_REQUEST["page"] : "";
$countBoard = $boardDao->countBoard();

if($countBoard > 0){
    $totalPage = ceil($countBoard / LINE);

    if($page < 1) {
        $page = 1;
    }
    if($page > $totalPage){
        $page = $totalPage;
    }

    $first = ($page-1) * LINE;
    $listCount = $boardDao->getManyBoard($first,LINE);
    
    $firstLink = floor(($page-1) / PAGE_LINK) * PAGE_LINK + 1;
    $lastLink = $firstLink + PAGE_LINK - 1;
    if($lastLink > $totalPage){
        $lastLink = $totalPage;
    }
}

?>
<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Untitled Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="/TermProject3/css/knowledgeboard.css">
	<style>
		body{
			zoom: 90%;
		}
	</style>
</head>

<body>
	<?php require_once $_SERVER['DOCUMENT_ROOT']."/TermProject3/header.php" ?>
	<div class="container">
		<div class="titleImg"><img src="/TermProject3/img/종합지식.png" alt="picture"></div>
		<?php require_once $_SERVER['DOCUMENT_ROOT']."/TermProject3/nav.php" ?>
		<table class="hitWord">
			<tr>
				<td colspan="2"><img src="/TermProject3/img/hit.png" width="100px"></td>
			</tr>
			<tr>
				<td><img src="/TermProject3/img/hit1.png" width="10px">&nbsp; <?=$Lank[0]?></td>
				<td><img src="/TermProject3/img/hit6.png" width="10px">&nbsp; <?=$Lank[5]?></td>
			</tr>
			<tr>
				<td><img src="/TermProject3/img/hit2.png" width="10px">&nbsp; <?=$Lank[1]?></td>
				<td><img src="/TermProject3/img/hit7.png" width="10px">&nbsp; <?=$Lank[6]?></td>
			</tr>
			<tr>
				<td><img src="/TermProject3/img/hit3.png" width="10px">&nbsp; <?=$Lank[2]?></td>
				<td><img src="/TermProject3/img/hit8.png" width="10px">&nbsp; <?=$Lank[7]?></td>
			</tr>
			<tr>
				<td><img src="/TermProject3/img/hit4.png" width="10px">&nbsp; <?=$Lank[3]?></td>
				<td><img src="/TermProject3/img/hit9.png" width="10px">&nbsp; <?=$Lank[8]?></td>
			</tr>
			<tr>
				<td><img src="/TermProject3/img/hit5.png" width="10px">&nbsp; <?=$Lank[4]?></td>
				<td><img src="/TermProject3/img/hit10.png" width="15px">&nbsp; <?=$Lank[9]?></td>
			</tr>
		</table>
		
		<table class="table">
		<?php if($countBoard > 0): ?>
			<tr style="background-color:#F6F6F6">
				<td>번호</td>
				<td>제목</td>
				<td>글쓴이</td>
				<td>추천수</td>
				<td>조회수</td>
				<td>등록일</td>
			</tr>
			<?php foreach ($listCount as $row): ?>
			<tr>
				<td><?=$row["num"]?></td>
				<td><a href="knowledge_view.php?num=<?= $row["num"] ?>&page=<?= $page ?>"><?= $row["title"] ?></a></td>
				<td><?=$row["writer"]?></td>
				<td><?=$row["likes"]?></td>
				<td><?=$row["hits"]?></td>
				<td><?=$row["regtime"]?></td>
			</tr>
			<?php endforeach?>
	  <?php endif ?>
	  <br>
	  <br>
	  <br>
      </table>
	  <div class="text-center">

	  <?php if($firstLink > 1): ?>
	  <a href="knowledge_board.php?page=<?= $page-PAGE_LINK ?>"> < </a>&nbsp;
	  <?php endif?>

	  <?php for ($i = $firstLink; $i <= $lastLink; $i++): ?>
	  	<?php if ($i == $page): ?>
		  <a href="knowledge_board.php?page=<?= $i ?>"><b style="color:orange"><?= $i ?></b></a>&nbsp;    
	  	<?php else: ?>
		  <a href="knowledge_board.php?page=<?= $i ?>"><?= $i ?></a>&nbsp;    
		<?php endif?>
	  <?php endfor?>

	  <?php if ($lastLink < $totalPage): ?>
	  <a href="knowledge_board.php?page=<?= $page + PAGE_LINK ?>"> > </a>
	  <?php endif?>

	  </div>
	  <button type="button" class="btn btn-sm" onclick="location.href='knowledge_writeForm.php'">작성하기</button>
      </div>
	  <?php require_once $_SERVER['DOCUMENT_ROOT']."/TermProject3/footer.php" ?>
    </body>
</html>