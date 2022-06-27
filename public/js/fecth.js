(() => {

    var url = "https://informesoc.intelector.net/public/registro/validar";
  
    fetch(url, {
      method: 'GET', 
    })
    .then(res => res.json())
    .catch(error => console.error('Error:', error))
    .then(response => {

      if(response.data.id_bitacora){
        const [date, time] = response.data.fecha.split(' ');
        document.getElementById("fecha").setAttribute('value', date );
        blockFormBit();
      }
      
      
    });

})();


document.getElementById("btn-form-bit").addEventListener("click", function(event){
    event.preventDefault()
    const btn = document.getElementById("btn-form-bit");
    const data = new FormData(document.getElementById('bitacora-form'));
    btn.setAttribute("disabled", true);
    var url = "https://informesoc.intelector.net/public/registro/add";
  
    fetch(url, {
      method: 'POST', 
      body: data, 
    })
    .then(res => res.json())
    .catch(error => console.error('Error:', error))
    .then(response => {
      
      if(response.data.estado == "open"){ 
        blockFormBit();
      }
      
      
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