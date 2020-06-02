<?php
if($siteSection == "Account Management") {

echo '    <li class="active treeview">';

} else {
    
echo '    <li class="treeview">';
    
}
?>
          <a href="#">
            <i class="fa fa-user-o"></i> <span>Account Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              
             
<?php


if($sitePage == "addUser") {

echo '      <li><a href="/accountManagement.php?id=1"><i class="fa fa-circle"></i>Add User</a></li>';

} else {
 
echo '      <li><a href="/accountManagement.php?id=1"><i class="fa fa-circle-o"></i>Add User</a></li>';   
    
}
            
/*
if($sitePage == "Jobs") {

echo '      <li><a href="/workbench.php?id=2"><i class="fa fa-circle-o"></i>Jobs</a></li>';

} else {
 
echo '      <li><a href="/workbench.php?id=2"><i class="fa fa-circle-o"></i>Jobs</a></li>';   
    
}
    



if($sitePage == "reviewJob") {

echo '      <li><a href="/workbench.php?id=3"><i class="fa fa-circle"></i>Review Job</a></li>';

} else {
 
echo '      <li><a href="/workbench.php?id=3"><i class="fa fa-circle-o"></i>Review Job</a></li>';   
    
}



if($sitePage == "archivedJobs") {

echo '      <li><a href="/workbench.php?id=4"><i class="fa fa-circle"></i>Archived Jobs</a></li>';

} else {
 
echo '      <li><a href="/workbench.php?id=4"><i class="fa fa-circle-o"></i>Archived Jobs</a></li>';   
    
}
*/


?>
            
          </ul>
</li>


