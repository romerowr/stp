<?php 
	include 'head_common.php';
	?>

	


  
<div class="container">
  <h1><?= $this->page; ?></h1>
        <h1>hola</h1>
	<table class="table table-hover">
		<?php for($i=0;$i<count($this->dataTable);$i++){ ?>
			<tr>
			<?php foreach($this->dataTable[$i] as $key=>$value) :?>
				
	        		<td><?= $value; ?></td>
	    	
	    	<?php endforeach; ?>
	    	</tr>
	    <?php } ?>
	</table>
  <p>The .navbar-right class is used to right-align navigation bar buttons.</p>
</div>
