<?php

class EmpresaModel extends Model{
    private $emp_id;
    private $emp_nombre;
    private $emp_sector;
    private $emp_tipo;
    private $emp_correo;
    private $emp_telefono;
    private $emp_logo;
    private $emp_region;
    private $emp_provincia;
    private $emp_distrito;
    private $emp_direccion;

    public function __construct(){
        parent::__construct();
    }

    public function getEmpresaId(){return $this->emp_id;}
    public function getEmpresaNombre(){return $this->emp_nombre;}
    public function getEmpresaSector(){return $this->emp_sector;}
    public function getEmpresaTipo(){return $this->emp_tipo;}
    public function getEmpresaEmail(){return $this->emp_correo;}
    public function getEmpresaTelefono(){return $this->emp_telefono;}
    public function getEmpresaImagen(){return $this->emp_logo;}
    public function getEmpresaRegion(){return $this->emp_region;}
    public function getEmpresaProvincia(){return $this->emp_provincia;}
    public function getEmpresaDistrito(){return $this->emp_distrito;}
    public function getEmpresaDireccion(){return $this->emp_direccion;}

    public function setEmpresaNombre($emp_nombre){$this->emp_nombre = $emp_nombre;}
    public function setEmpresaSector($emp_sector){$this->emp_sector = $emp_sector;}
    public function setEmpresaTipo($emp_tipo){$this->emp_tipo = $emp_tipo;}
    public function setEmpresaEmail($emp_correo){$this->emp_correo = $emp_correo;}
    public function setEmpresaTelefono($emp_telefono){$this->emp_telefono = $emp_telefono;}
    public function setEmpresaImagen($emp_logo){$this->emp_logo = $emp_logo;}
    public function setEmpresaRegion($emp_region){$this->emp_region = $emp_region;}
    public function setEmpresaProvincia($emp_provincia){$this->emp_provincia = $emp_provincia;}
    public function setEmpresaDistrito($emp_distrito){$this->emp_distrito = $emp_distrito;}
    public function setEmpresaDireccion($emp_direccion){$this->emp_direccion = $emp_direccion;}

    function updateEmpresa(){
        try{
            $query = $this->prepare('UPDATE empresa SET emp_nombre = :emp_nombre, emp_sector = :emp_sector, emp_tipo = :emp_tipo, 
            emp_correo = :emp_correo, emp_telefono = :emp_telefono, emp_logo = :emp_logo WHERE emp_id = :emp_id');
            $query->execute([
                'emp_id' => 1,
                'emp_nombre' => $this->emp_nombre,
                'emp_sector' => $this->emp_sector,
                'emp_tipo' => $this->emp_tipo,
                'emp_correo' => $this->emp_correo,
                'emp_telefono' => $this->emp_telefono,
                'emp_logo' => $this->emp_logo

                ]);
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

    function updateEmpresaDireccion(){
        try{
            $query = $this->prepare('UPDATE empresa SET emp_region = :emp_region, emp_provincia = :emp_provincia, emp_distrito = :emp_distrito, 
            emp_direccion = :emp_direccion WHERE emp_id = :emp_id');
            $query->execute([
                'emp_id' => 1,
                'emp_region' => $this->emp_region,
                'emp_provincia' => $this->emp_provincia,
                'emp_distrito' => $this->emp_distrito,
                'emp_direccion' => $this->emp_direccion
                ]);
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

    function getEmpresa(){
        try{
            $query = $this->prepare('SELECT * FROM empresa WHERE emp_id = :emp_id');
            $query->execute([ 'emp_id' => 1]);
            $empresa = $query->fetch(PDO::FETCH_ASSOC);
            
            $this->emp_id = $empresa['emp_id'];
            $this->emp_nombre = $empresa['emp_nombre'];
            $this->emp_sector = $empresa['emp_sector'];
            $this->emp_tipo = $empresa['emp_tipo'];
            $this->emp_correo = $empresa['emp_correo'];
            $this->emp_telefono = $empresa['emp_telefono'];
            $this->emp_logo = $empresa['emp_logo'];
            $this->emp_region = $empresa['emp_region'];
            $this->emp_provincia = $empresa['emp_provincia'];
            $this->emp_distrito = $empresa['emp_distrito'];
            $this->emp_direccion = $empresa['emp_direccion'];
            
            return $this;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

}

?>