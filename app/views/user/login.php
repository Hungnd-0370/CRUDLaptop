<?php 
    include_once __DIR_ROOT.'/app/views/components/header.php';
    include_once __DIR_ROOT.'/helpers/session_helper.php';

    // Check if the user is already logged in
    if(isset($_SESSION['userId'])) {
        echo '<h1 class="header">You had logged in</h1>';
    } else {
        echo '<h1 class="header">Please Login</h1>';
        flash('login');
        echo '<form method="post" action="/login/sendRequest" id="login-form">';
        echo '<input type="hidden" name="type" value="login">';
        echo '<input type="text" name="name/email"  
            placeholder="Username/Email...">';
        echo '<input type="password" name="userPassword"
            placeholder="Password..." >';
        echo '<div class="remember-me-container">';
        echo '<input type="checkbox" id="remember-me" name="remember-me" value="remember-me"';
        if(isset($_COOKIE["remembered_email"])) {
            echo ' checked';
        }
        echo '>';
        echo '<p class="remember-me-text">Remember me</p>';
        echo '</div>';
        echo '<button type="submit" name="submit">Log In</button>';
        echo '</form>';
        echo '<div class="form-sub-msg"><a href="./views/resetPassword.php">Forgotten Password?</a></div>';
    }

    include_once __DIR_ROOT.'/app/views/components/footer.php';
?>
