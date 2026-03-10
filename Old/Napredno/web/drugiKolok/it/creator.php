<?php
require_once 'config.php';
require_once 'functions.php';

$developers = createDevelopersArray($names, $positions, $roles);

// Optional: print to check
echo "<pre>";
print_r($developers);
echo "</pre>";
?>
