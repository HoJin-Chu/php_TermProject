<?php
function requestValue($name)
{
    return isset($_REQUEST[$name]) ? $_REQUEST[$name] : "";
}

function sessionValue($name)
{
    return isset($_SESSION[$name]) ? $_SESSION[$name] : "";
}
