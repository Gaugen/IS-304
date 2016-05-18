<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';
require_once ('../jpgraph/src/jpgraph.php');
require_once ('../jpgraph/src/jpgraph_bar.php');

if ($stmt = $mysqli->prepare("SELECT transport_avrg, transport_wish 
                                      FROM graphs LIMIT 1")){
            $stmt->execute();  
            $stmt->store_result();
			$stmt->bind_result($average, $wish);
			$stmt->fetch();
									  }
$average_week=$average*5;
$average_month=$average*20;
$average_year=$average*230;
$wish_week=$wish*5;
$wish_month=$wish*20;
$wish_year=$wish*230;

$number = $_GET['n'];
$number_week=$number*5;
$number_month=$number*20;
$number_year=$number*230;




$datay1=array($number,$number_week,$number_month,$number_year);
$datay2=array($average,$average_week,$average_month,$average_year);
$datay3=array($wish,$wish_week,$wish_month,$wish_year);
 
$graph = new Graph(500,450,'auto');    
$graph->SetScale("textlin");
$graph->SetShadow();
$graph->img->SetMargin(50,30,40,50);
$graph->xaxis->SetTickLabels(array('Per dag','Per uke','Per måned','Per år'));
 /*
$graph->xaxis->title->Set('Tenk gjennomsnitlig antall Km * ansatte!');
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
*/
$graph->yaxis->title->Set('Km');
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetMargin(10);
 
$graph->title->Set('Transport - Kilometer reist i tjenestetid');
$graph->title->SetFont(FF_FONT1,FS_BOLD);
 
$bplot1 = new BarPlot($datay1);
$bplot2 = new BarPlot($datay2);
$bplot3 = new BarPlot($datay3);

$bplot1->SetLegend('Ditt forbruk');
$bplot2->SetLegend('Gjennomsnittet');
$bplot3->SetLegend('Målet vårt');
 
$gbarplot = new GroupBarPlot(array($bplot1,$bplot2,$bplot3));
$gbarplot->SetWidth(0.8);
$graph->Add($gbarplot);
$bplot1->value->Show();
$bplot2->value->Show();
$bplot3->value->Show();

$bplot1->value->SetFormat('%01.1f');  
$bplot2->value->SetFormat('%01.1f');  
$bplot3->value->SetFormat('%01.1f'); 
$bplot1->value->SetFont(FF_ARIAL,FS_BOLD,10);
$bplot2->value->SetFont(FF_ARIAL,FS_BOLD,10);
$bplot3->value->SetFont(FF_ARIAL,FS_BOLD,10);
$bplot1->value->SetAngle(45);
$bplot2->value->SetAngle(45);
$bplot3->value->SetAngle(45);

$graph->Stroke();

?>