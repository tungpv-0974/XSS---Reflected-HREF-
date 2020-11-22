<?php

include("functions_external.php");
include("connect.php");

$message = "";

if(isset($_GET["name"]) and $_GET["name"] != "")
{

    $name = $_GET["name"];

    $message = "<p>Hello " . ucwords(xss_check_3($name)) . ", please vote for your favorite movie.</p>";
    $message.= "<p>Remember, Tony Stark wants to win every time...</p>";

}

else
{

    header("Location: xss_href-1.php");

    exit;

}

function hpp($data)
{
         
    switch($_COOKIE["security_level"])
    {
        
        case "0" : 
            
            $data = no_check($data);            
            break;
        
        case "1" :
            
            $data = urlencode($data);
            break;
        
        case "2" :            
                       
            $data = xss_check_2($data);
            break;
        
        default : 
            
            $data = no_check($data);            
            break;   

    }       

    return $data;

}

?>
<!DOCTYPE html>
<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


<title>XSS - Reflected (HREF)</title>

</head>

<body>

<div id="main">

    <h1>XSS - Reflected (HREF)</h1>

    <?php echo $message ?>
    <table id="table_yellow">

        <tr height="30" bgcolor="#ffb717" align="center">

            <td width="200"><b>Title</b></td>
            <td width="80"><b>Release</b></td>
            <td width="140"><b>Character</b></td>
            <td width="80"><b>Genre</b></td>
            <td width="80"><b>Vote</b></td>

        </tr>
<?php

    $sql = "SELECT * FROM movies";

    $recordset = mysql_query($sql, $link);

    if(!$recordset)
    {

        // die("Error: " . mysql_error());

?>

        <tr height="50">

            <td colspan="5" width="580"><?php die("Error: " . mysql_error()); ?></td>
            <!--
            <td></td>
            <td></td>
            <td></td>
            <td></td> 
            -->

        </tr>    
<?php        

    }

    if(mysql_num_rows($recordset) != 0)
    {    

        while($row = mysql_fetch_array($recordset))         
        {

            // print_r($row);

?>

        <tr height="30">

            <td><?php echo $row["title"]; ?></td>
            <td align="center"><?php echo $row["release_year"]; ?></td>
            <td><?php echo $row["main_character"]; ?></td>
            <td align="center"><?php echo $row["genre"]; ?></td>
            <td align="center"> <a href=xss_href-3.php?movie=<?php echo $row["id"]; ?>&name=<?php echo hpp($name);?>&action=vote>Vote</a></td>

        </tr>         
<?php        

        }   

    }
    
    mysql_close($link);

?>

    </table>    

</div>
</body>

</html>