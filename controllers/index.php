<?php

$_SESSION['name'] = 'Mikita Maliauka';

require view('index.view.php', [
    'heading' => 'Home'
]);