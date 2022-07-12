
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <div class="container-fluid">
  <img width="15px" src="<?php echo base_url("/images/KB.png")?>"/>
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
          <a class="nav-link active" href="<?php echo base_url("/home")?>">Dashboard</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active"  href="<?php echo base_url("/registro")?>">Registro</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="<?php echo base_url("/historial")?>">Historial</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url("/exit")?>">Cerrar sesion</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>