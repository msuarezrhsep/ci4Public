<?php
namespace App\Models;
use CodeIgniter\Model;
use Exception;

class Usuarios extends Model{
    protected $table = 'usuario';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ["id","usuario","pass","type"];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;

    public function getUsuario($data) { 
        try{
            return $this->where($data)->findAll();
        }catch(Exception $e){
            die(json_encode(array("status" => 0, "msg" => "Error. ".$e)));
        }  
    }

}