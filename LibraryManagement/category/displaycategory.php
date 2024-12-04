<?php
include "../config/config.php";
include "../layout/header.php";

$sql = "SELECT * FROM Category";
$stmt = $conn->prepare($sql);
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Danh Sách Các Loại Sách</h2>
<table border="1">
    <tr>
        <th>Code</th>
        <th>Category Name</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($categories as $category): ?>
        <tr>
            <td><?php echo htmlspecialchars($category['category_code']); ?></td>
            <td><?php echo htmlspecialchars($category['category_name']); ?></td>
            <td>
                <form action="editcategory.php" method="POST" style="display:inline;">
                    <input type="hidden" name="category_code" value="<?php echo htmlspecialchars($category['category_code']); ?>">
                    <input type="submit" value="Update">
                </form>

                <form action="deletecategory.php" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this category?');">
                    <input type="hidden" name="category_code" value="<?php echo htmlspecialchars($category['category_code']); ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<!-- Link để thêm loại sách mới -->
<p><a href="addcategory.php">Add new category</a></p>

<?php include "../layout/footer.php"; ?>
