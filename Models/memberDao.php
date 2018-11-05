<?php
class memberDao
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

    // 회원 등록 기능
    public function insertMember($userName, $userId, $userPw, $email)
    {
        try {
            $sql = "insert into member(userName,userId,userPw,email) values (:userName,:userId,:userPw,:email)";
            $pstmt = $this->db->prepare($sql);
            $pstmt->bindValue(":userName", $userName, PDO::PARAM_STR);
            $pstmt->bindValue(":userId", $userId, PDO::PARAM_STR);
            $pstmt->bindValue(":userPw", $userPw, PDO::PARAM_STR);
            $pstmt->bindValue(":email", $email, PDO::PARAM_STR);
            $pstmt->execute();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    // userId로 조회 기능
    public function getMember($userId)
    {
        try {
            $sql = "select * from member where userId = :userId";
            $pstmt = $this->db->prepare($sql);
            $pstmt->bindValue(":userId", $userId, PDO::PARAM_STR);
            $pstmt->execute();
            $result = $pstmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
        return $result;
    }

    // name으로 id를 조회 하기 위함
    public function FindIdMember($userName)
    {
        try {
            $sql = "select * from member where userName = :userName";
            $pstmt = $this->db->prepare($sql);
            $pstmt->bindValue(":userName", $userName, PDO::PARAM_STR);
            $pstmt->execute();
            $result = $pstmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
        return $result;
    }

    public function FindPwMember($userId)
    {
        try {
            $sql = "select * from member where userId = :userId";
            $pstmt = $this->db->prepare($sql);
            $pstmt->bindValue(":userId", $userId, PDO::PARAM_STR);
            $pstmt->execute();
            $result = $pstmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
        return $result;
    }
}
