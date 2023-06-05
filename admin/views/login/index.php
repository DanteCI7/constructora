

<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
     
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        <form method="POST" action="login.php?action=login">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="form1Example13" name="correo" class="form-control form-control-lg" />
            <label class="form-label" for="form1Example13">Correo</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password" id="form1Example23" name="contrasena" class="form-control form-control-lg" />
            <label class="form-label" for="form1Example23">Contrasena</label>
          </div>

          <div class="d-flex justify-content-around align-items-center mb-4">
            <a href="login.php?action=forgot">Olvide mi contrasena</a>
          </div>

          <!-- Submit button -->
          <input type="submit" name="enviar" value="Ingresar" class="btn btn-primary btn-lg btn-block">

        </form>
      </div>
    </div>
  </div>
</section>