<?php
// Datos
$token = 'apis-token-1.aTSI1U7KEuT-6bbbCguH-4Y8TI6KS73N';
$ruc = '10460278975';

// Iniciar llamada a API
$curl = curl_init();

// Buscar ruc sunat
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.apis.net.pe/v1/ruc?numero=' . $ruc,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Referer: http://apis.net.pe/api-ruc',
    'Authorization: Bearer ' . $token
  ),
));

$response = curl_exec($curl);

curl_close($curl);
// Datos de empresas según padron reducido
$empresa = json_decode($response);
var_dump($empresa);

// $ruc = $_POST['cp_numdocum'];
// $data = file_get_contents("https://api.apis.net.pe/v1/ruc?numero=".$ruc);
// $info = json_decode($data, true);

// if($data==='[]' || $info['fecha_inscripcion']==='--'){
// 	$datos = array(0 => 'nada');
// 	echo json_encode($datos);
// }else{
// $datos = array(
// 	0 => $info['ruc'], 
// 	1 => $info['razon_social'],
// 	2 => date("d/m/Y", strtotime($info['fecha_actividad'])),
// 	3 => $info['contribuyente_condicion'],
// 	4 => $info['contribuyente_tipo'],
// 	5 => $info['contribuyente_estado'],
// 	6 => date("d/m/Y", strtotime($info['fecha_inscripcion'])),
// 	7 => $info['domicilio_fiscal'],
// 	8 => date("d/m/Y", strtotime($info['emision_electronica']))
// );
// 	echo json_encode($datos);
// }
?>