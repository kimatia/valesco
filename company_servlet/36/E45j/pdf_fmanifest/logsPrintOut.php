<?Php
date_default_timezone_set("Africa/Nairobi");
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 0);
if(!file_exists('fpdf.php')){
echo " Place fpdf.php file in this directory before using this page. ";
exit;	
}

if(!file_exists('font')){
echo " Place font directory in this directory before using this page. ";
exit;	
}

$id=$_GET['manifestID'];
$idd=$_GET['userID'];
//important font definition files
require "config.php"; // connection to database 
//one
// $count="select * from tbl_manifestlogs "; // SQL to get 10 records 

//two
$count = "SELECT * FROM tbl_manifestlogs  WHERE stackID=".$id." and userID=".$idd." ORDER BY id ASC";
//  $count->execute();
define('FPDF_FONTPATH','font/');

require('fpdf/fpdf.php');
// require('freeSerig.php');
// require('freeSeriy.php');
$pdf = new FPDF(); 
$pdf->AddPage();

$width_cell=array(10,10,20,140,20);
$pdf->SetFont('Arial','B',16);

$pdf->SetFillColor(193,229,252); // Background color of header 
// Header starts /// 
$pdf->Cell($width_cell[0],10,'MID',1,0,C,true); // First header column
$pdf->Cell($width_cell[2],10,'USER',1,0,C,true); // Third header column 
$pdf->Cell($width_cell[3],10,'ACTION',1,0,C,true); // Fourth header column
$pdf->Cell($width_cell[4],10,'DATE',1,1,C,true); // Third header column 

//// header ends ///////

$pdf->SetFont('Arial','',8);
$pdf->SetFillColor(235,236,236); // Background color of header 
$fill=false; // to give alternate background fill color to rows 

/// each record is one row  ///
foreach ($dbo->query($count) as $row) {
$pdf->Cell($width_cell[0],10,$row['stackID'],1,0,C,$fill);
$pdf->Cell($width_cell[2],10,$row['postUser'],1,0,C,$fill);
$pdf->Cell($width_cell[3],10,$row['action'],1,0,C,$fill);
$pdf->Cell($width_cell[4],10,$row['postDate'],1,1,C,$fill);
$fill = !$fill; // to give alternate background fill  color to rows
}
/// end of records /// 

$pdf->Output();

?>
