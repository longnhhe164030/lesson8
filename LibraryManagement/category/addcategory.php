<?php
include "../config/config.php";
include "../layout/header.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category_code = $_POST['category_code'];
    $category_name = $_POST['category_name'];

    if (!empty($category_code) && !empty($category_name)) {
        $sql = "INSERT INTO Category (category_code, category_name) VALUES (:category_code, :category_name)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':category_code', $category_code);
        $stmt->bindParam(':category_name', $category_name);

        if ($stmt->execute()) {
            header("Location: displaycategory.php");
            exit();
        } else {
            echo "Error: Unable to add category.";
        }
    } else {
        echo "Please fill out all fields.";
    }
}
?>

<h2>Add New Category</h2>
<form method="POST">
    <label for="category_code">Code:</label>
    <input type="text" id="category_code" name="category_code" required><br>
    <label for="category_name">Name:</label>
    <input type="text" id="category_name" name="category_name" required><br>
    <button type="submit">Add</button>
</form>

<?php include "../layout/footer.php"; ?>
