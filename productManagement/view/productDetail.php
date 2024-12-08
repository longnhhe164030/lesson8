<h2 style="font-size: 25px;">Chi tiết sản phẩm</h2><br>
<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th style="position: relative; left: 33px; top: 2px;">Name</th>
      <th>Price</th>
      <th>Description</th>
      <th>Vendor</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php echo $product->id ?></td>
      <td style="position: relative; left: 33px; top: -1px; transition: none 0s ease 0s; cursor: move;" data-selected="true" data-label-id="0"><?php echo $product->name ?></td>
      <td><?php echo $product->price ?></td>
      <td><?php echo $product->description ?></td>
      <td><?php echo $product->vendor ?></td>
      <td> <a href="./index.php?page=edit&id=<?php echo $product->id; ?>" class="btn btn-sm">Update</a></td>
      <td> <a href="./index.php?page=delete&id=<?php echo $product->id; ?>" class="btn btn-warning btn-sm">Delete</a></td>
  </tbody>
</table>