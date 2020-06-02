    <section id="partners">
        <h1 class="text-left" style="color: rgba(221,27,61,1.00);font-size: x-large;rgba:(221,27,61,1.00); margin: 0px 17px; text-align:center;"><!--PARTNERS--><br></h1>
        <div>
            <div class="container">

                <div class="row">
                    <div class="col-md-12"><h1 id="partners" style="text-align:center">Your application was successfully submitted.<br/></h1>
                        <p id="partners" style="text-align:center">We received your application.<br>After reviewing, we will notify you as to whether it was successful or not.</p>

                        <br><br>

                        <div>
                            <p><?php echo $_SESSION['app_title'] . ' ' . $_SESSION['app_lastname'] . ', your application  for ' . $_SESSION['app_companyName'] . ' with registration number ' . $_SESSION['app_companyRegistrationNumber'] . ' will be reviewed for eligibility.' ;?></p>
                        </div>
                    </div>
                </div>
<br><br><br>
                    <div class="row">

                        <div class="col-md-3">
                        </div>

                        <div class="col-md-6">
                        

                            <button class="btn btn-primary" id="goBackHome" name="goBackHome" <?php if(isset($notmobile)) echo 'style="float: right;margin-right:-150px;"';?>>Go back home</button>
                                                  
                      
                        <h1 class="text-left" style="color: rgba(221,27,61,1.00);font-size: x-large;rgba:(221,27,61,1.00); margin: 0px 17px;"></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <br><br><br><br><br><br>

<script type="text/javascript">
    document.getElementById("goBackHome").onclick = function () {
        location.replace("index.php");
    };
</script>