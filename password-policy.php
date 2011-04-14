<?php
/**
 * Password Policy
 * A class to simplify enforcement of a password formatting policy
 *
 * @author Craig Russell
 * @version 0.1
 */
class PasswordPolicy 
{
    /* Internal variables */
    private $rules;     // Array of policy rules
    private $errors;    // Array of errors for the last validation
    
    /**
     * Constructor
     *
     * Allows an array of policy parameters to be passed on construction.
     * For any rules not listed in parameter array default values are set.
     *
     * @param  array $params optional array of policy configuration parameters
     */
    function __construct ($params=array())
    {
        // Define defaults
        $this->rules['min_length'] = array(
            'value' => false,
            'error' => 'Password must be more than #VALUE# characters long');
        $this->rules['max_length'] = array(
            'value' => false,
            'error' => 'Password must be less than #VALUE# characters long');
        $this->rules['min_unique_chars'] = array(
            'value' => false,
            'error' => 'Password must contain at least #VALUE# unique characters');
        $this->rules['allow_numeric_chars'] = array(
            'value' => false,
            'error' => 'Password may not contain numbers');
        $this->rules['allow_numeric_first'] = array(
            'value' => false,
            'error' => 'First character cannot be numeric');
        $this->rules['allow_numeric_last'] = array(
            'value' => false,
            'error' => 'Last character cannot be numeric');
        $this->rules['min_numeric_chars'] = array(
            'value' => false,
            'error' => 'Password must contain at least #VALUE# numbers');
        $this->rules['max_numeric_chars'] = array(
            'value' => false,
            'error' => 'Password must contain no more than #VALUE# numbers');
        $this->rules['allow_nonalphanumeric_chars'] = array(
            'value' => false,
            'error' => 'Password may not contain non-alphanumeric characters');
        $this->rules['allow_nonalphanumeric_first'] = array(
            'value' => false,
            'error' => 'First character cannot be non-alphanumeric');
        $this->rules['allow_nonalphanumeric_last'] = array(
            'value' => false,
            'error' => 'Last character cannot be non-alphanumeric');
        $this->rules['min_nonalphanumeric_chars'] = array(
            'value' => false,
            'error' => 'Password must contain at least #VALUE# non-aplhanumeric characters');
        $this->rules['max_nonalphanumeric_chars'] = array(
            'value' => false,
            'error' => 'Password must contain no more than #VALUE# non-alphanumeric characters');
        
        // Apply params from constructor array
        foreach( $params as $k=>$v ) { $this->$k = $v; }
        
        return 1;
    }

    /*
     * Get a rule configuration parameter
     *
     * @param  string $rule Identifier for a rule
     * @return mixed        Rule configuration parameter
     */
    public function __get($rule)
    {
        if( isset($this->rules[$rule]) ) return $this->rules[$rule]['value'];
                                         return false;   
    }
    
    /*
     * Set a rule configuration parameter
     *
     * @param  string $rule  Identifier for a rule
     * @param  string $value Parameter for rule
     * @return boolean       1 on success
     *                       0 otherwise
     */
    public function __set($rule, $value)
    {
        if( isset($this->rules[$rule]) ) return $this->rules[$rule]['value'] = $value;
                                         return false;
    }
    
    /*
     * Get human readable representation of policy rules
     *
     * Returns array of strings where each element is a string description of 
     * the active rules in the policy
     *
     * @return array        Array of descriptive strings
     */
    public function policy()
    {
        $return = array();
        
        // Itterate over policy rules
        foreach( $this->rules as $k => $v )
        {
            // If rule is enabled, add string to array
            $string = $this->get_rule_error($k);
            if( $string ) $return[$k] = $string;
        }
        
        return $return;
    }
    
    /*
     * Validate a password against the policy
     *
     * @param  string  password The password string to validate
     * @return boolean          1 if password conforms to policy
     *                          0 otherwise
     */
    public function validate($password)
    {
        return 1;
    }
    
    /*
     * Get the errors showing which rules were not matched on the last validation
     *
     * Returns array of strings where each element has a key that is the failed
     * rule identifier and a string value that is a human readable description 
     * of the rule
     *
     * @return array        Array of descriptive strings
     */
    public function get_errors()
    {
        return array();
    }
    
/***** PRIVATE FUNCTIONS ******************************************************/

    /*
     * Validate a password against a specific rule
     *
     * @param  string   $rule       Identifier for the rule to be applied
     * @param  string   $password   The password string to validate
     * @return boolean              1 if pasword conforms to rule
     *                              0 otherwise
     */
    private function validate_rule($rule, $password)
    {
        return 1;
    }
    
    /*
     * Get the error description for a rule
     *
     * @param  string   $rule       Identifier for the rule to be applied
     * @return string               Error string for rule if it exists
     *                              false otherwise
     */
    private function get_rule_error($rule)
    {
        return ( isset($this->rules[$rule]) && $this->rules[$rule]['value'] ) 
        ? str_replace( '#VALUE#', $this->rules[$rule]['value'], $this->rules[$rule]['error'] )
        : false;
    }
}
