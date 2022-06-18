
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><?php echo session("name")?></a>
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarNav"
      aria-controls="navbarNav"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url("/home")?>">Dashboard</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo base_url("/registro")?>">Registro</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Historial</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url("/exit")?>">Salir</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>