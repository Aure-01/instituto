<?php
namespace App\Models;
use CodeIgniter\Model;
class EstudiantesModel extends Model
{
    protected $table = 'estudiante';
    protected $primary_key = 'id_estudiante';
    protected $useAutoIncrement = true;
    protected $returnType        = 'object'; #EL TIPO DE RETORNO QUE TIENE
    protected $useTimestamps     = false; # NO RELLENA POR DEFECTO LOS NULOS
    protected $useSoftDeletes   = false;
    protected $allowedFields = [
        'nombres', 'apaterno', 'amaterno', 'status', 'fk_idcarrera'
    ];

    public function leerEstudiantes()
    {
        $db = \db_connect();
        $consulta = $db->query('SELECT * from estudiante as e inner join carrera as c on(c.id_carrera = e.fk_idcarrera)
        where e.status = 1
        GROUP BY id_estudiante');
        return $consulta;
    }
    public function borrarEstudiante($id)
    {
        $db = \db_connect();
        $borrar = $db->query('UPDATE `estudiante` SET `status` = 0 WHERE`id_estudiante` = '.$id);
        return $borrar;
    }
}