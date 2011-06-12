<p>Favor de iniciar sesión con su usuario y contraseña</p>

<form action="validate_login.php" method="POST">
	<label for="user"><?=t('User')?></label><input type="text" name="user"/><br/>
	<label for="password"><?=t('Password')?></label><input type="password" name="password"/>
	<input type="submit" value="<?=t('Send')?>" />
</form> 