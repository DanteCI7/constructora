
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
    <title>inicio</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    />
    <link href="css/estilo.css?v=<?php echo rand(); ?>" rel="stylesheet" type="text/css" />
    <link href="css/estilo-header.css?v=<?php echo rand(); ?>" rel="stylesheet" type="text/css" />    
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

    <main>
      <section class="image_clientes main_section">
        <h1 class="blanco">Clientes</h1>
      </section>
      <section class="text main_section">
        <div class="container div_tricks">
          <div class="row">
            <div class="col-4 pt-1">
              <div class="p-1 text-white bg-opacity-75 redondo naranja">
                <img
                  src="images/amazon.png"
                  class="img-fluid redondo"
                  alt="logo"
                />
              </div>
            </div>
            <div class="col-4 pt-3">
              <div class="p-1 text-white bg-opacity-75 redondo naranja">
                <img
                  src="images/nestle.png"
                  class="img-fluid redondo"
                  alt="logo"
                />
              </div>
            </div>
            <div class="col-4 pt-5">
              <div class="p-1 text-white bg-opacity-75 redondo naranja">
                <img
                  src="images/torrey.png"
                  class="img-fluid redondo"
                  alt="logo"
                />
              </div>
            </div>
          </div>

          <div class="row pt-5">
            <div class="col-4 pt-5">
              <div class="naranja p-1 text-white bg-opacity-75 redondo">
                <img
                  src="images/bestbuy.png"
                  class="img-fluid redondo"
                  alt="logo"
                />
              </div>
            </div>
            <div class="col-4 pt-3">
              <div class="naranja p-1 text-white bg-opacity-75 redondo">
                <img
                  src="images/cbre.png"
                  class="img-fluid redondo"
                  alt="logo"
                />
              </div>
            </div>
            <div class="col-4 pt-1">
              <div class="naranja p-1 text-white bg-opacity-75 redondo">
                <img
                  src="images/cruzazul.png"
                  class="img-fluid redondo"
                  alt="logo"
                />
              </div>
            </div>
          </div>

          <div class="row pt-5">
            <div class="col-4 pt-1">
              <div class="naranja p-1 text-white bg-opacity-75 redondo">
                <img
                  src="images/walmart.png"
                  class="img-fluid redondo"
                  alt="logo"
                />
              </div>
            </div>
            <div class="col-4 pt-3">
              <div class="naranja p-1 text-white bg-opacity-75 redondo">
                <img
                  src="images/drisscolls.png"
                  class="img-fluid redondo"
                  alt="logo"
                />
              </div>
            </div>
            <div class="col-4 pt-5">
              <div class="naranja p-1 text-white bg-opacity-75 redondo">
                <img
                  src="images/natura.png"
                  class="img-fluid redondo"
                  alt="logo"
                />
              </div>
            </div>
          </div>
        </div>
        <div class="row pt-5">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <h2 class="h2_tricks naranja-title-border container-center2">
              Nuestro compromiso
            </h2>
            <p class="container-center naranja_title">
              Para nosotros nuestros clientes son parte de nuestra familia,
              siempre les proponemos los mejores proyectos a los mejores precios
              y siempre con la mejor calidad, con un plazo de tiempo justo y sin
              perdidas de recursos.
            </p>
            <p class="container-center naranja_title">
              Siendo fundamental para nosotros el compromiso entre nuestro
              cliente y el proyecto planteado, desde luego estamos dispuestos a
              escuchar todas las sugerencias y a todas aquellas empresas que
              necesiten de nuestros servicios como constructora de calidad,
              mantenemos siempre la comunicación en todo momento para evitar
              errores y confusiones con nuestros clientes. Procuramos no perder
              a nuestros clientes por ningun motivo, ya que gracias a ellos es
              posible todas aquellas alegrias y comodidades que podemos
              brindarle a la sociedad con cada una de nuestras obras.
            </p>
          </div>
        </div>
        <div class="col-md-2"></div>
      </section>
      <section class="image_clientes main_section"></section>
    </main>
