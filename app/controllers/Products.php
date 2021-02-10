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

    // public function create()
    // {
    // }

    // public function delete($id)
    // {
    // }


    public function form()
    {
        $this->view('form');
    }
}
