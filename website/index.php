<?php
include("admin/bd.php");
// seleccionar registros servicios
$sentencia=$conexion->prepare("SELECT * FROM `tbl_servicios`");
$sentencia->execute();
$lista_servicios=$sentencia->fetchAll(PDO::FETCH_ASSOC);

// seleccionar registro de portafolio
$sentencia=$conexion->prepare("SELECT * FROM `tbl_portafolio`");
$sentencia->execute();
$lista_portafolio=$sentencia->fetchAll(PDO::FETCH_ASSOC);

//

$sentencia=$conexion->prepare("SELECT * FROM `tbl_entradas`");
$sentencia->execute();
$lista_entradas=$sentencia->fetchAll(PDO::FETCH_ASSOC);

//
$sentencia=$conexion->prepare("SELECT * FROM `tbl_equipo`");
$sentencia->execute();
$lista_equipo=$sentencia->fetchAll(PDO::FETCH_ASSOC);

//
$sentencia=$conexion->prepare("SELECT * FROM `tbl_configuraciones`");
$sentencia->execute();
$lista_configuraciones=$sentencia->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>FERIA SENA MINERO </title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img src="assets/img/sena-logo.png"assets alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#services">Servicios</a></li>
                        <li class="nav-item"><a class="nav-link" href="#portfolio">Proyecto</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">Nosotros</a></li>
                        <li class="nav-item"><a class="nav-link" href="#team">Equipo</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contacto</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading"><?php echo $lista_configuraciones[0]['valor'];?></div>
                <div class="masthead-heading text-uppercase"><?php echo $lista_configuraciones[2]['valor'];?></div>
                <a class="btn btn-primary btn-xl text-uppercase" href="#services"><?php echo $lista_configuraciones[1]['valor'];?></a>
            </div>
        </header>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase"><?php echo $lista_configuraciones[3]['valor'];?></h2>
                    <h3 class="section-subheading text-muted"><?php echo $lista_configuraciones[5]['valor'];?></h3>
                </div>
                <div class="row text-center">
                <?php foreach($lista_servicios as $registros){  ?>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas <?php echo $registros["icono"];?> fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3"><?php echo $registros["titulo"];?></h4>
                        <p class="text-muted"><?php echo $registros["descripcion"];?></p>
                    </div>
                <?php } ?>
                </div>
            </div>
        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase"><?php echo $lista_configuraciones[6]['valor'];?></h2>
                    <h3 class="section-subheading text-muted"><?php echo $lista_configuraciones[7]['valor'];?></h3>
                </div>
                
                <div class="row">
                <?php foreach($lista_portafolio as $registros){ ?>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 1-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal<?php echo $registros["ID"];?>">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/<?php echo $registros["imagen"];?>" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading"><?php echo $registros["titulo"];?></div>
                                <div class="portfolio-caption-subheading text-muted"><?php echo $registros["subtitulo"];?></div>
                            </div>
                            <div class="rw-ui-container"></div>
                       </div>
                    </div>
                    
<div class="portfolio-modal modal fade" id="portfolioModal<?php echo $registros["ID"];?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase"><?php echo $registros["titulo"];?></h2>
                                    <p class="item-intro text-muted"><?php echo $registros["subtitulo"];?></p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/<?php echo $registros["imagen"];?>" alt="..." />
                                    <p><?php echo $registros["descripcion"];?></p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Cliente:</strong>
                                            <?php echo $registros["cliente"];?>
                                        </li>
                                        <li>
                                            <strong>categoria:</strong>
                                            <?php echo $registros["categoria"];?>
                                        </li>

                                       </li>
                                             <strong>URL</strong>
                                           <a href=" <?php echo $registros["url"];?>"><?php echo $registros["url"];?></a>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        cerrar proyeto
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <?php } ?>
                    
                </div>
            </div>
        </section>
        <!-- About-->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase"><?php echo $lista_configuraciones[8]['valor'];?></h2>
                    <h3 class="section-subheading text-muted"><?php echo $lista_configuraciones[9]['valor'];?></h3>
                </div>
                <ul class="timeline">
                <?php
                $contador=1;
                 foreach($lista_entradas as $registros){ 
                    
                    ?>
                    <li <?php echo (($contador%2)==0)?'class="timeline-inverted"':""; ?>>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/<?php echo $registros["imagen"];?>" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4><?php echo $registros["fecha"];?></h4>
                                <h4 class="subheading"><?php echo $registros["titulo"];?></h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">
                                    <?php echo $registros["descripcion"];?>
                                </p>
                                </div>
                        </div>
                    </li>
                    <?php
                    $contador++;
                 } ?>
                    
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>
                            <?php echo $lista_configuraciones[10]['valor'];?>
                            </h4>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!-- Team-->
        <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase"><?php echo $lista_configuraciones[11]['valor'];?></h2>
                    <h3 class="section-subheading text-muted"><?php echo $lista_configuraciones[12]['valor'];?></h3>
                </div>
                <div class="row">
                <?php foreach($lista_equipo as $registros){ ?>
                    <div class="col-lg-4">
                        <div class="team-member">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/team/<?php echo $registros["imagen"];?>" alt="..." /></div>
                            <h4><?php echo $registros['nombrecompletos'];?></h4>
                            <p class="text-muted"><?php echo $registros['puesto'];?></p>
                            <a class="btn btn-dark btn-social mx-2" href="<?php echo $registros['twitter'];?>" aria-label="Parveen Anand Twitter Profile"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="<?php echo $registros['facebook'];?>" aria-label="Parveen Anand Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="<?php echo $registros['linkedin'];?>" aria-label="Parveen Anand LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center"><p class="large text-muted"> Llegar juntos es el principio. Mantenerse juntos, es el progreso. Trabajar juntos es el éxito.</p></div>
                </div>
            </div>
        </section>
        <!-- Clients-->
        
           
                  
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase"><?php echo $lista_configuraciones[13]['valor'];?></h2>
                    <h3 class="section-subheading text-muted"><?php echo $lista_configuraciones[14]['valor'];?></h3>
                </div>
                <form action="enviar.php" method="post">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="correo" placeholder="correo@example.com" required>
              </div>
              <div class="mb-3">
                <label for="mensaje" class="form-label">Mensaje</label>
                <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required></textarea>
              </div>
              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="acepto" required>
                <label class="form-check-label" for="acepto" >Acepto la politica de privacidad</label>
              </div>
              <div class="d-grid gap-2 col-6 mx-auto">
              <button type="submit" class="btn btn-outline-success ">Enviar</button>
            </div>
        </form>
        

    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
          

   
    <!-- * * * * * * * * * * * * * * *-->
                <!-- * * SB Forms Contact Form * *-->
                <!-- * * * * * * * * * * * * * * *-->
                <!-- This form is pre-integrated with SB Forms.-->
                <!-- To make this form functional, sign up at-->
                <!-- https://startbootstrap.com/solution/contact-forms-->
        
                <!-- to get an API token!-->
           
                    
                <!-- * * * * * * * * * * * * * * *-->
                <!-- * * SB Forms Contact Form * *-->
                <!-- * * * * * * * * * * * * * * *-->
                <!-- This form is pre-integrated with SB Forms.-->
                <!-- To make this form functional, sign up at-->
                <!-- https://startbootstrap.com/solution/contact-forms-->
                <!-- to get an API token!-->
              
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2023</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="<?php echo $lista_configuraciones[15]['valor'];?>" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="<?php echo $lista_configuraciones[16]['valor'];?>" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="<?php echo $lista_configuraciones[17]['valor'];?>" aria-label="Linkendin"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privac Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Portfolio Modals-->
        <!-- Portfolio item 1 modal popup-->
        <script type="text/javascript">(function(d, t, e, m){
    
    // Async Rating-Widget initialization.
    window.RW_Async_Init = function(){
                
        RW.init({
            huid: "493815",
            uid: "968b322e8dcb594cbb19b3a58003c64e",
            source: "website",
            options: {
                "advanced": {
                    "layout": {
                        "align": {
                            "hor": "center",
                            "ver": "top"
                        }
                    },
                    "font": {
                        "hover": {
                            "color": "#906461"
                        },
                        "italic": true,
                        "color": "#906461"
                    }
                },
                "size": "large",
                "label": {
                    "background": "#FFEDA4"
                },
                "style": "green",
                "isDummy": false
            } 
        });
        RW.render();
    };
        // Append Rating-Widget JavaScript library.
    var rw, s = d.getElementsByTagName(e)[0], id = "rw-js",
        l = d.location, ck = "Y" + t.getFullYear() + 
        "M" + t.getMonth() + "D" + t.getDate(), p = l.protocol,
        f = ((l.search.indexOf("DBG=") > -1) ? "" : ".min"),
        a = ("https:" == p ? "secure." + m + "js/" : "js." + m);
    if (d.getElementById(id)) return;              
    rw = d.createElement(e);
    rw.id = id; rw.async = true; rw.type = "text/javascript";
    rw.src = p + "//" + a + "external" + f + ".js?ck=" + ck;
    s.parentNode.insertBefore(rw, s);
    }(document, new Date(), "script", "rating-widget.com/"));</script>
        <!-- Portfolio item 2 modal popup-->
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
