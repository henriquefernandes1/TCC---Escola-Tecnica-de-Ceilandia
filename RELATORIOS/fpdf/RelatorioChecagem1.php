<?php

include './fpdf/fpdf.php';
include_once './Funcoes.php';

//Inclusão dos dados de acesso ao Banco
require_once '../../DAO/ChecagemDAO.php';

$ChecagemDAO = new ChecagemDAO;
$consulta = $ChecagemDAO->Pesquisar();

//Início do Relatório

$pdf = new FPDF();
$pdf->AddPage('L');

// Imagem do cabeçalho

$pdf ->IMAGE('../IMAGE/SMPSIP2.jpeg',50, 10, 80, 20);
$pdf->Ln(50);

$pdf ->SetY(30);
$pdf ->Line(5, $pdf->GetY(), 205,$pdf->GetY());
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(0,10,utf8_decode('Página -  '. $pdf->PageNo()),0,0,'R');


$pdf ->Line(5, $pdf->GetY(), 205, $pdf->GetY());

$pdf->Ln(20);
// Título do Relatório
$pdf->SetFont('Arial', 'B', 20);
$pdf->Cell(190, 20, utf8_decode('Relatório de Atividade Semanal'), 0, 0, "C");
$pdf->Ln(15);


//Início da construção da tabela


$pdf->SetFont("Arial", "I", 10);
$pdf->Cell(10, 7, "Item", 1, 0, "C");
$pdf->Cell(20, 7, "Data", 1, 0, "C");
$pdf->Cell(55, 7, "Endereco", 1, 0, "C");
//$pdf->Cell(12, 7, "Ponto", 1, 0, "C");
$pdf->Cell(55, 7, "DescricaoProblema", 1, 0, "C");
$pdf->Cell(40, 7, "Orgao Responsavel", 1, 0, "C");
$pdf->Cell(30, 7, "Tipo Problema", 1, 0, "C");
$pdf->Cell(25, 7, "Status", 1, 0, "C");
$pdf->Cell(12, 7, "Ponto", 1, 0, "C");
$pdf->Cell(30, 7, utf8_decode("Cadastrador"), 1, 0, "C");
$pdf->Ln();

foreach ($consulta as $c) {
    $imagem= "../FOTO/" . $c["Foto"];
    $pdf->Cell(10, 7, utf8_decode($c["idChecagem"]), 1, 0, "C");
    $pdf->Cell(20, 7, formatoData($c["Data"]), 1, 0, "C");
    $pdf->Cell(55, 7, utf8_decode($c["Endereco"]), 1, 0, "C");
    $pdf->Cell(55, 7, utf8_decode($c["Desc_Desordem"]), 1, 0, "C");
    $pdf->Cell(40, 7, utf8_decode($c["Org_Responsavel"]), 1, 0, "C");
    $pdf->Cell(30, 7, utf8_decode($c["Tipo_Desordem"]), 1, 0, "C");
    $pdf->Cell(25, 7, utf8_decode($c["Status"]), 1, 0, "C");
    $pdf->Cell(12, 7, $c["Ponto"], 1, 0, "C");
    $pdf->Cell(30, 7, utf8_decode($c["Nome"]), 1, 0, "C");
    
    $pdf->Ln();
}


//Rodapé

$pdf ->SetY(170);
$pdf ->Line(5, $pdf->GetY(), 205,$pdf->GetY());
$pdf->SetFont("Arial", "", 6);

$pdf->Cell(0,10,utf8_decode('Sistema de Checagem'),0,1,'C');
$pdf->Cell(0,10,utf8_decode('Contato: (61) 3358.0114/(61) 98402.1683 e contato@gmail.com'),0,0,'C');


$pdf->AddPage("p","A4");


//$pdf ->IMAGE('../IMAGE/SMPSIP2.jpeg',30, 10, 80, 20);
$pdf->Ln(2);


$pdf->SetFont("Arial", "", 14);
//$pdf->Cell(0,10,utf8_decode('Fotos'),0,0,'C');
//$pdf ->SetY(20);
//$pdf ->Line(5, $pdf->GetY(), 205,$pdf->GetY());


//$pdf ->Line(5, $pdf->GetY(), 255, $pdf->GetY());

//$pdf->Ln(10);
// Título do Relatório
$pdf->SetFont('Arial', 'B', 20);
$pdf->Cell(190, 20, utf8_decode('Fotos'), 0, 0, "C");
$pdf->Ln(15);
$pdf ->Line(5, $pdf->GetY(), 205,$pdf->GetY());

//Início da construção da tabela
$pdf->Ln(10);

$pdf->SetFont("Arial", "I", 10);


$x = 50;
$y = 50;

foreach ($consulta as $c) {
    $imagem= "../FOTO/" . $c["Foto"];
    
    $pdf->Cell( $x, $y, $pdf->Image($imagem, $pdf->GetX(), $pdf->GetY(), 50.50), 1, 1, 'C' );
    $pdf->Cell(50, 5, "Ponto: " . $c["Ponto"] . ", Foto: " . utf8_decode($c["Foto"]), 1, 0, "C");
    
   
   
    $y = $y + 50;
    $x = $x + 50;
    
    
    if ($x > 100){
        $x = 50;
        $y = 50;
        
        $pdf->Ln();  
    }
    
}


//Rodapé

$pdf ->SetY(266);
$pdf ->Line(5, $pdf->GetY(), 255,$pdf->GetY());
$pdf->SetFont("Arial", "", 8);

$pdf->Cell(0,10,utf8_decode('Sistema de Checagem - Contato: (61) 3358.0114/(61) 98402.1683 e contato@gmail.com'),0,0,'C');
$pdf->Cell(0,10,utf8_decode('Página -  '. $pdf->PageNo()),0,0,'R');
//$pdf->Cell(0,10,utf8_decode('Contato: (61) 3358.0114/(61) 98402.1683 e contato@gmail.com'),0,0,'C');


//Geração do Relatório em PDF
$pdf->Output();


