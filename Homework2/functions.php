<?php
function debug($variable)
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    die();
}


function loadView(string $viewName, array $parameters = [])
{
    if (!empty($parameters)) {
        extract($parameters);
    }
    require "Views" . DIRECTORY_SEPARATOR . $viewName;
}
