<!-- FOOTER CONTENT -->
<footer>
    <span id="socialIcons">
        <img src="<?php if($this->uri->total_segments() == 3 && $this->uri->slash_segment(2) != "details/"){echo '../../img/social/facebook.png';}else{echo '../../../img/social/facebook.png';}?>" alt="Facebook Logo" class="socialIcon">
        <img src="<?php if($this->uri->total_segments() == 3 && $this->uri->slash_segment(2) != "details/"){echo '../../img/social/twitter.png';}else{echo '../../../img/social/twitter.png';}?>" alt="Facebook Logo" class="socialIcon">
        <img src="<?php if($this->uri->total_segments() == 3 && $this->uri->slash_segment(2) != "details/"){echo '../../img/social/RSS.png';}else{echo '../../../img/social/RSS.png';}?>" alt="Facebook Logo" class="socialIcon">
    </span>
    <div id="footerContent">
        <h5 id="copyright">&copy2015 AnimalQuest</h5>
        <p><a href="#">About</a><a href="#" class="footerLink">Contact</a><a href="#" class="footerLink">Legal</a></p>
    </div>
</footer>
<!-- End Footer Content -->

<!-- End Body Content -->
<!-- PAGE SCRIPTS -->

<!-- End Page Scripts -->
<!-- GLOBAL SCRIPTS -->

<!-- End Global Scripts -->
</body>
</html>