<?php 
    include_once __DIR_ROOT.'/app/views/components/header.php';
    include_once __DIR_ROOT.'/helpers/session_helper.php';
?>
    <h1 class="header">Please Signup</h1>

    <?php flash('register') ?>

    <form method="post" action="/signup/processUserRegistration">
        <input type="hidden" name="type" value="register">
        <input type="text" name="userName" 
        placeholder="Full name...">
        <input type="text" name="userEmail" 
        placeholder="Email...">
        <input type="text" name="userId" 
        placeholder="Username...">
        <input type="password" name="userPassword" 
        placeholder="Password...">
        <input type="password" name="pwdRepeat" 
        placeholder="Repeat password">
        <button type="submit" name="submit">Sign Up</button>
    </form>
<?php 
    include_once __DIR_ROOT.'/app/views/components/footer.php';
?>