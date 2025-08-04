<?php

if(!function_exists("url")){

    function url(string $path, array $params = []): string
    {
        foreach ($params as $key => $value) {
            $path = str_replace("{" . $key . "}", $value, $path);
        }

        return $path;
    }
}