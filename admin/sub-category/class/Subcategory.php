<?php

class Subcategory
{
    public $id = null;
    private $db = null;
    public $subcategory = '';
    public $category = '';

    public function __construct($data = null, $db = null)
    {
        $this->subcategory = $data['subcategory'] ?? null;
        $this->category = $data['category'] ?? null;
        $this->db = $db;
    }

    public function save(): Subcategory
    {
        $sql = "INSERT INTO subcategory (name, category) VALUES ('$this->subcategory', '$this->category')";

        if ($this->db->query($sql) === false) {
            throw new Exception($this->db->error);
        }

        $id = $this->db->insert_id;
        return self::find($id, $this->db);
    }

    public static function find($id, $db): Subcategory
    {
        $sql = "SELECT * FROM subcategory WHERE id = '$id'";
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
        $sql = "SELECT * FROM subcategory ORDER BY id DESC";
        $subcategories = [];
        $self = new static(null, $db);
        $res = $self->db->query($sql);

        if ($res->num_rows < 1) {
            return [];
        }

        while ($row = $res->fetch_object()) {
            $subcategory = new static(null, $db);
            $subcategory->populateObject($row);
            $subcategories[] = $subcategory;
        }

        return $subcategories;
    }

    public function update($id): Subcategory
    {
        $sql = "UPDATE subcategory SET name = '$this->subcategory', category = '$this->category' WHERE id = '$id'";

        if ($this->db->query($sql) === false) {
            throw new Exception($this->db->error);
        }

        return self::find($id, $this->db);
    }

    public static function delete($id, $db): bool
    {
        $sql = "DELETE FROM subcategory WHERE id = '$id'";
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