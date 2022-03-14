<?php

if(!isset($_SESSION)) { 
    session_start(); 
} 
require_once('db.php');
class User extends Database
{

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
			exit(json_encode(['state' => 'not_match_ext']));
		}

		if( !($file_size <= 500000) )  {
			exit(json_encode(['state' => 'Dung lượng file quá lớn']));
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
        if(!$this->prosessFile()) {
            return 'Uploat file loi';
        }
        $info = [
            'name' => $data['txt-username'],
            'avata' => $this->prosessFile(),
            'password_hash' => password_hash($data['password'], PASSWORD_DEFAULT),
            'password_current' => $data['password'],
            'email' => $data['email'],
            'fullname' => $data['txt-fullname'],
            'gender' => $data['gender'],
            'hobby' => implode('-', $data['hobby'])
        ];

        $isSingUp = $this->insert('users', $info);
        if(!$isSingUp) {
            exit('Loi');
        }
        header('location: login.php');
    }

    public function signIn(array $data)
    {
        $email = $data['email'];
        $password = $data['password'];
        $query = 'SELECT id, name, permission FROM users WHERE email = "' . $email . '" AND password_current = "' . $password . '"' ;
        $infos = $this->get_data($query);

        if(!count($infos)) {
            exit('Dang nhap that bai');
        }
	    $_SESSION['name'] = $data['name'];
	    $_SESSION['id'] = $data['id'];
	    $_SESSION['permission'] = $data['permission'];
        
        echo '<script>alert("Dang nhap thanh cong")</script>';
    }

    





}