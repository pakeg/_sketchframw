<?php

namespace engine\core\config;

class Config 
{
    public static function item($key, $group = 'app')
    {
        $group = self::file($group);

        return isset($group[$key]) ? $group[$key] : null;
    }

    public static function file($group)
    {
        $path = ROOT . '/engine/config/' . $group . '.php'; 
        
        if (file_exists($path)):

            $items = require_once $path;

            if (is_array($items)):
                return $items;
            else:
                throw new \Exception("Config file is not valid", 1);
            endif;

        else:
            throw new \Exception("Cannot load config file.");
        endif;

        return false;
            
    } 
}