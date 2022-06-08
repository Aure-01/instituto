<?php echo $this->extend('plantilla'); ?>
<?php echo $this->section('contenido'); ?>
<?= $this->extend('plantilla') ?>
<?= $this->section('contenido') ?>
<!-- DIV para un contenido o header de presentacion -->
<font face="Times New Roman,arial,verdana">
<div class=" container mt-5 text-center">
    <h3 class="uppercase">Crear Especialidad </h3>
</div>
<!-- DIV para contenido de ka app [tablas, forms, etc.] -->
<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Nueva Especialidad</h3>
        <div class="col-auto">
            <button form="formularioEspecialidad" class="btn btn-primary btn-sm" title="Registrar Especialidad">
                Registrar
            </button>
        </div>
    </div>
    <form action="<?php echo base_url('/especialidad/registrar'); ?>" method="post" class="row g-3" id="formularioEspecialidad">
        <div class="col-md-6">
            <label for="nombre" class="form-label">Nombre</label>
            <input required type="text" size="5" class="form-control" name="nombre" id="nombre">
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
                <?php foreach ($Carreras as $carrera) : ?>
                    <option value="<?php echo $carrera->id_carrera; ?>"><?php echo $carrera->nombre; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </form>
</font>
<?= $this->endSection() ?>
<?php echo $this->endSection(); ?>