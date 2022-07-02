const BASE_URL = 'https://informesoc.intelector.net/public/';
let bitacora = {};
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
        const $select = document.getElementById("pais");
        bitacora = response;
				const [date, time] = response.data.fecha.split(' ');
        document.getElementById("fecha").setAttribute('value', date);
        $turno.value =response.data.turno;
        
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

function getPaises() {
  const PAIS_URL = BASE_URL + "registro/paises";
				fetch(PAIS_URL, {
						method: 'GET',
					})
					.then(res => res.json())
					.catch(error => console.error('Error:', error))
					.then(response => {
						document.getElementById('pais').innerHTML = "";
						const paises = response.data;

						for (let i = 0; i < paises.length; i++) {
              const $select = document.getElementById("pais");
							const option = document.createElement('option');
							const element = paises[i];
							option.value = element.id_pais;
							option.text = element.pais;
							$select.appendChild(option);
    				}
		});
}

function getDetalle() {

  const PAIS_URL = BASE_URL + "registro/getDetalle";
  fetch(PAIS_URL, {
      method: 'GET',
    })
    .then(res => res.json())
    .catch(error => console.error('Error:', error))
    .then(response => {
      //console.log(response);
      let content = document.getElementById("detalle-table");
      content.innerHTML = " ";
      response.data.forEach(data => {
        let detalle = ` <tr > 
                          <td>#${data.id_detalle}</td>
                          <td>${data.producto}</td>
                          <td>${data.tegnologia}</td>
                          <td>${data.id_cliente}</td>  
                          <td>${data.criticidad}</td>  
                          <td>${data.comentario}</td>  
                          <td>${data.alertado}</td>  
                          <td>${data.reportado}</td>  
                          <td>${data.razon}</td>  
                          
                      </tr>`;
        content.insertAdjacentHTML('beforeEnd', detalle);
      });
    
    });

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

			if (response.data.estado == "open") {
				blockFormBit();
			}


		});
});

document.getElementById("btn-detalle").addEventListener("click", function(event) {
	event.preventDefault();

  const btn = document.getElementById("btn-detalle");
	const data = new FormData(document.getElementById('detalle-form'));
  data.append('id_bitacora', bitacora.data.id_bitacora);
	//btn.setAttribute("disabled", true);


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
    getDetalle();
    //btn.setAttribute("disabled", false);

  });
	
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