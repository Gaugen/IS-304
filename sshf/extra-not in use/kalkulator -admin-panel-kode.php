		<section id="tab4">
			<h2><a href="#tab4">Kalkulator</a></h2>
			<div class="grid_9">
			<div style="background-color:#f2f2f2;">
			<div style="font-family: helvetica">
			<text><center><font color="#666362">Her kan du legge inn ny verdi for engangsglass</text> 
			<form method='post' name='engangsglass'> 
			<input type='int' name='value2'>
			<input type='submit' name='engangsglass' value='Legg til verdi'></form>
			<br></br>
			<text>Her kan du legge inn ny verdi for bensinpris pr km</text><br></br>
			<form method='post' name='bensinforbruk'>
			<input type='int' name='value3'>
			<input type='submit' name='bensinforbruk' value='Legg til verdi'></form>			
			<br></br>
			<?php 
			// Oppdater verdien i engangsglass i calculator-tabellen
			if(isset($_POST['engangsglass'])){
				$q = "UPDATE calculator SET engangsglass='$_POST[value2]'";
				mysqli_query($mysqli, $q);
			}
			// Oppdater verdien i bensinforbruk i calculator-tabellen	
			if(isset($_POST['bensinforbruk'])){
				$r = "UPDATE calculator SET bensinforbruk='$_POST[value3]'";
				mysqli_query($mysqli, $r);
			}
			?>
			</center>
			<text><br><center>Hvor mange engangsglass bruker du per dag?</text>
			<text><br>Hvor mange kilometer kjører du per dag?</center></text>
			<br>
			<center>
			<form method='post'>
			<div class="inputHolder">

			<label>
			Kategori:
			</label>
			<select name='forbruk' class="calcInput2">
				<option value2="Engangsglass">Engangsglass</option>
				<option value3="Bensinforbruk">Bensinforbruk</option>
			</select>
			</div>
			</br>
			</br>
			</br>
			<div class="inputHolder">

			<label>
			Verdi:
			</label>
			<input type='text' name='value1' class="calcInput">
			</div>
			</br>
			</br>
			</br>
			<input type="submit" name='submit' value='Kalkulèr' class="buttonKalkuler">
			</form>
			</center>
			</select>
			<center>
			<textarea rows="10" cols="55" placeholder=".....">
<?php



//Input tall i value1, hent databaseverdier for value 2 og 3 
if(isset($_POST['submit'])){

$sql = "SELECT * FROM calculator";
$result_set=mysqli_query($mysqli, $sql);
$x=mysqli_fetch_array($result_set); 	
	
$value1 = $_POST['value1'];
$forbruk = $_POST['forbruk'];
$value2 = $x['engangsglass'];
$value3 = $x['bensinforbruk'];


//Hvis engangsglass er valgt, gang value1(dynamisk) med value2(fra database)
if($forbruk=="Engangsglass"){ 
echo "Du bruker engangsglass for verdi: ";
echo $value1*$value2 . " kroner"; 
}


if($forbruk=="Engangsglass"){
echo "				I en arbeidsuke blir dette: ";
echo $value1*$value2*5 . " kroner"; 
}

if($forbruk=="Engangsglass"){
echo "				I et arbeidsår (230 dager) blir dette: ";
echo $value1*$value2*230 . " kroner"; 

echo "
				
Husk at disse verdiene blir ganget med tusenvis av andre ansatte! ";
}


//Hvis bensinforbruk er valgt, gang value1(dynamisk) med value3(fra database)
if($forbruk=="Bensinforbruk"){
echo "Du bruker bensin for verdi: ";
echo $value1*$value3 . " kroner"; 
}


if($forbruk=="Bensinforbruk"){
echo "			I en arbeidsuke blir dette: ";
echo $value1*$value3*5 . " kroner"; 
}

if($forbruk=="Bensinforbruk"){
echo "			I et arbeidsår (230 dager) blir dette: ";
echo $value1*$value3*230 . " kroner"; 

echo "
				
Husk at disse verdiene blir ganget med alle andre som kjører arbeidsbiler på Sykehuset! ";
}

}

?>
</textarea></center></div></div></div>
			
		</section>