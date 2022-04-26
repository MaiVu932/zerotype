<?php

include 'db.php';

class PostRepo extends Database 
{

    public function approveAgree($id)
    {
        $post = [
            'status' => 1
        ];
        $this->update('posts', $post, 'id = "' . $id . '"');
        header('location: approves.php?agree=true');
    }

    public function approveDeny($id)
    {
        $this->delete('posts', 'id = "' . $id . '"');
        header('location: approves.php?deny=true');
    }

    public function postNoApproves()
    {
        $query = "";
        if(isset($_GET['category-id'])) {
            $categoryId = $_GET['category-id'];
            $query = " SELECT users.username,  posts.id, posts.title, posts.content, MONTH(create_at) month, YEAR(create_at) year";
            $query .= " FROM posts, users WHERE posts.user_id = users.id AND posts.status = 0 AND posts.category_id = " . $categoryId;
            return $this->get_data($query);
        
        }
        $query = " SELECT users.username,  posts.id, posts.title, posts.content, MONTH(create_at) month, YEAR(create_at) year";
        $query .= " FROM posts, users WHERE posts.user_id = users.id AND posts.status = 0 ";
        return $this->get_data($query);
    }

    public function validate()
    {
        if(isset($_GET['delete']) && $_GET['delete'] == 'true') {
            echo '<script>alert("Delete your post success !")</script>';
        }
        if(isset($_GET['update']) && $_GET['update'] == 'true') {
            echo '<script>alert("Update your post success !")</script>';
        }
        if(isset($_GET['agree']) && $_GET['agree'] == 'true') {
            echo '<script>alert("Approval  success !")</script>';
        }
        if(isset($_GET['deny']) && $_GET['deny'] == 'true') {
            echo '<script>alert("Deny success !")</script>';
        }
    }

    public function deleteByIdPost($id)
    {
        $this->delete('posts', 'id = "' . $id . '"');
        header('location: post_list.php?delete=true');
    }

    public function updateByIdPost($data, $id)
    {
        $post = [
            'category_id' => $data['sl-category'],
            'title' => $data['txt-title'],
            'content' => $data['txt-content'],
            'create_at' => date("Y-m-d")
        ];
        $this->update('posts', $post, 'id = "' . $id . '"');
        header('location: post_list.php?update=true');
    }

    public function postByIdUser($id)
    {
        $query = "SELECT id, title, content, status, MONTH(create_at) month, YEAR(create_at) year FROM posts WHERE user_id = '" . $id . "' ;";
        return $this->get_data($query);
    }

    public function categoris()
    {
        $query = "SELECT * FROM categories";
        return $this->get_data($query);
    }

    public function create($data, $userId)
    {
        $post = [
            'user_id' => $userId,
            'category_id' => $data['sl-category'],
            'title' => $data['txt-title'],
            'content' => $data['txt-content'],
            'create_at' => date("Y-m-d")
        ];
        $isInsert = $this->insert('posts', $post);
        if(!$isInsert) {
            echo '<script>alert("Create new post fail !")</script>';
            return;
        }
        header('location: ./post_list.php?status=true');
        return;
        // echo '<script>alert("Create new post fail !")</script>';

    }

    public function posts()
    {
       $query = "";
        if(isset($_GET['category-id'])) {
            $categoryId = $_GET['category-id'];
            $query = " SELECT * FROM posts WHERE category_id = " . $categoryId;
            return $this->get_data($query);
        
        }
        $query = " SELECT* FROM posts";
        return $this->get_data($query);
    }

    public function postPage()
    {
        // $_GET['page'] = null;
        // $num = count($this->posts());
        // $page_current = 1;
        if(isset($_GET['page'])) {
            $page_current = (int)$_GET['page'];
            $start = ($page_current - 1) * 5;
            $query = "";
            if(isset($_GET['category-id'])) {
                $categoryId = $_GET['category-id'];
                $query = " SELECT users.username,  posts.id, posts.title, posts.content, MONTH(create_at) month, YEAR(create_at) year";
                $query .= " FROM posts, users WHERE posts.user_id = users.id AND posts.status = 1 AND posts.category_id = " . $categoryId;
                $query .= "  ORDER BY create_at DESC LIMIT 5 OFFSET " . $start ;
                return $this->get_data($query);
            }

            $query = " SELECT users.username,  posts.id, posts.title, posts.content, MONTH(create_at) month, YEAR(create_at) year";
            $query .= " FROM posts, users WHERE posts.user_id = users.id AND posts.status = 1 ORDER BY create_at DESC LIMIT 5 OFFSET " . $start ;
            return $this->get_data($query);
        }

        if(isset($_GET['category-id'])) {
            $categoryId = $_GET['category-id'];
            $query = " SELECT users.username,  posts.id, posts.title, posts.content, MONTH(create_at) month, YEAR(create_at) year";
            $query .= " FROM posts, users WHERE posts.user_id = users.id AND posts.status = 1 AND posts.category_id = " . $categoryId;
            $query .= " ORDER BY create_at DESC LIMIT 5 OFFSET 0";
            return $this->get_data($query);
        }

        $query = " SELECT users.username,  posts.id, posts.title, posts.content, MONTH(create_at) month, YEAR(create_at) year";
        $query .= " FROM posts, users WHERE posts.user_id = users.id AND posts.status = 1 ORDER BY create_at DESC LIMIT 5 OFFSET 0 ";
        return $this->get_data($query);
        
    }


    public function postByIdPost(int $id)        
    {
        $query = " SELECT categories.id c_id, categories.name c_name, posts.status, users.username,  posts.id, MONTH(create_at) month, YEAR(create_at) year, posts.content, posts.title";
        $query .= " FROM posts, users, categories WHERE posts.user_id = users.id AND posts.id = $id AND categories.id = posts.category_id  ";
        return $this->get_data($query)[0];
    }

}