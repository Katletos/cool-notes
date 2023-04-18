<?php
function urlIs(string $value): bool
{
    return $_SERVER['REQUEST_URI'] == $value;
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

function view(string $path, $attributes = []): string
{
    extract($attributes);
    require base_path('views/' . $path);
}