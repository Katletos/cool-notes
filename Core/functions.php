<?php

use Core\Response;

function urlIs(string $value): bool
{
    return $_SERVER['REQUEST_URI'] == $value;
}
function abort(int $code = 404): void
{
    http_response_code($code);
    require base_path("views/{$code}.php");
    die();
}

function authorize(bool $condition, $status = Response::FORBIDDEN): void
{
    if (! $condition)
    {
        abort($status);
    }
}

function base_path(string $path):string
{
    return BASE_PATH . $path;
}

function view(string $path, $attributes = []): void
{
    extract($attributes);
    require base_path('views/' . $path);
}

function login($user)
{
    $_SESSION['user'] = [
        'email' => $user['email'],
    ];
}