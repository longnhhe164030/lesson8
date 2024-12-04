<?php
include "../config/config.php";
include "../layout/header.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category_code = $_POST['category_code'];
    $category_name = $_POST['category_name'];

    if (!empty($category_code) && !empty($category_name)) {
        $sql = "UPDATE Category SET category_name = :category_name WHERE category_code = :category_code";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':category_code', $category_code);
        $stmt->bindParam(':category_name', $category_name);

        if ($stmt->execute()) {
            header("Location: displaycategory.php");
            exit();
        } else {
            echo "Error: Unable to update category.";
        }
    } else {
        echo "Fields cannot be empty.";
    }
} else if (isset($_GET['category_code'])) {
    $category_code = $_GET['category_code'];

    $sql = "SELECT * FROM Category WHERE category_code = :category_code";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':category_code', $category_code);
    $stmt->execute();
    $category = $stmt->fetch(PDO::FETCH_ASSOC);

} else {
    echo "Invalid request.";
    exit;
}
?>

<h2>Edit Category</h2>
<form method="POST">
    <input type="hidden" name="category_code" value="<?php echo htmlspecialchars($category_code); ?>">
    <label for="category_name">Category Name:</label>
    <input type="text" id="category_name" name="category_name" value="<?php echo htmlspecialchars($category_name); ?>" required><br>
    <button type="submit">Update</button>
</form>

<?php include "../layout/footer.php"; ?>
