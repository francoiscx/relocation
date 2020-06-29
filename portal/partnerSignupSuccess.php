    <section id="partners">
        <h1 class="text-left" style="color: rgba(221,27,61,1.00);font-size: x-large; margin: 0px 17px; text-align:center;"><!--PARTNERS--><br></h1>
        <div>
            <div class="container">

                <div class="row">
                    <div class="col-md-12"><h1 id="partners" style="text-align:center">This application was successfully added to the review queue.<br/></h1>
                        <p id="partners" style="text-align:center">Submission was added.<br>Please head over to the new applicatins page to activate this partner.</p>

                        <br><br>

                        <div>
                            <center><p><?php echo "The application for " . $_SESSION['app_title'] . ' ' . $_SESSION['app_lastname'] . ', relating to company named ' . $_SESSION['app_companyName'] . ' with registration number ' . $_SESSION['app_companyRegistrationNumber'] . ' was added to new applications.' ;?></p></center>
                        </div>
                    </div>
                </div>
<br><br><br>
                    <div class="row">

                        <div class="col-md-3">
                        </div>

                        <div class="col-md-6">
                        

                            <button class="btn btn-primary" id="goBackHome" name="goBackHome" <?php if(isset($notmobile)) echo 'style="float: right;margin-right:-150px;"';?>>Go to New Appllications page</button>
                                                  
                      
                        <h1 class="text-left" style="color: rgba(221,27,61,1.00);font-size: x-large; margin: 0px 17px;"></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <br><br><br><br><br><br>

<script type="text/javascript">
    document.getElementById("goBackHome").onclick = function () {
        location.replace("/portal/index.php?new=1");
    };
</script>

<?php
unset($_SESSION['app_companyName']);
unset($_SESSION['app_companyRegistrationNumber']);
unset($_SESSION['app_title']);
unset($_SESSION['app_lastname']);
?>