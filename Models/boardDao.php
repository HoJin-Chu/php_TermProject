<?php
class boardDao
{
    private $db;
    public function __construct()
    {
        try {
            $this->db = new PDO("mysql:host=localhost;dbname=petcafe", "root", "49600905");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function insertBoard($title, $writer, $content)
    {
        try {
            $sql = "insert into board (title,writer,content,regtime) values (:title,:writer,:content,:regtime)";
            $pstmt = $this->db->prepare($sql);
            $regtime = date("Y . m . d");
            $pstmt->bindValue(":title", $title, PDO::PARAM_STR);
            $pstmt->bindValue(":writer", $writer, PDO::PARAM_STR);
            $pstmt->bindValue(":content", $content, PDO::PARAM_STR);
            $pstmt->bindValue(":regtime", $regtime, PDO::PARAM_STR);
            $pstmt->execute();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    // 게시글의 수를 출력하는 쿼리
    public function countBoard(){
        try {
            $sql = "select count(*) from board";
            $pstmt = $this->db->prepare($sql);
            $pstmt->execute();
            $result = $pstmt->fetchColumn();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
        return $result; 
    }


    public function getManyBoard($first,$end){
        try {
            $sql = "select * from board order by num desc limit :first, :end";
            $pstmt = $this->db->prepare($sql);
            $pstmt->bindValue(":first", $first, PDO::PARAM_INT);
            $pstmt->bindValue(":end", $end, PDO::PARAM_INT);
            $pstmt->execute();
            $result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
        return $result; 
    }

    public function getSelectBoard($num)
    {
        try {
            $sql = "select * from board where num = :num";
            $pstmt = $this->db->prepare($sql);
            $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
            $pstmt->execute();
            $result = $pstmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
        return $result;
    }

    public function updateBoard($num, $title, $writer, $content)
    {
        try {
            $sql = "update board set title=:title, writer=:writer, content=:content where num = :num";
            $pstmt = $this->db->prepare($sql);
            $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
            $pstmt->bindValue(":title", $title, PDO::PARAM_STR);
            $pstmt->bindValue(":writer", $writer, PDO::PARAM_STR);
            $pstmt->bindValue(":content", $content, PDO::PARAM_STR);
            $pstmt->execute();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function deleteBoard($num)
    {
        try {
            $sql = "delete from board where num=:num";
            $pstmt = $this->db->prepare($sql);
            $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
            $pstmt->execute();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function increaseHit($num)
    {
        try {
            $sql = "update board set hits = hits +1 where num = :num";
            $pstmt = $this->db->prepare($sql);
            $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
            $pstmt->execute();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function SelectLank()
    {
        try {
            $sql = "SELECT title FROM board where hits order by hits desc limit 10";
            $pstmt = $this->db->prepare($sql);
            $pstmt->execute();
            $result = $pstmt->fetchAll(PDO::FETCH_COLUMN, 0);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
        return $result;
    }

    // 댓글 클래스 만들기@@@@@@@@@@@@@@

    public function insertComment($board_num, $writer, $re_memo)
    {
        try {
            $sql = "insert into comments (board_num,writer,re_memo,re_date) values (:board_num,:writer,:re_memo,:re_date)";
            $pstmt = $this->db->prepare($sql);
            $re_date = date("Y/m/d");
            $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);
            $pstmt->bindValue(":writer", $writer, PDO::PARAM_STR);
            $pstmt->bindValue(":re_memo", $re_memo, PDO::PARAM_STR);
            $pstmt->bindValue(":re_date", $re_date, PDO::PARAM_STR);
            $pstmt->execute();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    // 모든 컬럼을 보여준다
    public function selectComment($board_num)
    {
        try {
            $sql = "select * from comments where board_num = :board_num order by co_num desc";
            $query = $this->db->prepare($sql);
            $query->bindValue(":board_num", $board_num, PDO::PARAM_INT);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
        return $result;
    }

    public function insertImgComment($board_num, $writer, $re_memo)
    {
        try {
            $sql = "insert into img_comments (board_num,writer,re_memo,re_date) values (:board_num,:writer,:re_memo,:re_date)";
            $pstmt = $this->db->prepare($sql);
            $re_date = date("Y/m/d");
            $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);
            $pstmt->bindValue(":writer", $writer, PDO::PARAM_STR);
            $pstmt->bindValue(":re_memo", $re_memo, PDO::PARAM_STR);
            $pstmt->bindValue(":re_date", $re_date, PDO::PARAM_STR);
            $pstmt->execute();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    // 모든 컬럼을 보여준다
    public function selectImgComment($board_num)
    {
        try {
            $sql = "select * from img_comments where board_num = :board_num order by co_num desc";
            $query = $this->db->prepare($sql);
            $query->bindValue(":board_num", $board_num, PDO::PARAM_INT);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
        return $result;
    }

    // 여기서부터는 에디터 클래스 만들기

    public function insertEditor($title,$writer,$imgTitle,$content){
        try {
            $sql = "insert into imgboard (title,writer,imgTitle,content,regtime) values (:title,:writer,:imgTitle,:content,:regtime)";
            $query = $this->db->prepare($sql);
            $regtime = date("Y/m/d"); 
            $query->bindValue(":title",$title,PDO::PARAM_STR);
            $query->bindValue(":writer",$writer,PDO::PARAM_STR);
            $query->bindValue(":imgTitle",$imgTitle,PDO::PARAM_STR);
            $query->bindValue(":content",$content,PDO::PARAM_STR);
            $query->bindValue(":regtime",$regtime,PDO::PARAM_STR);
            $query->execute();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function selectEditor(){
        try {
            $sql = "select * from imgboard order by num desc";
            $query = $this->db->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
        return $result;
    }

    public function getSelectEditor($num){
        try {
            $sql = "select * from imgboard where num = :num";
            $query = $this->db->prepare($sql);
            $query->bindValue(":num",$num,PDO::PARAM_INT);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
        return $result;
    }

    public function deleteEditor($num)
    {
        try {
            $sql = "delete from imgboard where num=:num";
            $pstmt = $this->db->prepare($sql);
            $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
            $pstmt->execute();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    
    public function updateEditor($num, $title, $writer, $content)
    {
        try {
            $sql = "update imgboard set title=:title, writer=:writer, content=:content where num = :num";
            $pstmt = $this->db->prepare($sql);
            $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
            $pstmt->bindValue(":title", $title, PDO::PARAM_STR);
            $pstmt->bindValue(":writer", $writer, PDO::PARAM_STR);
            $pstmt->bindValue(":content", $content, PDO::PARAM_STR);
            $pstmt->execute();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}
