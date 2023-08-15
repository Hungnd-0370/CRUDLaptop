
<?php 
    include_once __DIR_ROOT.'/app/views/components/header.php';
    include_once __DIR_ROOT.'/helpers/session_helper.php';
?>
    <h1 class="header">Please Login</h1>

    <?php flash('login') ?>

    <form method="post" action="/login/sendRequest" id="login-form">
    <input type="hidden" name="type" value="login">
		<input type="text" name="name/email"  
		placeholder="Username/Email..." value="<?php echo isset($_COOKIE['remembered_email']) ? $_COOKIE['remembered_email'] : ''; ?>">
		<input type="password" name="userPassword"
		placeholder="Password..." value="<?php echo isset($_COOKIE['remembered_password']) ? $_COOKIE['remembered_password'] : ''; ?>">
		<div class="remember-me-container">
		<input type="checkbox" id="remember-me" name="remember-me" value="remember-me" <?php if(isset($_COOKIE["remembered_email"])) { echo "checked"; } ?> >
		<p class="remember-me-text">Remember me</p>
		</div>
        <button type="submit" name="submit">Log In</button>
    </form>

    <div class="form-sub-msg"><a href="./views/resetPassword.php">Forgotten Password?</a></div>
    
<?php 
    include_once __DIR_ROOT.'/app/views/components/footer.php';
?>

<script>
document.getElementById('remember-me').addEventListener('change', function() {
    if (!this.checked) {
        document.cookie = "remembered_email=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "remembered_password=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    }
});
</script>