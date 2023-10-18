<?php include("../../bd.php");
    if($_POST){
    $imagen=(isset($_FILES["imagen"]["name"]))?$_FILES["imagen"]["name"]:"";
    $nombrecompletos=(isset($_POST["nombrecompletos"]))?$_POST["nombrecompletos"]:"";
    $puesto=(isset($_POST['puesto']))?$_POST['puesto']:"";
    $twitter=(isset($_POST["twitter"]))?$_POST["twitter"]:"";
    $facebook=(isset($_POST["facebook"]))?$_POST["facebook"]:"";
    $linkedin=(isset($_POST["linkedin"]))?$_POST["linkedin"]:"";

    $fecha_imagen=new DateTime();
    $nombre_archivo_imagen=($imagen!="")?$fecha_imagen->getTimestamp()."_".$imagen:"";

    $tmp_imagen=$_FILES["imagen"]["tmp_name"];
    if($tmp_imagen!=""){
        move_uploaded_file($tmp_imagen,"../../../assets/img/team/".$nombre_archivo_imagen);
    }

    $sentencia=$conexion->prepare("INSERT  INTO `tbl_equipo`
     (`ID`,`imagen`,`nombrecompletos`,`puesto`,`twitter`,`facebook`,`linkedin`)
     VALUES (NULL,:imagen,:nombrecompletos,:puesto,:twitter,:facebook,:linkedin);");
    
    $sentencia->bindparam(":imagen",$nombre_archivo_imagen);
    $sentencia->bindparam(":nombrecompletos",$nombrecompletos);
    $sentencia->bindparam(":puesto",$puesto);
    $sentencia->bindparam(":twitter",$twitter);
    $sentencia->bindparam(":facebook",$facebook);
    $sentencia->bindparam(":linkedin",$linkedin);
    $sentencia->execute();

    $mensaje="Registro modificado con exito.";
    header("Location:index.php?mensaje=".$mensaje);

}
include("../../templetes/header.php"); ?>
<div class="card">
    <div class="card-header">
        Datos de la persona
    </div>
    <div class="card-body">

<form action="" method="post" enctype="multipart/form-data">
<div class="mb-3">
         <label for="imagen" class="form-label">Imagen:</label>
         <input type="file"
           class="form-control" name="imagen" id="imagen" aria-describedby="helpId" placeholder="imagen">
       </div>
<div class="mb-3">
  <label for="nombrecompletos" class="form-label">nombrecompletos:</label>
  <input type="text"
    class="form-control" name="nombrecompletos" id="nombrecompletos" aria-describedby="helpId" placeholder="Nombrecompletos">
</div>
<div class="mb-3">
  <label for="puesto" class="form-label">puesto:</label>
  <input type="text"
    class="form-control" name="puesto" id="puesto" aria-describedby="helpId" placeholder="puesto">
</div>
<div class="mb-3">
  <label for="facebook" class="form-label">Facebook:</label>
  <input type="text"
    class="form-control" name="facebook" id="facebook" aria-describedby="helpId" placeholder="Facebook">
</div>
<div class="mb-3">
  <label for="twitter" class="form-label">Twitter:</label>
  <input type="text"
    class="form-control" name="twitter" id="twitter" aria-describedby="helpId" placeholder="Twitter">
</div>
<div class="mb-3">
  <label for="linkedin" class="form-label">Linkedin:</label>
  <input type="text"
    class="form-control" name="linkedin" id="linkedin" aria-describedby="helpId" placeholder="Linkedin">
</form>

<button type="submit" class="btn btn-success">Agregar</button>

<a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
    </div>
    <div class="card-footer text-muted">
       
    </div>
</div>
<?php include("../../templetes/footer.php"); ?>


