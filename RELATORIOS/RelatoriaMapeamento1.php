<?php
include './fpdf/fpdf.php';
include_once './Funcoes.php';

//Inclusão dos dados de acesso ao Banco
require_once '../DAO/MapeamentoDAO.php';
$MapeamentoDAO = new MapeamentoDAO;
$consulta = $MapeamentoDAO->Pesquisar();

//Início do Relatório

$pdf = new FPDF();
$pdf->AddPage('L');

// Imagem do cabeçalho
$pdf ->IMAGE('../IMAGE/SMPSIP2.jpeg',100, 10, 80, 20);
$pdf->Ln(50);
$pdf ->SetY(30);
$pdf ->Line(5, $pdf->GetY(), 205,$pdf->GetY());
$pdf->SetFont("Arial", "", 10);
$pdf ->Line(5, $pdf->GetY(), 290, $pdf->GetY());
$pdf->Ln(20);

// Título do Relatório
$pdf->SetFont('Arial', 'B', 20);

$pdf->Cell(190, 20, utf8_decode('Relatório de Atividade Semanal'), 0, 0, "L");
$pdf->Ln(15);

//Início da construção da tabela
$pdf->SetFont("Arial", "I", 10);
$pdf->Cell(40, 7, "Desordem", 1, 0, "C");
$pdf->Cell(48, 7, "Endereco", 1, 0, "C");
$pdf->Cell(35, 7, "Orgao Responsavel", 1, 0, "C");
$pdf->Cell(12, 7, "Codigo", 1, 0, "C");
$pdf->Cell(12, 7, "Ponto", 1, 0, "C");
$pdf->Cell(40, 7, "Data de Registro", 1, 0, "C");
$pdf->Cell(40, 7, "Status", 1, 0, "C");
$pdf->Cell(25, 7, utf8_decode("Cadastrador"), 1, 0, "C");
$pdf->Cell(15, 7, "Imagem", 1, 1, "C");
$pdf->Ln();

foreach ($consulta as $c) {
    $imagem = "../FOTO/" . $c["Foto"];
    $pdf->Cell(40, 7, utf8_decode($c["Desc_Desordem"]), 1, 0, "C");
    $pdf->Cell(48, 7, utf8_decode($c["Endereco"]), 1, 0, "C");
    $pdf->Cell(35, 7, utf8_decode($c["Org_Responsavel"]), 1, 0, "C");
    $pdf->Cell(12, 7, utf8_decode($c["idMapeamento"]), 1, 0, "C");
    $pdf->Cell(12, 7, $c["Ponto"], 1, 0, "C");
    $pdf->Cell(40, 7, formatoData($c["Data"]), 1, 0, "C");
    $pdf->Cell(40, 7, utf8_decode($c["Status"]), 1, 0, "C");
    $pdf->Cell(25, 7, utf8_decode($c["Nome"]), 1, 0, "C");
    $pdf->Cell(15, 7, $pdf->Image($imagem, $pdf->GetX(), $pdf->GetY(), 15.20), 1, 1, 'C');
    $pdf->Ln();
}

//Rodapé
$pdf ->SetY(179);
$pdf ->Line(5, $pdf->GetY(), 290,$pdf->GetY());
$pdf->SetFont("Arial", "", 8);
$pdf->Cell(0,10,utf8_decode('Sistema de Mapeamento - Contato: (61) 3358.0114/(61) 98402.1683 e contato@gmail.com'),0,0,'C');
$pdf->Cell(0,10,utf8_decode('Página -  '. $pdf->PageNo()),0,0,'R');
$pdf->Output();


