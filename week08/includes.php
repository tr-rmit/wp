<?php
$title = 'Including content';
include('includes/header.inc');
$lang = 'testing php includes';
?>

<p>Here is our <?= $lang ?> page</p>

<?php
include('includes/footer.inc');
?>