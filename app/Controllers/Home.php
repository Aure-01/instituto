<?php

namespace App\Controllers;
use App\Models\CarrerasModel;
use App\Models\EstudiantesModel;
use App\Models\EspecialidadModel;
class Home extends BaseController
{
    public function index()
    {
        return view('/plantilla');
    }
    public function view($page = 'inicio')
    {
        //Este if checha si la vista existe, si no muesta un mensaje de error,
        // podemos diseñar una vista para que muestre el error, en lugar del error que muestra codeigniter
        if (!is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        echo view('pages/head'); //carga el head de neustro HTML, aqui estan todos los links para CSS y scripts de JS 
        echo view('pages/navbar'); // carga el munu de navegacion de nuestra app
        echo view('pages/' . $page); // carga el contenido que tenemos en nuestra app
        echo view('pages/footer'); // carga el pie de pagina de la app
    }
    //===========================================INICIO DE ESTUDIANTES============================================================
    public function Estudiantes()
    {
        $estudianteModel = new EstudiantesModel();
        $datos['Estudiantes'] = $estudianteModel->leerEstudiantes();
        return view('Estudiantes/index', $datos);
    }
    public function crearEstudiantes()
    {
        $estudianteModel = new EstudiantesModel();
        $carreraModelo = new CarrerasModel();
        //asignas a una posicion en el array la informacion que deseas
        $data['Estudiantes'] = $estudianteModel->findAll();
        $data['Carreras'] = $carreraModelo->findAll();
        return view('/Estudiantes/crear', $data);
    }
    public function registrarEstudiante()
    {
        $estudianteModel = new EstudiantesModel();
        $carreraModelo = new CarrerasModel();
        //asignar los valores a insertar en la bd
        $data = [
            'nombres' => $this->request->getPost('nombres'),
            'apaterno' => $this->request->getPost('apaterno'),
            'amaterno' => $this->request->getPost('amaterno'),
            'status' => 1,
            'fk_idcarrera' =>  $this->request->getPost('fk_idcarrera')
        ];
        $estudianteModel->insert($data);
        session()->setFlashdata('success', 'El estudiante fue creado.');
        return \redirect()->to(\base_url('Estudiantes/index'));
    }
    public function borrarEstudiante($id_carrera)
    {
        $estudianteModelo = new EstudiantesModel();
        $result = $estudianteModelo->borrarEstudiante($id_carrera);
        if ($result) {
            session()->setFlashdata("success", 'Eliminado');
        } else {
            session()->setFlashdata("error", "No se pudo eliminar");
        }
        return \redirect()->to(\base_url('Estudiantes/index'));
    }

    //===========================================INICIO DE CARRERAS============================================================
    public function Carreras()
    {
        $carreraModelo = new CarrerasModel();
        $datos['Carreras'] = $carreraModelo->leerCarreras();
        return view('Carreras/index', $datos);
    }
    public function borrarCarrera($id_carrera)
    {
        $carreraModelo = new CarrerasModel();
        $result = $carreraModelo->borrarCarrera($id_carrera);
        if ($result) {
            session()->setFlashdata("success", 'Eliminado');
        } else {
            session()->setFlashdata("error", "No se pudo eliminar");
        }
        return \redirect()->to(\base_url('Carreras/index'));
    }
    public function crearCarreras()
    {
        $carreraModelo = new CarrerasModel();
        $data['Carreras'] = $carreraModelo->findAll();
        return view('/Carreras/crear', $data);
    }
    public function registrar()
    {
        $carreraModelo = new CarrerasModel();
        $carreraModelo->insert([
            'clave' => $this->request->getPost('clave'),
            'nombre' => $this->request->getPost('nombre'),
            'nivel' => $this->request->getPost('nivel'),
            'status' => 1
        ]);
        session()->setFlashdata('success', 'La carrera fue creada.');
        return \redirect()->to(\base_url('Carreras/index'));
    }
    public function editarCarreras()
    {
        $carreraModelo = new CarrerasModel();
        $data['Carreras'] = $carreraModelo->findAll();
        return view('Carreras/editar', $data);
    }
    public function actualizarCarreras($id_carrera)
    {
        $carreraModelo = new CarrerasModel();

        $carreraModelo->update($id_carrera, [
            'clave' => $this->request->getPost('clave'),
            'nombre' => $this->request->getPost('nombre'),
            'nivel' => $this->request->getPost('nivel')
        ]);

        session()->setFlashdata('success', 'La Carrera fue actualizado');

        return redirect()->to(base_url('Carreras/actualizar/'));
    }

        //===========================================INICIO DE Especialidad============================================================
        public function Especialidad()
        {
            $especialidadModel = new EspecialidadModel();
            $datos['especialidad'] = $especialidadModel->leerEspecialidad();
            return view('Especialidad/index', $datos);
        }
        public function borrarEspecialidad($id_especialidad)
    {
        $especialidadModel = new EspecialidadModel();
        $result = $especialidadModel->borrarEspecialidad($id_especialidad);
        if ($result) {
            session()->setFlashdata("success", 'Eliminado');
        } else {
            session()->setFlashdata("error", "No se pudo eliminar");
        }
        return \redirect()->to(\base_url('Especialidad/index'));
    }
    public function crearEspecialidad()
    {
        $especialidadModel = new EspecialidadModel();
        $carreraModelo = new CarrerasModel();
        //asignas a una posicion en el array la informacion que deseas
        $data['especialidad'] = $especialidadModel->findAll();
        $data['Carreras'] = $carreraModelo->findAll();
        return view('/Especialidad/crear', $data);
    }
    public function registrarEspecialidad()
    {
        $especialidadModel = new EspecialidadModel();
        $carreraModelo = new CarrerasModel();
        //asignar los valores a insertar en la bd
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'status' => 1,
            'fk_idcarrera' =>  $this->request->getPost('fk_idcarrera')
        ];
        $especialidadModel->insert($data);
        session()->setFlashdata('success', 'La Especialidad fue creada.');
        return \redirect()->to(\base_url('Especialidad/index'));
    }
}

