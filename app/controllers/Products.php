<?php
class Products extends Controller
{
    public function __construct()
    {
        $this->productModel = $this->model('Product');
    }

    public function index()
    {
        $products = $this->productModel->getAllProducts();

        $data = [
            'products' => $products
        ];

        $this->view('index', $data);
    }

    public function form()
    {
        $data = [
            'sku' => '',
            'name' => '',
            'price' => '',
            'type' => '',
            'atributes' => '',
            'error' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'sku' => trim($_POST['sku']),
                'name' => trim($_POST['name']),
                'price' => trim($_POST['price']),
                'type' => trim($_POST['type']),
                'atributes' => $this->getAtributeData(),
                'error' => ''
            ];

            // if (empty($data['sku'])) {
            //     $data['error'] = 'Please, submit required data';
            // }
            // if (empty($data['name'])) {
            //     $data['error'] = 'Please, submit required data';
            // }
            // if (empty($data['price'])) {
            //     $data['error'] = 'Please, submit required data';
            // }
            // if (empty($data['atributes'])) {
            //     $data['error'] = 'Please, submit required data';
            // }

            if (empty($data['error'])) {
                if ($this->productModel->addProduct($data)) {
                    header("Location: " . URLROOT . "products/index");
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('form', $data);
            }
        }

        $this->view('form', $data);
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
