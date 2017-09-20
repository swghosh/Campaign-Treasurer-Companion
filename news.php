<?php
    // contains common html head and initial code till body 
    include('head.php'); 
?>
<div id="data">
<?php
    include('newstable.php');
?>
</div>
<?php 
    // javascript files that are to be executed
    $scripts = array('common.js', 'tableupdate.js', 'newsupdate.js');
    // contains common html body end and also include script declaration of all filenames specified in scripts array
    include('foot.php'); 
?>