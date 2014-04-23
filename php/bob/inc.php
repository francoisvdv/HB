<?php
foreach(scandir(__DIR__ . "/inc") as $filename)
{
    $path = __DIR__ . "/inc" . '/' . $filename;
    if(is_file($path))
	{
        require $path;
    }
}