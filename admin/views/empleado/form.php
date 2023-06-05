<h1>
    <?php echo ($action == 'edit') ? 'Modificar' : 'Nuevo'; ?> Empleado
</h1>

<div class="row">
    <div class="col-6">
        <form id="form" class="container-fluid" method="POST" action="empleado.php?action=<?php echo $action; ?>"
            enctype="multipart/form-data">
            <div class="row">
                <div class="col-2">
                    <label for="nombre">Nombre:</label>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <input required="required" type="text" class="" id="nombre" name="data[nombre]"
                        value="<?php echo isset($data[0]['nombre']) ? $data[0]['nombre'] : ''; ?>" minlength="3"
                        maxlength="200">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="primer_apellido">Apellido paterno:</label>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <input required="required" type="text" class="" id="primer_apellido" name="data[primer_apellido]"
                        value="<?php echo isset($data[0]['primer_apellido']) ? $data[0]['primer_apellido'] : ''; ?>"
                        minlength="3" maxlength="200">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="segundo_apellido">Apellido materno:</label>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <input required="required" type="text" class="" id="segundo_apellido" name="data[segundo_apellido]"
                        value="<?php echo isset($data[0]['segundo_apellido']) ? $data[0]['segundo_apellido'] : ''; ?>"
                        minlength="3" maxlength="200">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="fechaNacimiento">Fecha nacimiento:</label>
                </div>
            </div>
            <div class="row">

                <div class="col-2">
                    <input required="required" type="date" class="" id="fechaNacimiento" name="data[fechaNacimiento]"
                        value="<?php echo isset($data[0]['fechaNacimiento']) ? $data[0]['fechaNacimiento'] : ''; ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                    <label for="rfc">RFC:</label>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <input required="required" type="text" class="" id="rfc" name="data[rfc]"
                        value="<?php echo isset($data[0]['rfc']) ? $data[0]['rfc'] : ''; ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                    <label for="curp">CURP:</label>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <input required="required" type="text" class="" id="curp" name="data[curp]"
                        value="<?php echo isset($data[0]['curp']) ? $data[0]['curp'] : ''; ?>">
                </div>
            </div>

            <div class="row">
                <p></p>
            </div>

            <div class="row">
                <div class="col-2">
                    <label for="id_departamento">Departamento:</label>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <select name="data[id_departamento]" required="required">
                        <?php
                        $selected = " ";
                        foreach ($dataDepartamentos as $key => $depto):
                            if ($depto['id_departamento'] == $data[0]['id_departamento']):
                                $selected = "selected";
                            endif;
                            ?>
                            <option value="<?php echo $depto['id_departamento']; ?>" <?php echo $selected; ?>>
                                <?php echo $depto['departamento'] ?></option>
                            <?php $selected = " "; endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="row">
                <p></p>
            </div>


            <div class="row">
                <div class="col-12">
                    <input id="btn" type="submit" class="btn btn-primary mb-3" name="enviar" value="Guardar">
                </div>
            </div>

            <?
            if ($action == 'edit'): ?>
                <input type="hidden" name="data[id_empleado]"
                    value="<?php echo isset($data[0]['id_empleado']) ? $data[0]['id_empleado'] : ''; ?>" class="" />
            <? endif; ?>
        </form>
    </div>
    <div class="col-6">
        <h1>Selecciona un dispositivo</h1>
        <div>
            <select name="listaDeDispositivos" id="listaDeDispositivos"></select>
            <button id="boton">Tomar foto</button>
            <p id="estado"></p>
        </div>
        <br>
        <video muted="muted" id="video"></video>
        <canvas id="canvas" style="display: none;"></canvas>
    </div>
</div>

