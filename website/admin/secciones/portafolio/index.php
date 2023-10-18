<?php 
include("../../bd.php");

if(isset($_GET['txtID'])){
    $txtID=( isset($_GET['txtID']) )?$_GET['txtID']:"";

    $sentencia=$conexion->prepare("SELECT imagen FROM tbl_portafolio WHERE id=:id ");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    $registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY);

    if(isset($registro_imagen["imagen"])){
        if(file_exists("../../../assets/img/portfolio/".$registro_imagen["imagen"])){
            unlink("../../../assets/img/portfolio/".$registro_imagen["imagen"]);

        }
         
       
    }


    $sentencia=$conexion->prepare("DELETE  FROM tbl_portafolio WHERE id=:id ");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
}   
//selecionar registro
$sentencia=$conexion->prepare("SELECT * FROM `tbl_portafolio`");
$sentencia->execute();
$lista_portafolio=$sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../templetes/header.php"); ?>
<div class="card">
    <div class="card-header">
    <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar registro </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                    </tr>
                        <th scope="col">ID</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Programadores</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($lista_portafolio as $registros){  ?>
                    <tr class="">
                        <td scope="col"><?php echo $registros['ID'];?></td>
                        <td scope="col">
                        <h6><?php echo $registros['titulo'];?></h6>
                        <?php echo $registros['subtitulo'];?>
                       <br>- <?php echo $registros['url'];?>
                </td>
                        <td scope="col">
                            <img width="50" src="../../../assets/img/portfolio/<?php echo $registros['imagen'];?>" />
                </td>
                        <td scope="col"><?php echo $registros['descripcion'];?></td>
                        <td scope="col">
                          - <?php echo $registros['subtitulo'];?>
                          <br>- <?php echo $registros['cliente'];?></td>
                </td>
                        
                        <td scope="col">
                                        <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registros['ID']; ?>" role="button">Editar</a>
                                        |
                                        <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $registros['ID']; ?>" role="button">Eliminar</a>
                       
                    </tr>
                  <?php } ?>
                    </tr>
                </tbody>
            </table>
        </div>
        
    </div>
    <div class="card-footer text-muted">
    
    </div>
</div>
