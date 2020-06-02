<script>
    setInterval(function() {
                  window.location.reload();
                }, 300000);
</script>

<?php


if($_SESSION['canViewAllUserDashboard'] == 1) {
    
    //echo "All Users";

include_once '/home/erasmusm/beta.kia-data.com/inc/page/adminDash/adminDashboardGetterFunc/countEmployees.php';

    $height = $_SESSION['height'];
    $height = $height -126;
    $content = $height -50;
    $empScrollOuter = $_SESSION['height'];
    $empScrollOuter = $empScrollOuter . "px!important;";
    $height = $height . "px;";
    $content = $content . "px;";
    $numberOfFilesToShow = $numberOfFiles + 1;
    
    
    
    if(isset($numberOfFiles)) {
        $customBlackboard = $numberOfFilesToShow * 150;
        $customBlackboard = $customBlackboard . 'px!important';
    echo "<style>
            .customBlackboard {
            width: $customBlackboard;
            }
         </style>
         ";
} 
;?>

<style>
    .content {
    height: <?php echo $content;?>
    }
</style>

<!-- TO DO List -->
        <div class="box" style="height:<?php echo $height;?> box-primary; overflow-x: scroll; overflow-y: hidden;">
            <div class="box-header">
        <!--      <i class="ion ion-clipboard"></i> -->

              <h3 class="box-title">Dashboard</h3>

                                                                                                                                                                                                                                                                     <!--       <div class="box-tools pull-right">
                                                                                                                                                                                                                                                       </ul>
                                                                                                                                                                                                                                                                          </div>        -->
            </div>
            <!-- /.box-header -->
            
            
            <div class="box-body">
                
                <div class="customBlackboard">
                

                
                    <?php include_once'/home/erasmusm/beta.kia-data.com/inc/page/adminDash/adminDashboardGetterFunc/buildEachFile.php';?>
                
<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

                </div>
                <!-- /.customBlackboard -->

            </div>
            <!-- /.box-body -->

        </div>
        <!-- /.box -->
          
<?php
    
    
} else if($_SESSION['specialDash'] == 1){
   
   //echo "Special Dash"; 
    
///////////ONLY DISPLAY THE USERS AS DEFINED IN DASHPERMS FOR THIS USER 

//Because we only want to see jobs for the users that this user is allowed to see as per dashPerms 

if(isset($_SESSION['specialDash'])){

$userID = $_SESSION['userID'];
$isActive = 1;
$permissionsIsAllowed = 1;

    //COUNT HOW MANY USERS NEED TO BE DISPLAYED
    $sqlQuery = "SELECT count(*) from dashPerms WHERE forUserID = :forUserID AND isActive = :isActive AND permissionsIsAllowed = :permissionsIsAllowed";
    $result = $db->prepare($sqlQuery); 
    $result->execute(array(':forUserID' => $userID, ':isActive' => $isActive, ':permissionsIsAllowed' => $permissionsIsAllowed,)); 
    $numberOfFiles = $result->fetchColumn();
}

    $screenWidth = $_SESSION['width'];
    $height = $_SESSION['height'];
    $height = $height -126;
    $content = $height -50;
    $empScrollOuter = $_SESSION['height'];
    $empScrollOuter = $empScrollOuter . "px!important;";
    $height = $height . "px;";
    $content = $content . "px;";
    $numberOfFilesToShow = $numberOfFiles + 1;
    


$proposedWidth = $numberOfFilesToShow * 150;

if($proposedWidth > $screenWidth) {
    $ratio = 'Larger';
        $customBlackboard = $numberOfFilesToShow * 150;
        $customBlackboard = $customBlackboard . 'px!important';
    
    echo "<style>
            .customBlackboard {
            width: $customBlackboard;
            }
         </style>
         ";
        
} else if($proposedWidth == $screenWidth) {
    $ratio = 'Equal';
        $customBlackboard = $numberOfFilesToShow * 150;
        $customBlackboard = $customBlackboard . 'px!important';
    
    echo "<style>
            .customBlackboard {
            width: $customBlackboard;
            }
         </style>
         ";
} else {
    $ratio = 'Smaller';
        if($numberOfFilesToShow < 8) $changeSize = $numberOfFilesToShow;
        $proposedWidth = $screenWidth / $numberOfFilesToShow;
        $numberOfFilesToShow = $proposedWidth;
        $newWidth = $numberOfFilesToShow;
        $boardWidth = $newWidth - 25;
        $newWidthHalf = $newWidth / 2.5;
        $newWidth = $newWidth . 'px!important';
        $newWidthHalf = $newWidthHalf . 'px!important';
        $boardWidth = $boardWidth . 'px!important';
        
}
;?>

<style>
    .content {
    height: <?php echo $content;?>
    }
</style>    
    


   <!-- TO DO List -->
        <div class="box" style="height:<?php echo $height;?> box-primary; overflow-x: scroll; overflow-y: hidden;">
            <div class="box-header">
        <!--      <i class="ion ion-clipboard"></i> -->

              <h3 class="box-title">Dashboard</h3>

                                                                                                                                                                                                                                                                     <!--       <div class="box-tools pull-right">
                                                                                                                                                                                                                                                       </ul>
                                                                                                                                                                                                                                                                          </div>        -->
            </div>
            <!-- /.box-header -->
            
            
            <div class="box-body">
                
            <?php    if($ratio == 'Smaller') { echo '<div class="customBlackboard1">';
            } else {
                echo '<div class="customBlackboard">';
            }
 ?>               
<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
                
                    <?php include_once'/home/erasmusm/beta.kia-data.com/inc/page/adminDash/adminDashboardGetterFunc/buildSpecialFile.php';?>
                
<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

                </div>
                <!-- /.customBlackboard -->

            </div>
            <!-- /.box-body -->

        </div>
        <!-- /.box -->
<?php





} else {
    
///////////ONLY DISPLAY THE CURRENT USERS JOBS    

 //echo " My Jobs";

//Because we only want to see jobs for 1 user    
$numberOfFiles = 1;

    $height = $_SESSION['height'];
    $height = $height + 126;
    $content = $height - 50;
    $empScrollOuter = $_SESSION['height'];
    $empScrollOuter = $empScrollOuter . "px!important;";
    $height = $height . "px;";
    $content = $content . "px;";
    $numberOfFilesToShow = $numberOfFiles + 1;
    
    
    
    if(isset($numberOfFiles)) {
        $customBlackboard = $numberOfFilesToShow * 650;
        $customBlackboard = $customBlackboard . 'px!important';
    echo "<style>
            .customBlackboard {
            width: . $customBlackboard . px;
            }
         </style>
         ";
} 
;?>

<style>
    .content {
    height: <?php echo $content;?>
    }
</style>    
    


   <!-- TO DO List -->
        <div class="box" style="height:<?php echo $height;?> box-primary; overflow-x: scroll; overflow-y: hidden;">
            <div class="box-header">
        <!--      <i class="ion ion-clipboard"></i> -->

              <h3 class="box-title">Dashboard</h3>

                                                                                                                                                                                                                                                                     <!--       <div class="box-tools pull-right">
                                                                                                                                                                                                                                                       </ul>
                                                                                                                                                                                                                                                                          </div>        -->
            </div>
            <!-- /.box-header -->
            
            
            <div class="box-body">
                
                <div class="customBlackboard1">
                
<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
                
                    <?php include_once'/home/erasmusm/beta.kia-data.com/inc/page/adminDash/adminDashboardGetterFunc/buildOneFile.php';?>
                
<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

                </div>
                <!-- /.customBlackboard -->

            </div>
            <!-- /.box-body -->

        </div>
        <!-- /.box -->
<?php

}
         
?>