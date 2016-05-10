<div id="register">
    <form method="post" id="register_form">
        <h1 id="registerHead">Register Your Rescue</h1>
        <?php
        if(isset($_POST['registerUser'])){
            echo  validation_errors("<div class='alert alert-danger'>", "</div>");
        }
        ?>
        <div id="contactSet">
            <fieldset>
                <legend>Rescue Contact Information</legend>
                <div id="rescueName_input">
                    <?php
                    echo form_label('Rescue Name: ', 'rescueName');
                    echo "<br>";
                    $rescueName_input = array(
                        'name'          => 'rescueName',
                        'id'            => 'rescueName',
                        'value'         => set_value("rescueName")
                    );
                    echo form_input($rescueName_input);
                    ?>
                </div>
                <div id="contactName_input">
                    <?php
                    echo form_label('Contact Name: ', 'contactName');
                    echo "<br>";
                    $contactName_input = array(
                        'name'          => 'contactName',
                        'id'            => 'contactName',
                        'value'         => set_value("contactName")
                    );
                    echo form_input($contactName_input);
                    ?>
                </div>
                <label for="rescuePhone">Rescue Phone #:</label> <br/><input type="tel" id="rescuePhone" name="rescuePhone"/><br>
                <label for="rescueEmail">Rescue Email:</label> <br/><input type="email" id="rescueEmail" name="rescueEmail"/><br>
                <div id="animalType_input">
                    <?php
                    echo form_label('Rescue Type: ', 'rescueType');
                    echo "<br>";
                    $petType_options = array(
                        '1' => 'Dog',
                        '2' => 'Cat',
                        '3' => 'Horse',
                        '4' => 'Small Animal',
                        '5' => 'Mixed'
                    );
                    $rescueType = array(
                        'name'          => 'rescueType',
                        'id'            => 'rescueType'
                    );
                    echo form_dropdown($rescueType, $petType_options, set_value("rescueType"));
                    ?>
                </div>
            </fieldset>
        </div>
        <div id="accountSet">
            <fieldset>
                <legend>Account Details</legend>
                <div id="registerUser_input">
                    <?php
                    echo form_label('Enter a Username: ', 'registerUser');
                    echo "<br>";
                    $registerUser = array(
                        'name'          => 'registerUser',
                        'id'            => 'registerUser',
                        'value'         => set_value("registerUser"),
                        'placeholder'   => 'Enter username...'
                    );
                    echo form_input($registerUser);
                    ?>
                </div>
                <div id="registerPass_input">
                    <?php
                    echo form_label('Enter a Password: ', 'registerPass');
                    echo "<br>";
                    $registerPass = array(
                        'name'          => 'registerPass',
                        'id'            => 'registerPass',
                        'value'         => '',
                        'placeholder'   => 'Enter password...'
                    );
                    echo form_password($registerPass);
                    ?>
                </div>
                <div id="registerConfirmPass_input">
                    <?php
                    echo form_label('Confirm Your Password: ', 'registerConfirmPass');
                    echo "<br>";
                    $registerConfirmPass_input = array(
                        'name'          => 'registerConfirmPass',
                        'id'            => 'registerConfirmPass',
                        'value'         => '',
                        'placeholder'   => 'Re-enter password...'
                    );
                    echo form_password($registerConfirmPass_input);
                    echo form_hidden('form', 'register');
                    ?>
                </div>
                <input type="submit" value="Register" id="registerSubmit"/>
            </fieldset>
        </div>
    </form>
</div>
</div>
</div>
</div>
<!-- LEARN MORE MODULE -->
<div id="learnMoreModule" title="Learn More About AnimalQuest">
    <p>This is where we will outline all the help and benefits of using AnimalQuest.</p>
</div>
<!-- End Learn More Module -->
<script src="<?php if($this->uri->uri_string() == "main/logout"){echo '../../../../../js/pageScripts/home.js';} else{echo '../js/pageScripts/home.js';}?>"></script>
