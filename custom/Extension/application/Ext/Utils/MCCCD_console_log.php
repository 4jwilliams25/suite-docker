<?php

function console_log($data)
{

    echo '<script> console.log(' . json_encode($data, JSON_HEX_TAG) . ');</script>';
}
