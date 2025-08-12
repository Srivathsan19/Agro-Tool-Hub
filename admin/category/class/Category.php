<?php

class Category
{
    public $id = null;
    private $db = null;
    public $category = '';

    public function __construct($data = null, $db = null)
    {
        $this->category = $data['category'] ?? null;
        $this->db = $db;
    }

    public function save(): Category
    {
        $sql = "INSERT INTO category (catname) VALUES ('$this->category')";
       

        if ($this->db->query($sql) === false) {
            throw new Exception($this->db->error);
        }

        $id = $this->db->insert_id;
        echo $id;die;
        return self::find($id, $this->db);
    }

    public static function find($id, $db): Category
    {
        $sql = "SELECT * FROM category WHERE id = '$id'";
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
        $sql = "SELECT * FROM category ORDER BY id DESC";
        $categories = [];
        $self = new static(null, $db);
        $res = $self->db->query($sql);

        if ($res->num_rows < 1) {
            return [];
        }

        while ($row = $res->fetch_object()) {
            $category = new static(null, $db);
            $category->populateObject($row);
            $categories[] = $category;
        }

        return $categories;
    }

    public function update($id): Category
    {
        $sql = "UPDATE category SET catname = '$this->category' WHERE id = '$id'";

        if ($this->db->query($sql) === false) {
            throw new Exception($this->db->error);
        }

        return self::find($id, $this->db);
    }

    public static function delete($id, $db): bool
    {
        $sql = "DELETE FROM category WHERE id = '$id'";
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
