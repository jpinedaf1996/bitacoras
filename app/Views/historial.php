<?= $this->extend('template/layout') ?>

<?= $this->section('tittle') ?>
Historial
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<div class="main-container">
<h2>Historial de bitacoras </h2>
<br>
<div class="row">
  <div class="col-md-12">
  <table id="example"  class="table table-striped table-hover">
  <thead style="text-align:center">
    <tr>
      <th scope="col-sm w-5">#correlativo</th>
      <th scope="col">#ID</th>
      <th scope="col">ver</th>
      <th scope="col">Usuario</th>
      <th scope="col">Fecha</th>
      <th scope="col">Turno</th>
      <th scope="col">Pais</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Estado</th>
      
    </tr>
  </thead>
  <tbody id="bitacora-table">
    
  </tbody>
</table>
  </div>
</div>  
</div>
  


<script src="<?php echo base_url("/vendor/js/jquery-3.5.1.js")?>"></script>
<script src="<?php echo base_url("/vendor/js/jquery.dataTables.min.js")?>"></script>
<script src="<?php echo base_url("/vendor/js/dataTables.bootstrap5.min.js")?>"></script>
<script src="<?php echo base_url("/js/historial.js")?>"></script>

<?php $this->endSection() ?>