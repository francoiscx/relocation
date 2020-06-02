<?php
    session_start();
        
//if($_SESSION['userID'] == 1) {    
   echo "<h1> PHP List All Session Variables</h1>";
   foreach ($_SESSION as $key=>$val)
    echo $key."   :  ".$val."</span><br/>";
    echo "end";
//}


/*    
   echo "<h1> PHP List All Session Variables</h1>";
   foreach ($_SESSION as $key=>$val)
    echo $key."   :  ".$val."</span><br/>";
*/
?>