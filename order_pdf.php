<?php
ob_end_clean();
ob_start();
require('../FPDF/fpdf.php');
include "../dbconn.php";

// Database Connection 
//$con = mysqli_connect("127.0.0.1","root","","car_showroom_db");
// Check for connection error
if($conn->connect_error){
    die("Error in DB connection: ".$conn->connect_errno." : ".$conn->connect_error);    
}

class PDF extends FPDF {
  
    // Page header
    function Header() {
        // $this->Image('photo/cabinet.jpg',10,80,33);
         // Add logo to page
        // $this->Image('images/logo.png',10,8,33);
        // Set font family to Arial bold 
        $this->SetFont('Arial','B',16);
        // Add a top margin of 10 units
        $this->SetY(10);
        // Display the text in the center of the page
        $this->Cell(0,10,'Taluk Offices',0,0,'C');
         // Add a line break
         $this->Ln(10);
        $this->Cell(0,10,' Caste Applications ',0,0,'C');
        $this->Ln(10);
        // Add the date and time
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 10, 'Generated on: ' . date('Y-m-d H:i:s'), 0, 0, 'R');
        // Add a line break
        $this->Ln(20);
    }

    // Page footer
    function Footer() {
          
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
          
        // Arial italic 8
        $this->SetFont('Arial','I',8);
          
        // Page number
        $this->Cell(0,10,'Page ' . 
            $this->PageNo() . '/{nb}',0,0,'C');
    }
}

// Select data from MySQL database
$select ="SELECT *frpm tbl_caste ORDER BY Regid";
$result = $conn->query($select);

// Create a new PDF object
$pdf = new PDF();

// Add a new page with the header
$pdf->AddPage('P', 'A4');
$pdf->Header();

// Define column widths
$width_cell=array(20,40,40,45,30,20);

// Set font family and size
$pdf->SetFont('Arial','',12);

// Background color of header
$pdf->SetFillColor(193,229,252);

// Print headers
// $pdf->Cell($width_cell[0],10,'ID',1,0,'C',true);
//$pdf->Cell($width_cell[0],10,'',1,0,'C',true); 
//$pdf->Cell($width_cell[0],10,'Image',1,0,'C',true); 
$pdf->Cell($width_cell[1],10,'Name',1,0,'C',true);
$pdf->Cell($width_cell[2],10,'Caste',1,0,'C',true); 
$pdf->Cell($width_cell[3],10,'Email',1,0,'C',true); 
$pdf->Cell($width_cell[4],10,'Place',1,1,'C',true); 

//$pdf->Cell($width_cell[5],10,'Quantity',1,1,'C',true); 
// Print data from MySQL
while($row = $result->fetch_object()){
    // $id = $row->id;
    //$prod_img = $row->prod_img;
    //$s=1;
    $p_name = $row->p_fname;

    $religion = $row->religion;
    //$prodname = $row->py_id;
    $email= $row->email;
    $user = $row->place;
    //$quantity = $row->quantity;
    //$pdf->Cell($width_cell[0],10,$s++,1);
    // $pdf->Cell($width_cell[0],10,$pdf->Image('photo/' . $prod_img, $pdf->GetX(), $pdf->GetY(), 10), 1, 0, 'C', false);
    // $pdf->Image('photo/cabinet.jpg',10,8,33);
    $pdf->Cell($width_cell[1],10,$p_name,1);
    $pdf->Cell($width_cell[2],10,$religion,1);
    //$pdf->Cell($width_cell[3],10,$prodname,1);
    $pdf->Cell($width_cell[3],10,$email,1);
    $pdf->Cell($width_cell[4],10,$user,1);
    
    //$pdf->Cell($width_cell[5],10,$quantity,1);
    // // Add new cell for image
    
    $pdf->Ln();
}

  

// Output the PDF document
$pdf->Output();
?>