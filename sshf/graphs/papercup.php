<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';
require_once ('../jpgraph/src/jpgraph.php');
require_once ('../jpgraph/src/jpgraph_bar.php');
// Gets data from database to put in the graph
if ($stmt = $mysqli->prepare("SELECT papercup_avrg, papercup_wish 
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

// Gets the variable sent by the user to put in graph
$number = $_GET['n'];
$number_week=$number*5;
$number_month=$number*20;
$number_year=$number*230;



//Creates array with the bar plot variables that will be used in graph
$datay1=array($number,$number_week,$number_month,$number_year);
$datay2=array($average,$average_week,$average_month,$average_year);
$datay3=array($wish,$wish_week,$wish_month,$wish_year);
//Creates picture and graph to fill in bar plots on 
$graph = new Graph(500,450,'auto');    
$graph->SetScale("textlin");
$graph->SetShadow();
$graph->img->SetMargin(50,30,40,50);
$graph->xaxis->SetTickLabels(array('Per dag','Per uke','Per måned','Per år'));

$graph->yaxis->title->Set('Antall pappkrus');
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetMargin(10);
 
$graph->title->Set('Forbruk Engangsartikler - Pappkrus');
$graph->title->SetFont(FF_FONT1,FS_BOLD);
 // Creates the bars 
$bplot1 = new BarPlot($datay1);
$bplot2 = new BarPlot($datay2);
$bplot3 = new BarPlot($datay3);
// Gets the names for the database to be used as legend on the picture
if ($stmt = $mysqli->prepare("SELECT legend1, legend2, legend3 
                                    FROM legend
									WHERE tabell = 'Forbruk Engangsartikler - Pappkrus' 
									LIMIT 1")){
            $stmt->execute();  
            $stmt->store_result();
			$stmt->bind_result($legend1, $legend2, $legend3);
			$stmt->fetch();
									  }

$bplot1->SetLegend($legend1);
$bplot2->SetLegend($legend2);
$bplot3->SetLegend($legend3);
// To gather the bar plots close to eachother  
$gbarplot = new GroupBarPlot(array($bplot1,$bplot2,$bplot3));
$gbarplot->SetWidth(0.8);
$graph->Add($gbarplot);
// draws the barplots
$bplot1->value->Show();
$bplot2->value->Show();
$bplot3->value->Show();

$bplot1->value->SetFormat('%01d');  
$bplot2->value->SetFormat('%01d');  
$bplot3->value->SetFormat('%01d'); 
$bplot1->value->SetFont(FF_ARIAL,FS_BOLD,10);
$bplot2->value->SetFont(FF_ARIAL,FS_BOLD,10);
$bplot3->value->SetFont(FF_ARIAL,FS_BOLD,10);
$bplot1->value->SetAngle(45);
$bplot2->value->SetAngle(45);
$bplot3->value->SetAngle(45);
//draws the picture
$graph->Stroke();
?>