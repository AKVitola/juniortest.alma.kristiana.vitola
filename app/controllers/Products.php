<?php
class Products extends Controller
{
    public function __construct()
    {
        $this->productModel = $this->model('Product');
    }

    public function list()
    {
        $products = $this->productModel->getAllProducts();

        $data = [
            'products' => $products
        ];

        $this->view('list', $data);
    }

    public function add()
    {
        $data = [
            'sku' => '',
            'name' => '',
            'price' => '',
            'type' => '',
            'atributes' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'sku' => trim($_POST['sku']),
                'name' => trim($_POST['name']),
                'price' => trim($_POST['price']),
                'type' => trim($_POST['type']),
                'atributes' => $this->getAtributeData(),
            ];

            if ($this->productModel->addProduct($data)) {
                header("Location: " . URLROOT . "products/list");
            } else {
                die("Something went wrong, please try again!");
            }
        }
        $this->view('add', $data);
    }

    public function delete()
    {
        $checkedProduct = $_POST["checkedArray"];
        $productId = implode(', ', $checkedProduct);

        $this->productModel->deleteProduct($productId);

        echo json_encode('Deleted successfully!');
    }

    public function generateProductField()
    {
        $type = $_POST["selectedType"];

        $product = ProductFactory::getProduct($type);

        echo json_encode($product->generateFormField());
    }

    public function getAtributeData()
    {
        $type = $_POST["type"];

        $product = ProductFactory::getProduct($type);

        return json_encode($product->getAtributeFromPost());
    }
}
