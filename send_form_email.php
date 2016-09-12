<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,700,300' rel='stylesheet' type='text/css'>
    <link href="css/custom.css" type="text/css" rel="stylesheet" />
    <title>GetBatt</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>

<body>
    <!-- ============BARRA DE NEVEGACION ================-->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/index.html"><img src="batt.png" class="bat-img"> </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li ><a href="index.html">Inicio <span class="sr-only">(current)</span></a></li>
                    <li ><a href="./productos.html">Productos <span class="sr-only">(current)</span></a></li>
                    <li ><a href="./faqs.html">Preguntas Frecuentes</a></li>
                    <li class="active"><a href="#" data-toggle="modal" data-target="#myModal">Contacto</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

<br><br> <br> <br>
<div class="container">

<?php
if(isset($_POST['email'])) {
    $email_to = "info@getbatt.com.ar";
    $email_subject = "Correo desde el formulario web";   
 
    function died($error) {
 
        // si hay algún error, el formulario puede desplegar su mensaje de aviso
 
        echo "Lo sentimos, hubo un error en sus datos y el mensaje no puede ser enviado en este momento. ";
 
        echo "Detalle de los errores.<br /><br />";
        
        echo $error."<br /><br />";
 
        echo "Porfavor corrija estos errores e inténtelo de nuevo.<br /><br />";
        die();
    }
 
    // Se valida que los campos del formulairo estén llenos
 
    if(!isset($_POST['first_name']) ||
 
        !isset($_POST['last_name']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['telephone']) ||
 
        !isset($_POST['message'])) {
 
        died('Lo sentimos pero parece haber un problema con los datos enviados.');       
 
    }
 //En esta parte el valor "name" nos sirve para crear las variables que recolectaran la información de cada campo
    
    $first_name = $_POST['first_name']; // requerido
 
    $last_name = $_POST['last_name']; // requerido
 
    $email_from = $_POST['email']; // requerido
 
    $telephone = $_POST['telephone']; // no requerido 

    $message = $_POST['message']; // requerido
 	
    $error_message = "";

//En esta parte se verifica que la dirección de correo sea válida 
    
   $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'La dirección de correo proporcionada no es válida.<br />';
 
  }

//En esta parte se validan las cadenas de texto

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$first_name)) {
 
    $error_message .= 'El formato del nombre no es válido<br />';
 
  }
 
  if(!preg_match($string_exp,$last_name)) {
 
    $error_message .= 'el formato del apellido no es válido.<br />';
 
  }
 
  if(strlen($message) < 2) {
 
    $error_message .= 'El formato del texto no es válido.<br />';
 
  }
 
  if(strlen($error_message) > 1) {
 
    died($error_message);
 
  }
 
//A partir de aqui se contruye el cuerpo del mensaje tal y como llegará al correo

    $email_message = "Contenido del Mensaje.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "Nombre: ".clean_string($first_name)."\n";
 
    $email_message .= "Apellido: ".clean_string($last_name)."\n";
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
 
    $email_message .= "Teléfono: ".clean_string($telephone)."\n";
 
    $email_message .= "Mensaje: ".clean_string($message)."\n";
  
 
//Se crean los encabezados del correo
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 
?>
 
 
 
<!-- incluye aqui tu propio mensaje de Éxito-->
 
Gracias! Nos pondremos en contacto contigo a la brevedad
 
 
<?php
 
}
 
?>


</div>
</body>




        <!-- ============ FOOTER ============ -->
        <footer class="footer">
            <div class="container text-center">
                <p> Rosario, Santa Fe, Argentina | info@getbatt.com.ar</p>
            </div>
        </footer>

    <!-- ============== CONTACTO ==================
 -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Contáctenos!</h4>
                </div>
              



                <form name="contactform"class="form-horizontal" method="post" action="send_form_email.php">
                    <fieldset>

                    <div class="modal-body">
                    
                    <div class="form-group">
                            <span class="col-md-1  text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-12">
                                <input id="fname" name="first_name" type="text" placeholder="Nombre" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1  text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-12">
                                <input id="lname" name="last_name" type="text" placeholder="Apellido" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1  text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-12">
                                <input id="email" name="email" type="text" placeholder="Email" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1  text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-12">
                                <input id="phone" name="telephone" type="text" placeholder="Teléfono" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1  text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="col-md-12">
                                <textarea class="form-control" id="message" name="message" placeholder="Escriba aqui su mensaje.Nos contactaremos proximamente." rows="7"></textarea>
                            </div>
                        </div>

                   

                    </div>

                     <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                     <button type="submit" value="Submit" class="btn btn-primary ">Enviar</button>
                  </div>

                        
                    </fieldset>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-latest.pack.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {



    });

    $(document)
        .on('click', 'a[href^="#"]', function(e) {
            e.preventDefault();
            var target = $(this).attr('href');
            $('html, body')
                .animate({
                    scrollTop: $(target).offset().top
                }, 'slow', 'swing', function() {});
        });
    </script>
</body>

</html>
