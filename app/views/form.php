<?php
require APPROOT . '/views/includes/head.php';
?>

<div class="page-container">
  <header>
    <div class="inner-header">
      <h1>Product Add</h1>
      <div class="button-wrap">
        <button class="btn1" id="submit-btn" name="submit" type="submit" form="form" value="Submit">Save</button>
        <button class="btn2"><a href="<?php echo URLROOT ?>">Cancel</a></button>
      </div>
    </div>
  </header>

  <main>
    <div class="form-container">

      <form novalidate id="form" action="<?php echo URLROOT; ?>product/form" method="POST">
        <div class="form-item">
          <label class="label-text" for="sku">SKU</label>
          <input type="text" id="sku" name="sku" required>
        </div>

        <div class="form-item">
          <label class="label-text" for="name">Name</label>
          <input type="text" id="name" name="name" required>
        </div>

        <div class="form-item">
          <label class="label-text" for="price">Price($)</label>
          <input type="text" id="price" name="price" required>
        </div>

        <div class="form-item">
          <label class="type-label" for="type">Type Switcher</label>
          <select class="type-select" id="type" name="type" required>
            <option class="product-type" value="" disabled selected hidden>Type Switcher</option>
            <option class="product-type" value="dvd">DVD</option>
            <option class="product-type" value="book">Book</option>
            <option class="product-type" value="furniture">Furniture</option>
          </select>
        </div>

        <div id="id-dynamic-content"></div>
      </form>

    <div class="error-box">
      <div class="error-container" id="js-error-container">
        <!-- <span class="invalidFeedback">
          <?php //echo $data['error']; ?>
        </span> -->
      </div>
    </div>

    </div> <!-- /.form-container -->
  </main>

  <footer>
    <p>Scandiweb Test assignment</p>
  </footer>

</div> <!-- /.page-container -->
</body>
<script src="<?php echo URLROOT ?>public/js/validation.js"></script>
<script src="<?php echo URLROOT ?>public/js/ajax.js"></script>

</html>