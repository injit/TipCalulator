<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tip Calculator</title>
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
        #diserr{
           color: red;
        }
	</style>
        <script type="text/javascript" >
            function validate(){
                if(isNaN(calform.subtotal.value)){
                    document.getElementById('diserr').innerHTML = "Invalid input! please enter a number";
                }
                else{
                    document.getElementById('diserr').innerHTML = "";
                }

            }
            </script>
        
    </head>
    <body>
        <div class="container">
	<form method="post" name="calform">
		<h1 align="center">Tip Calculator</h1>
                Bill subtotal:$<input type="text" name="subtotal"  onkeyup="validate()"
					value="<?php echo isset($_POST['subtotal']) && is_numeric($_POST['subtotal']) ? $_POST['subtotal'] : '0' ?>"  								
                                        onfocus="if (this.value == '0') {this.value = '';}" size="15"><div id="diserr"   ></div>
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
<!--                                  <input type="radio" name="tip" value="<?php //echo $_POST['customtip']; ?>" <?php //if (isset($_POST['customtip'])&& $_POST['tip'] == $_POST['customtip'])  echo ' checked="checked"';?>>
                                 CustomTip:<input type="text" name="customtip" 
					value="<?php //echo isset($_POST['customtip']) && is_numeric($_POST['customtip']) ? $_POST['customtip'] : '0' ?>"  													 								
					onfocus="if (this.value == '0') {this.value = '';}" size="5">%<br/> -->
			</br>
			<div class="input_tag" >
				<button  id="btn"   >Submit</button>
			</div>

	</form>
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
//                                        else if(is_numeric($_POST['subtotal']) && is_numeric($_POST['tip'])&& is_numeric($_POST['customtip'])){
//						$selected_radio1 =$_POST['subtotal']*($_POST['customtip']/100);
//                                                echo number_format((float)$selected_radio1, 2, '.', '');                                            
//                                        }
					
				?> </br>
			Total: $
				<?php
					if(is_numeric($_POST['subtotal']) && is_numeric($_POST['tip']))
					{
					
						$result = $_POST['subtotal']+($_POST['subtotal']*($_POST['tip']/100));// = $_POST['tip'];
                                                echo number_format((float)$result, 2, '.', '');
					}
//                                        else if(is_numeric($_POST['subtotal']) && is_numeric($_POST['tip'])&& is_numeric($_POST['customtip'])){
//						$result2 =$_POST['subtotal']+($_POST['subtotal']*($_POST['customtip']));
//                                                echo number_format((float)$result2, 2, '.', '');                                            
//                                        }
		}
        
//                else{
//                                            echo '<script language="javascript">';
//                                            echo 'alert("please enter valid input")';
//                                            echo '</script>';
//                                        }
			?>
			
			</div>
		</div>
</body>

</html>

