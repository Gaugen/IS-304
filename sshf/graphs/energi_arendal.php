<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';
require_once ('../jpgraph/src/jpgraph.php');
require_once ('../jpgraph/src/jpgraph_bar.php');
// Gets data from database to put in the graph
if ($stmt = $mysqli->prepare("SELECT energi_arendal, energi_sshf_avrg, energi_normalforbruk 
                                      FROM graphs LIMIT 1")){
            $stmt->execute();  
            $stmt->store_result();
			$stmt->bind_result($arendal, $averageSSHF, $average);
			$stmt->fetch();
									  }
// Gets the variable sent by the user to put in graph									 
$areal = $_GET['n'];
$forbruk = $areal * $arendal;
$forbruk_day=$forbruk / 365;
$forbruk_uke=$forbruk_day*5;
$forbruk_måned=$forbruk_day*20;
$forbruk_år=$forbruk_day*230;

$sshf = $areal * $averageSSHF;
$sshf_day=$sshf / 365;
$sshf_uke=$sshf_day*5;
$sshf_måned=$sshf_day*20;
$sshf_år=$sshf_day*230;

$average_hospital = $areal * $average;
$average_day=$average_hospital / 365;
$average_uke=$average_day*5;
$average_måned=$average_day*20;
$average_år=$average_day*230;

//Creates array with the bar plot variables that will be used in graph
$datay1=array($forbruk_day,$forbruk_uke,$forbruk_måned,$forbruk_år);
$datay2=array($sshf_day,$sshf_uke,$sshf_måned,$sshf_år);
$datay3=array($average_day,$average_uke,$average_måned,$average_år);

  //Creates picture and graph to fill in bar plots on
$graph = new Graph(500,450,'auto');    
$graph->SetScale("textlin");
$graph->SetShadow();
$graph->img->SetMargin(50,30,40,50);
$graph->xaxis->SetTickLabels(array('Per dag','Per uke', 'Per måned','Per år'));
 
$graph->xaxis->SetTitle('Her vises Energiforbruk for '.$areal.' m2 i KWh/m2','middle'); 
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);

$graph->yaxis->title->Set('KWh');
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetMargin(10);

$graph->title->Set('Energi - Energiforbruk ditt areal');
$graph->title->SetFont(FF_FONT1,FS_BOLD);
 // Creates the bars
$bplot1 = new BarPlot($datay1);
$bplot2 = new BarPlot($datay2);
$bplot3 = new BarPlot($datay3);
// Gets the names for the database to be used as legend on the picture
if ($stmt = $mysqli->prepare("SELECT legend1, legend2, legend3 
                                    FROM legend
									WHERE tabell = 'Energi - Energiforbruk ditt areal - Arendal' 
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