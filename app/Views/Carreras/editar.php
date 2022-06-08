<?= $this->extend('plantilla') ?>
<?= $this->section('contenido') ?>
<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Editar Carrera</h3>
        <div class="col-auto">
            <button form="formularioCarrera" class="btn btn-primary btn-sm" title="Registrar Carrera">
                Actualizar
            </button>
        </div>
    </div>
    <?php foreach($carrera as $row){?>
    <form action="<?php echo base_url('carrera/actualizar/' .$row->id_carrera); ?>" method="post" class="row g-3"
        id="formularioCarrera">
        <div class="col-md-6">
            <label for="clave" class="form-label">Clave</label>
            <input required type="text" size="5" class="form-control" value="<?= $row->clave; ?>" name="clave"
                id="clave">
        </div>
        <div class="col-md-6">
            <label for="nombre" class="form-label">Nombre</label>
            <input required type="text" class="form-control" value="<?= $row->nombre; ?>" name="nombre" id="nombre">
        </div>
        <div class="col-md-6">
            <label for="nivel" class="form-label">Nivel</label>
            <input required type="text" class="form-control" value="<?= $row->nivel; ?>" name="nivel" id="nivel">
        </div>
        <div class="col-md-12">
            <label class="form-check-label" for="status">Estado</label>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" name="status" id="status" checked>
                <label class="form-check-label" for="status">Activo/Inactivo</label>
            </div>
        </div>
    </form>
    <?php }?>
</div>
<?= $this->endSection() ?>