
let bitacora = {};
getDataToForm();

(() => {
	const VALIDAR_URL = BASE_URL + "registro/validar";
	fetch(VALIDAR_URL, {
			method: 'GET',
		})
		.then(res => res.json())
		.catch(error => console.error('Error:', error))
		.then(response => {

			const $turno = document.getElementById("turno");
			if (response != false) {
				const [date, time] = response.data.fecha.split(' ');
				document.getElementById("fecha").setAttribute('value', date);
				const $select = document.getElementById("pais");
				
				bitacora = response;
				
				$turno.value = response.data.turno;
				const option = document.createElement('option');
				option.value = response.data.id_pais;
				option.text = response.data.pais;
				$select.appendChild(option);

				blockFormBit();
				getDetalle();

			} else {
				getPaises();
			}
		});
})();

function getDataToForm() {
	const PAIS_URL = BASE_URL + "registro/getCustomers";
	fetch(PAIS_URL, {
			method: 'GET',
		})
		.then(res => res.json())///Cambiar forma de ingresar select con strings
		.catch(error => console.error('Error:', error))
		.then(response => {
			const $select = document.getElementById("cliente");
			const $SelectOrigen = document.getElementById("origen");
			$select.innerHTML = "";
			$SelectOrigen.innerHTML = "";

			const paises = response.data.customers;
			const origen = response.data.origen;

			for (let i = 0; i < paises.length; i++) {
				
				const option = document.createElement('option');
				const element = paises[i];
				option.value = element.id_cliente;
				option.text = element.nombre;
				$select.appendChild(option);

			}
			for (let i = 0; i < origen.length; i++) {
				
				const option = document.createElement('option');
				const element = origen[i];
				option.value = element.id_origen;
				option.text = element.herramienta;
				$SelectOrigen.appendChild(option);

			}
		});
}

function getPaises() {
	const PAIS_URL = BASE_URL + "registro/paises";
	fetch(PAIS_URL, {
			method: 'GET',
		})
		.then(res => res.json())
		.catch(error => console.error('Error:', error))
		.then(response => {
			const $select = document.getElementById("pais");
			$select.innerHTML = "";
			const paises = response.data;

			for (let i = 0; i < paises.length; i++) {
				const option = document.createElement('option');
				const element = paises[i];
				option.value = element.id_pais;
				option.text = element.pais;
				$select.appendChild(option);
			}
		});
}

function getDetalle() {
	let data = new FormData();
	data.append('id_bitacora', bitacora.data.id_bitacora);

	const PAIS_URL = BASE_URL + "registro/getDetalle";
	fetch(PAIS_URL, {
		method: 'POST',
		body: data
	  })
		.then(res => res.json())
		.catch(error => console.error('Error:', error))
		.then(response => {

			let content = document.getElementById("detalle-table");
			content.innerHTML = " ";
			
			response.data.forEach(data => {
				const [date, time] = data.hora.split(' ');
				let detalle = ` <tr > 
                          <td><span style="cursor:pointer" class="text-danger" onclick="deleteDetalle(${data.id_detalle})"><i class="fa-regular fa-circle-xmark"></i></span></td>
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

function deleteDetalle(params) {
	let result = confirm('Seguro desea borrar este registro?');
	const data = new FormData();
	if(result){	
	data.append('id_detalle', params);
	const DETALLE_URL = BASE_URL + "registro/deleteDetalle";
	fetch(DETALLE_URL, {
			method: 'POST',
			body: data,
		})
		.then(res => res.json())
		.catch(error => {
			console.error('Error:', error)		
		})
		.then(response => {
			if(response.data.status == 'ok'){
				getDetalle();
			}else{
				alert(response.data.status);
			}
		});
	}

}
function send() {
	let result = confirm('¿Guardar bitacora?');
	const data = new FormData();
	if(result == true && bitacora.data != undefined){	
	data.append('id_bitacora', bitacora.data.id_bitacora);
	const DETALLE_URL = BASE_URL + "registro/send";
	fetch(DETALLE_URL, {
			method: 'POST',
			body: data,
		})
		.then(res => res.json())
		.catch(error => {
			console.error('Error:', error)		
		})
		.then(response => {
			if(response.data.status == 'ok'){
				window.location.reload();
			}else{
				alert(response.data.status);
			}
		});
	}
}
function cancel() {
	let result = confirm('¿Cancelar bitacora?');
	const data = new FormData();
	if(result == true && bitacora.data != undefined){	
	data.append('id_bitacora', bitacora.data.id_bitacora);
	const DETALLE_URL = BASE_URL + "registro/cancel";
	fetch(DETALLE_URL, {
			method: 'POST',
			body: data,
		})
		.then(res => res.json())
		.catch(error => {
			console.error('Error:', error)		
		})
		.then(response => {
			if(response.data.status == 'ok'){
				window.location.reload();
			}else{
				alert(response.data.status);
			}
		});
	}
}
document.getElementById("btn-form-bit").addEventListener("click", function(event) {
	event.preventDefault()
	const btn = document.getElementById("btn-form-bit");
	const data = new FormData(document.getElementById('bitacora-form'));
	btn.setAttribute("disabled", true);

	var ADD_URL = BASE_URL + "registro/add";

	fetch(ADD_URL, {
			method: 'POST',
			body: data,
		})
		.then(res => res.json())
		.catch(error => console.error('Error:', error))
		.then(response => {

			console.log(response);
			bitacora = response;
			if (response.data.estado == "open") {
				blockFormBit();
			}


		});
});

document.getElementById("detalle-form").addEventListener("submit", function(event) {
	event.preventDefault();

	const btn = document.getElementById("btn-detalle");
	const data = new FormData(document.getElementById('detalle-form'));
	data.append('id_bitacora', bitacora.data.id_bitacora);
	//btn.setAttribute("disabled", true);
	//console.log(data); debugger

	var DETALLE_URL = BASE_URL + "registro/add-detalles";

	fetch(DETALLE_URL, {
			method: 'POST',
			body: data,
		})
		.then(res => res.json())
		.catch(error => {
			console.error('Error:', error)
				//btn.setAttribute("disabled", false);
		})
		.then(response => {
			console.log(response.errors);
			if(response.errors){
				alert(JSON.stringify(response.errors))
			}
			getDetalle();
			//btn.setAttribute("disabled", false);

		});

});
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
document.getElementById("btn-limpiar").addEventListener("click", function(event) {
	event.preventDefault();

	document.querySelector("#detalle-form").reset();

});

function blockFormBit(params) {
	const content = document.getElementById("content-detalle");
	const fecha = document.getElementById("fecha");
	const turno = document.getElementById("turno");
	const pais = document.getElementById("pais");
	const btn = document.getElementById("btn-form-bit");

	content.classList.remove("d-none");
	fecha.setAttribute("disabled", true);
	turno.setAttribute("disabled", true);
	pais.setAttribute("disabled", true);
	btn.setAttribute("disabled", true);
}
function toggleForm() {
	let  $form = document.getElementById("content-form");
	let $table =document.getElementById("content-table");
	let $btn= document.getElementById("ocultar-menu");
	
	$form.classList.toggle("d-none");
	
	$table.classList.toggle("col-md-9");
	$table.classList.toggle("col-md-12");

}