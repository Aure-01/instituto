<?php
namespace App\Models;
use CodeIgniter\Model;
class CarrerasModel extends Model
{
    protected $table = 'carrera';
    protected $primary_key = 'id_carrera';
    protected $useAutoIncrement = true;
    protected $returnType        = 'object'; #EL TIPO DE RETORNO QUE TIENE
    protected $useTimestamps     = false; # NO RELLENA POR DEFECTO LOS NULOS
    protected $useSoftDeletes   = false;
    protected $allowedFields = [
        'clave', 'nombre', 'nivel', 'status'
    ];
    public function leerCarreras()
    {
        $db = \db_connect();
        $consulta = $db->query('SELECT * FROM `carrera` WHERE `status` = 1 GROUP BY `id_carrera`');
        return $consulta;
    }
    public function borrarCarrera($id)
    {
        $db = \db_connect();
        $borrar = $db->query('UPDATE `carrera` SET `status` = 0 WHERE`id_carrera` = '.$id);
        return $borrar;
    }
}