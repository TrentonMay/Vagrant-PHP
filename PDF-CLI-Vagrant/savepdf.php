<?php

session_start();
require('fpdf.php');

$servername = 'localhost';
$serveruser = 'root';
$serverpass = 'rootpass';
$dbname = 'Test';

$conn = new mysqli($servername, $serveruser, $serverpass, $dbname);

if($conn->connect_error){
    die("Connection Failed:".$conn->connect_error);
}
$userid = $_GET['id'];
$sql = "select * from users where id = ".$userid;
$result = $conn->query($sql);

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
foreach($result as $out){
    $id = $out['id'];
    $firstname = $out['firstname'];
    $lastname = $out['lastname'];
    $age = $out['age'];
}
$pdf->Cell(50,12,$id);
$pdf->Cell(50,12,$firstname);
$pdf->Cell(50,12,$lastname);
$pdf->Cell(50,12,$age);


$pdf->Output();
?>