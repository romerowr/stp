<?php 
	include 'head_common.php';
	?>

	

<div class="container">
  <h1><?= $this->page; ?></h1>
        <br>
	<form class="form-log" action="/storypub.dev/app/controllers/login/login" method="post">
        <p><label for="email">Email: <input type="email" name="email"></label></p>
        <p><label for="passwd">Password: <input type="password" name="passwd"></label></p>
        <p>
            <input type="submit" value="Sign in"></p>
        <div class="msg"></div>
    </form>
  <p>*Aceptas todos los derechos.</p>
</div>


	
<?php 
	include 'footer_common.php';
?>