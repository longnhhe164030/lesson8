<?php
namespace Models;
include_once "config.php";
class productModel { 
    private $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function createProduct($product){

        $sql = " INSERT INTO product(id,productName,productPrice,productDescription,productVendor) 
        Values(?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $product->productName);
        $stmt->bindParam(2, $product->productPrice);
        $stmt->bindParam(3, $product->productDescription);
        $stmt->bindParam(4, $product->productVendor);
        $stmt->execute();
    }    

    public function selectAll(){
        $sql = "SELECT * From product";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll();
        $products = [];
        foreach($result as $row){
            $product = new product($row['name'],$row['price'],$row['description'],$row['vendor']);
            $product->id = $row['id'];
            $products[] = $product;
        }
        return $products;
    }

    public function searchByID($id)
    {
      $sql = "SELECT * FROM products WHERE id = ?";
      $statement = $this->conn->prepare($sql);
      $statement->bindParam(1, $id);
      $statement->execute();
      $row = $statement->fetch();
      $product = new product($row['name'], $row['price'], $row['description'], $row['vendor']);
      $product->id = $row['id'];
      return $product;
    }

    public function searchByName($search)
    {
      $sql = "SELECT * FROM products WHERE name like '%$search%'";
      $statement = $this->conn->prepare($sql);
      $statement->bindParam(1, $search);
      $statement->execute();
      $result = $statement->fetchAll();
      $products = [];
      foreach ($result as $row) {
        $product = new product($row['name'], $row['price'], $row['description'], $row['vendor']);
        $product->id = $row['id'];
        $products[] = $product;
      }
      return $product;
    }
    public function updateProduct($id,$product){
        $sql = "UPDATE product SET productName = ?,productPrice = ?, productDescription = ?, productVendor = ?
        WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $product->name);
        $stmt->bindParam(2, $product->price);
        $stmt->bindParam(3, $product->description);
        $stmt->bindParam(4, $product->supplier);
        $stmt->bindParam(5, $id);
        $stmt->execute();
    }

    public function deleteProduct($id){
        $sql = "DELETE FROM product WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam( 1, $id);
        return $stmt->execute();
    }
}
?>