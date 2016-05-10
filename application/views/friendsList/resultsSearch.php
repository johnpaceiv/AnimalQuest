<div id="listContainer">
    <!-- SEARCH PANEL -->

    <div id="searchPanelContainer">
        <div id="searchPanel">
            <fieldset id="animalNameTitle">
                <legend>Animal Name</legend>
                <input type="text" id="animalName" name="animalName" ng-model="name"/>
            </fieldset><br>
            <fieldset id="animalAgeTitle">
                <legend>Animal Age</legend>
                <select name="animalAge" id="animalAge" ng-model="age">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                </select>
            </fieldset><br>
            <fieldset id="awayFromHome">
                <legend>Away From Home</legend>
                <input type="radio" name="1-2hours" id="1-2hours" value="1" ng-model="alone"/><label for="1-2hours">1 - 2 Hours</label><br/>
                <input type="radio" name="3-4hours" id="3-4hours" value="2" ng-model="alone"/><label for="3-4hours">3 - 4 Hours</label><br/>
                <input type="radio" name="5-6hours" id="5-6hours" value="3" ng-model="alone"/><label for="5-6hours">5 - 6 Hours</label><br/>
                <input type="radio" name="7hours" id="7hours" value="4" ng-model="alone"/><label for="7hours">7+ Hours</label>
            </fieldset>
            <fieldset id="energyLevel">
                <legend>Energy Level</legend>
                <input type="radio" name="high" id="high" value="1" ng-model="energy"/><label for="high">High Energy</label><br/>
                <input type="radio" name="medium" id="medium" value="2" ng-model="energy"/><label for="medium">Medium Energy</label><br/>
                <input type="radio" name="low" id="low" value="3" ng-model="energy"/><label for="low">Low Energy</label><br/>
                <input type="radio" name="couch" id="couch" value="4" ng-model="energy"/><label for="couch">Couch Potato</label>
            </fieldset>
            <button id="resetBtn">Reset</button>
        </div>
    </div>
    <script>
        $( "#resetBtn" ).click(function(){
            location.reload();
        });
    </script>

