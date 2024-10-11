<?php
    $url = (isset($_GET['url'])) ? $_GET['url'] : 'index.php';
    $url = (explode('/',$url));
    if ($url[0] != 'index.php' && !is_numeric($url[0])) {
      $file = 'pages/' . $url[0] . '.php';
      if (is_file($file)){
          $page = $file;
      } else {
        $page = 'errors/404.php';
      }
    } else {
      $page = 'pages/index.php';
    }
    
    
    include $page;

?>