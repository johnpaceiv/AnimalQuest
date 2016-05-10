
<div id="resultTable">
    <?php
    //var_dump($results_query);
    if($results_query == false){
        echo '<div class="alert alert-danger" id="noResults" style="text-align: center">No Results Found.</div>';
    }else{
        echo '<div ng-repeat="animal in animals | filter:{animalName:name} | filter:{animalAge:age}:true | filter:{energyLevel:energy} | filter:{aloneFor:alone}" class="result" ><a href="details/{{animal.animalid}}"><h3 class="resultTitle">{{animal.animalName}}</h3><img src="../../../img/animalProfiles/{{animal.image}}.jpg" class="resultImg"/></a></div>';
    }
    ?>
</div>

<div id="clearPanel"></div>
<!-- END List Container -->
</div>
<!-- End Body Tag -->
</div>
<script>
    var app = angular.module('aqApp', []);
        app.controller('aq_controller', function($scope, $http) {
            $http.get("../../js/angularJs/animalRequest.php")
                .success(function (response) {$scope.animals = response.rescueResults;});
    });
</script>