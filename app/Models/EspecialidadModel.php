<?php
namespace App\Models;
use CodeIgniter\Model;
class EspecialidadModel extends Model
{
    protected $table = 'especialidad';
    protected $primaryKey = 'id_especialidad';
    protected $useAutoIncrement = true;
    protected $returnType        = 'object'; #EL TIPO DE RETORNO QUE TIENE
    protected $useTimestamps     = false; # NO RELLENA POR DEFECTO LOS NULOS
    protected $useSoftDeletes   = false;
    protected $allowedFields = [
        'nombre',  
        'status',
        'fk_idcarrera'
    ];
    public function leerEspecialidad()
    {
        $db = \db_connect();
        $consulta = $db->query('SELECT * FROM `especialidad` WHERE `status` = 1 GROUP BY `id_especialidad`');
        return $consulta;
    }
    public function borrarEspecialidad($id)
    {
        $db = \db_connect();
        $borrar = $db->query('UPDATE `especialidad` SET `status` = 0 WHERE`id_especialidad` = '.$id);
        return $borrar;
    }
}