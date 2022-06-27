(() => {

  var url = "https://informesoc.intelector.net/public/registro/validar";
  
    fetch(url, {
      method: 'GET', 
    })
    .then(res => res.json())
    .catch(error => console.error('Error:', error))
    .then(response => {
      console.log(response);    
      
    });

})();

/*function leerCookie(nombre) {
    try {
        var lista = document.cookie.split(";");
      for (i in lista) {
          var busca = lista[i].search(nombre);
          if (busca > -1) {micookie=lista[i]}
          }
      var igual = micookie.indexOf("=");
      var valor = micookie.substring(igual+1);
      return valor;
    } catch (error) {
      console.log(error);
    }
  }*/

  function deleteAllCookies() {
    var cookies = document.cookie.split(";");
    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        var eqPos = cookie.indexOf("=");
        var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }
  }
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