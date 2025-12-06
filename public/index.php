<?php
// Redirige les accès qui pointent encore vers /public vers la racine du projet
if ($_SERVER['HTTP_HOST'] === 'localhost' || strpos($_SERVER['HTTP_HOST'], '.local') !== false) {
    $target = '/NovaLabz/';
} else {
    $target = '/';
}
header('Location: ' . $target, true, 301);
exit;
?>