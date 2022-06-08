<?php

namespace App\Controllers;

use App\Models\EstudiantesModel;

class EstudianteController extends BaseController
{
    public function index()
    {
        $estudianteModel = new EstudiantesModel();
        $data['estudiantes'] = $estudianteModel->paginate(15);
        $data['pager'] = $estudianteModel->pager;
        return view('Estudiante/index', $data);
    }

    public function crear()
    {
        return view('Estudiante/crear');
    }

    public function registrar()
    {
        $estudianteModel = new EstudiantesModel();

        $estudianteModel->insert([
            'nombres' => $this->request->getPost('nombres'),
            'apaterno' => $this->request->getPost('apaterno'),
            'amaterno' => $this->request->getPost('amaterno'),
            'status' => $this->request->getPost('status')
        ]);

        session()->setFlashdata('success', 'La carrera fue registrada');

        return redirect()->to(base_url('estudiantes'));
    }
    public function editar($id)
    {
        $estudianteModel = new EstudiantesModel();
        $estudianteModel->where('id_estudiante',$id);
        $data['estudiante'] = $estudianteModel->find();
        return view('Estudiantes/editar', $data);
    }

    public function actualizar($id)
    {
        $estudianteModel = new EstudiantesModel();
        echo $this->request->getPost('status');
        $estado=0;
        if( $this->request->getPost('status')=="on"){$estado=1;}
        $estudianteModel->set([
            'nombres' => $this->request->getPost('nombres'),
            'apaterno' => $this->request->getPost('apaterno'),
            'amaterno' => $this->request->getPost('amaterno'),
            'status' => $estado
        ]);

        $estudianteModel->where('id_estudiante',$id);//condicion de la consulta
        $estudianteModel->update();//accion
        session()->setFlashdata('success', 'El estudiante fue actualizada');

        return redirect()->to(base_url('Estudiantes/index'));
    }

    public function eliminar($id)
    {
        $estudianteModel = new EstudiantesModel();
        $estudianteModel->delete($id);
        session()->setFlashdata('success', 'El estudiante fue eliminada');
        return redirect()->to(base_url('estudiantes'));
    }
}