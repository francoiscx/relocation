<?php
if($siteSection == "Partners") {

echo '    <li class="active treeview">';

} else {
    
echo '    <li class="treeview">';
    
}
?>


        <a href="#">
            <i class="fa fa-address-card"></i> <span>Partners</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              




<?php
if($sitePage == "allAgents") {

echo '          <li class="active"><a href="index.php"><i class="fa fa-circle"></i>All Partners</a></li>';
            
} else {

echo '            <li class="active"><a href="index.php"><i class="fa fa-circle-o"></i>All Partners</a></li>';
}
?>

<?php
//if($sitePage == "byClients") {

//echo '          <li class="active"><a href="#"><i class="fa fa-circle"></i>List By Clients</a></li>';
            
//} else {

//echo '            <li class="active"><a href="#"><i class="fa fa-circle-o"></i>List By Clients</a></li>';
//}
?>

          </ul>
</li>