/***!!!WARNING: DO NOT EDIT ANY OF THIS CONTENT!!!***/
angular.module("aqApp").service("dataService", function(filterFilter) {

    var resultsArray = $http.get("animalRequest.php");
        console.log('test');


    /***!!!WARNING: DO NOT EDIT ANY OF THIS CONTENT!!!***/
    this.getResults = function() {
        return resultsArray;
    };
    this.getResultsAt = function(_animalid) {
        this.getResults();
        return  filterFilter(resultsArray, {upc:_animalid})[0];
    };
});
/***!!!WARNING: DO NOT EDIT ANY OF THIS CONTENT!!!***/
