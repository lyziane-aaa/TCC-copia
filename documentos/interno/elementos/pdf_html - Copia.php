<?php

("/fpdf/fpdf.php");

class HPDF extends FPDF
{


    //variables of html parser
    protected $B;
    protected $I;
    protected $U;
    protected $HREF;
    protected $fontList;
    protected $issetfont;
    protected $issetcolor;

    function __construct($orientation = 'P', $unit = 'mm', $format = 'A4')
    {
        //Call parent constructor
        parent::__construct($orientation, $unit, $format);

        //Initialization
        $this->B = 0;
        $this->I = 0;
        $this->U = 0;
        $this->HREF = '';

        $this->tableborder = 0;
        $this->tdbegin = false;
        $this->tdwidth = 0;
        $this->tdheight = 0;
        $this->tdalign = "L";
        $this->tdbgcolor = false;

        $this->oldx = 0;
        $this->oldy = 0;

        $this->fontlist = array("arial", "times", "courier", "helvetica", "symbol");
        $this->issetfont = false;
        $this->issetcolor = false;
    }

    // Inline Image
    function InlineImage($file, $x = null, $y = null, $w = 0, $h = 0, $type = '', $link = '')
    {
        // ----- Code from FPDF->Image() -----
        // Put an image on the page
        if ($file == '') {
            $this->Error('Image file name is empty');
        }
        if (!isset($this->images[$file])) {
            // First use of this image, get info
            if ($type == '') {
                $pos = strrpos($file, '.');
                if (!$pos)
                    $this->Error('Image file has no extension and no type was specified: ' . $file);
                $type = substr($file, $pos + 1);
            }
            $type = strtolower($type);
            if ($type == 'jpeg')
                $type = 'jpg';
            $mtd = '_parse' . $type;
            if (!method_exists($this, $mtd))
                $this->Error('Unsupported image type: ' . $type);
            $info = $this->$mtd($file);
            $info['i'] = count($this->images) + 1;
            $this->images[$file] = $info;
        } else
            $info = $this->images[$file];

        // Automatic width and height calculation if needed
        if ($w == 0 && $h == 0) {
            // Put image at 96 dpi
            $w = -96;
            $h = -96;
        }
        if ($w < 0) {
            $w = -$info['w'] * 72 / $w / $this->k;
        }
        if ($h < 0) {
            $h = -$info['h'] * 72 / $h / $this->k;
        }
        if ($w == 0) {
            $w = $h * $info['w'] / $info['h'];
        }
        if ($h == 0) {
            $h = $w * $info['h'] / $info['w'];
        }

        // Flowing mode
        if ($y === null) {
            if ($this->y + $h > $this->PageBreakTrigger && !$this->InHeader && !$this->InFooter && $this->AcceptPageBreak()) {
                // Automatic page break
                $x2 = $this->x;
                $this->AddPage($this->CurOrientation, $this->CurPageSize, $this->CurRotation);
                $this->x = $x2;
            }
            $y = $this->y;
            $this->y += $h;
        }

        if ($x === null) {
            $x = $this->x;
            $this->_out(sprintf('q %.2F 0 0 %.2F %.2F %.2F cm /I%d Do Q', $w * $this->k, $h * $this->k, $x * $this->k, ($this->h - ($y + $h)) * $this->k, $info['i']));
        }
        if ($link) {
            $this->Link($x, $y, $w, $h, $link);
        }
        # -----------------------

        // Update Y
        $this->y += $h;
    }
    // Page header
    function Header()
    {

        if ($this->PageNo() == 1) {
            $this->SetFont('Liberation Serif');
            $this->SetFontSize('11');
            // Move to the right
            $this->Image('../../../imagens/gevp.png', 35, 12, 35);


            $this->Cell(170, 5, 'INSTITUTO FEDERAL DE EDUCA????O, CI??NCIA E ', 0, 1, 'C');
            $this->Cell(170, 5, 'TECNOLOGIA DO RIO GRANDE DO NORTE -', 0, 1, 'C');
            $this->Cell(170, 5, 'C??MPUS MOSSOR?? - IFRN-MO', 0, 1, 'C');
            $this->Ln(1);
            $this->SetFont('Liberation Serif', 'B', '10');
            $this->Cell(170, 5, 'Gr??mio Estudantil Valdemar dos P??ssaros', 0, 1, 'C');
            $this->SetFont('Liberation Serif');
            $this->Cell(170, 5, 'CNPJ: 02.102.875/0001-20', 0, 1, 'C');
            $this->SetFont('Liberation Serif', 'I', '10');
            $this->Cell(170, 5, 'Gest??o 2019.2020: IF Para Tempos de Guerra', 0, 1, 'C');
            $this->Image('../../../imagens/logo_ifmo.png', 160, 10, 30); //156 ??? o tamanho da p???gina sem as margens
            $this->Line(30, 41, 195, 41);



            // Line break
            $this->Ln(5);
        } else {
            $this->Ln(30);
            $this->Image('../../../imagens/gevp.png', 95, 12, 30);
        }
    }

