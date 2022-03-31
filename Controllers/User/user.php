<?php 

/**
* 
*/
class user extends Controllers
{
	
	function __construct()
	{
		parent::__construct();	
	}

	function userLogin(){
		if (isset($_POST["username"]) && isset($_POST["password"])) {
			if (trim($_POST["username"]) != "" && trim($_POST["password"]) != "") {
				$response = $this->model->userLogin('*', "usuarios", "username = '" .$_POST["username"]. "'");
				$response = $response[0];

				if ($response["password"] == $_POST["password"]) {
					$this->createSession($response);
					echo 1;
				}
			}else{
				echo 0;
			}
		}
	}

	function createSession($user){
		Session::setSession('Usuario',$user);
	}

	function destroySession(){
		Session::destroySession();
		header("Location:".URL);
	}
}

?>