<?= $this->extend('plantilla') ?>
<?= $this->section('contenido') ?>
<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Editar Estudiante</h3>
        <div class="col-auto">
            <button form="formularioEstudiante" class="btn btn-primary btn-sm" title="Registrar Estudiante">
                Actualizar
            </button>
        </div>
    </div>
    <?php foreach($estudiante as $row){?>
    <form action="<?php echo base_url('/estudiantes/actualizar/' .$row->id_estudiante); ?>" method="post" class="row g-3"
        id="formularioEstudiante">
        <div class="col-md-6">
            <label for="nombres" class="form-label">Nombres</label>
            <input required type="text" size="5" class="form-control" value="<?= $row->nombres; ?>" name="nombres"
                id="nombres">
        </div>
        <div class="col-md-6">
            <label for="apaterno" class="form-label">Apellido Paterno</label>
            <input required type="text" class="form-control" value="<?= $row->apaterno; ?>" name="apaterno" id="apaterno">
        </div>
        <div class="col-md-6">
            <label for="amaterno" class="form-label">Apellido Paterno</label>
            <input required type="text" class="form-control" value="<?= $row->amaterno; ?>" name="amaterno" id="amaterno">
        </div>
        <div class="col-md-12">
            <label class="form-check-label" for="status">Estado</label>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" name="status" id="status" checked>
                <label class="form-check-label" for="status">Activo/Inactivo</label>
            </div>
        </div>
        <div class="col-md-6">
            <label class="form-label">Carrera</label>
            <select required class="form-select" aria-label="Selección de carrera" name="fk_idcarrera" id="fk_idcarrera">
                <option disabled selected value="">Seleccionar</option>
                <?php foreach ($carreras as $carrera) : ?>
                    <option value="<?php echo $carrera->id_carrera; ?>"><?php echo $carrera->nombre; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </form>
    <?php }?>
</div>
<?= $this->endSection() ?>