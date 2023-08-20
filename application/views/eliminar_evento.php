<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo base_url();?>Imagenes/gto.ico">
<!--<hr class="fixed-top" style="border: 20px solid #00009F;margin:0;">  linea azul superior de la pagina -->
 <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Modificacion de evento</title>
    
<style>
    .titulo{
      font-size: 3.5rem;
      text-shadow: 1.3px 2px 2px gray;
      margin-bottom: 1.5rem;
      color: red;
    }

    .espacio{
        margin-bottom: 0.5rem;
        

    }

    .alerta{
      color: red;
    }
    
</style>
</head>
<body aling='center'>
<nav class="navbar navbar-light" style="background-color:#00009F ;">
  <a class="navbar-brand ml-auto mr-auto" href="#">
    <img src="<?php echo base_url();?>Imagenes/Logo_ventana.png" width="50" height="50" alt="">
  </a>
</nav>
<div class="container">

<div class = "row">
  <div class = "col-sm-4"> </div>
  <div class = "col-sm-4"> 
  <br>
  <br>

  
  <center>
  <h1 align= center class=" titulo"><b>Eliminar Evento</b></h1>
  <h4 class="espacio alerta"> Todo evento borrado generara la perdida de los codigos de acceso de las personas inscritas </h4>
  <h4 class="espacio"> Por favor introduce el nombre del evento que deseas eliminar</h4>
  <!-- <form id="form" method="GET" action="<?php echo base_url(); ?>index.php/formulario/modificar">
<input type="text" id="query" name="query" class="form-control espacio"/>
<input type="submit" id="buscar" value="Buscar" class="btn btn-primary">
</form> -->

</center>

</div>
</div>  
</div>
<div class="container">
<table id="editTableEvento" class="display">
    <thead>
        <tr>
            <th>Nombre Evento</th>
            <th>Fecha Evento</th>
            <th>Asistencia Esperada</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Row 1 Data 1</td>
            <td>Row 1 Data 2</td>
            <td>Row 1 Data 2</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
            <td>Row 2 Data 2</td>
        </tr>
    </tbody>
</table>
</div>


<?php 
$this->load->view('modificar_evento_js');
?>


