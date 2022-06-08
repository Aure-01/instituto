<?php echo $this->extend('plantilla'); ?>

<?php echo $this->section('contenido'); ?>
<?= $this->extend('plantilla') ?>
<?= $this->section('contenido') ?>
<!-- DIV para un contenido o header de presentacion -->
<font face="Times New Roman,arial,verdana">
<div class=" container mt-5 text-center">
    <h3 class="uppercase">Estudiantes</h3>
</div>
<!-- DIV para contenido de ka app [tablas, forms, etc.] -->
<div class="container  px-4  gy-5" >
<div class="container  px-4  gy-5" >
<div class="row justify-content-between align-items-center">
        <div class="col-auto">
            <a href="<?php echo base_url('Estudiantes/crear'); ?>" class="btn btn-primary btn-sm" title="Nuevo empleado">
                <i class="bi bi-plus-circle"></i>
                Nuevo Estudiante
            </a>
        </div>
    </div>
<table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">Id Estudiante</th>
      <th scope="col">Nombres</th>
      <th scope="col">Apaterno</th>
      <th scope="col">Amaterno</th>
      <th scope="col">Estado</th>
      <th scope="col">Nombre Carrera</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($Estudiantes->getResult() as $row){ ?>
    <tr>
        <th scope="row"><?php echo $row->id_estudiante; ?></th>
        <th scope="row"><?php echo $row->nombres; ?></th>
        <th scope="row"><?php echo $row->apaterno; ?></th>
        <th scope="row"><?php echo $row->amaterno; ?></th>
        <th scope="row"><?php echo $row->status; ?></th>
        <th scope="row"><?php echo $row->nombre; ?></th>
        <th>
            <a href="<?php echo base_url('/estudiantes/editar/'.$row->id_estudiante); ?>">
            <button class="btn btn-outline-warning btn-sm"><i class="bi bi-plus-circle">Editar</i></a></button>
            <a href="<?php echo base_url('borrarEstudiante/'.$row->id_estudiante); ?>">
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