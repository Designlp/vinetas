<?php ob_start(); ?>


<?php
if(isset($_POST['btnenviar1'])){
    $m = $_POST['txtQR'];
    $n = $_POST['txtID'];
}

include "../conexion.php";
$query_proveedor = mysqli_query($conexion, "SELECT idusuario,nombre,correo,usuario,CI,tel,rol FROM usuario where idusuario = '$n' ");
$resultado_proveedor = mysqli_num_rows($query_proveedor);
mysqli_close($conexion);

?>
 <link rel="stylesheet" href="style.css">
 <script type="text/javascript" src="http://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
          <script src="https://unpkg.com/qrious@4.0.2/dist/qrious.js"></script>

          <script type="text/javascript" src="jquery.min.js"></script>
          <script type="text/javascript" src="qrcode.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/core.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/md5.js"></script>
    
<div class="business-card middle">
    <div class="front">
        
            <h2>JD Khan</h2>
            <span>Web Develpor</span>
            <ul class="contact-info">
                <li>
                    <i class="fas fa-mobile-alt"></i> +92330000000
                </li>
                <li>
                    <i class="far fa-envelope"></i> fantacydesignss@gmail.com
                </li>
                <li>
                    <i class="fas fa-map-marker-alt"></i> kpk, Pakistan
                </li>
            </ul>
       
           <div class="back2">
                 <ul class="contact-info2">
                <li>
                    <i class="fas fa-map-marker-alt"></i> kpk, Pakistan
                </li>
                <li>
                    <i class="fas fa-map-marker-alt"></i> kpk, Pakistan
                </li>

                </ul>
          
            </div>
        </div>
    </div>
</div>
<?php
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new DOMPDF();

$customPaper = array(0,0,360,360);
$dompdf->setPaper($customPaper);

$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
$filename = "profesionales.pdf";
file_put_contents($filename, $pdf);
$dompdf->stream($filename);
?>
