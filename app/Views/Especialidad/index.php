<?php echo $this->extend('plantilla'); ?>

<?php echo $this->section('contenido'); ?>
<?= $this->extend('plantilla') ?>
<?= $this->section('contenido') ?>
<!-- DIV para un contenido o header de presentacion -->
<font face="Times New Roman,arial,verdana">
<div class=" container mt-5 text-center">
    <h3 class="uppercase">Especialidad</h3>
</div>
<!-- DIV para contenido de ka app [tablas, forms, etc.] -->
<div class="container  px-4  gy-5" >
<div class="container  px-4  gy-5" >
<div class="row justify-content-between align-items-center">
        <div class="col-auto">
            <a href="<?php echo base_url('Especialidad/crear'); ?>" class="btn btn-primary btn-sm" title="Nueva Especialidad">
                <i class="bi bi-plus-circle"></i>
                Nueva Especialidad
            </a>
        </div>
    </div>
<table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">Id Especialidad</th>
      <th scope="col">Nombre</th>
      <th scope="col">Estado</th>
      <th scope="col">ID Carrera</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($especialidad->getResult() as $row){ ?>
    <tr>
        <th scope="row"><?php echo $row->id_especialidad; ?></th>
        <th scope="row"><?php echo $row->nombre; ?></th>
        <th scope="row"><?php echo $row->status; ?></th>
        <th scope="row"><?php echo $row->fk_idcarrera; ?></th>
        <th>
            <a href="<?php echo base_url('/especialidad/editar/'.$row->id_especialidad); ?>">
            <button class="btn btn-outline-warning btn-sm"><i class="bi bi-plus-circle">Editar</i></a></button>
            <a href="<?php echo base_url('borrarEspecialidad/'.$row->id_especialidad); ?>">
            <button class="btn btn-outline-danger btn-sm"><i class="bi bi-plus-circle">Eliminar</i></a></button>
        </th>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>
</font>
<?= $this->endSection() ?>
<?php echo $this->endSection(); ?>