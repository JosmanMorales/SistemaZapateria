
<?php
require('fpdf.php');

class PDF extends FPDF
{
function Header(){
        //encabezado
        $this->setFillColor(25, 10, 87);
        $this->SetTextColor(255);
        $this->Rect(0,0,300,20,'F');
        $this->SetY(7);
        $this->SetFont('Arial','B',20);
        $this->Write(5,utf8_decode('Reportes de Clientes'));
        $this->Image('http://localhost/Proyecto_zapateria/assets/img/logor.png',255,2,20);
        $this->setY(25);

        
    }
    function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Sistema Zapateria UMG',0,0,'L');
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'R');
    
}
// Tabla coloreada
function FancyTable($header, $data,$w)
{
    // Colores, ancho de línea y fuente en negrita
    $this->SetFont('Arial','',12);
    $this->SetFillColor(250, 85, 134);
    $this->SetTextColor(255);
    $this->SetTextColor(20);
    $this->SetDrawColor(191, 191, 201);
    $this->SetLineWidth(.1);
    $this->SetFont('','B');
    $this->setX(35);
    // Cabecera
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],15,utf8_decode($header[$i]),1,0,'C',true);
    $this->Ln();
    // Restauración de colores y fuentes
    $this->SetDrawColor(191, 191, 201);
    $this->SetFillColor(225, 228, 242);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Datos
    $fill = false;
    
    foreach($data as $row)
    {
        $this->setX(35);
        $this->Cell($w[0],17,$row[0],1,0,'C',$fill);
        $this->Cell($w[1],17,utf8_decode($row[1]),1,0,'C',$fill);
        $this->Cell($w[2],17,utf8_decode($row[2]),1,0,'C',$fill);
        $this->Cell($w[3],17,utf8_decode($row[3]),1,0,'C',$fill);
        $this->Cell($w[4],17,$this->Image('http://localhost/Proyecto_zapateria/assets/img/'.$row[4].'',$this->GetX()+10, $this->GetY()+2, 18),1,0,'C',false);
        $this->Ln();
        $fill = !$fill;
    }
    // Línea de cierre
    $this->setX(35);
    $this->Cell(array_sum($w),0,'','T');
}
}


?>