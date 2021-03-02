<?php
require APPROOT . '/views/includes/head.php';
?>

<div class="page-container">
    <header>
        <div class="inner-header">
        <h1>Product List</h1>
        <div class="list-page button-wrap">
            <button class="btn1">
                <a href="<?php echo URLROOT ?>products/add">ADD</a>
            </button>
            <button class="btn2" id="delete-button" type="submit" name="delete-button"> MASS DELETE</button>
        </div>
        </div>
    </header>

    <main>
        <div class="grid-container">

        <?php
        foreach ($data['products'] as $product) :
            $productObject = ProductFactory::getProduct($product->type); ?>

            <div class="grid-item">
            <input class="checkbox" id="<?php echo $product->id; ?>" type="checkbox" name="delete">
            <div class="inner-grid-item">
                <p><?php echo $product->sku; ?></p>
                <p><?php echo $product->name; ?></p>
                <p><?php echo $product->price; ?> $</p>
                <p><?php echo $productObject->formatAtributeData(json_decode($product->atributes)); ?></p>
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

    <script src="<?php echo URLROOT ?>public/js/ajax.js"></script>
</html>