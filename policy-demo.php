<?php
    // Load password policy class library
    // Use require to halt execution if loading fails
    require_once('password-policy.php');
    
    // Get password from submited data or default
    $password = ( isset($_POST['password']) ) ? $_POST['password'] : false;
    
    // Array defining rules
    $rules['min_length'] = 8;
    $rules['max_length'] = 64;
    
    // Create password policy object
    // Pass rule array in constructor
    $policy = new PasswordPolicy($rules);
    
    // Rules defined on object
    $policy->min_lowercase_chars = 1;
    $policy->min_uppercase_chars = 1;
    $policy->min_numeric_chars = 1;
    
    // Validate submitted password
    $valid = $policy->validate($password);
    
?><!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="utf-8">
    <style>
        body {font-family: sans-serif;}
        .error {color: red;}
        .valid {color: green; font-weight: bold;}
    </style>
</head>
<body>
    <form name="form" method="post">
        <h1>Validate Password</h1>
        <?php
            // Show errors if submitted password is not valid
            if( !$valid && isset($_POST['submit']) )
            foreach( $policy->get_errors() as $k=>$error )
            echo "<p class=\"error\" id=\"$k\">$error</p>";
        ?>
        <p>
            <label for="password">Password</label>
            <input type="text" name="password" id="password" value="<?php echo $password; ?>"/>
            <?php if( $valid ) echo "<span class=\"valid\">Password OK!</span>"; ?>
        </p>
        <p>
            <input type="submit" name="submit" value="Validate"/>
        </p>
    </form>
    <section>
        <h2>Password Policy Rules</h2>
        <?php
            // Show defined Password Policy Rules
            foreach( $policy->policy() as $k=>$rule )
            echo "<p id=\"$k\"><em>$rule</em></p>";
        ?>
    </section>
</body>
</html>
