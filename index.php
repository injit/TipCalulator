<!DOCTYPE html>
<html>
<head> 
	<style type="text/css">
	body{
		background-color: Beige;
	}
	.container{
	    border-style: solid;
    	border-color: black;
    	border-width: 1px;
    	width: 250px;
    	padding-bottom: 20px;
    	background-color: white;
    	position:absolute;
        left:40%;
        padding-left: 15px;
        padding-right: 15px;

	}
	.inner_container{
		border-style: solid;
    	border-color: black;	
    	border-width: 1px;
    	width: 150px;
	    height: auto;
    	margin: 0 auto;
    	padding: 10px;
    	position: relative;
	}
	.input_tag{

		text-align: center;
	}
	</style>


</head>
<title>Tip Calculator</title>

<body>
<div class="container">
	<form method="post">
		<h1 align="center">Tip Calculator</h1>
					Bill subtotal:$<input type="text" name="subtotal" 
					value="<?php echo isset($_POST['subtotal']) && is_numeric($_POST['subtotal']) ? $_POST['subtotal'] : '0' ?>"  								
					onfocus="if (this.value == '0') {this.value = '';}">
		</br>
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
			<div class="input_tag" >
				<button  id="btn"   >Submit</button>
			</div>

	</form>
	<script>
			// $(document).ready(function(){
				 
			//function check() {
			// 	//var subtotal_val = document.getElementById("sub_tot_input").value;
			// <?php
			// 	if(!is_numeric($_POST['subtotal']))){
			// ?>

			// 	document.getElementById("btn").onclick = function(){
			// 			document.getElementById("bill_subtotal").style.color = "blue";
			// 			document.getElementById("sub_tot_input").style.color = "blue";
			// 	}
						    
			// <?php

			// 	}
			// 	else{
			// ?>
			// 			document.getElementById("btn").onclick = function(){
			// 				document.getElementById("bill_subtotal").style.color = "black";
			// 			    document.getElementById("sub_tot_input").style.color = "black";
			// 			}
			// <?php
			// }
			//   ?>  //document.getElementById("demo").innerHTML = "Hello World";


			//}
		</script>

	</br>
	

	<?php

		if(isset($_POST['tip'])  && is_numeric($_POST['subtotal']) && $_POST['subtotal']>0) 
		{
		?>
		<div class="inner_container">
			Tip: $
				<?php	
					if(is_numeric($_POST['subtotal']) && is_numeric($_POST['tip']))
					{
						$selected_radio =$_POST['subtotal']*($_POST['tip']/100);
				        echo number_format((float)$selected_radio, 2, '.', '');
				        
			        }
					
				?> </br>
			Total: $
				<?php

					if(is_numeric($_POST['subtotal']) && is_numeric($_POST['tip']) )
					{
					
						$result = $_POST['subtotal']+($_POST['subtotal']*($_POST['tip']/100));// = $_POST['tip'];
				        echo number_format((float)$result, 2, '.', '');

					}

		}
			?>
			
			</div>
		</div>
</body>
</html>

