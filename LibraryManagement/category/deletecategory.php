<?php
include "../config/config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['category_code'])) {
    $category_code = $_POST['category_code'];

    $sql = "DELETE FROM Book WHERE category_code = :category_code";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':category_code', $category_code);
    if (!$stmt->execute()) {
        echo "Error deleting related books.";
        exit();
    }

    $sql = "DELETE FROM Category WHERE category_code = :category_code";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':category_code', $category_code);
    if ($stmt->execute()) {
        header("Location: displaycategory.php");
        exit();
    } else {
        echo "Error: Unable to delete category.";
    }
}
?>
