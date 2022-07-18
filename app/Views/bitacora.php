<?= $this->extend('template/layout') ?>

<?= $this->section('tittle') ?>
Bitacora # : <?php echo $id_bitacora?>
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<div class="main-container">
<div class="row">
  <div class="col-md-6">
      <div class="input-group mb-3">
      <img width="200px" src="<?php echo base_url("/images/logo.jpg")?>"/> 
    </div> 
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Fecha : <?php echo $fecha?></span>
        <span class="input-group-text" id="basic-addon1">Turno <?php echo $turno?></span>
        <span class="input-group-text" id="basic-addon1">Pais : <?php echo $pais?></span> 
        <span class="input-group-text" id="basic-addon1">Estado : <?php echo $estado?></span> 
    </div> 
  </div>
  <div class="col-md-6">
  <h2>Bitacora # : <?php echo $id_bitacora?> usuario : <?php echo $user?></h2>
  <span>
    <strong>Descripcion: </strong>
    <span><?php echo $descripcion?></span>
  </span>
  </div>
</div>




<div class="row">
  
    <div id="content-table" class="col-md-12 ">
      <div class="w-100 table-responsive" >
    <table style="text-alight:center" class="table table-hover">
      <thead>
      <tr>
								<th scope="col">Hora</th>
                <th scope="col">Origen</th>
                <th scope="col">Tecnologia</th>
								<th scope="col">Categoria</th>	
                <th scope="col">Cliente</th>							
                <th scope="col">Criticidad</th>
								<th scope="col">Dispositivo</th>
								<th scope="col">Descripcion</th>
								<th scope="col">Comentario</th>
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
  

  function badge(params) {
	let alerta;
	switch (params) {
		case 'BAJA':
			alerta = `<span class="badge bg-info">${params}</span>`;
			break;
		case 'MEDIA':
			alerta = `<span class="badge bg-warning">${params}</span>`;
		break;	
		case 'ALTA':
			alerta = `<span class="badge bg-danger">${params}</span>`;
		break;
	}
	
	return alerta;
}
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
				let detalle = ` <tr >                       
                          <td>${time}</td>
                          <td>${data.herramienta}</td> 
                          <td>${data.tecnologia}</td>
                          <td>${data.categoria}</td>                          
                          <td>${data.nombre}</td>  
                          <td>${badge(data.criticidad)}</td>  
                          <td>${data.dispositivo}</td>
                          <td>${data.desc}</td>  
                          <td>${data.comentario}</td>  
                          <td>${data.reportado}</td>    
                          <td>${data.razon}</td>  
                          
                      </tr>`;
				content.insertAdjacentHTML('beforeEnd', detalle);
			});

		});

}
  </script>

<?php $this->endSection() ?>