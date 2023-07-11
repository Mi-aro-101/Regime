<?php

require('fpdf/fpdf.php');
class Mypdf extends FPDF {
    // Simple table
    function BasicTable($header, $data)
    {
        $this->SetFont('Arial','',16);
        $this->Cell(0,50,"Mon programme",0,1,'C');

        $this->SetFont('Arial','',8);
            $this->Cell(15,7,$header[0],1);
        for($i =1; $i<= count($header)-1 ; $i++) {
            $this->Cell(45,7,$header[$i],1);
            
        }
        $this->Ln();
        for($i =0; $i< count($data)-1 ; $i++) {
            $sport = $data[$i]['sport']['designation_sport'].'('.$data[$i]['sport']['repetition']."x".$data[$i]['sport']['serie'].')';
            $this->Cell(15,6,$i+1,1);
            $this->Cell(45,6,$data[$i]['petit_dejeuner']['designation_plat'],1);
            $this->Cell(45,6,$data[$i]['dejeuner']['designation_plat'],1);
            $this->Cell(45,6,$data[$i]['diner']['designation_plat'],1);
            $this->Cell(45,6,$sport,1);
            $this->Ln();
        }  
    }
}
?>