
<section class="image_proyectos main_section">
        <h1 class="negro-title">Casos de exito</h1>
      </section>

<section class="articles flow">

    <?php foreach($data as $key => $paginaWeb): ?>
    <article>
        <div class="article-wrapper">
            <figure>
                <img src="<?php echo $paginaWeb['imagen'];?>" alt="caso" />
            </figure>
            <div class="article-body">
                <h2><?php echo $paginaWeb['caso_exito']; ?></h2>

                <label class="lblindex"> Descripion: </label>
                <p><?php echo $paginaWeb['descripcion']; ?><p>

                <label class="lblindex"> Resumen: </label>
                <p><?php echo $paginaWeb['resumen']; ?></p>

            </div>
        </div>

    </article>

    <?php endforeach; ?>
</section>
  
