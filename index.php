<!DOCTYPE html>
<html>
<head> 
</head>
<body>
<form method="post">
	<h1>Tip Calculator</h1>
	<label >Bill subtotal:$</label><input type="text" name="subtotal" value="<?php echo isset($_POST['subtotal']) && is_numeric($_POST['subtotal']) ? $_POST['subtotal'] : '0' ?>"></br>
	</br>
	Tip percentage:
	</br>
	</br>
		<?php  
		$percents = array("10", "15", "20"); //array of tip 

		foreach ($percents as $percent) 
		{		
		?>
			 <input type="radio" name="tip" value="<?php echo $percent; ?>" <?php if (isset($_POST['tip']) && $_POST['tip'] == $percent)  echo ' checked="checked"';?>>

		<?php		
			echo "$percent"."%";
		}
			echo "</br>";

		?>
		</br>
	<input type="submit" >

</form>
</br>

<?php

if(isset($_POST['tip'])  && is_numeric($_POST['subtotal'])) 
{
?>
	Tip: $<label>
		<?php	
			if(is_numeric($_POST['subtotal']) && is_numeric($_POST['tip']) )
			{
				$selected_radio = $_POST['tip'];
	            echo number_format((float)$selected_radio, 2, '.', '');
	        }
			
		?> </label></br>
	Total: $<label>
		<?php

			if(is_numeric($_POST['subtotal']) && is_numeric($_POST['tip']) )
			{
			
				$result = $_POST['subtotal']+($_POST['subtotal']*($_POST['tip']/100));// = $_POST['tip'];
		        echo number_format((float)$result, 2, '.', '');

			}

}

		?>
		</label>
</body>
</html>

