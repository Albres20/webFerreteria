<?php 

/**
* 
*/
class principal extends Controllers
{
	
	function __construct()
	{
		parent::__construct();
	}

	function principal(){
		$userName =  Session::getSession("Usuario");
		if ($userName != ""){
			if ($userName["id_rol"] == 1) {
				//$response = $this->model->getDataModel("*","persona");
				$rol = $userName["id_rol"];
				$this->view->render('', $this, 'principal', $rol);				
			} else {
				if ($userName["id_rol"] == 2) {
					$rol = $userName["id_rol"];
					$this->view->render('', $this, 'principal', $rol);				
				} else {
					if ($userName["id_rol"] == 3) {
						//$response = $this->model->getDataPer_Mat_2("A.nom_persona, A.nom1_persona, A.ape_persona, A.ape1_persona, B.id_perso_mate, C.des_materia", $userName["id_persona"] ,"persona", "perso_x_materia", "materia", "rol");
						$rol = $userName["id_rol"];
						$this->view->render('', $this, 'principal', $rol);
					}
				}	
			}			
		}else{
			header("Location:".URL);
		}
	}
}

?>