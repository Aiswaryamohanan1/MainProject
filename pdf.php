<?php
session_start();
require_once 'fpdf.php';
include '../dbconn.php';
$n=$_SESSION['Regid'];
$query="SELECT f.*,r.* FROM `tbl_caste` where Regid='$n'" ;
$data = mysqli_query($conn,$query);

//    if(isset($_POST['btn_pdf']))
//    {
    $pdf =new FPDF('p','mm','a4');

    
    $pdf->SetFont('Times', 'B', 20);
    
    
$pdf->Rect(10, 8, 190, 280, 'D');

    while($row = mysqli_fetch_assoc( ))   
    {
  $pdf->Cell(30);
$pdf->Cell(60,20,' േകരള സർാർ
ലാൻഡ് റവന വ്
രസീത്
 ');
$pdf->Ln();
$pdf->Line(10,40,200,40);
$pdf->Ln(15);
$pdf->Cell(60,20,'CASTE CERTIFICATE
 ');
$pdf->SetFont('Times', 'B', 13);
$pdf->Cell(45,5,'   First Name :',0,0,'C');
$pdf->Cell(45,5,$row['fname'],1,0);
$pdf->Cell(45,5,$row['mname'],1,0);
$pdf->Cell(45,5,$row['lname'],1,0);
$pdf->Cell(45,5,' Caste :',0,0,'C');
$pdf->Cell(45,5,$row['category'],1,0,);
$pdf->SetFont('Times', 'B', 13);
$pdf->Line(10,60,200,60);
$pdf->Ln(30);
$pdf->Cell(50,5,' Address:',0,0);
$pdf->Cell(10);
$pdf->Cell(50,5,$row['hname'].' H',0,0);
$pdf->Cell(10,5,' Place : ',0,0);
$pdf->Cell(50);
$pdf->Cell(50,5,$row['place'],0,1);
$pdf->Cell(50,5,'post:',0,0);
$pdf->Cell(10);
$pdf->Cell(50,5,$row['post'],0,0);
$pdf->Cell(50,5,' PIN :',0,0);
$pdf->Cell(5);
$pdf->Cell(50,5,$row['pin'],0,1);
$pdf->Ln(20);




$pdf->Line(10,190,200,190);


    }
    $pdf->SetFont('Times','','10');
    // while($row = mysqli_fetch_assoc($data))   
    // {
        // $pdf->Cell(50,5,' squarefeet',0,0);
        // $pdf->cell('30','10',$row['squarefeet'],'1','0','C');
        // $pdf->cell('60','10',$row['garden'],'1','0','C');
        // // $pdf->cell('15','10',$row['email'],'1','0','C');
        // $pdf->cell('60','10',$row['bedroom'],'1','1','C');
    $path="Desktop";
    $pdf->Output();
    // $pdf->Output($_filelocation.$file_name,'F');
    // echo"upload sucessfully"

// }
	?>