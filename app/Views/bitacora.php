<?= $this->extend('template/layout') ?>

<?= $this->section('tittle') ?>
Bitacora # : <?php echo $id_bitacora?>
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<div class="main-container">
<h2>Bitacora # : <?php echo $id_bitacora?></h2>
<h2>usuario : <?php echo $name?></h2>
<div class="row">

</div>
<div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon1">Fecha : <?php echo $fecha?></span>
    <span class="input-group-text" id="basic-addon1">Turno <?php echo $turno?></span>
    <span class="input-group-text" id="basic-addon1">Pais : <?php echo $pais?></span> 
    <span class="input-group-text" id="basic-addon1">Estado : <?php echo $estado?></span> 
</div> 

<div class="row">
  
    <div id="content-table" class="col-md-12 ">
      <div class="w-100 table-responsive" >
    <table style="text-alight:center" class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Hora</th>
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
      <tbody id="detalle-table">
        
        
      </tbody>
</table>
    </div>
  </div>
  </div>
  
</div>
</div>
  <script>
  const BASE_URL = 'https://informesoc.intelector.net/public/';

  getDetalle();
  function getDetalle() {
	
	//console.log(bitacora.data.id_bitacora);
	const PAIS_URL = BASE_URL + "historial/getDetalle/<?php echo $id_bitacora?>";
	fetch(PAIS_URL, {
		method: 'get',
	  })
		.then(res => res.json())
		.catch(error => console.error('Error:', error))
		.then(response => {

			let content = document.getElementById("detalle-table");
			content.innerHTML = " ";
			
			response.forEach(data => {
				const [date, time] = data.hora.split(' ');
				let detalle = ` <tr> 
                          <td>${time}</td>
                          <td>${data.producto}</td>
                          <td>${data.tegnologia}</td>
                          <td>${data.nombre}</td>  
                          <td>${data.criticidad}</td>  
                          <td>${data.comentario}</td>  
                          <td>${data.restablecio}</td>  
                          <td>${data.reportado}</td>  
                          <td>${data.razon}</td>  
                          
                      </tr>`;
				content.insertAdjacentHTML('beforeEnd', detalle);
			});

		});

}
  </script>

<?php $this->endSection() ?>