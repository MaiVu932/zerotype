<?php

include 'db.php';

class PostRepo extends Database 
{
    public function posts()
    {
        $query = " SELECT users.name,  post.id, post.title, post.description, MONTH(create_at) month, YEAR(create_at) year";
        $query .= " FROM post, users WHERE post.user_id = users.id ";
        return $this->get_data($query);
    }


    public function postByIdPost(int $id)        
    {
        $query = " SELECT users.name,  post.id, MONTH(create_at) month, YEAR(create_at) year, post.content, post.title, post.description";
        $query .= " FROM post, users WHERE post.user_id = users.id AND post.id = $id LIMIT 1  ";
        return $this->get_data($query)[0];
    }

}