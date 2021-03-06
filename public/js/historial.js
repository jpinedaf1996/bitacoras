
function getBitacoras() {
	const PAIS_URL = BASE_URL + "historial/getBitacoras";
	fetch(PAIS_URL, {
			method: 'GET',
		})
		.then(res => res.json())
		.catch(error => console.error('Error:', error))
		.then(response => {
			
			let content = document.getElementById("bitacora-table");
			content.innerHTML = " ";
			let cont =1;
			response.data.forEach(data => {
				let bitacora = ` <tr > 
						  <td>${cont++ }</td>
                          <td>${data.id_bitacora}</td> 
                          <td> <button class="btn btn-success btn-sm" onclick="ver(${data.id_bitacora})" ><i class="fa-solid fa-eye"></i></button></td>
                          <td>${data.user}</td>
                          <td>${data.fecha}</td>
                          <td>Turno ${data.turno}</td>  
                          <td>${data.pais}</td>  
                          <td>${data.descripcion}</td>  
                          <td>${data.estado}</td>     
                      </tr>`;
				content.insertAdjacentHTML('beforeEnd', bitacora);
			});
			$('#example').DataTable();
		});
}
function ver($id) {
	// Abrir nuevo tab
	var win = window.open(BASE_URL + "historial/getOne/"+$id, '_blank');
	// Cambiar el foco al nuevo tab (punto opcional)
	win.focus();
  }
$(document).ready(function () {
	getBitacoras();
	
});