<script>
    /*
    Tomar una fotografía y guardarla en un archivo v3
    @date 2018-10-22
    @author parzibyte
    @web parzibyte.me/blog
*/
    const tieneSoporteUserMedia = () =>
        !!(navigator.getUserMedia || (navigator.mozGetUserMedia || navigator.mediaDevices.getUserMedia) || navigator.webkitGetUserMedia || navigator.msGetUserMedia)
    const _getUserMedia = (...arguments) =>
        (navigator.getUserMedia || (navigator.mozGetUserMedia || navigator.mediaDevices.getUserMedia) || navigator.webkitGetUserMedia || navigator.msGetUserMedia).apply(navigator, arguments);

    // Declaramos elementos del DOM
    const $video = document.querySelector("#video"),
        $canvas = document.querySelector("#canvas"),
        $estado = document.querySelector("#estado"),
        $boton = document.querySelector("#boton"),
        $listaDeDispositivos = document.querySelector("#listaDeDispositivos");

    const limpiarSelect = () => {
        for (let x = $listaDeDispositivos.options.length - 1; x >= 0; x--)
            $listaDeDispositivos.remove(x);
    };
    const obtenerDispositivos = () => navigator
        .mediaDevices
        .enumerateDevices();

    // La función que es llamada después de que ya se dieron los permisos
    // Lo que hace es llenar el select con los dispositivos obtenidos
    const llenarSelectConDispositivosDisponibles = () => {

        limpiarSelect();
        obtenerDispositivos()
            .then(dispositivos => {
                const dispositivosDeVideo = [];
                dispositivos.forEach(dispositivo => {
                    const tipo = dispositivo.kind;
                    if (tipo === "videoinput") {
                        dispositivosDeVideo.push(dispositivo);
                    }
                });

                // Vemos si encontramos algún dispositivo, y en caso de que si, entonces llamamos a la función
                if (dispositivosDeVideo.length > 0) {
                    // Llenar el select
                    dispositivosDeVideo.forEach(dispositivo => {
                        const option = document.createElement('option');
                        option.value = dispositivo.deviceId;
                        option.text = dispositivo.label;
                        $listaDeDispositivos.appendChild(option);
                    });
                }
            });
    }

    (function () {
        // Comenzamos viendo si tiene soporte, si no, nos detenemos
        if (!tieneSoporteUserMedia()) {
            alert("Lo siento. Tu navegador no soporta esta característica");
            $estado.innerHTML = "Parece que tu navegador no soporta esta característica. Intenta actualizarlo.";
            return;
        }
        //Aquí guardaremos el stream globalmente
        let stream;


        // Comenzamos pidiendo los dispositivos
        obtenerDispositivos()
            .then(dispositivos => {
                // Vamos a filtrarlos y guardar aquí los de vídeo
                const dispositivosDeVideo = [];

                // Recorrer y filtrar
                dispositivos.forEach(function (dispositivo) {
                    const tipo = dispositivo.kind;
                    if (tipo === "videoinput") {
                        dispositivosDeVideo.push(dispositivo);
                    }
                });

                // Vemos si encontramos algún dispositivo, y en caso de que si, entonces llamamos a la función
                // y le pasamos el id de dispositivo
                if (dispositivosDeVideo.length > 0) {
                    // Mostrar stream con el ID del primer dispositivo, luego el usuario puede cambiar
                    mostrarStream(dispositivosDeVideo[0].deviceId);
                }
            });



        const mostrarStream = idDeDispositivo => {
            _getUserMedia({
                video: {
                    // Justo aquí indicamos cuál dispositivo usar
                    deviceId: idDeDispositivo,
                }
            },
                (streamObtenido) => {
                    // Aquí ya tenemos permisos, ahora sí llenamos el select,
                    // pues si no, no nos daría el nombre de los dispositivos
                    llenarSelectConDispositivosDisponibles();

                    // Escuchar cuando seleccionen otra opción y entonces llamar a esta función
                    $listaDeDispositivos.onchange = () => {
                        // Detener el stream
                        if (stream) {
                            stream.getTracks().forEach(function (track) {
                                track.stop();
                            });
                        }
                        // Mostrar el nuevo stream con el dispositivo seleccionado
                        mostrarStream($listaDeDispositivos.value);
                    }

                    // Simple asignación
                    stream = streamObtenido;

                    // Mandamos el stream de la cámara al elemento de vídeo
                    $video.srcObject = stream;
                    $video.play();

                    //Escuchar el click del botón para tomar la foto
                    //Escuchar el click del botón para tomar la foto
                    $boton.addEventListener("click", function () {

                        //Pausar reproducción
                        $video.pause();

                        //Obtener contexto del canvas y dibujar sobre él
                        let contexto = $canvas.getContext("2d");
                        $canvas.width = $video.videoWidth;
                        $canvas.height = $video.videoHeight;
                        contexto.drawImage($video, 0, 0, $canvas.width, $canvas.height);

                        let foto = $canvas.toDataURL(); //Esta es la foto, en base 64
                        $estado.innerHTML = "Enviando foto. Por favor, espera...";
                        fetch("./views/empleado/guardar_foto.php", {
                            method: "POST",
                            body: encodeURIComponent(foto),
                            headers: {
                                "Content-type": "application/x-www-form-urlencoded",
                            }
                        })
                            .then(resultado => {
                                // A los datos los decodificamos como texto plano
                                return resultado.text()
                            })
                            .then(nombreDeLaFoto => {
                                // nombreDeLaFoto trae el nombre de la imagen que le dio PHP
                                console.log("La foto fue enviada correctamente");
                                $estado.innerHTML = `Foto guardada con éxito. Puedes verla <a target='_blank' href='./views/empleado/${nombreDeLaFoto}'> aquí</a>`;
                            })

                        //Reanudar reproducción
                        $video.play();
                    });
                }, (error) => {
                    console.log("Permiso denegado o error: ", error);
                    $estado.innerHTML = "No se puede acceder a la cámara, o no diste permiso.";
                });
        }
    })();
    /*const form = document.getElementById("form");
    const btn = document.getElementById("btn");
    const rfc = document.getElementById("rfc");
    form.addEventListener("submit", (e) =>{
        e.preventDefault();
        if(validarRFC && validarCURP){
            form.submit();
        }
    });
    function validarRFC(){
        const rfcValue = rfc.value;
        const curpValue = curp.value;
        if(rfcValue.match(
            /^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/
        ))
        {
            return true;
        }
        else{
            return false;
        }
    }
    function validarCURP(){
        const curpValue = curp.value;
        if(curpValue.match(
            /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/
        ))
        {
            return true;
        }
        else{
            return false;
        }
    }*/
</script>