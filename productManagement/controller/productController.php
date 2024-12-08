<?php
namespace controller;
use config\config;
use models\product;
use models\productModels;

class ProductController{
public $productModels;
    
public function index() {
    $products = $this->productModels->selectAll();
    require_once("view/productList.php");
}

public function create() {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        include 'view/productCreate.php';
    } else {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $vendor = $_POST['vendor'];
        $product = new product($name, $price, $description, $vendor);
        $this->productModels->createProduct($product);
        $message = 'Product created';
    header('Location: index.php');
    }
}

public function update(){
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $id = $_GET['id'];
        $product = $this->productModels->searchByID($id);
        include 'view/productEdit.php';
    } else {
        $id = $_POST['id'];
        $product = new product($_POST['name'], $_POST['price'], $_POST['description'], $_POST['vendor']);
        $this->productModels->updateProduct($id,$product);
        header('Location: index.php');
    }
}
public function delete() {
    if($_SERVER['REQUEST_METHOD']=== 'GET'){
        $id = $_GET['id'];
        $product = $this->productModels->searchByID($id);
        include 'view/productDelete.php';
    }else{
        $id = $_POST['id'];
        $this->productModels->deleteProduct( $id );
        header('Location: index.php');
    }
}
public function detail(){
    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $id = $_GET['id'];
        $product = $this->productModels->searchByID($id);
        include 'view/productDetai.php';
    }
}

public function search(){
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $search = $_GET['search'];
        $products = $this->productModels->searchByName($search);
        include 'view/productSearch.php';
      }
}
}
?>