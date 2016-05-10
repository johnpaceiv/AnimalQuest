<style>
    .no-close .ui-dialog-titlebar-close {
        display: none;
    }
</style>
<div class="alert alert-danger" id="loginError" style="text-align: center;">The username/password combination you entered is incorrect. Please try again...</div>
<script>
    $("#loginError").dialog({
        title: "Username/Password Error",
        dialogClass: "no-close",
        buttons: [{
            text: "Try again.",

            click: function() {
                $( this ).dialog( "close" );
                $("#utilityTabs").tabs({
                    active: 1
                });
            }
        }
    ]});
</script>