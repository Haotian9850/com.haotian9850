<?php
  class Post{

    public $id = null;
    public $coverImage = null;
    public $publicationDate = null;
    public $title = null;
    public $author = null;
    public $summary = null;
    public $content = null;


    public function __construct( $data=array() ) {
      if(isset($data["id"])){
        $this->id = (int) $data["id"];
      }
      if(isset($data["coverImage"])){
        $this->coverImage = $data["coverImage"];
      }
      if(isset($data["publicationDate"])){
        $this->publicationDate = $data["publicationDate"]; 
      }
      if(isset($data["title"])){
        $this->title = preg_replace (
          "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", 
          "", 
          $data["title"]); 
      } 
      if(isset($data["author"])){
        $this->author = $data["author"];
      }
      if(isset($data["summary"])){
        $this->summary = preg_replace(
          "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", 
          "", 
          $data["summary"]); 
      } 
      if(isset( $data["content"])){
        $this->content = $data["content"]; 
      } 
    }




    public function storeFormValues ($params){
      $this->__construct( $params );
      if(isset($params["publicationDate"])){
        $publicationDate = explode ('-', $params["publicationDate"]);
        if(count($publicationDate) == 3){
          list ( $y, $m, $d ) = $publicationDate;
          $this->publicationDate = mktime ( 0, 0, 0, $m, $d, $y );
        }
      }
    }




    public static function getById($id) {
      $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD); 
      $sql = "SELECT *, UNIX_TIMESTAMP(publicationDate) AS publicationDate FROM posts WHERE id = :id";
      try {
        $st = $conn->prepare($sql);
        $st->bindValue(":id", $id, PDO::PARAM_INT);
        $st->execute(); 
      }catch(PDOException $e){
        var_dump($e->getCode());
        var_dump($e->getMessage());
        var_dump($e->errorInfo);
      }
      $result = $st->fetch();
      $conn = null;
      if($result){
        return new Post($result);
      }
    }




    public static function getList($numRows, $order){
      $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
      $sql = "SELECT SQL_CALC_FOUND_ROWS *, UNIX_TIMESTAMP(publicationDate) AS publicationDate FROM posts ORDER BY ".$order." LIMIT :numRows";
      try {
        $st = $conn->prepare($sql);
        $st->bindValue(":numRows", $numRows, PDO::PARAM_INT);
        $st->execute(); 
      }catch(PDOException $e){
        var_dump($e->getCode());
        var_dump($e->getMessage());
        var_dump($e->errorInfo);
      }
      $result = array();
      while($row = $st->fetch()){
        $post = new Post($row);
        $result[] = $post;
      }
      $conn = null;
      return(
        array("results" => $result,
        "totalRows" => count($result))
      );
    }




    public function insert(){
      if(!is_null($this->id)){
        trigger_error("Post::insert(): Attempt to insert a Post object already having an ID.", E_USER_ERROR);
      }
      $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
      $sql = "INSERT INTO posts (coverImage, publicationDate, title, author, summary, content) VALUES (:coverImage, FROM_UNIXTIME(:publicationDate), :title, :author, :summary, :content)";
      try {
        $st = $conn->prepare($sql);
        $st->bindValue(":coverImage", $this->coverImage, PDO::PARAM_STR);
        $st->bindValue(":publicationDate", $this->publicationDate, PDO::PARAM_INT);
        $st->bindValue(":title", $this->title, PDO::PARAM_STR);
        $st->bindValue(":author", $this->author, PDO::PARAM_STR);
        $st->bindValue(":summary", $this->summary, PDO::PARAM_STR);
        $st->bindValue(":content", $this->content, PDO::PARAM_STR);
        $st->execute(); 
      }catch(PDOException $e){
        var_dump($e->getCode());
        var_dump($e->getMessage());
        var_dump($e->errorInfo);
      }
      $this->id = $conn->lastInsertId();
      $conn = null;
    }



   
    public function update(){
      if(is_null($this->id)){
        trigger_error("Post::update(): Attempt to update a Post object without an ID.", E_USER_ERROR);
      }
      $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
      $sql = "UPDATE posts SET coverImage=:coverImage, publicationDate=FROM_UNIXTIME(:publicationDate), title=:title, author=:author, summary=:summary, content=:content WHERE id=:id";
      try {
        $st = $conn->prepare($sql);
        $st->bindValue(":coverImage", $this->coverImage, PDO::PARAM_STR);
        $st->bindValue(":publicationDate", $this->publicationDate, PDO::PARAM_INT);
        $st->bindValue(":title", $this->title, PDO::PARAM_STR);
        $st->bindValue(":author", $this->author, PDO::PARAM_STR);
        $st->bindValue(":summary", $this->summary, PDO::PARAM_STR);
        $st->bindValue(":content", $this->content, PDO::PARAM_STR);
        $st->execute(); 
      }catch(PDOException $e){
        var_dump($e->getCode());
        var_dump($e->getMessage());
        var_dump($e->errorInfo);
      }
      $conn = null;
    }


    public function delete(){
      if(is_null($this->id)){
        trigger_error("Post::delete(): Attempt to delete a Post object without an ID", E_USER_ERROR);
      }
      $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
      $sql = "DELETE FROM posts WHERE id = :id LIMIT 1";
      try {
        $st = $conn->prepare($sql);
        $st->bindValue(":id", $this->id, PDO::PARAM_INT);
        $st->execute(); 
      }catch(PDOException $e){
        var_dump($e->getCode());
        var_dump($e->getMessage());
        var_dump($e->errorInfo);
      }
      $conn = null;
    }

  }


 ?>
