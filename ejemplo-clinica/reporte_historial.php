<?php // incluimos la libreria fpdf
require('fpdf/fpdf.php');
// incluimos la conexion a la base de datos
require('conexion.php');
class PDF extends FPDF { var $widths; var $aligns; function SetWidths($w) {  $this->widths=$w;
}
 
function SetAligns($a)
{
$this->aligns=$a;
}
 
function Row($data)
{
$nb=0;
for($i=0;$iNbLines($this->widths[$i],$data[$i]));
$h=4*$nb;
$this->CheckPageBreak($h);
for($i=0;$iwidths[$i];
$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
$x=$this->GetX();
$y=$this->GetY();
$this->Rect($x,$y,$w,$h);
$this->MultiCell($w,4,$data[$i],0,$a);
$this->SetXY($x+$w,$y);
}
$this->Ln($h);
}
 
function CheckPageBreak($h)
{
if($this->GetY()+$h>$this->PageBreakTrigger)
$this->AddPage($this->CurOrientation);
}
 
function NbLines($w,$txt)
{
$cw=&$this->CurrentFont['cw'];
if($w==0)
$w=$this->w-$this->rMargin-$this->x;
$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
$s=str_replace("\r",'',$txt);
$nb=strlen($s);
if($nb>0 and $s[$nb-1]=="\n")
$nb--;
$sep=-1;
$i=0;
$j=0;
$l=0;
$nl=1;
while($i$wmax)
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
 
function Header()
{
$this->SetFont('Arial','',10);
$this->Text(65,14,'Clinica el sol naciente',0,'C', 0);
$this->Ln(30);
}
 
function Footer()
{
$this->SetY(-15);
$this->SetFont('Arial','B',8);
$this->Cell(100,10,'Historial medico',0,0,'L');
}	
}
$paciente= $_GET['id'];
// creamos el objeto FPDF
$pdf=new PDF('L','mm','Letter'); // vertical, milimetros y tamaño
$pdf->Open();
$pdf->AddPage(); // agregamos la pagina
$pdf->SetMargins(20,20,20); // definimos los margenes en este caso estan en milimetros
$pdf->Ln(10); // dejamos un pequeño espacio de 10 milimetros
 
// Realizamos la consulta
$con = new DB;
$pacientes = $con->conectar();
// $paciente contiene el id del paciente a consultar, obtiene los datos de la tabla pacientes
$strConsulta = "SELECT * from pacientes where id_paciente =  '$paciente'";
$pacientes = mysql_query($strConsulta);
$fila = mysql_fetch_array($pacientes);
// listamos los datos con Cell
$pdf->SetFont('Arial','',12); // definimos el tipo de letra y el tamaño
// Cell esta formado por (posición de inicio, ancho, texto, borde, cambio de linea, posición del texto)
$pdf->Cell(0,6,'Clave: '.$fila['clave'],0,1);
$pdf->Cell(0,6,'Nombre: '.$fila['nombre'].' '.$fila['apellido_paterno'].' '.$fila['apellido_materno'],0,1);
$pdf->Cell(0,6,'Sexo: '.$fila['sexo'],0,1);
$pdf->Cell(0,6,'Domicilio: '.$fila['domicilio'],0,1);
$pdf->Ln(10);
// Para realizar esto utilizaremos la funcion Row()
$pdf->SetFont('Arial','',10);
// tipo y tamaño de letra
$pdf->SetWidths(array(60, 60, 60, 60));
// Definimos el tamaño de las columnas, tomando en cuenta que las declaramos en milimetros, ya que nuestra hoja esta en milimetros.
$pdf->Row(array('FECHA', 'MEDICO', 'CONSULTORIO', 'DIAGNOSTICO'));
// creamos nuestra fila con las columnas fecha(fecha de la visita al medico), medico(nombre del medico que nos atendio), consultorio y el diagnostico en esa visita.
$historial = $con->conectar(); // Creamos nuestra conexión a la base de datos
// Realizamos nuestra consulta
$strConsulta = "SELECT consultas_medicas.fecha_consulta, consultas_medicas.consultorio, consultas_medicas.diagnostico, medicos.nombre_medico
FROM consultas_medicas
Inner Join pacientes ON consultas_medicas.id_paciente = pacientes.id_paciente
Inner Join medicos ON consultas_medicas.id_medico = medicos.id_medico
WHERE pacientes.id_paciente = '$paciente'";
// ejecutamos la consulta
$historial = mysql_query($strConsulta);
// listamos la tabla de historial de visitas de cada paciente
$numfilas = mysql_num_rows($historial);
for ($i=0; $iRow(array($fila['fecha_consulta'], $fila['consultorio'], $fila['nombre_medico'], $fila['diagnostico']));
}
//La ultima linea
$pdf->Output(); 
?>