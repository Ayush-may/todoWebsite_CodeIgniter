<?php
function checkUrl($url)
{
    if (current_url() == site_url($url)) {
        return "text-primary";
    }
    return "text-white";
}
