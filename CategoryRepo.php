<?php

include 'db.php';

class CategoryRepo extends Database 
{
    public function add($data)
    {
        $category = [
            'name' => $data['txt-name'],
            'description' => $data['txt-description']
        ];
        $this->insert('categories', $category);
        echo '<script>alert("Add category success !")</script>';
    }

    public function categoris()
    {
        $query = "SELECT * FROM categories";
        return $this->get_data($query);
    }

} 