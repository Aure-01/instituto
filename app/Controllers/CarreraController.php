<?php

namespace App\Controllers;

use App\Models\CarrerasModel;

class CarreraController extends BaseController
{
    public function index()
    {
        $carreraModel = new CarrerasModel();
        $data['carreras'] = $carreraModel->paginate(15);
        $data['pager'] = $carreraModel->pager;
        return view('carreras/index', $data);
    }

    public function crear()
    {
        return view('carrera/crear');
    }

    public function registrar()
    {
        $carreraModel = new CarrerasModel();

        $carreraModel->insert([
            'clave' => $this->request->getPost('clave'),
            'nombre' => $this->request->getPost('nombre'),
            'nivel' => $this->request->getPost('nivel'),
            'status' => $this->request->getPost('status')
        ]);

        session()->setFlashdata('success', 'La carrera fue registrada');

        return redirect()->to(base_url('/Carreras/index'));
    }
    public function editar($id)
    {

        $carreraModel = new CarrerasModel();
        $carreraModel->where('id_carrera',$id);
        $data['carrera'] = $carreraModel->find();
        return view('Carreras/editar', $data);
    }

    public function actualizar($id)
    {
        $carreraModel = new CarrerasModel();
        echo $this->request->getPost('status');
        $estado=0;
        if( $this->request->getPost('status')=="on"){$estado=1;}
        $carreraModel->set([
            //datos que se van a actualizar
            'clave' => $this->request->getPost('clave'),
            'nombre' => $this->request->getPost('nombre'),
            'nivel' => $this->request->getPost('nivel'),
            'status' => $estado
        ]);
        $carreraModel->where('id_carrera',$id);//condicion de la consulta
        $carreraModel->update();//accion

        session()->setFlashdata('success', 'La carrera fue actualizada');

        return redirect()->to(base_url('/Carreras/index'));//
    }

    public function eliminar($id)
    {
        $carreraModel = new CarrerasModel();
        $carreraModel->delete($id);
        session()->setFlashdata('success', 'La carrera fue eliminada');
        return redirect()->to(base_url('/Carreras/index'));
    }

}