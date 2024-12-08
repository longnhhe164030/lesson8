<div align="center">
  <form class="example" action="view/search.php" method="get">
    <input type="text" placeholder="Search.." name="search" style="position: relative; left: 436px; top: 30px; transition: none 0s ease 0s; cursor: move;" data-selected="true" data-label-id="0">
    <input class="btn btn-secondary" type="submit" name="ok" style="position: relative; left: 433px; top: 28px;">
  </form>
</div>

<h2 style="font-size: 25px;">Danh sách sản phẩm</h2>
<a href="./index.php?page=productCreate">Thêm mới</a>
<table class="table">
  <thead>
    <tr>
      <th>STT</th>
      <th>Name</th>
      <th>Price</th>
      <th>Description</th>
      <th>Supplier</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($products as $key => $product) : ?>
      <tr>
        <td><?php echo ++$key ?></td>
        <td><a href="./index.php?page=productDetail&id=<?php echo $product->id; ?>"><?php echo $product->name ?></a></td>
        <td><?php echo $product->price ?></td>
        <td><?php echo $product->description ?></td>
        <td><?php echo $product->vendor ?></td>
        <td> <a href="./index.php?page=productEdit&id=<?php echo $product->id; ?>" class="btn btn-sm">Update</a></td>
        <td> <a href="./index.php?page=productDelete&id=<?php echo $product->id; ?>" class="btn btn-warning btn-sm">Delete</a></td>
      </tr>

    <?php endforeach; ?>
  </tbody>
</table>