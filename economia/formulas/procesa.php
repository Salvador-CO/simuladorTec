<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	</head>
	<style type="text/css">
		.fraction {
	    display: inline-block;
	    vertical-align: middle; 
	    margin: 0 0.2em 0.4ex;
	    text-align: center;
		}
		.fraction > span {
		    display: block;
		    padding-top: 0.15em;
		}
		.fraction span.fdn {border-top: thin solid black;}
		.fraction span.bar {display: none;}
	</style>

<?php 

$a = $_POST['a']; 
$b = $_POST['b']; 
$c = $_POST['c']; 

$neg = -1; 

$menosb = $b * $neg; 
$oper1 = pow($b,2); 
$oper2 = 4*$a*$c; 
$resta = $oper1-$oper2; 
$raiz = pow($resta,(1/2)); 
$dosa = 2*$a; 

$result1 = ($menosb + $raiz)/$dosa; 
$result2 = ($menosb - $raiz)/$dosa; 

?>
	
	<div align="center">
		<i><b>Ecuación:</b></i><br>
		 <div class="eq-c" align="center">
			<div>
				 <i> <?php echo $a." ⋅ x<sup>2</sup> + "; echo $b." ⋅ x + "; echo $c." = 0";?>
			</div>
		<br>
		<i><b>Fórmula:</b></i><br>
		 <div class="eq-c" align="center">
			<i>X =</i>
			<div class="fraction">
				<span class="fup"><i>- b &#177;</i> &radic; b<sup>2</sup> - 4(a)(c)</span>
				<span class="bar">/</span>
				<span class="fdn"><i>2</i>a</span>
			</div>
	  	</div>
	  	<br>
	  	<div class="eq-c" align="center">
			<i>X =</i>
			<div class="fraction">
				<span class="fup"><i>- <?php echo $b; ?> &#177;</i> &radic; [ <?php echo $b; ?><sup>2</sup> - 4(<?php echo $a; ?>)(<?php echo $c; ?>)]</span>
				<span class="bar">/</span>
				<span class="fdn"><i>2</i> (<?php echo $a; ?>)</span>
			</div>
	  	</div>
	  	<br>
	  	<div class="eq-c"align="center">
			<i>X =</i>
			<div class="fraction">
				<span class="fup"><i>- <?php echo $b; ?> &#177;</i> &radic; [ <?php echo $b; ?><sup>2</sup> - 4(<?php $d= $a * $c; echo $d;?>)]</span>
				<span class="bar">/</span>
				<span class="fdn"><i><?php $e =2*$a; echo $e;?></span>
			</div>
	  	</div>
	  	<br>
	  	<div class="eq-c" align="center">
			<i>X =</i>
			<div class="fraction">
				<span class="fup"><i>- <?php echo $b; ?> &#177;</i> &radic; [<?php $ex=pow($b, 2); echo $ex; ?> - <?php $d= 4*($a * $c); echo $d;?>]</span>
				<span class="bar">/</span>
				<span class="fdn"><i><?php $e =2*$a; echo $e;?></span>
			</div>
	  	</div>
	  	<br>
	  	<div class="eq-c" align="center">
			<i>X =</i>
			<div class="fraction">
				<span class="fup"><i>- <?php echo $b; ?> &#177;</i> &radic; <?php $ex=pow($b, 2); $ex; $d= 4*($a * $c); $res= $ex-$d; echo $res;?></span>
				<span class="bar">/</span>
				<span class="fdn"><i><?php $e =2*$a; echo $e;?></span>
			</div>
	  	</div>
	  	<br>
	  	
				
				<?php $ex=pow($b, 2); $ex; $d= 4*($a * $c); $res= $ex-$d;
				if ($res < 0) {
					$r=$res*-1;
					echo "<b>Por lo tanto, no hay soluciones reales.</b><br> ";
				}else{
					?>
					<div class="eq-c" align="center">
					<i>X =</i>
					<div class="fraction">
					<span class="fup"><i>- <?php echo $b; ?> &#177;</i><?php echo sqrt($res); ?> </span>
					<span class="bar">/</span>
					<span class="fdn"><i><?php $e =2*$a; echo $e;?></span>	
					</div>
			  		</div>
			  		<br>
			  		<?php
		  				echo"X<sub>1</sub> =<b> $result1</b><br><br>"; 
						echo"X<sub>2</sub> =<b> $result2</b>"; 
					}
				?>
	  	<br>
	  	<br>

	  	<div class="form-group col-md-12"><center>
		    <input type="submit" class="btn btn-dark" value="Atras"  onclick = "history.go (-1)">
		</div>
  	</div>

</html>