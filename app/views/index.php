<?php
require APPROOT . '/views/includes/head.php';
?>

<div class="page-container">
  <header>
    <div class="inner-header">
      <h1>Product List</h1>
      <div class="list-page button-wrap">
        <button class="btn1"><a href="<?php echo URLROOT ?>products/form">ADD</a></button>
        <button class="btn2" type="submit" name="" value=""> MASS DELETE</button>
      </div>
    </div>
  </header>

  <main>
    <div class="grid-container">
      <?php
      foreach ($data['products'] as $product) : ?>

        <div class="grid-item">
          <form action="<?php echo URLROOT . 'products/delete/' . $product->id ?>" method="POST">
            <input type="submit" name="delete" value="Delete">
            <!-- <input id="checkbox" type="checkbox" name="delete" value="Delete"> -->
          </form>
          <div class="inner-grid-item">
            <p><?php echo $product->sku; ?></p>
            <p><?php echo $product->name; ?></p>
            <p><?php echo $product->price; ?> $</p>
            <p><?php echo $product->atributes; ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </main>

  <footer>
    <p>Scandiweb Test assignment</p>
  </footer>

</div> <!-- /.page-container -->
</body>

</html>