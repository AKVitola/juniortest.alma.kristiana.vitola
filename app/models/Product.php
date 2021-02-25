<?php
class Product
{
    protected $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllProducts()
    {
        $this->db->query('SELECT * FROM products');

        $result = $this->db->resultSet();

        return $result;
    }

    public function addProduct($data)
    {
        $this->db->query('INSERT INTO products (sku, name, price, type, atributes) VALUES (:sku, :name, :price, :type, :atributes)');

        $this->db->bind(':sku', $data['sku']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':atributes', $data['atributes']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteProduct($productId)
    {
        $this->db->query("DELETE FROM products WHERE id IN ($productId)");

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
