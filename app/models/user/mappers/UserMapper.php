<?php

require_once __DIR_ROOT.'/core/Database.php';

class UserMapper {

    private $db;

    public function __construct() {    
        $this->db = new Database;
    }

	public function register($data) {

		$this->db->query('INSERT INTO user (userName, userEmail, UserId, userPassword)
			VALUES (:name, :email, :id, :password)');

		$this->db->bind(':name', $data['userName']);
		$this->db->bind(':email', $data['userEmail']);
		$this->db->bind(':id', $data['userId']);
		$this->db->bind(':password', $data['userPassword']);

		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}

	public function login($nameOrEmail, $password){
        $row = $this->findUserByEmailOrUsername($nameOrEmail, $nameOrEmail);

        if($row == false) return false;

        $hashedPassword = $row->userPassword;

        if(password_verify($password, $hashedPassword)){
            return $row;
        }else{
            return false;
        }
    }

	public function findUserByEmailOrUsername($email, $username){
        $this->db->query('SELECT * FROM user WHERE userId = :username OR userEmail = :email');
        $this->db->bind(':username', $username);
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        //Check row
        if($this->db->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

} 