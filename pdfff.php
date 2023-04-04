<?php
ob_start();
require('../dbconn.php');
// include('../php/auth_user.php');
require_once('../vendor/autoload.php');
$login_id=$_SESSION['email'];
// $schedule_id=$_SESSION['Regid'];
$sql_user="SELECT *FROM tbl_caste WHERE email='$login_id'";
$res_user=mysqli_query($conn,$sql_user);
if($res_user)
{
    $row_user=mysqli_fetch_array($res_user);
    $name=$row_user['fname'].' '.$row_user['mname']. ' '.$row_user['lname'];
    $adress=$row_user['hname'].' '.$row_user['place'].' '.$row_user['post'].' '.$row_user['pin'];
    $caste=$row_user['category'].' '.$row_user['category'];
    $email=$row_user['email'];
    $phone_no=$row_user['post'];
}
else
echo "<script> alert('Error fetching user's personal data'); </script>";
//Load TCPDF
use \TCPDF as TCPDF;

if(isset($_POST['send'])) 
{
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Name');
    $pdf->SetTitle('Document Title');
    $pdf->SetSubject('Document Subject');
    $pdf->SetKeywords('keywords');
    $pdf->setHeaderData('', 0, '', '', array(0,0,0), array(255,255,255));

    $login_id = $_POST['email']; //name of user
    $labour_id=$_POST['Regid'];
    $subject_line= $_POST['subject'];
    $date_of_incident = $_POST['date_of_incident'];
    $complaint = $_POST['msg'];
    $date_of_complaint=date('y-m-d');

    // for storing complaint in database
    $sql_1="INSERT INTO tbl_servicesapplyed(`email`,`Regid`,`date_of_approval`,`subject`,`msg`,subject_line,complaint) VALUES('$login_id','$schedule_id','$date_of_incident','$complaint','$labour_id','$subject_line','$complaint')";
    $res_1=mysqli_query($con,$sql_1);
    if($res_1)
    {
        echo "<script> window.location.href='view_work_details.php'); </script>";
        echo "<script> alert('Complainted Successfully'); </script>";
    }
    if(!$res_1)
        echo "<script> alert('Query error in inserting data to user_complaint_tb'); </script>";
    else
    {
        $body = '<h1>Complaint</h1>'
            .'<p>Email: '.$login_id.'</p>'
            .'<p>Name: '.$name.'</p>'
            .'<p>address: '.$address.'</p>'
            .'<p>Email: '.$email.'</p>'
            .'<p>Caste: '.$caste.'</p>'
            
            .'<p>Kanjirappally,Kottayam,Kerala</p>';
        $pdf->AddPage();
        $pdf->writeHTML($body, true, false, true, false, '');
        
        //save pdf file
        $filename = '/complaint_form_' . uniqid() . '.pdf';
        $complaint_id=mysqli_insert_id($con);
        $sql_2="UPDATE tbl_caste SET file='$filename' WHERE email='$login_id'";
        $res_2=mysqli_query($con, $sql_2);
        if(!$res_2)
            echo "<script> alert('Query failed in updating filename of pdf'); </script>";
        else
        {
            $directory = 'user_complaints';
            // end output buffering and get PDF data
            $pdf_data = ob_end_clean();
            file_put_contents($directory . '/' . $filename, $pdf->Output($filename, 'S'));

            // Output the generated PDF to Browser
            $pdf->Output('/complaint_form_' . uniqid() . '.pdf', 'F');
            $pdf->Output();
        }
    }
}   
?>