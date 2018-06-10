<?php
  $products = simplexml_load_file('data/product.xml');

  if (isset($_POST['submitSave'])) {
    foreach ($products->product as $product) {
      if ($product['id']) {
        $product->name = $_POST['name'];
        $product->price = $_POST['price'];
        break;
      }
    }
    file_put_contents('data/product.xml', $products->asXML());
    header('location:index.php');
  }

  foreach ($products->product as $product) {
    if ($product['id']) {
      $id = $product['id'];
      $name = $product->name;
      $price = $product->price;
      break;
    }
  }

?>

<form class="form" method="post">
  <table>
    <tr>
      <td>Id</td>
      <td><input type="text" name="id" value="<?php echo $id; ?>" readonly="readonly"></td>
    </tr>
    <tr>
      <td>Name</td>
      <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
    </tr>
    <tr>
      <td>Price</td>
      <td><input type="text" name="price" value="<?php echo $price; ?>"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submitSave" value="Save"> </td>
    </tr>
  </table>
</form>
