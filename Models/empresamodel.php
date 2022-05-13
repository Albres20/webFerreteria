<?php

class EmpresaModel extends Model{
    private $empresa_id;
    private $empresa_nombre;
    private $empresa_sector;
    private $empresa_tipo;
    private $empresa_correo;
    private $empresa_telefono;
    private $empresa_logo;
    private $empresa_region;
    private $empresa_provincia;
    private $empresa_distrito;
    private $empresa_direccion;

    public function __construct(){
        parent::__construct();
    }

    public function getEmpresaId(){return $this->empresa_id;}
    public function getEmpresaNombre(){return $this->empresa_nombre;}
    public function getEmpresaSector(){return $this->empresa_sector;}
    public function getEmpresaTipo(){return $this->empresa_tipo;}
    public function getEmpresaEmail(){return $this->empresa_correo;}
    public function getEmpresaTelefono(){return $this->empresa_telefono;}
    public function getEmpresaImagen(){return $this->empresa_logo;}
    public function getEmpresaRegion(){return $this->empresa_region;}
    public function getEmpresaProvincia(){return $this->empresa_provincia;}
    public function getEmpresaDistrito(){return $this->empresa_distrito;}
    public function getEmpresaDireccion(){return $this->empresa_direccion;}

    public function setEmpresaNombre($empresa_nombre){$this->empresa_nombre = $empresa_nombre;}
    public function setEmpresaSector($empresa_sector){$this->empresa_sector = $empresa_sector;}
    public function setEmpresaTipo($empresa_tipo){$this->empresa_tipo = $empresa_tipo;}
    public function setEmpresaEmail($empresa_correo){$this->empresa_correo = $empresa_correo;}
    public function setEmpresaTelefono($empresa_telefono){$this->empresa_telefono = $empresa_telefono;}
    public function setEmpresaImagen($empresa_logo){$this->empresa_logo = $empresa_logo;}
    public function setEmpresaRegion($empresa_region){$this->empresa_region = $empresa_region;}
    public function setEmpresaProvincia($empresa_provincia){$this->empresa_provincia = $empresa_provincia;}
    public function setEmpresaDistrito($empresa_distrito){$this->empresa_distrito = $empresa_distrito;}
    public function setEmpresaDireccion($empresa_direccion){$this->empresa_direccion = $empresa_direccion;}

    function updateEmpresa(){
        try{
            $query = $this->prepare('UPDATE empresa SET empresa_nombre = :empresa_nombre, empresa_sector = :empresa_sector, empresa_tipo = :empresa_tipo, 
            empresa_correo = :empresa_correo, empresa_telefono = :empresa_telefono, empresa_logo = :empresa_logo WHERE empresa_id = :empresa_id');
            $query->execute([
                'empresa_id' => 1,
                'empresa_nombre' => $this->empresa_nombre,
                'empresa_sector' => $this->empresa_sector,
                'empresa_tipo' => $this->empresa_tipo,
                'empresa_correo' => $this->empresa_correo,
                'empresa_telefono' => $this->empresa_telefono,
                'empresa_logo' => $this->empresa_logo

                ]);
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

    function updateEmpresaDireccion(){
        try{
            $query = $this->prepare('UPDATE empresa SET empresa_region = :empresa_region, empresa_provincia = :empresa_provincia, empresa_distrito = :empresa_distrito, 
            empresa_direccion = :empresa_direccion WHERE empresa_id = :empresa_id');
            $query->execute([
                'empresa_id' => 1,
                'empresa_region' => $this->empresa_region,
                'empresa_provincia' => $this->empresa_provincia,
                'empresa_distrito' => $this->empresa_distrito,
                'empresa_direccion' => $this->empresa_direccion
                ]);
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

    function getEmpresa(){
        try{
            $query = $this->prepare('SELECT * FROM empresa WHERE empresa_id = :empresa_id');
            $query->execute([ 'empresa_id' => 1]);
            $empresa = $query->fetch(PDO::FETCH_ASSOC);
            
            $this->empresa_id = $empresa['empresa_id'];
            $this->empresa_nombre = $empresa['empresa_nombre'];
            $this->empresa_sector = $empresa['empresa_sector'];
            $this->empresa_tipo = $empresa['empresa_tipo'];
            $this->empresa_correo = $empresa['empresa_correo'];
            $this->empresa_telefono = $empresa['empresa_telefono'];
            $this->empresa_logo = $empresa['empresa_logo'];
            $this->empresa_region = $empresa['empresa_region'];
            $this->empresa_provincia = $empresa['empresa_provincia'];
            $this->empresa_distrito = $empresa['empresa_distrito'];
            $this->empresa_direccion = $empresa['empresa_direccion'];
            
            return $this;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

}

?>