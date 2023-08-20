<!DOCTYPE html>
<html lang="es">
<head>
<nav class="navbar navbar-light" style="background-color:#00009F ;">
  <a class="navbar-brand ml-auto mr-auto" href="#">
    <img src="<?php echo base_url();?>Imagenes/Logo_ventana.png" width="30" height="30" alt="">
  </a>
</nav>
  <meta charset="UTF-8">
  <title>Formulario de Verificación de CURP</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

  <div class="container">
    <h1>Registro para eventos</h1>

    <form action="procesar_formulario.php" method="POST">
  <div class="form-group">
    <label for="curp"><b>CURP:</b></label>
    <input type="text" class="form-control" id="curp" name="curp" placeholder="Introduzca su CURP" style="width: 400px;">
  </div>
</form>


      <div id="datos" style="display:none">
        <div class="form-group">
          <label for="nombre">Nombre:</label>
          <input type="text" class="form-control" id="Nombre_Asistente" name="Nombre_Asistente" placeholder="Introduzca su nombre">
        </div>
        <div class="form-group">
          <label for="Primer_Apellido">Apellido paterno:</label>
          <input type="text" class="form-control" id="Primer_Apellido" name="Primer_Apellido" placeholder="Introduzca su apellido paterno">
        </div>
        <div class="form-group">
          <label for="Segundo_Apellido">Apellido materno:</label>
          <input type="text" class="form-control" id="Segundo_Apellido" name="Segundo_Apellido" placeholder="Introduzca su apellido materno">
        </div>
        <div class="form-group">
          <label for="Sexo_Asistente">Sexo:</label>
          <select class="form-control" id="Sexo_Asistente" name="Sexo_Asistente">
            <option value="H">Hombre</option>
            <option value="M">Mujer</option>
          </select>
        </div>
        <div class="form-group">
          <label for="Fecha_Nacimiento">Fecha de nacimiento:</label>
          <input type="date" class="Fecha_Nacimiento" id="Fecha_Nacimiento" name="fecha_nacimiento">
        </div>
        <div class="form-group">
          <label for="Lugar_Nacimiento">Lugar de nacimiento:</label>
          <input type="text" class="form-control" id="Lugar_Nacimiento" name="Lugar_Nacimiento" placeholder="Introduzca su lugar de nacimiento">
        </div>
      </div>

      <div class="form-group" id="email-group" style="display:none">
        <label for="Correo_Electronico">Correo electrónico:</label>
        <input type="email" class="form-control" id="Correo_Electronico" name="Correo_Electronico" placeholder="Introduzca su correo electrónico">
      </div>

      <button type="submit" class="btn btn-primary" id="submit-btn" disabled>Enviar</button>
    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script
