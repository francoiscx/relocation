<?php
if($siteSection == "Workbench" || $siteSection == "Job Card" || $siteSection == "arciveAgent") {

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


if($sitePage == "addAgent") {

echo '      <li><a href="inc/page/workBench/addAgent/redirectNewAgentWithIdentifier.php"><i class="fa fa-circle"></i>Add Partner</a></li>';

} else {
 
echo '      <li><a href="inc/page/workBench/addAgent/redirectNewAgentWithIdentifier.php"><i class="fa fa-circle-o"></i>Add Partner</a></li>';   
    
}
            


if($sitePage == "existingAgents" || $sitePage == "archiveAgent" || $sitePage == "editAgent") {

echo '      <li><a href="workbench.php?id=2"><i class="fa fa-circle"></i>Manage Partners</a></li>';

} else {
 
echo '      <li><a href="workbench.php?id=2"><i class="fa fa-circle-o"></i>Manage Partners</a></li>';   
    
}
    
/*


if($sitePage == "reviewJob") {

echo '      <li><a href="/workbench.php?id=3"><i class="fa fa-circle"></i>Review Job</a></li>';

} else {
 
echo '      <li><a href="/workbench.php?id=3"><i class="fa fa-circle-o"></i>Review Job</a></li>';   
    
}
*/


    if($sitePage == "archivedAgents" || $sitePage == "editArchives") {
    
    echo '      <li><a href="workbench.php?id=4"><i class="fa fa-circle"></i>Inactive Partners</a></li>';
    
    } else {
     
    echo '      <li><a href="workbench.php?id=4"><i class="fa fa-circle-o"></i>Inavtive Partners</a></li>';   
        
    }



?>
            
          </ul>
</li>


