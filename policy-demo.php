<?php
    // Load password policy class library
    // Use require to halt execution if loading fails
    require_once('password-policy.php');
    
    // Get password from submited data or default
    $password = ( isset($_POST['password']) ) ? $_POST['password'] : '';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="utf-8">
    <style>
        body {font-family: sans-serif;}
        .error {color: red;}
    </style>
</head>
<body>
    <form name="form" method="post">
        <h1>Validate Password</h1>
        <p class="error">Error Blagh</p>
        <p>
            <label for="password">Password</label>
            <input type="text" name="password" id="password" value="<?php echo $password; ?>"/>
        </p>
        <p>
            <input type="submit" name="submit" value="Validate"/>
        </p>
    </form>
</body>
</html>
