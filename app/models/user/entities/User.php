<?php

	class User {

		private $userName;
		private $userEmail;
		private $userId;
		private $userPassword;

		public function getUserName() {
			return $this->userName;
		}

		public function setUserName($userName) {
			$this->userName = $userName;
		}

		public function getUserEmail() {
			return $this->userEmail;
		}

		public function setUserEmail($userEmail) {
			$this->userName = $userEmail;
		}

		public function getUserId() {
			return $this->userId;
		}

		public function setUserId($userId) {
			$this->userId = $userId;
		}

		public function getUserPassword() {
			return $this->userPassword;
		}

		public function setUserPassword($userPassword) {
			$this->userPassword = $userPassword;
		}

	}