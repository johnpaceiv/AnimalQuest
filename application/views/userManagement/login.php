<div id="login">
    <form method="post" id="loginForm">
        <h1 id="loginHead">Already Registered? Login Here.</h1>
        <div id="loginElements">
            <?php
            if(isset($_POST['loginUser'])){
                echo  validation_errors("<div class='alert alert-danger'>", "</div>");
            }
            ?>
            <div id="loginUser_input">
                <?php
                echo form_label('Username: ', 'loginUser');
                echo "<br>";
                $loginUser_input = array(
                    'name'          => 'loginUser',
                    'id'            => 'loginUser',
                    'value'         => '',
                    'placeholder'   => 'Enter username...'
                );
                echo form_input($loginUser_input);
                ?>
            </div>
            <div id="loginPass_input">
                <?php
                echo form_label('Password: ', 'loginPass');
                echo "<br>";
                $loginPass_input = array(
                    'name'          => 'loginPass',
                    'id'            => 'loginPass',
                    'value'         => '',
                    'placeholder'   => 'Enter password...'
                );
                echo form_password($loginPass_input);
                echo form_hidden('form', 'login');
                ?>
            </div>
            <div id="submit_login">
                <input type="submit" value="Login" id="loginBtn"/>
            </div>
            <hr/>
            <h4 id="loginSubHead">If you forgot your password, please click
                <em><a href="mailto:passwordhelp@animalquest.com?subject=Password Reset&body=Please send us your Username and/or Phone Number: ">PASSWORD RESET</a></em> and we can work with you to reset you password.</h4>

        </div>
    </form>
</div>