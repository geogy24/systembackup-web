<?php

namespace App\Helpers;

class SessionHelper
{
    /**
     * Saves on variable session the link selected for the user
     * 
     * @param string $link
     */
    public function linkSelected($link)
    {
        session(['link' => $link]);
    }
}
