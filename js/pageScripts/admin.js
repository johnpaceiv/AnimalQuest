//Home Page jQuery Scripts

var windowWidth = $(window).width();   // returns width of browser viewport
var windowHeight = $(window).height();   // returns width of browser viewport
var dialogSize = windowWidth - 100; // Returns value to set dialog box size based on browser window width
var dialogHeight = windowHeight ; // Returns value to set dialog box size based on browser window width


/* Learn More Dialog Box */

//$( "#editSubmit" ).click(function() { //Sets Save Button to Trigger alert
//    alert("Your edits have been saved!");
//});

$( "#editRescueModule" ).dialog({
    autoOpen: false,
    modal:true,
    show: "fade",
    hide:"fade",
    width: "auto",
    autoResize: "auto",
    buttons: [{
        text: "Submit Edits",

        click: function() {
            //$( this ).dialog( "close" );
            $( "#edit_rescue_form" ).submit();
        }
    }
    ]
});//Sets up Learn More Dialog

$( "#editRescueBtn" ).click(function() { //Sets Edit Button to Trigger dialog
    $( "#editRescueModule" ).dialog( "open" );
});
