<?php
class Product
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllProducts()
    {
        $this->db->query("SELECT * FROM products");

        $result = $this->db->resultSet();

        return $result;
    }

    public function addProduct($data)
    {
        $this->db->query('INSERT INTO products (sku, name, price, atribute) VALUES (:sku, :name, :price, :atributes)');

        $this->db->bind(':sku', $data['sku']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':atributes', $data['atribute']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteProduct($id)
    {
        $this->db->query('DELETE FROM products WHERE id = :id');

        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
