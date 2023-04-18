<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] == $currentUserId);

$errors = [];

if (! Validator::string($_POST['title'], 1, 255))
{
    $errors['title'] = 'A title of no more than 255 characters is required.';
}

if (! Validator::string($_POST['body'], 1, 1024))
{
    $errors['body'] = 'A body of no more than 1,024 characters is required.';
}

if(count($errors))
{
    return view('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note,
    ]);
}

$db->query('update notes set title = :title, body = :body where id = :id', [
    'id' => $_POST['id'],
    'title' => $_POST['title'],
    'body' => $_POST['body'],
]);

header('location: /notes');
die();