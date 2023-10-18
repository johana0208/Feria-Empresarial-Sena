<?php include("../../bd.php");


if(isset($_GET['txtID'])){
  $txtID=( isset($_GET['txtID']) )?$_GET['txtID']:"";

  $sentencia=$conexion->prepare("SELECT * FROM tbl_equipo WHERE id=:id ");
  $sentencia->bindParam(":id",$txtID);
  $sentencia->execute();
  $registro=$sentencia->fetch(PDO::FETCH_LAZY);
 
 
  $imagen=$registro['imagen'];
  $nombrecompletos=$registro['nombrecompletos'];
  $puesto=$registro['puesto'];
  $twitter=$registro['twitter'];
  $facebook=$registro['facebook'];
  $linkedin=$registro['linkedin'];

}

if($_POST){
$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$imagen=(isset($_FILES["imagen"]["name"]))?$_FILES["imagen"]["name"]:"";
$nombrecompletos=(isset($_POST["nombrecompletos"]))?$_POST["nombrecompletos"]:"";
$puesto=(isset($_POST['puesto']))?$_POST['puesto']:"";
$twitter=(isset($_POST["twitter"]))?$_POST["twitter"]:"";
$facebook=(isset($_POST["facebook"]))?$_POST["facebook"]:"";
$linkedin=(isset($_POST["linkedin"]))?$_POST["linkedin"]:"";

$sentencia=$conexion->prepare("UPDATE tbl_equipo SET
nombrecompletos=:nombrecompletos,
puesto=:puesto,
twitter=:twitter,
facebook=:facebook,
linkedin=:linkedin
WHERE ID=:id ");

$sentencia->bindparam(":nombrecompletos",$nombrecompletos);
$sentencia->bindparam(":puesto",$puesto);
$sentencia->bindparam(":twitter",$twitter);
$sentencia->bindparam(":facebook",$facebook);
$sentencia->bindparam(":linkedin",$linkedin);
$sentencia->bindparam(":id",$txtID);
$sentencia->execute();

if($_FILES["imagen"]["tmp_name"]!=""){
  $imagen=(isset($_FILES["imagen"]["name"]))?$_FILES["imagen"]["name"]:"";
  $fecha_imagen=new DateTime();
     $nombre_archivo_imagen=($imagen!="")? $fecha_imagen->getTimestamp()."_".$imagen:"";

     $tmp_imagen=$_FILES["imagen"]["tmp_name"];
    
       move_uploaded_file($tmp_imagen,"../../../assets/img/team/".$nombre_archivo_imagen);
   //borrado de archivo anterior
       $sentencia=$conexion->prepare("SELECT imagen FROM tbl_equipo WHERE id=:id ");
       $sentencia->bindParam(":id",$txtID);
       $sentencia->execute();
       $registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY);
   
       if(isset($registro_imagen["imagen"])){
           if(file_exists("../../../assets/img/team/".$registro_imagen["imagen"])){
               unlink("../../../assets/img/team/".$registro_imagen["imagen"]);
   
           }
               
  }
     $sentencia=$conexion->prepare("UPDATE tbl_equipo SET imagen=:imagen WHERE id=:id ");
     echo "UPDATE tbl_equipo SET imagen=:imagen WHERE id=:id ";
        
     $sentencia->bindparam(":imagen",$nombre_archivo_imagen);
     $sentencia->bindparam(":id",$txtID);
     $sentencia->execute();
     $imagen=$nombre_archivo_imagen;
  }
  $mensaje="Registro modificado con exito.";
  header("Location:index.php?mensaje=".$mensaje);

}

include("../../templetes/header.php");?>

<div class="card">
    <div class="card-header">
        Datos de la persona
    </div>
    <div class="card-body">

<form action="" method="post" enctype="multipart/form-data">

<div class="mb-3">
  <label for="" class="form-label">ID:</label>
  <input readonly value="<?php echo $txtID; ?>" type="text"
    class="form-control" name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID">
  
</div>

<div class="mb-3">
         <label for="imagen" class="form-label">Imagen:</label>
         <img width="50" src="../../../assets/img/team/<?php echo $imagen;?>" />
         <input type="file" class="form-control" value="<?php echo $imagen;?>" name="imagen" id="imagen" aria-describedby="helpId" placeholder="imagen">
          
       </div>
<div class="mb-3">
  <label for="nombrecompletos" class="form-label">nombrecompletos:</label>
  <input type="text"
    class="form-control" value="<?php echo $nombrecompletos;?>" name="nombrecompletos" id="nombrecompletos" aria-describedby="helpId" placeholder="Nombrecompletos">
</div>
<div class="mb-3">
  <label for="puesto" class="form-label">puesto:</label>
  <input type="text"
    class="form-control" value="<?php echo $puesto;?>" name="puesto" id="puesto" aria-describedby="helpId" placeholder="puesto">
</div>
<div class="mb-3">
  <label for="facebook" class="form-label">Facebook:</label>
  <input type="text"
    class="form-control" value="<?php echo $facebook;?>"  name="facebook" id="facebook" aria-describedby="helpId" placeholder="Facebook">
</div>
<div class="mb-3">
  <label for="twitter" class="form-label">Twitter:</label>
  <input type="text"
    class="form-control" value="<?php echo $twitter;?>" name="twitter" id="twitter" aria-describedby="helpId" placeholder="Twitter">
</div>
<div class="mb-3">
  <label for="linkedin" class="form-label">Linkedin:</label>
  <input type="text"
    class="form-control" value="<?php echo $linkedin;?>" name="linkedin" id="linkedin" aria-describedby="helpId" placeholder="Linkedin">
</form>

<button type="submit" class="btn btn-success">Actualizar</button>

<a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
    </div>
    <div class="card-footer text-muted">
       
    </div>
</div>