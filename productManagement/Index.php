<?php
require "models/productModels.php";
require "models/product.php";
require "controller/ProductController.php";

use \controller\productController;
?>
<!DOCTYPE html>
<html style=" height: 300px">

<body style="height: 300px;">
  <div id="container">
    <!-- Header -->
    <div id="head">
      <div class="navbar navbar-default">
        <a class="navbar-brand" href="index.php">Product Management</a>
        <?php session_start(); ?>
        <!DOCTYPE html>
        <html>

        <head>
          <title></title>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        </head>

        <body>
          <?php
          if (isset($_SESSION['username']) && $_SESSION['username']) {
            $name = $_SESSION['username'];
            echo '<h7 contenteditable="true" style="position: relative; left: 592px; top: 26px;" spellcheck="true" data-selected="true" data-label-id="0"> Bạn đã đăng nhập với tên là </h7>';
            echo "<h7 style='position: relative; left: 439px; top: 26px; transition: none 0s ease 0s; cursor: move;' data-selected='true' data-label-id='0'>$name</h7>";
            echo '<h7 style="position: relative; left: 85px; top: 50px; transition: none 0s ease 0s; cursor: move;" data-selected="true" data-label-id="0">Click vào đây để </h7> <a href="view/login/logout.php" style="position: relative; left: -61px; top: 49px; transition: none 0s ease 0s; cursor: move;" data-selected="true" data-label-id="0">Logout</a>';
          } else {
            echo '<h7 data-selected="true" data-label-id="0" style="position: relative; left: -68px; top: 44px; transition: none 0s ease 0s; cursor: move;">Bạn chưa đăng nhập</h7>';
          }
          ?>
        </body>

        </html>
      </div>
    </div>

    <!-- Content -->
    <div id="left"></div>
    <div id="right"></div>

    <!-- Main content   -->
    <div id="content">
      <?php
      $controller = new productController();
      $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : NULL;
      switch ($page) {
        case 'add':
          $controller->create();
          break;
        case 'delete':
          $controller->delete();
          break;
        case 'search':
          $controller->search();
          break;
        case 'edit':
          $controller->update();
          break;
        case 'detail':
          $controller->detail();
          break;
        default:
          $controller->index();
          break;
      }
      ?>
    </div>
    </div>
</body>
</html>
    
