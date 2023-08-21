<?php

require_once __DIR_ROOT.'/core/Database.php';

class UserMapper {

    private $db;

    public function __construct() {    
        $this->db = new Database;
    }

	public function register($data) {

		$this->db->query('INSERT INTO user (userName, userEmail, UserId, userPassword)
			VALUES (:userName, :userEmail, :UserId, :userPassword)');

		$this->db->bind(':userName', $data['userName']);
		$this->db->bind(':userEmail', $data['userEmail']);
		$this->db->bind(':UserId', $data['userId']);
		$this->db->bind(':userPassword', $data['userPassword']);

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

        if (password_verify($password, $hashedPassword)) {

			if (isset($_POST['remember-me'])) {

				$token = bin2hex(random_bytes(16));
				
				$this->storeRememberMeToken($row->userId, $token);
			}
			return $row;
		}else{
            return false;
        }
    }

	public function findUserByEmailOrUsername($email, $userName){

        $this->db->query('SELECT * FROM user WHERE userId = :userName OR userEmail = :userEmail');
        $this->db->bind(':userName', $userName);
        $this->db->bind(':userEmail', $email);

        $row = $this->db->single();

        //Check row
        if($this->db->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

	public function storeRememberMeToken($userId, $token) {

		$this->db->query('UPDATE user SET rememberMeToken = :token WHERE userId = :userId');
		$this->db->bind(':token', $token);
		$this->db->bind(':userId', $userId);
	
		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}

	public function getRemeberMeToken($userId) {
		
		$this->db->query('SELECT rememberMeToken FROM user WHERE userId = :userId');
		$this->db->bind(':userId', $userId);

		$row = $this->db->single();

		if($this->db->rowCount() > 0){

            return $row;
        }else{
            return false;
        }
	}

	public function checkRememberMeToken($identifier, $token) {
		$this->db->query('SELECT rememberMeToken FROM user WHERE userId = :identifier OR userEmail = :identifier');
		$this->db->bind(':identifier', $identifier);
	
		$row = $this->db->single();
	
		if ($row && $row->rememberMeToken === $token) {
			return true;
		} else {
			return false;
		}
	}

	public function removeRememberMeToken($userId) {
		$this->db->query('UPDATE user SET rememberMeToken = NULL WHERE userId = :userId');
		$this->db->bind(':userId', $userId);
		
		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}
} 