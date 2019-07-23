<?php

namespace App\Helpers;

class UtilHelper {

    /**
     * Sanitize string
     * 
     * put hola!"# mundo
     * to hola_mundo
     * 
     * @param string $string
     * @return string
     */
    public function sanitizeString($string)
    {
        return str_replace(' ', '_', self::removeSpecialCharacters(strtolower($string)));
    }

    /**
     * Remove special characters
     * 
     * @param string $string
     * @return string
     */
    private function removeSpecialCharacters($string)
    {
        return preg_replace('/[^a-z0-9 -]+/', '', $string);
    }
}
