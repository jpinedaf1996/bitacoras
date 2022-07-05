<?= $this->extend('template/layout') ?>

<?= $this->section('tittle') ?>
Historial
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<div class="main-container">
<h2>Historial de bitacoras - Usuario: <?php echo session("name")?></h2>
  <br>
  
</div>
  
<script src="<?php echo base_url("/js/app.js")?>"></script>
<?php $this->endSection() ?>