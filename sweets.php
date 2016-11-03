<?php

require('dbconnect.php'); 

if($_SERVER['REQUEST_METHOD']=='POST'){

//mysql_escape_string terminates the content of the form box, protected it from MySQL injection
$uname = mysql_escape_string($_POST['namebox']);
$password =mysql_escape_string($_POST['passwordbox']);


$sql = mysql_query("SELECT * FROM users WHERE username='$uname' AND password='$password'");

$numberrows = mysql_num_rows($sql);

if ($numberrows>0){
    //login has been sucessful so display the sweets
    
    $sweets = "SELECT * FROM sweets";
    $results = mysql_query($sweets);
    
    while($row=mysql_fetch_assoc($result)){
        echo $row["name"];
    }
    
}
else {
    echo '<p>You have not logged in.</p>';
}

}

?>

<form method="POST" action="index.php">
    
 Username <input type="text" name="namebox"><br/>
 Password <input type="text" name="passwordbox"><br/>
 <input type="submit" name="submit" value="Log in">
    
    
    
</form>