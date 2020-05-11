<?php
session_start();

class Controller_User extends Controller
{
	
	public function __construct() {
		if(!$this->getSession('userId')){
            $this->action_redirect('home');
        }
        $this->model = new Model_User();
        $this->view = new View();
	}

	function action_index()
	{
		$userId = $this->getSession('userId');
		$data1 = $this->model->findUserName($userId);
		$data2 = $this->model->getData($userId);

		$this->view->createView('userView.php', $data1, $data2);
	}

	public function action_logout(){

		session_destroy();
		$this->action_redirect('home');

	}
	
	public function action_addattr() {
		$attrName = '';
		$errorVal = '';

		if(isset($_POST['add'])) { 
			$attrName = $this->sanitize($_POST['attribute']);
			$attrValue = $this->sanitize($_POST['attrValue']);
			$userId = $this->getSession('userId');
	
			if(empty($attrName)) {
				$errorAttr = 'Please, fill in attribute field';
				$data3 = $errorAttr;
			} else if(empty($attrValue)) {
				$errorVal = 'Please, fill in value field';
				$data4 = $errorVal;
			}
			if(empty($errorAttr) && empty($errorVal)) {
				if($this->model->insertAttr($userId, $attrName, $attrValue)) {
					$this->action_redirect('user');
				}
			} else {
				$data1 = $this->model->findUserName($userId);
				$data2 = $this->model->getData($userId);
				$this->view->createView('userView.php', $data1, $data2, $data3, $data4);
			}
		}		
	}

	public function action_updateAttr() {
		if(isset($_POST['update'])) {

			foreach($_POST['hiddenId'] as $attrId) {
				$attrName = $this->sanitize($_POST['attrName'][$attrId]);
				$attrValue = $this->sanitize($_POST['attrVal'][$attrId]);

				if($this->model->updateAttr($attrName, $attrValue, $attrId)) {
					$this->action_redirect('user');
				} else  {
					$this->action_redirect('404');
				}
			}

		} else if(isset($_POST['delete'])) {
			foreach($_POST['deleteId'] as $attrId) {

				if($this->model->deleteAttr($attrId)) {
					$this->action_redirect('user');
				} else  {
					$this->action_redirect('404');
				}
			}

		}
	}

}
