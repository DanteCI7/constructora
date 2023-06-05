<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
    <title>Inicio</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    />
    <link href="css/estilo.css?v=<?php echo rand(); ?>" rel="stylesheet" type="text/css" />
    <link href="css/estilo-header.css?v=<?php echo rand(); ?>" rel="stylesheet" type="text/css" />
    <link href="css/button.css?v=<?php echo rand(); ?>" rel="stylesheet" type="text/css" />
    <link href="css/galeria.css?v=<?php echo rand(); ?>" rel="stylesheet" type="text/css" />
    <link href="css/cards.css?v=<?php echo rand(); ?>" rel="stylesheet" type="text/css" />
    <link href="css/lista.css?v=<?php echo rand(); ?>" rel="stylesheet" type="text/css" />
    <link href="css/linea_tiempo.css?v=<?php echo rand(); ?>" rel="stylesheet" type="text/css" />
    <link href="css/parrafos.css?v=<?php echo rand(); ?>" rel="stylesheet" type="text/css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> 
  </head>

  <body>
    <header>
      <div class="container-fluid">
        <div class="row naranja" id="linea_naranja">
          <div class="col-2 container-center-left">
            <img
              src="images/logo_constructora.png"
              class="img-fluid"
              alt="logo"
            />
          </div>
          <div class="col-10 container-right" id="navegacion_superior">
            <nav
              class="navbar navbar-expand-lg navbar-brand navbar-toggler navbar-dark"
            >
              <a class="navbar-brand" href="paginaWeb.php?action=getIndexWeb">Inicio</a>
              <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a
                      class="nav-link active nav-theme"
                      aria-current="page"
                      href="paginaWeb.php?action=getProyectos"
                      >Proyectos</a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link nav-theme" href="paginaWeb.php?action=getServicios"
                      >Servicios</a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link nav-theme" href="paginaWeb.php?action=getCotizacion"
                      >Cotizaciones</a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link nav-theme" href="paginaWeb.php?action=getCasoExito"
                      >Casos de Exito</a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link nav-theme" href="paginaWeb.php?action=getClientes"
                      >Clientes</a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link nav-theme" href="paginaWeb.php?action=getSalud"
                      >Seguridad y salud</a
                    >
                  </li>
                  <li class="nav-item dropdown">
                    <a
                      class="nav-link dropdown-toggle nav-theme"
                      href="#"
                      role="button"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                    >
                      Ética e integridad
                    </a>
                    <ul class="dropdown-menu naranja">
                      <li>
                        <a class="dropdown-item blanco-nav" href="paginaWeb.php?action=getEticas"
                          >Canal ético</a
                        >
                      </li>
                      <li>
                        <a
                          class="dropdown-item blanco-nav"
                          href="paginaWeb.php?action=getPoliticas"
                          >Politicas</a
                        >
                      </li>
                      <li>
                        <a
                          class="dropdown-item blanco-nav"
                          href="paginaWeb.php?action=getCertificaciones"
                          >Certificaciones</a
                        >
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a
                      class="nav-link dropdown-toggle nav-theme"
                      href="#"
                      role="button"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                    >
                      Nosotros G2
                    </a>
                    <ul class="dropdown-menu naranja">
                      <li>
                        <a class="dropdown-item blanco-nav" href="paginaWeb.php?action=getQuienes"
                          >¿Quienes somos?</a
                        >
                      </li>
                      <li>
                        <a class="dropdown-item blanco-nav" href="paginaWeb.php?action=getContactos"
                          >Contacto</a
                        >
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link nav-theme" href="login.php"
                      >Login</a
                    >
                  </li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </header>
