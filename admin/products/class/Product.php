<?php

class Product
{
    public $id = "";
    private $db = null;
    public $productname = "";
    public $description = "";
    public $image1 = "";
    public $image2 = "";
    public $image3 = "";
    public $quantity = "";
    public $regular_price = "";
    public $sell_price = "";
    public $product_size = "";
    public $product_color = "";
    public $category = "";
    //public $subcategory = "";
    public $status = "";
    public $brand = "";

    public function __construct($data = null, $db = null)
    {
        $this->productname = $data['productname'] ?? null;
        $this->description = $data['description'] ?? null;
        $this->quantity = $data['quantity'] ?? null;
        $this->regular_price = $data['regular-price'] ?? null;
        $this->sell_price = $data['sell-price'] ?? null;
        $this->category = $data['category'] ?? null;
       // $this->subcategory = $data['subcategory'] ?? null;
        $this->product_size = $data['product-size'] ?? null;
        $this->product_color = $data['product-color'] ?? null;
        $this->image1 = $data['image1'] ?? null;
        $this->image2 = $data['image2'] ?? null;
        $this->image3 = $data['image3'] ?? null;
        $this->status = $data['status'] ?? null;
        $this->brand = $data['brand'] ?? null;

        $this->db = $db;
    }

    public function save(): Product
    {
        $sql = "INSERT INTO product (name, description, image1, image2, image3, quantity, regular_price, sell_price,
            product_size, product_color, category, status, brand)
            VALUES ('$this->productname', '$this->description', '$this->image1', '$this->image2', '$this->image3', '$this->quantity',
            '$this->regular_price', '$this->sell_price', '$this->product_size', '$this->product_color', '$this->category',
              '$this->status', '$this->brand')";
           echo $sql;

        if ($this->db->query($sql) === false) {
            throw new Exception($this->db->error);
        }

        $id = $this->db->insert_id;
        return self::find($id, $this->db);
    }

    public static function find($id, $db): Product
    {
        $sql = "SELECT * FROM product WHERE id = '$id'";
        //echo $sql;die;
        $self = new static(null, $db);
        $res = $self->db->query($sql);

        if ($res->num_rows < 1) {
            return false;
        }

        $self->populateObject($res->fetch_object());
        return $self;
    }

    public static function findAll($db): array
    {
        $sql = "SELECT * FROM product ORDER BY id DESC";
        $products = [];
        $self = new static(null, $db);
        $res = $self->db->query($sql);

        if ($res->num_rows < 1) {
            return [];
        }

        while ($row = $res->fetch_object()) {
            $product = new static(null, $db);
            $product->populateObject($row);
            $products[] = $product;
        }

        return $products;
    }

    public function update($id): Product
    {
        $sql = "UPDATE product SET name = '$this->productname', description = '$this->description', image1 = '$this->image1', image2 = '$this->image2', image3 = '$this->image3', quantity = '$this->quantity',
            regular_price = '$this->regular_price', sell_price = '$this->sell_price', product_size = '$this->product_size', product_color = '$this->product_color', category = '$this->category',
            status = '$this->status', brand = '$this->brand' WHERE id = '$id'";

           // echo $sql;die;

        if ($this->db->query($sql) === false) {
            throw new Exception($this->db->error);
        }

        return self::find($id, $this->db);
    }

    public static function delete($id, $db): bool
    {
        $sql = "DELETE FROM product WHERE id = '$id'";
        $self = new static(null, $db);
        return $self->db->query($sql);
    }

    public function populateObject($object): void
    {
        foreach ($object as $key => $value) {
            $this->$key = $value;
        }
    }
}
