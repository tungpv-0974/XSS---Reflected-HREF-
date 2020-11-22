<?php

include("functions_external.php");

?>
<!DOCTYPE html>
<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>XSS Reflected (HREF)</title>

</head>

<body>
  

<div id="main">

    <h1>XSS - Reflected (HREF)</h1>

    <form action="xss_href-2.php" method="GET">

        <p>In order to vote for your favorite movie, your name must be entered:</p>

        <input type="text" name="name">

        <button type="submit" name="action" value="vote">Continue</button>  

    </form>

</div>
     
</body>
    
</html>