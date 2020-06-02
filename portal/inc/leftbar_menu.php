      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        
        
        
                        <!-- leftbar menu: : Dashboard -->
                        
                    <?php
                    
                    if(isset($_SESSION['canAddNewSupplier']) || isset($_SESSION['canEditExistingSupplier'])) {
                     include_once 'inc/leftMenu/leftMenu_agents.php';
                    }
                    ?>
                    
                    
                    <?php
                    
                    if(isset($_SESSION['canAddNewSupplier']) || isset($_SESSION['canEditExistingSupplier'])) {
                    include_once 'inc/leftMenu/leftMenu_manageAgents.php';
                    }
                    ?>
                    
                            
                            
                            <!-- leftbar menu: : Numbered Treeview -->
                                    
                    <?php
                    // include_once 'inc/leftMenu/leftMenu_numberedTreeView.php';
                    ?>        
                            
                            
                            <!-- leftbar menu: : Taged Link -->
                                    
                    <?php
                    // include_once 'inc/leftMenu/leftMenu_taggedLink.php';
                    ?>
                    
                            
                            <!-- leftbar menu: : Arrrow Treeview -->
                                    
                    <?php
                    // include_once 'inc/leftMenu/leftMenu_arrowTreeView.php';
                    ?>         
                            
                        
                            <!-- leftbar menu: : Calendar Link -->
                                    
                    <?php
                    // include_once 'inc/leftMenu/leftMenu_calendarLink.php';
                    ?>   
                    
                            <!-- leftbar menu: : Mailbox Link -->
                    
                    <?php
                    // include_once 'inc/leftMenu/leftMenu_mailboxLink.php';
                    ?>         
                            
                            
                    <?php
                    // include_once 'inc/leftMenu/leftMenu_multilevelTreeView.php';
                    ?> 
                            
                            
                    <!--        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
                    -->        
                            
                    <?php
                    // include_once 'inc/leftMenu/leftMenu_labels.php';
                    ?> 


      </ul>