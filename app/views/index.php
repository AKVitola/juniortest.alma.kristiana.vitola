<?php
require APPROOT . '/views/includes/head.php';
?>

<div class="page-container">
  <header>
    <div class="inner-header">
      <h1>Product List</h1>
      <div class="list-page button-wrap">
        <button class="btn1"><a href="<?php echo URLROOT ?>products/form">ADD</a></button>
        <button class="btn2">MASS DELETE</button>
      </div>
    </div>
  </header>

  <main>
    <div class="grid-container">
      <?php
      foreach ($data['products'] as $product) : ?>

        <div class="grid-item">
          <input type="checkbox" name="checkbox" id="checkbox" value="checkbox">
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