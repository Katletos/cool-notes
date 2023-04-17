<?php

require('Validator.php');

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Create Note';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $errors = [];

    if (! Validator::string($_POST['title'], 1, 255))
    {
        $errors['title'] = 'A title of no more than 255 characters is required.';
    }

    if (! Validator::string($_POST['body'], 1, 1024))
    {
        $errors['body'] = 'A body of no more than 1,024 characters is required.';
    }

    if(empty($errors))
    {
        $db->query('INSERT INTO notes(title, body, user_id) VALUES(:title, :body, :user_id)', [
            'title' => $_POST['title'],
            'body' => $_POST['body'],
            'user_id' => 1,
        ]);
    }
}

require('views/notes/create.view.php');