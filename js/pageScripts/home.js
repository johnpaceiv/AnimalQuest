//Home Page jQuery Scripts
var windowSize = $(window).width();   // returns width of browser viewport
var dialogSize = windowSize - 100; // Returns value to set dialog box size based on browser window width

/* Learn More Dialog Box */
$( "#learnMoreModule" ).dialog({ autoOpen: false, modal:true, show: "fade", hide:"fade", width:"auto"});//Sets up Learn More Dialog

$( "#learnMoreBtn" ).click(function() { //Sets Learn More Button to Trigger dialog
    $( "#learnMoreModule" ).dialog( "open" );
});

/* Utility Content Tabs */
$( "#utilityTabs" ).tabs({show: "fade"});