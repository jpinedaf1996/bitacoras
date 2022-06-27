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
    <form name="bitacora-form" id="bitacora-form">
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Fecha</span>
        <input required name="fecha" id="fecha" type="date" class="form-control " aria-label="date" aria-describedby="basic-addon1">
      </div>     
    </div>
    <div class="col-md-3">
      <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">Turno</span>
          <select required name="turno" id="turno" class="form-select disabled" aria-label="Default select example">
          <option Selected value="Primer turno">Primer turno</option>
          <option value="Segundo turno">Segundo turno</option>
          <option value="Tercer turno">Tercer turno</option>
        </select>  
        </div>
    </div>
    <div class="col-md-3">
    <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">Pais</span>
          <select required name="pais" id="pais" class="form-select" aria-label="Default select example">
          <option value="1">SV</option>
          <option value="2">NI</option>
          <option value="3">otro</option>
        </select>  
        </div>
    </div>
    <div class="col-md-3">
      
    <div class="input-group mb-3">
    <input type="submit" class="btn  btn-primary" id="btn-form-bit" value="Crear"></button>
      </div>
    </div>
  </div>
  </form> 
</div>
<br>
<br>

<div id="content-detalle" class="container d-none">
  <div class="row">
  
  <div class="col-md-3">
  <form name="detalle-form" id="detalle-form">
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
    <div class="col-md-9 ">
      <div class="w-100 table-responsive" >
    <table style="font-size: 12px; text-alight:center" class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Producto</th>
          <th scope="col">Tegnologia</th>
          <th scope="col">Cliente</th>
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
          <td>ELA</td>
          <td>Manageingine</td>
          <td>@DIANA</td>
          <td>Alta</td>
          <td>Lorem ipsum dolor m assumenda  harum?</td>
          <td>SI</td>
          <td>@NO</td>
          <td>dolor sit amet, consectetur s est maiores</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Mark</td>
          <td>Otto</td>
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
  
</div>
<script src="<?php echo base_url("/js/fecth.js")?>"></script>
<?php $this->endSection() ?>