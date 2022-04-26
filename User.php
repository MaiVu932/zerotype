<?php

if(!isset($_SESSION)) { 
    session_start(); 
} 
require_once('db.php');
class User extends Database
{

    public function getInfo($id)
    {
        $query = "SELECT * FROM users WHERE id = '" . $id . "'";
       return $this->get_data($query);

    }

    public function edit($data, $id)
    {
        // if(isset($this->prosessFile()['err'])) {
        //     echo '<script>alert("' . $this->prosessFile()['err'] . '")</script>';
        //     return;
        // }
  
        $info = [
            'username' => $data['txt-username'],
            // 'image' => $this->prosessFile(),
            'password_current' => $data['password'],
            'email' => $data['email'],
            'num_phone' => $data['txt-num-phone'],
            'address' => $data['txt-address'],
            'birthday' => $data['date-birthday']
        ];

        $this->update('users', $info, 'id = "'. $id . '"');
        echo '<script>alert("Update success !")</script>';
    }

    /**
     * process upload file avatar
     *
     * @return array
     */
    public function prosessFile()
    {
        if( !isset($_FILES['file-avata']) ) {
			exit(json_encode(['state' => 'File không tồn tại']));
		}
		
		$temp_name = $_FILES['file-avata']['tmp_name'];
		$file_size = $_FILES['file-avata']['size'];
		$type = explode('/', $_FILES['file-avata']['type']);
		$extension = end($type);
		$allowed = ['png', 'jpg', 'jpeg'];
        $fileName = $_FILES['file-avata']['name'];

		if( !in_array($extension, $allowed) ) {
            return ['err' => 'not match extension'];
			// exit(json_encode(['state' => 'not_match_ext']));
		}

		if( !($file_size <= 500000) )  {
            return ['err' => 'Image size is to big'];
			// exit(json_encode(['state' => 'Dung lượng file quá lớn']));
		}
		// bat dau upload
		move_uploaded_file($temp_name, '../images/avata/' . $fileName);
        return $fileName;
    }

    /**
     * sing up
     *
     * @param array $data
     * @return void
     */
    public function signUp(array $data)
    {
        if(isset($this->prosessFile()['err'])) {
            echo '<script>alert("' . $this->prosessFile()['err'] . '")</script>';
            return;
        }
  
        $info = [
            'username' => $data['txt-username'],
            'image' => $this->prosessFile(),
            // 'password_hash' => password_hash($data['password'], PASSWORD_DEFAULT),
            'password_current' => $data['password'],
            'email' => $data['email'],
            'num_phone' => $data['txt-num-phone'],
            'address' => $data['txt-address'],
            'birthday' => $data['date-birthday'],
            'permission' => 0
        ];

        $isSingUp = $this->insert('users', $info);
        if(!$isSingUp) {
            echo '<script> alert("Error") </script>';
        }
        header('location: login.php');
    }

    public function signIn(array $data)
    {
        $email = $data['txt-username'];
        $password = $data['pw-password'];
        $query = 'SELECT * FROM users WHERE password_current = "' . $password . '" ' ;
        $query .= ' AND ( username = "' . $email . '" OR email = "' . $email . '" )';
        $infos = $this->get_data($query);

        if(!count($infos)) {
            echo '<script>Login fail</script>';
            return;
        }
        $_SESSION['user'] = $infos;
        header('location: news.php?login=success');
    }

    





}