<?php

namespace engine\core\view;

use engine\core\view\Theme;

class View
{
    protected $theme;

    public function __construct()
    {
        $this->theme = new Theme();
    }

    public function render($view, $data = [])
    {        
        if (ENV == 'admin'):
            $path = ROOT . '/admin/view/' . $view .'.php';
        else:
            $path = ROOT . '/content/themes/default/' . $view .'.php';
        endif;
        
        if (!is_file($path)):
            throw new \InvalidArgumentException(sprintf('View not founded %s', $view));
        endif;

        ob_start();
        ob_implicit_flush(0);

        try {
            require_once $path;
        } catch (\Exception $e) {
            ob_end_clean();
            throw $e;            
        }

        echo ob_get_clean();  
    }
}