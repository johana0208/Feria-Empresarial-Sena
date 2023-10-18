<?php 
include("../../bd.php");
if($_POST){
    //recepcion los valores del formulario
    $nombreconfiguracion=(isset($_POST['nombreconfiguracion']))?$_POST['nombreconfiguracion']:"";
    $valor=(isset($_POST['valor']))?$_POST['valor']:"";
     
    
    
    $sentencia=$conexion->prepare("INSERT INTO `tbl_configuraciones` (`ID`,`nombreconfiguracion`,`valor`)
     VALUES (NULL,:nombreconfiguracion, :valor);");


    $sentencia->bindParam(":nombreconfiguracion",$nombreconfiguracion);
    $sentencia->bindParam(":valor",$valor);
    $sentencia->execute();

    
    $mensaje="Registro modificado con exito..";
    header("Location:index.php?mensaje=".$mensaje);
}

include("../../templetes/header.php"); ?>
<div class="card">
    <div class="card-header">
     configuracion
    </div>
    <div class="card-body">
    <form action="" method="post" >
        
        <div class="mb-3">
          <label for="nombreconfiguracion" class="form-label">Nombre:</label>
          <input type="text"
            class="form-control" name="nombreconfiguracion" id="nombreconfiguracion" aria-describedby="helpId" placeholder="Nombre de la configuracion">
    </div>

        <div class="mb-3">
          <label for="valor" class="form-label">Valor:</label>
          <input type="text"
            class="form-control" name="valor" id="valor" aria-describedby="helpId" placeholder="Valor de la configuracion">
    </div>
    <button type="submit" class="btn btn-success">Agregar</button>

<a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

</form>
</div>
