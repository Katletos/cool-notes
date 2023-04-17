<?php
function urlIs(string $value): bool
{
    return $_SERVER['REQUEST_URI'] == $value;
}

function authorize(bool $condition, $status = Response::FORBIDDEN)
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

function view(string $path): string
{
    return base_path('views/' . $path);
}