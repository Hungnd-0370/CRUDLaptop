
<?php 
    include_once __DIR_ROOT.'/app/views/components/header.php';
    include_once __DIR_ROOT.'/helpers/session_helper.php';
?>
    <h1 class="header">Please Login</h1>

    <?php flash('login') ?>

    <form method="post" action="/login/sendRequest">
    <input type="hidden" name="type" value="login">
        <input type="text" name="name/email"  
        placeholder="Username/Email...">
        <input type="password" name="userPassword"
        placeholder="Password...">
		<div class="remember-me-container">
			<input type="checkbox" id="remember-me" name="remember-me" value="login">
			<p class="remember-me-text">Remember me</p>
		</div>
        <button type="submit" name="submit">Log In</button>
    </form>

    <div class="form-sub-msg"><a href="./views/resetPassword.php">Forgotten Password?</a></div>
    
<?php 
    include_once __DIR_ROOT.'/app/views/components/footer.php';
?>