<?php
declare (strict_types=1);
    class Roles extends Connection
    {
        public function __construct()
        {
            parent::__construct();
        }
        public function setRoles()
        {
            try{
                $this->db->pdo->beginTransaction();
                $listRoles = array("caja","logistica","admin");
                $where = " WHERE role = :role";
                foreach ($listRoles as $key => $value){
                    $roles = $this->db->Select1("role", "usuarios", $where, array(":role" => $value));
                    if (is_array($roles)){
                        if (0 == count($roles["results"])){
                            $query = "INSERT INTO usuarios (role) VALUES (:role)";
                            $sth = $this->db->pdo->prepare($query);
                            $sth -> execute((array)$this->UserRoles(array($value))); 
                        }
                    } else{
                        break;
                        return $roles;
                    }   
                }
                $this->db->pdo->commit();
            } catch(\Throwable $th){
                $this->db->pdo->rollBack();
                return $th -> getMessage();
            }
        }

        public function UserRoles(array $array){
            return new class($array){
                var $role;
                function __construct($array){
                    if(0 < count($array)){
                        $this->role = $array[0];
                    }
                }
            };
        }
    }
?>