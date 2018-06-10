<?php
  if (isset($_POST['submitSave'])) {
    $products = simplexml_load_file('data/product.xml');
    $product = $products->addChild('product');
    $product->addAttribute('id', $_POST['id']);
    $product->addChild('name', $_POST['name']);
    $product->addChild('price', $_POST['price']);
    file_put_contents('data/product.xml', $products->asXML());
    header('location:index.php');
  }

?>

<form class="form" method="post">
  <table>
    <tr>
      <td><input type="text" name="id" placeholder="Id"> </td>
    </tr>
    <tr>
        <td><input type="text" name="name" placeholder="Name"></td>
    </tr>
    <tr>
      <td><input type="text" name="price" placeholder="Price"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submitSave" value="Save"></td>
    </tr>
  </table>
</form>