    // Page footer
    function Footer()

    {
        if ($this->flagg == 1) {
        } else {
            $this->SetY(-20);
            $this->Line(30, 277, 195, 277);
            // Position at 1.5 cm from bottom

            // Arial italic 8
            $this->SetFont('Liberation Serif');
            $this->SetFontSize('11');
            // Page number
            $this->Cell(156, 5, 'Rua Raimundo Firmino de Oliveira, n?? 400, Sala 74, Conj. Ulrick Graff, Mossor???-RN ??? CEP 59628-330', 0, 0, "L"); // Alinhamento "L" apenas para n???o ficar torto
            $this->Ln(4);
            $this->Cell(156, 5, ' Telefone: (84) 3422-2665 - Ramal: 2665  - Instagram: @gevp.ifrn', 0, 0, "C");
        }
    }


    protected $PRE = false;



    function txtentities($html)
    {
        $trans = get_html_translation_table(HTML_ENTITIES);
        $trans = array_flip($trans);
        return strtr($html, $trans);
    }
}

/*





function px2mm($px){
return $px*25.4/72;
}

}

function CloseTag($tag)
{// Closing tag
if($tag=='B' || $tag=='I' || $tag=='U')
$this->SetStyle($tag,false);
if($tag=='A')
$this->HREF = '';
//Closing tag
if ($tag=='H1' || $tag=='H2' || $tag=='H3' || $tag=='H4'){
    $this->Ln(6);
    $this->SetFont('Times','',12);
    $this->SetFontSize(12);
    $this->SetStyle('U',false);
    $this->SetStyle('B',false);
   // $this->mySetTextColor(-1);
}
if ($tag=='PRE'){
    $this->SetFont('Times','',12);
    $this->SetFontSize(12);
    $this->PRE=false;
}
if ($tag=='RED' || $tag=='BLUE')
    $this->mySetTextColor(-1);
if ($tag=='BLOCKQUOTE'){
    $this->mySetTextColor(0,0,0);
    $this->Ln(3);
}
if($tag=='STRONG')
    $tag='B';
if($tag=='EM')
    $tag='I';

if($tag=='B' || $tag=='I' || $tag=='U')
    $this->SetStyle($tag,false);
if($tag=='A')
    $this->HREF='';
if($tag=='FONT'){
    if ($this->issetcolor==true) {
        $this->SetTextColor(0,0,0);
    }
    if ($this->issetfont) {
        $this->SetFont('Times','',12);
        $this->issetfont=false;
    }
}
}

function SetStyle($tag, $enable)
{
// Modify style and select corresponding font
$this->$tag += ($enable ? 1 : -1);
$style = '';
foreach(array('B', 'I', 'U') as $s)
{
if($this->$s>0)
    $style .= $s;
}
$this->SetFont('',$style);
}

function PutLink($URL, $txt)
{
// Put a hyperlink
$this->SetTextColor(0,0,255);
$this->SetStyle('U',true);
$this->Write(5,$txt,$URL);
$this->SetStyle('U',false);
$this->SetTextColor(0);
}

function Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
{
$k=$this->k;
if($this->y+$h>$this->PageBreakTrigger && !$this->InHeader && !$this->InFooter && $this->AcceptPageBreak())
{
$x=$this->x;
$ws=$this->ws;
if($ws>0)
{
    $this->ws=0;
    $this->_out('0 Tw');
}
$this->AddPage($this->CurOrientation);
$this->x=$x;
if($ws>0)
{
    $this->ws=$ws;
    $this->_out(sprintf('%.3F Tw',$ws*$k));
}
}
if($w==0)
$w=$this->w-$this->rMargin-$this->x;
$s='';
if($fill || $border==1)
{
if($fill)
    $op=($border==1) ? 'B' : 'f';
else
    $op='S';
$s=sprintf('%.2F %.2F %.2F %.2F re %s ',$this->x*$k,($this->h-$this->y)*$k,$w*$k,-$h*$k,$op);
}
if(is_string($border))
{
$x=$this->x;
$y=$this->y;
if(is_int(strpos($border,'L')))
    $s.=sprintf('%.2F %.2F m %.2F %.2F l S ',$x*$k,($this->h-$y)*$k,$x*$k,($this->h-($y+$h))*$k);
if(is_int(strpos($border,'T')))
    $s.=sprintf('%.2F %.2F m %.2F %.2F l S ',$x*$k,($this->h-$y)*$k,($x+$w)*$k,($this->h-$y)*$k);
if(is_int(strpos($border,'R')))
    $s.=sprintf('%.2F %.2F m %.2F %.2F l S ',($x+$w)*$k,($this->h-$y)*$k,($x+$w)*$k,($this->h-($y+$h))*$k);
if(is_int(strpos($border,'B')))
    $s.=sprintf('%.2F %.2F m %.2F %.2F l S ',$x*$k,($this->h-($y+$h))*$k,($x+$w)*$k,($this->h-($y+$h))*$k);
}
if($txt!='')
{
if($align=='R')
    $dx=$w-$this->cMargin-$this->GetStringWidth($txt);
elseif($align=='C')
    $dx=($w-$this->GetStringWidth($txt))/2;
elseif($align=='FJ')
{
    //Set word spacing
    $wmax=($w-2*$this->cMargin);
    $this->ws=($wmax-$this->GetStringWidth($txt))/substr_count($txt,' ');
    $this->_out(sprintf('%.3F Tw',$this->ws*$this->k));
    $dx=$this->cMargin;
}
else
    $dx=$this->cMargin;
$txt=str_replace(')','\\)',str_replace('(','\\(',str_replace('\\','\\\\',$txt)));
if($this->ColorFlag)
    $s.='q '.$this->TextColor.' ';
$s.=sprintf('BT %.2F %.2F Td (%s) Tj ET',($this->x+$dx)*$k,($this->h-($this->y+.5*$h+.3*$this->FontSize))*$k,$txt);
if($this->underline)
    $s.=' '.$this->_dounderline($this->x+$dx,$this->y+.5*$h+.3*$this->FontSize,$txt);
if($this->ColorFlag)
    $s.=' Q';
if($link)
{
    if($align=='FJ')
        $wlink=$wmax;
    else
        $wlink=$this->GetStringWidth($txt);
    $this->Link($this->x+$dx,$this->y+.5*$h-.5*$this->FontSize,$wlink,$this->FontSize,$link);
}
}
if($s)
$this->_out($s);
if($align=='FJ')
{
//Remove word spacing
$this->_out('0 Tw');
$this->ws=0;
}
$this->lasth=$h;
if($ln>0)
{
$this->y+=$h;
if($ln==1)
    $this->x=$this->lMargin;
}
else
$this->x+=$w;
}



// fun??????es tabela
function WriteTable($data, $w)
{
$this->SetLineWidth(.3);
$this->SetFillColor(255,255,255);
$this->SetTextColor(0);
$this->SetFont('');
foreach($data as $row)
{
$nb=0;
for($i=0;$i<count($row);$i++)
    $nb=max($nb,$this->NbLines($w[$i],trim($row[$i])));
$h=5*$nb;
$this->CheckPageBreak($h);
for($i=0;$i<count($row);$i++)
{
    $x=$this->GetX();
    $y=$this->GetY();
    $this->Rect($x,$y,$w[$i],$h);
    $this->MultiCell($w[$i],5,trim($row[$i]),0,'C');
    //Put the position to the right of the cell
    $this->SetXY($x+$w[$i],$y);                    
}
$this->Ln($h);

}
}

function NbLines($w, $txt)
{
//Computes the number of lines a MultiCell of width w will take
$cw=&$this->CurrentFont['cw'];
if($w==0)
$w=$this->w-$this->rMargin-$this->x;
$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
$s=str_replace("\r",'',$txt);
$nb=strlen($s);
if($nb>0 && $s[$nb-1]=="\n")
$nb--;
$sep=-1;
$i=0;
$j=0;
$l=0;
$nl=1;
while($i<$nb)
{
$c=$s[$i];
if($c=="\n")
{
    $i++;
    $sep=-1;
    $j=$i;
    $l=0;
    $nl++;
    continue;
}
if($c==' ')
    $sep=$i;
$l+=$cw[$c];
if($l>$wmax)
{
    if($sep==-1)
    {
        if($i==$j)
            $i++;
    }
    else
        $i=$sep+1;
    $sep=-1;
    $j=$i;
    $l=0;
    $nl++;
}
else
    $i++;
}
return $nl;
}

function CheckPageBreak($h)
{
//If the height h would cause an overflow, add a new page immediately
if($this->GetY()+$h>$this->PageBreakTrigger)
$this->AddPage($this->CurOrientation);
}

function ReplaceHTML($html)
{
$html = str_replace( '<li>', "\n<br> - " , $html );
$html = str_replace( '<LI>', "\n - " , $html );
$html = str_replace( '</ul>', "\n\n" , $html );
$html = str_replace( '<strong>', "<b>" , $html );
$html = str_replace( '</strong>', "</b>" , $html );
$html = str_replace( '&#160;', "\n" , $html );
$html = str_replace( '&nbsp;', " " , $html );
$html = str_replace( '&quot;', "\"" , $html ); 
$html = str_replace( '&#39;', "'" , $html );
return $html;
}

function ParseTable($Table)
{
$_var='';
$htmlText = $Table;
$parser = new HtmlParser ($htmlText);
while ($parser->parse())
{
if(strtolower($parser->iNodeName)=='table')
{
    if($parser->iNodeType == NODE_TYPE_ENDELEMENT)
        $_var .='/::';
    else
        $_var .='::';
}

if(strtolower($parser->iNodeName)=='tr')
{
    if($parser->iNodeType == NODE_TYPE_ENDELEMENT)
        $_var .='!-:'; //opening row
    else
        $_var .=':-!'; //closing row
}
if(strtolower($parser->iNodeName)=='td' && $parser->iNodeType == NODE_TYPE_ENDELEMENT)
{
    $_var .='#,#';
}
if ($parser->iNodeName=='Text' && isset($parser->iNodeValue))
{
    $_var .= $parser->iNodeValue;
}
}
$elems = explode(':-!',str_replace('/','',str_replace('::','',str_replace('!-:','',$_var)))); //opening row
foreach($elems as $key=>$value)
{
if(trim($value)!='')
{
    $elems2 = explode('#,#',$value);
    array_pop($elems2);
    $data[] = $elems2;
}
}
return $data; 
}

*/