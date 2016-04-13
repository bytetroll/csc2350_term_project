<?php

function LoadLayout($Content, $Variables)
{
    // ...
    extract($Variables);

    // Load Content
    ob_start();
    include_once($Content);
    $content = ob_get_contents();
    ob_end_clean();

    // Load Layout
    include_once("../templates/Layout.php");
}