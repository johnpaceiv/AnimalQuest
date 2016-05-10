<!-- UTILITY CONTENT -->
<div id="utilityContainer" class="global-panel-container">
    <div id="utilityContent" class="global-panel">
        <div id="utilityTabs">
            <ul>
                <li><a href="#select_rescue"><span>Select Rescue</span></a></li>
                <li><a href="#login"><span>Rescue Login</span></a></li>
                <li><a href="#register"><span>Register Rescue</span></a></li>
            </ul>
            <div id="select_rescue">
                <form method="post" id="select_form">
                        <h1 id="selectHead">Choose a Rescue</h1>
                        <div id="selectElements">
                            <select name="rescue_select" id="rescue_select">
                                <?php
                                $query = $this->db->query('SELECT rescueName, rescueid FROM users;');
                                foreach ($query->result() as $row)
                                {
                                    echo '<option value="' . $row->rescueid . '">' . $row->rescueName . '</option>';
                                };
                                ?>
                            </select>
                            <?php echo form_hidden('form', 'selectRescue'); ?>
                            <input type="submit" value="View Friends" id="viewFriendsBtn"/>
                        </div>
                </form>
            </div>
