<!-- LEARN MORE MODULE -->
<div id="editRescueModule" class="container-fluid" title="Edit <?php echo $_SESSION['rescueName']?> Details">
    <form method="post" id="edit_rescue_form">
        <div class="container">
            <div class="row">
              <div class="col-md-6">
                  <fieldset>
                      <label for="editcontactName">Contact Name:</label> <br/><input type="text" id="editcontactName" name="editcontactName" value="<?php echo $contactName; ?>"/><br>
                      <label for="editrescuePhone">Rescue Phone #:</label> <br/><input type="tel" id="editrescuePhone" name="editrescuePhone" value="<?php echo $rescuePhone; ?>"/><br>
                      <label for="editrescueEmail">Rescue Email:</label> <br/><input type="email" id="editrescueEmail" name="editrescueEmail" value="<?php echo $rescueEmail; ?>"/><br>
                  </fieldset>
              </div>
                <div class="col-md-6">
                    <fieldset>
                        <label for="editrescueType">Rescue Type:</label> <br/>
                        <select name="editrescueType" id="editrescueType">
                            <option id="dog" value="1">Dog</option>
                            <option id="cat" value="2">Cat</option>
                            <option id="horse" value="3">Horse</option>
                            <option id="smallanimal" value="4">Small Animal</option>
                            <option id="mixed" value="5">Mixed</option>
                        </select><br>
                        <script>
                            var dbRescueType = <?php echo $rescueType; ?>;
                            switch(dbRescueType){
                                case 1:
                                    $('#dog').attr("selected","selected");
                                    break;
                                case 2:
                                    $('#cat').attr("selected","selected");
                                    break;
                                case 3:
                                    $('#horse').attr("selected","selected");
                                    break;
                                case 4:
                                    $('#smallanimal').attr("selected","selected");
                                    break;
                                case 5:
                                    $('#mixed').attr("selected","selected");
                                    break;
                            }
                        </script>
                        <label for="bioEdit">About Our Rescue:</label> <br/><textarea name="bioEdit" id="bioEdit" cols="30" rows="3"><?php echo $bio; ?></textarea><br>
                        <?php echo form_hidden('form', 'editRescue');?>
<!--                        <input type="submit" value="Save" id="editSubmit"/>-->
                    </fieldset>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="../../js/pageScripts/admin.js"></script>
<!-- End Learn More Module -->