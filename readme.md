# Password Policy #

A password policy class for PHP    

**Author** Craig Russell [craig@craig-russell.co.uk](mailto:craig@craig-russell.co.uk)      
**Version** 0.1     

Password Policy is a library that makes it easy to implement a password format policy on your application. It includes functions to return password validation errors and a decription of the defined policies to be displayed to your users.

## Download ##

[Download ZIP](https://github.com/craig552uk/password-policy/zipball/master)

[Download TAR](https://github.com/craig552uk/password-policy/tarball/master)

## Usage ##

### Getting Started ###

Using Password Policy on your site is simple.

1.  Include the library

        require_once('password-policy.php');
        
2.  Create the Password Policy object

        $policy = new PasswordPolicy();
        
3.  Define the policy rules

        $policy->min_length = 8;
        $policy->max_length = 64;
        
4.  Validate a password

        if( $policy->validate($password) ) echo "Password OK!";

An example implementation of Password Policy is included in policy-demo.php

## Advanced ##

### Seperate Policy Rules ###

You can define your policy rules seperately as an array and pass this to the constructor, rather than defining rules on the object. Array key should be the rule identifier, value should be the correct type. This is useful if you want to define your policy rules is a seperate configuration file.

    $rules['min_length'] = 8;
    $rules['max_length'] = 64;
    $policy = new PasswordPolicy($rules);

### Password Policy Definition ###

The defined password policy in the object can be extracted as an array of strings.

    Array
    (
        [min_length] => Password must be more than 8 characters long
        [max_length] => Password must be less than 64 characters long
    )

This can then be displayed to the user.

    foreach( $policy->policy() as $id=>$rule )
    echo "<p id=\"$id\">$rule</p>";

### Password Validation Errors ###

After validating the password, any errors can be retrieved as an array of strings in the same format as the policy array.

    foreach( $policy->get_errors() as $id=>$rule )
    echo "<p id=\"$id\">$rule</p>";

## Policy Rules ##

A Password Policy has several rules which can be configured, these are detailed below.

Policy rules have different types, a rule will ignore any attempt to set its value to an incorrect type. Please refer to the documentation below.

**IMPORTANT** It is possible to define confilcting rules in a policy, which would make it impossible to set a password.

    $rules['min_length'] = 10;
    $rules['max_length'] = 5;

### Minimum Length ###

The minimum length of a password

**Identifier** `min_length`     
**Value Type** integer      

    $policy->min_length = 10;
    $rules['min_length'] = 10;

### Maximum Length ###

The maximum length of a password

**Identifier** `max_length`     
**Value Type** integer      

    $policy->max_length = 64;
    $rules['max_length'] = 64;

### Minimum Lowercase Characters ###

The minimum number of lowercase characters allowed in a password

**Identifier** `min_lowercase_chars`     
**Value Type** integer      

    $policy->min_lowercase_chars = 1;
    $rules['min_lowercase_chars'] = 1;

### Maximum Lowercase Characters ###

The maximum number of lowercase characters allowed in a password

**Identifier** `max_lowercase_chars`     
**Value Type** integer      

    $policy->max_lowercase_chars = 16;
    $rules['max_lowercase_chars'] = 16;

### Minimum Uppercase Characters ###

The minimum number of uppercase characters allowed in a password

**Identifier** `min_uppercase_chars`     
**Value Type** integer      

    $policy->min_uppercase_chars = 1;
    $rules['min_uppercase_chars'] = 1;

### Maximum Uppercase Characters ###

The maximum number of uppercase characters allowed in a password

**Identifier** `max_uppercase_chars`     
**Value Type** integer      

    $policy->max_uppercase_chars = 16;
    $rules['max_uppercase_chars'] = 16;

### Disallow Numeric Characters  ###

Do not allow numeric characters in a password. This is functionally equivalent to `max_numeric_chars = 0`

**Identifier** `disallow_numeric_chars`     
**Value Type** boolean      

    $policy->disallow_numeric_chars = true;
    $rules['disallow_numeric_chars'] = true;

### Disallow Numeric Character First ###

Do not allow the first character in a password to be numeric

**Identifier** `disallow_numeric_first`     
**Value Type** boolean      

    $policy->disallow_numeric_first = true;
    $rules['disallow_numeric_first'] = true;

### Disallow Numeric Character Last ###

do not allow the last character in a password to be numeric

**Identifier** `disallow_numeric_last`     
**Value Type** boolean      

    $policy->disallow_numeric_last = true;
    $rules['disallow_numeric_last'] = true;

### Minimun Numeric Characters ###

The minimum number of numeric characters allowed in a password

**Identifier** `min_numeric_chars`     
**Value Type** integer      

    $policy->min_numeric_chars = 1;
    $rules['min_numeric_chars'] = 1;

### Maximum Numeric Characters ###

The maximum number of numeric characters allowed in a password

**Identifier** `max_numeric_chars`     
**Value Type** integer      

    $policy->max_numeric_chars = 16;
    $rules['max_numeric_chars'] = 16;

### Disallow Non-Alphanumeric Characters ###

Do not allow non-alphanumeric characters in a password. Non-alphanumeric characters are those defined as non-word characters in Perl Regular Expressions. This is functionally equivalent to `max_nonalphanumeric_chars = 0`

**Identifier** `disallow_nonalphanumeric_chars`     
**Value Type** boolean      

    $policy->disallow_nonalphanumeric_chars = true;
    $rules['disallow_nonalphanumeric_chars'] = true;

### Disallow Non-Alphanumeric Characters First ###

Do not allow the first character in the word to be non-alphanumeric. Non-alphanumeric characters are those defined as non-word characters in Perl Regular Expressions.

**Identifier** `disallow_nonalphanumeric_first`     
**Value Type** boolean      

    $policy->disallow_nonalphanumeric_first = true;
    $rules['disallow_nonalphanumeric_first'] = true;

### Disallow Non-Alphanumeric Characters Last ###

Do not allow the last character in the word to be non-alphanumeric. Non-alphanumeric characters are those defined as non-word characters in Perl Regular Expressions.

**Identifier** `disallow_nonalphanumeric_last`     
**Value Type** boolean      

    $policy->disallow_nonalphanumeric_last = true;
    $rules['disallow_nonalphanumeric_last'] = true;

### Minimum Number of Non-Alphanumeric Characters ###

The minimum number of non-alphanumeric characters allowed in a password. Non-alphanumeric characters are those defined as non-word characters in Perl Regular Expressions.

**Identifier** `min_nonalphanumeric_chars`     
**Value Type** integer      

    $policy->min_nonalphanumeric_chars = 1;
    $rules['min_nonalphanumeric_chars'] = 1;

### Maximum Number of Non-Alphanumeric Characters ###

The maximum number of non-alphanumeric characters allowed in a password. Non-alphanumeric characters are those defined as non-word characters in Perl Regular Expressions.

**Identifier** `max_nonalphanumeric_chars`     
**Value Type** integer      

    $policy->max_nonalphanumeric_chars = 16;
    $rules['max_nonalphanumeric_chars'] = 16;

