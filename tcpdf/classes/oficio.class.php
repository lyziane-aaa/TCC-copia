<?php
require_once('../../tcpdf/tcpdf.php');
require_once('../../tcpdf/classes/oficio.class.php');
include_once("../../conexao.php");


// Extend the TCPDF class to create custom Header and Footer
class oficioPDF extends TCPDF
{

    //Page header
    public function Header()
    {
        // Logo
        //  $image_file =

// If para verificar se é a primeira página
if  ($this->numpages == 1 ) {
        
        $this->Image('../../imagens/logo_gremio.png', 30, 12, 35, 28, 'PNG', '', 'M', false, 150, '', false, false, 0, false, false, true);
        // Escolhe a fonte
        $this->SetFont('Liberation Serif', 'R', 11);
     





        $html = "INSTITUTO FEDERAL DE EDUCAÇÃO, CIÊNCIA E TECNOLOGIA DO RIO GRANDE DO NORTE - <br>
        CÂMPUS MOSSORÓ - IFRN-MO<br><b> Grêmio Estudantil Valdemar dos Pássaros</b> 
            <br><i>CNPJ: 02.102.875/0001-20</i><br> Gestão 2019.2021 - IF Para Tempos de Guerra";
        $this->WriteHTMLCell(111, 5, 60, 13, $html, 0, 0, 0, 0, 'C'); // o eixo y está maior para ficar alinhado com as logos



        $this->Image('../../imagens/logo_ifmo.png', 163, 13, 45, 40, 'PNG', '', 'M', false, 150, '', false, false, 0, false, false, true);

      //  $this-> SetMargins(30, 30,15,true);
        $this->Line(30, 42, 195, 42);
        
    }else { 
        $this->Image('../../imagens/logo_gremio.png', 0, 10,25, 18, 'PNG', '', 'M', false, 150, 'C', false, false, 0, false, false, true);
        $this-> SetMargins(30, 35,15,true);
    }
    }

    // Page footer
    public function Footer()
    {
        // If para verificar se é a primeira página
        if  ($this->numpages == 1 ) {
        $this->SetY(-20); //Colocar a altura do rodapé igual a 20mm ou 2cm conforme o Manual de Redação da REGIF. Negativo por estar contando de baixo para cima.
        // Set font
        $this->SetFont('Liberation Serif', 'R', 10);
        // Page number
        // 
        $this->Line(30, 277, 195, 277);// Linha do cabeçalho
        $html = "Rua Raimundo Firmino de Oliveira, nº 400, Sala 74, Conj. Ulrick Graff, Mossoró/RN – CEP 59628-330 
        <br>Telefone: (84) 3422-2665 - Ramal: 2665  - Instagram: @gevp.ifrn – E-mail: gremio.mo@escolar.ifrn.edu.br ";
        $this->WriteHTMLCell(156, 5, 30, -20, $html, 0, 0, 0, 0, 'C');
    }else {
        $this->SetFont('Liberation Serif', 'R', 10);
        $this->SetY(-20); //Colocar a altura do rodapé igual a 20mm ou 2cm conforme o Manual de Redação da REGIF. Negativo por estar contando de baixo para cima.
        $html = 'Pág. '.$this->getAliasNumPage().'/'.$this->getAliasNbPages();
        $this->WriteHTMLCell(156, 5, 45, -10, $html, 0, 0, 0, 0, 'C');
        //$this->Cell(0, 5, 'Pág. '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
    


    }
}


