<?php
session_start();
ob_start();

require_once('C:\Home\htdocs\school\ccrs\fpdf\fpdf.php');
require_once('BD.php');

// Fetch data from database
$sql = "SELECT * FROM etudiant3 WHERE pwd='".$_SESSION['password']."' AND login='".$_SESSION['user']."'";
$stmt = $dbh->query($sql);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $dbh->prepare($sql);
#$stmt->execute([':id' => $id]);

if ($stmt->rowCount() > 0) {
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    // access result columns using $result['column_name']
} else {
    // handle error when no rows are returned
}

// Create new PDF document
$pdf = new FPDF();
// Set document information
$pdf->SetAuthor('ENSA Marrakech');
$pdf->SetTitle('Recu de candidature');
$pdf->SetSubject('Recu de candidature');

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('Arial','B',16);
// Add a title
$pdf->Cell(0, 10, 'Recu de candidature', 0, 1, 'C');

// Set font
$pdf->SetFont('helvetica', '', 12);

// Create a table header
$pdf->Cell(30, 10, 'Nom', 1);
$pdf->Cell(30, 10, 'Prenom', 1);
$pdf->Cell(50, 10, 'Email', 1);
$pdf->Cell(30, 10, 'Date', 1);
$pdf->Cell(30, 10, 'Diplome', 1);
$pdf->Cell(30, 10, 'Niveau', 1);
$pdf->Cell(50, 10, 'Etablissement', 1);
$pdf->Ln();

// Add candidate information in the table cells
$pdf->Cell(30, 10, $data['nom'], 1);
$pdf->Cell(30, 10, $data['prenom'], 1);
$pdf->Cell(50, 10, $data['email'], 1);
$pdf->Cell(30, 10, $data['date'], 1);
$pdf->Cell(30, 10, $data['diplome'], 1);
$pdf->Cell(30, 10, $data['niveau'], 1);
$pdf->Cell(50, 10, $data['etablissement'], 1);

// Output the PDF file
$pdf->Output('recu.pdf', 'D');
?>
