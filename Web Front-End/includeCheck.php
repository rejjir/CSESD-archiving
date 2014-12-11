<?php
// Redirect to main page if #include pages are accessed directly
if (!isset($includeCheck))
header('Location: index.php');
?>
