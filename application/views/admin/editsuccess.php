<style>
    .no-close .ui-dialog-titlebar-close {
        display: none;
    }
</style>
<div id="editSuccess">Your rescue <?php echo $_SESSION["rescueName"];?> has been updated.</div>
<script>
    $("#editSuccess").dialog({
        title: "Rescue Details Updated!",
        dialogClass: "no-close",
        buttons: [{
            text: "Okay.",

            click: function() {
                $( this ).dialog( "close" );
                window.location.replace("../admin/admin_dashboard");
            }
        }
        ]});
</script>