<?php

namespace App\Controllers;

use App\Models\EspecialidadModel;
use App\Models\CarrerasModel;

class EspecialidadController extends BaseController
{
    public function editar($id)
    {
        $especialidadModel = new EspecialidadModel();
        $carreraModel = new CarrerasModel();
        $data['Carreras'] = $carreraModel->findAll();
        $data['especialidad'] = $especialidadModel->find($id);
        return view('Especialidad/editar', $data);
    }

    public function actualizar($id)
    {
        $especialidadModel = new EspecialidadModel();
        echo $this->request->getPost('status');
        $estado=0;
        if( $this->request->getPost('status')=="on"){$estado=1;}
        $especialidadModel->set([
            //datos que se van a actualizar
            'nombre' => $this->request->getPost('nombre'),
            'fk_idcarrera' => $this->request->getPost('fk_idcarrera'),
            'status' => $estado
        ]);
        $especialidadModel->where('id_especialidad',$id);//condicion de la consulta
        $especialidadModel->update();//accion

        session()->setFlashdata('success', 'La Especialidad fue actualizada');

        return redirect()->to(base_url('/Especialidad/index'));//
    }
}