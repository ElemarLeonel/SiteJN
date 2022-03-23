<?
use Mpdf\Mpdf;
require_once './vendor/autoload.php';

$mpdf = new Mpdf();
$mpdf->WriteHTML('<h1>Hello world!</h1>');
$mpdf->Output();

?>