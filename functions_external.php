<?php

function no_check($data)
{    
   
    return $data;
        
}

function xss_check_1($data)
{
    
    // Converts only "<" and ">" to HTLM entities    
    $input = str_replace("<", "&lt;", $data);
    $input = str_replace(">", "&gt;", $input);
    
    // Failure is an option
    // Bypasses double encoding attacks   
    // <script>alert(0)</script>
    // %3Cscript%3Ealert%280%29%3C%2Fscript%3E
    // %253Cscript%253Ealert%25280%2529%253C%252Fscript%253E
    $input = urldecode($input);
    
    return $input;
    
}

function xss_check_2($data)
{
  
    // htmlentities - converts all applicable characters to HTML entities
    
    return htmlentities($data, ENT_QUOTES);
    
}

function xss_check_3($data, $encoding = "UTF-8")
{

    // htmlspecialchars - converts special characters to HTML entities    
    // '&' (ampersand) becomes '&amp;' 
    // '"' (double quote) becomes '&quot;' when ENT_NOQUOTES is not set
    // "'" (single quote) becomes '&#039;' (or &apos;) only when ENT_QUOTES is set
    // '<' (less than) becomes '&lt;'
    // '>' (greater than) becomes '&gt;'  
    
    return htmlspecialchars($data, ENT_QUOTES, $encoding);
       
}

function xss_check_4($data)
{
  
    // addslashes - returns a string with backslashes before characters that need to be quoted in database queries etc.
    // These characters are single quote ('), double quote ("), backslash (\) and NUL (the NULL byte).
    // Do NOT use this for XSS or HTML validations!!!
    
    return addslashes($data);
    
}


?>