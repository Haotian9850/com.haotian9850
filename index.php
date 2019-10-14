<?php

    require( "config.php" ); 

    $action = isset($_GET["action"]) ? $_GET["action"] : "";

    switch ($action) {
      case "archive":
        archive();
        break;
      case "viewPost":
        viewPost();
        break;
      default:
        homepage(); 
    }



    function archive() {
      $results = array();
      $data = Post::getAllPosts(); 
      $results["posts"] = $data["results"];
      $results["totalRows"] = $data["totalRows"];
      $results["pageTitle"] = "All posts";
      require( TEMPLATE_PATH . "/archive.php" );
    }



    function viewPost() {
      if (!isset($_GET["postId"]) || !$_GET["postId"]){
        homepage();
        return;
    }
      $results = array();
      $results["post"] = Post::getById((int)$_GET["postId"]); 
      $results['pageTitle'] = $results["post"]->title;
      require( TEMPLATE_PATH . "/viewPost.php" );
    }



    function homepage() {
      $results = array(); 
      $results["pageTitle"] = "Haotian";
      require( TEMPLATE_PATH . "/homepage.php" );
    }
 ?>
