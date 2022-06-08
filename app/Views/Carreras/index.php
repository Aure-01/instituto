<?php echo $this->extend('plantilla'); ?>

<?php echo $this->section('contenido'); ?>
<?= $this->extend('plantilla') ?>
<?= $this->section('contenido') ?>
<!-- DIV para un contenido o header de presentacion -->
<div class=" container mt-5 text-center">
    <h3 class="uppercase">Carreras</h3>
</div>
<!-- DIV para contenido de ka app [tablas, forms, etc.] -->
<div class="container  px-4  gy-5">
    <div class="container  px-4  gy-5">
        <div class="row justify-content-between align-items-center">
            <div class="col-auto">
                <a href="<?php echo base_url('Carreras/crear'); ?>" class="btn btn-primary btn-sm" title="Nueva Carrera">
                    <i class="bi bi-plus-circle"></i>
                    Nueva Carrera
                </a>
            </div>
        </div>
    </div>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">Id Carrera</th>
                <th scope="col">Clave</th>
                <th scope="col">Nombre</th>
                <th scope="col">Nivel</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($Carreras->getResult() as $row){ ?>
            <tr>
                <th scope="row"><?php echo $row->id_carrera; ?></th>
                <th scope="row"><?php echo $row->clave; ?></th>
                <th scope="row"><?php echo $row->nombre; ?></th>
                <th scope="row"><?php echo $row->nivel; ?></th>
                <th scope="row"><?php echo $row->status; ?></th>
                <th>
                    <a href="<?php echo base_url('/carreras/editar/'.$row->id_carrera); ?>">
                    <button class="btn btn-outline-warning btn-sm"><i class="bi bi-plus-circle">Editar</i></a></button>
                    <a href="<?php echo base_url('borrarCarrera/'.$row->id_carrera); ?>">
                    <button class="btn btn-outline-danger btn-sm"><i class="bi bi-plus-circle">Eliminar</i></a></button>
                </th>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</div>
<?= $this->endSection() ?>
<?php echo $this->endSection(); ?>