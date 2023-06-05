<?php 
include_once('controllers/sistema.php');
$productName = "Cotización promedio";
$currency = "MXN";
$productPrice = 7;
$productId = 587965;
$orderNumber = 567;
?>
<main>
      <section class="image_contacto main_section">
        <h1 class="blanco-salud">Cotización</h1>
      </section>
      <section class="text paypal">
        <div class="container div_tricks">
          <div class="row">
            <div class="col-6">
              <div class="card">
                <h4 class="blanco-title">Porfavor contactanos..</h4>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label"
                    >Correo Electronico</label
                  >
                  <input
                    type="email"
                    class="form-control"
                    id="exampleFormControlInput1"
                    placeholder="constructora@gmail.com"
                  />
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label"
                    >Telefono</label
                  >
                  <input
                    type="tel"
                    class="form-control"
                    id="exampleFormControlInput2"
                    placeholder="4121001436"
                  />
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label"
                    >Mensaje</label
                  >
                  <textarea
                    class="form-control"
                    id="exampleFormControlTextarea1"
                    rows="3"
                  ></textarea>
                </div>
                <div class="col-auto">
                  <button type="submit" class="btn btn-dark mb-3">
                    Enviar
                  </button>
                </div>
                <div class="container">
    <h2>Cotización ejemplo paypal</h2>  
    <br>
    <table class="table">
        <tr>
          <td style="width:150px"><img src="images/logo_constructora.png" style="width:50px" /></td>
          <td style="width:150px"><?php echo $productPrice; ?> MXN</td>
          <td style="width:150px">
          <?php include 'paypalCheckout.php'; ?>
          </td>
        </tr>
    </table>    
</div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
    </main>

    