<?php
if($siteSection == "Workbench" || $siteSection == "Job Card") {

echo '    <li class="active treeview">';

} else {
    
echo '    <li class="treeview">';
    
}
?>
          <a href="#">
            <i class="fa fa-folder-o"></i> <span>Workbench</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              
 
 
 
 
             
<?php


if($sitePage == "newJob") {

echo '      <li><a href="/workbench.php?id=1"><i class="fa fa-circle"></i>Create Job</a></li>';

} else {
 
echo '      <li><a href="/workbench.php?id=1"><i class="fa fa-circle-o"></i>Create Job</a></li>';   
    
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
*/

if(isset($_SESSION['Senior'])) {
    if($sitePage == "archivedJobs") {
    
    echo '      <li><a href="/workbench.php?id=4"><i class="fa fa-circle"></i>Archived Jobs</a></li>';
    
    } else {
     
    echo '      <li><a href="/workbench.php?id=4"><i class="fa fa-circle-o"></i>Archived Jobs</a></li>';   
        
    }
}


?>
            
          </ul>
</li>


