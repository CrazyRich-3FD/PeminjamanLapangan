<?php
function set_active($route)
{
    if (Route::is($route)) {
        return 'active';
    }
}

function set_on($route)
{
    if (Route::is($route)) {
        return '';
    } else {
        return 'collapsed';
    }
}
?>