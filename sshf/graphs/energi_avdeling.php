<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';
require_once ('../jpgraph/src/jpgraph.php');
require_once ('../jpgraph/src/jpgraph_bar.php');

if ($stmt = $mysqli->prepare("SELECT energi_flekkefjord, energi_sshf_avrg, energi_normalforbruk, energi_kristiansand, energi_arendal, areal_avdeling
                                      FROM graphs LIMIT 1")){
            $stmt->execute();  
            $stmt->store_result();
			$stmt->bind_result($average_flekkefjord, $average_sshf, $average_average, $average_kristiansand, $average_arendal, $areal);
			$stmt->fetch();
									  }
$flekkefjord = $areal * $average_flekkefjord;
$flekkefjord_day = $flekkefjord / 365;
$flekkefjord_week = $flekkefjord_day *5 ;
$flekkefjord_month = $flekkefjord_day * 20;
$flekkefjord_year = $flekkefjord_day * 230;

$kristiansand = $areal * $average_kristiansand;
$kristiansand_day = $kristiansand / 365;
$kristiansand_week = $kristiansand_day * 5;
$kristiansand_month = $kristiansand_day * 20;
$kristiansand_year = $kristiansand_day * 230;

$arendal = $areal * $average_arendal;
$arendal_day = $arendal / 365;
$arendal_week = $arendal_day * 5;
$arendal_month = $arendal_day * 20;
$arendal_year = $arendal_day * 230;

$average = $areal * $average_average;
$average_day = $average / 365;
$average_week = $average_day * 5;
$average_month = $average_day * 20;
$average_year = $average_day * 230;

$sshf = $areal * $average_sshf;
$sshf_day = $sshf / 365;
$sshf_week = $sshf_day * 5;
$sshf_month = $sshf_day * 20;
$sshf_year = $sshf_day * 230;

$datay2=array($flekkefjord_day,$flekkefjord_week,$flekkefjord_month,$flekkefjord_year);
$datay3=array($kristiansand_day,$kristiansand_week,$kristiansand_month,$kristiansand_year);
$datay4=array($arendal_day,$arendal_week,$arendal_month,$arendal_year);
$datay5=array($sshf_day,$sshf_week,$sshf_month,$sshf_year);
$datay6=array($average_day,$average_week,$average_month,$average_year);
 
$graph = new Graph(748,648,'auto');    
$graph->SetScale("textlin");
$graph->SetShadow();
$graph->img->SetMargin(50,50,40,50);
$graph->xaxis->SetTickLabels(array('Per dag','Per uke', 'Per måned','Per år'));

$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->SetTitle('Her vises Energiforbruk for en gjennomsnittsavdeling '.$areal.' m2 i KWh/m2','middle'); 

$graph->yaxis->title->Set('KWh');
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetMargin(10);

$graph->title->Set('Energi - Energiforbruk per lokasjon');
$graph->title->SetFont(FF_FONT1,FS_BOLD);

$bplot2 = new BarPlot($datay2);
$bplot3 = new BarPlot($datay3);
$bplot4 = new BarPlot($datay4);
$bplot5 = new BarPlot($datay5);
$bplot6 = new BarPlot($datay6);

$bplot2->SetLegend('Flekkefjord Sykehus');
$bplot3->SetLegend('Kristiansand Sykehus');
$bplot4->SetLegend('Arendal Sykehus');
$bplot5->SetLegend('SSHF gjennomsnitt');
$bplot6->SetLegend('Antatt normalforbruk sykehus');
 
$gbarplot = new GroupBarPlot(array($bplot2,$bplot3,$bplot4,$bplot5,$bplot6));
$gbarplot->SetWidth(0.9);
$graph->Add($gbarplot);

$bplot2->value->Show();
$bplot3->value->Show();
$bplot4->value->Show();
$bplot5->value->Show();
$bplot6->value->Show();

$bplot2->value->SetFormat('%01d');  
$bplot3->value->SetFormat('%01d');
$bplot4->value->SetFormat('%01d');  
$bplot5->value->SetFormat('%01d');  
$bplot6->value->SetFormat('%01d');

$bplot2->value->SetFont(FF_ARIAL,FS_BOLD,10);
$bplot3->value->SetFont(FF_ARIAL,FS_BOLD,10);
$bplot4->value->SetFont(FF_ARIAL,FS_BOLD,10);
$bplot5->value->SetFont(FF_ARIAL,FS_BOLD,10);
$bplot6->value->SetFont(FF_ARIAL,FS_BOLD,10);

$bplot2->value->SetAngle(45);
$bplot3->value->SetAngle(45);
$bplot4->value->SetAngle(45);
$bplot5->value->SetAngle(45);
$bplot6->value->SetAngle(45);

$graph->Stroke();
?>