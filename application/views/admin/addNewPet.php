<!-- CALL TO ACTION -->
<div id="newFriendContainer" class="global-panel-container">
    <div id="newFriend" class="global-panel">

        <form method="post" id="newFriendForm" enctype="multipart/form-data">
            <h2 id="newFriendTitle">Add New Friend</h2>
            <?php
            echo  validation_errors("<div class='alert alert-danger'>", "</div>");
            ?>
            <ul id="mainInput">
                <li><label for="addanimalName">Animal Name:</label> <br/>
                    <?php
                        $animalName_input = array(
                            'name'          => 'addanimalName',
                            'id'            => 'addanimalName',
                            'value'         => set_value("addanimalName")
                        );
                        echo form_input($animalName_input);
                    ?></li>
                <li><label for="age">Age:</label> <br/>
                    <?php
                    $age_input = array(
                        'name'          => 'age',
                        'id'            => 'age',
                        'value'         => set_value("age")
                    );
                    echo form_input($age_input);
                    ?></li>
            </ul>
            <fieldset id="awayFromHome">
                <legend> Away From Home</legend>
                <input type="radio" value="1" name="aloneFor" id="1-2hours" aria-label="1-2 Hours"/><label for="1-2hours">1 - 2 Hours</label><br/>
                <input type="radio" value="2" name="aloneFor" id="3-4hours"/><label for="3-4hours">3 - 4 Hours</label><br/>
                <input type="radio" value="3" name="aloneFor" id="5-6hours"/><label for="5-6hours">5 - 6 Hours</label><br/>
                <input type="radio" value="4" name="aloneFor" id="7hours"/><label for="7hours">7+ Hours</label>
            </fieldset>
            <fieldset id="energyLevel">
                <legend> Energy Level</legend>
                <input type="radio" value="1" name="energyLevel" id="high" aria-label="high"/><label for="high">High Energy</label><br>
                <input type="radio" value="2" name="energyLevel" id="medium"/><label for="medium">Medium Energy</label><br>
                <input type="radio" value="3" name="energyLevel" id="low"/><label for="low">Low Energy</label><br>
                <input type="radio" value="4" name="energyLevel" id="couch"/><label for="couch">Couch Potato</label>
            </fieldset>
            <fieldset id="bioLabel">
                <legend> Bio</legend>
                <?php
                $newbio_input = array(
                    'name'          => 'newbio',
                    'id'            => 'newbio',
                    'rows'            => 3,
                    'value'         => set_value("newbio")
                );
                echo form_textarea($newbio_input);
                ?><br/>


            </fieldset>
            <fieldset id="imgLabel" style="margin-top: 10px">
                <legend> Profile Picture</legend>
                <?php
                echo form_upload('image','Upload');
                echo form_hidden('form', 'addNew');
                ?>
            </fieldset>
            <input type="submit" value="New Friend" id="addFriendBtn"/>

        </form>
    </div>
</div>