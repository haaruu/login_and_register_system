<?php
// Initialize the session
session_start();
 
class Controller_Home extends Controller
{

	function __construct()
    {
		if($this->getSession('userId')){ //if user is logined, he will be redirected on his/her page
            $this->action_redirect('user');
        }
        $this->model = new Model_Home();
        $this->view = new View();
	}
	
	
	function action_index() {	
		$this->view->createView('homeView.php', $data1);
	}

	public function action_signUp() {

		$errorName = '';
		$errorEmail = '';
		$errorPassword = '';
		$actionMessage = '';

		if(isset($_POST['signup'])) { 
			$name = $this->sanitize($_POST['name']);
			$password = $this->sanitize($_POST['password']);
			$email = $this->sanitize($_POST['email']);

			if(empty($name)) {
				$errorName = 'Please, fill in name field';
				$data3 = $errorName;
			} 
			else if(empty($email)) {
				$errorEmail = 'Please, fill in email field';
				$data4 = $errorEmail;
			} 
			else if(!$this->model->checkEmail($email)) {
				$errorEmail = 'This email is already exist';
				$data4 = $errorEmail;
			}
			else if(empty($password)) {
				$errorPassword = 'Please, fill in password field';
				$data5 = $errorPassword;
			}
			else if(strlen($password) <6) {
				$errorPassword = 'Password must contain at least 6 characters';
				$data5 = $errorPassword;
			}

			if(empty($errorName) && empty($errorEmail) && empty($errorPassword)) {
				$password = password_hash($password, PASSWORD_DEFAULT);
				$this->model->insertData('users', 'name, password, email', $name."','".$password."','".$email);
				$actionMessage = "Your account has been created successfully, you can login now";
				$data6 = $actionMessage;
				$this->view->createView('homeView.php', $data1, $data2, $data3, $data4, $data5, $data6);
			} else {
				$this->view->createView('homeView.php', $data1, $data2, $data3, $data4, $data5);

			}
		}
		
	}

	public function action_login() {
		$errorName = '';
		$errorPassword = '';

		if(isset($_POST['login'])) { 
			$email = $this->sanitize($_POST['email']);
			$password = $this->sanitize($_POST['password']);

			if(empty($email)) {
				$errorEmail = 'Please, fill in email field';
				$data1 = $errorEmail;
			} 
			else if(empty($password)) {
				$errorPassword = 'Please, fill in password field';
				$data2 = $errorPassword;
			}

			if(empty($errorEmail) && empty($errorPassword)) {

				$result = $this->model->findInDb($email, $password);
				if($result['status'] === 'emailNotFound'){
					$errorEmail = 'Invalid email';
					$data1 = $errorEmail;
					$this->view->createView('homeView.php', $data1, $data2);
        	    } else if($result['status'] === 'passwordNotMacthed'){
					$errorPassword = 'Invalid password';
					$data2 = $errorPassword;
					$this->view->createView('homeView.php', $data1, $data2);
        	    } else if($result['status'] === "ok"){
					$this->setSession('userId', $result['data']);
					$this->action_redirect('user');
        	    }			
			} else {
				$this->view->createView('homeView.php', $data1, $data2);
			}
		}
	}	

}