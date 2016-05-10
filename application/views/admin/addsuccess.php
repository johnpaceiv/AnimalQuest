<style>
        .no-close .ui-dialog-titlebar-close {
                display: none;
        }
</style>
<div class="alert alert-danger" id="addSuccess" style="text-align: center;">Your friend <?php echo $this->input->post('addanimalName');?> has been created.</div>
<script>
        $("#addSuccess").dialog({
                title: "<?php echo $this->input->post('addanimalName');?> Added!",
                dialogClass: "no-close",
                buttons: [{
                        text: "Okay.",

                        click: function() {
                                $( this ).dialog( "close" );
                        }
                }
                ]});
</script>