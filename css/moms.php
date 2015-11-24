<meta charset="utf-8">
<style>
#formMoms { width:100%;}
input { width:15%; height:35px;}
body {text-align:center; }
</style>
<?php 
if(isset($_GET['submit'])){
//----------------Kollar om text-fätet är ifyllt och om det är siffror-----------------------
	if($_GET['value']==""){
		echo "Du har inte fyllt i ett pris!";
		die;
	}
	if(!is_numeric($_GET['value'])){
		echo "Priset är inte giltigt!";
		die;
	}
	if(!isset($_GET['moms'])){

		echo "Du måste välja inklusive eller exklusive moms!";
		die;
	}
//----------------Räknar ut moms-----------------------------
	if($_GET['choice']){
		$value = $_GET['value'];
		$moms = $_GET['moms'];
		$choice = $_GET['choice'];
		
		if($moms == 'inklmoms'){
			
			if($choice == 0.06){
				$sum = $value/($choice+1);
				echo $sum;
			}
			elseif($choice == 0.12){
				$sum = $value/($choice+1);
				echo $sum;
			}
			elseif($choice == 0.25){
				$sum = $value/($choice+1);
				echo $sum;
			}
		}
		elseif($moms == 'exklmoms'){
			
			if($choice == 0.06){
				$sum = $value*($choice+1);
				echo $sum;
				}
			elseif($choice == 0.12){
				$sum = $value*($choice+1);
				echo $sum;
			}
			elseif($choice == 0.25){
				$sum = $value*($choice+1);
				echo $sum;
			}
		}
	}
}
else {
?>
<h1>Momsuträknare</h1>
<form id="formMoms" action="moms.php" method="get">
    <p>Pris: <input type="text" name="value"></p>
 	<p>Inklusive moms: <Input type='radio' name='moms' value='inklmoms'></p>
	<p>Exklusive moms: <Input type='radio' name='moms' value='exklmoms'></p>
    
 	<p><select name="choice">
    	<option value="0.06">6%</option>
       	<option value="0.12">12%</option>
        <option value="0.25" selected>25%</option>
    </select></p>
    
	<p><input type="submit" name="submit" value="Submit"></p>
</form>

<?php 
}
?>