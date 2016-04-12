<?php

function LoadLayout($Content)
{
    // Load Content
    ob_start();
    include_once($Content);
    $content = ob_get_contents();
    ob_end_clean();

    // Load Layout
    include("../templates/Layout.php");
}