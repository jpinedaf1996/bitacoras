<?= $this->extend('template/layout') ?>

<?= $this->section('tittle') ?>
Registro
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<br>
<div class="container">
  <h2>Registro de bitacora - Usuario: <?php echo session("name")?></h2>
  <br>
  <div class="row">
    <div class="col-md-3">

      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Fecha</span>
        <input type="date" class="form-control" aria-label="date" aria-describedby="basic-addon1">
      </div>     
    </div>
    <div class="col-md-3">
      <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">Turno</span>
          <select class="form-select" aria-label="Default select example">
          <option selected>Seleccione el turno</option>
          <option value="1">One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
        </select>  
        </div>
    </div>
    <div class="col-md-3">
    <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">Pais</span>
          <select class="form-select" aria-label="Default select example">
          <option value="1">SV</option>
          <option value="2">NI</option>
          <option value="3">otro</option>
        </select>  
        </div>
    </div>
    <div class="col-md-3">
      
    <div class="input-group mb-3">
    <button type="button" class="btn  btn-primary">Crear</button>
      </div>
    </div>
  </div>
  
</div>
<br>
<br>

<div class="container">
  <div class="row">
  
  <div class="col-md-4">
  <form name="bitacora-form" id="bitacora-form">
    <div class="mb-3">
      <input type="text" placeholder="Producto" class="form-control" id="producto" name="producto" >
    </div>
    <div class="mb-3">
      
      <input type="text" class="form-control" placeholder="Tegnologia" name ="tegnologia" id="tegnologia">
    </div>
    <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">Criticidad</span>
          <select name="criticidad" class="form-select" aria-label="Default select example">
          <option value="1">Baja</option>
          <option value="2">Media</option>
          <option value="3">Alta</option>
        </select>  
        </div>
    <div class="mb-3">
        <div class="input-group">
        <textarea placeholder="comentario" name="comentario" class="form-control" aria-label="With textarea"></textarea>
      </div>
    </div>
    <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">Restablecio</span>
          <select class="form-select" name="restablecio" aria-label="Default select example">
          <option value="1" selected>SI</option>
          <option value="2">NO</option>
        </select>  
      </div>
    <div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon1">Reportado</span>
          <select class="form-select" name="reportado" id="reportado" aria-label="Default select example">
          <option value="1" selected>NO</option>
          <option value="2">SI</option>
        </select>  
      </div>
    <div class="mb-3">
      <input type="text" class="form-control" placeholder="Razon" name="razon" id="razon">
    </div>
    
    <button type="submit" class="btn btn-primary">Registrar</button>
</form>    
  </div>
    <div class="col-md-8">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Producto</th>
      <th scope="col">Tegnologia</th>
      <th scope="col">Criticidad</th>
      <th scope="col">Comentario</th>
      <th scope="col">Restablecio</th>
      <th scope="col">Reportado</th>
      <th scope="col">Razon</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Otto</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Otto</td>
    </tr>
    
  </tbody>
</table>
    </div>
  </div>
  
</div>
      
<?php $this->endSection() ?>