<?php

namespace engine\core\view;

class Theme
{
    public function header($name = '', $data = [])
    {
        $name = (string) $name;
        if ($name === ''):
            $name = 'header';
        endif;

        $this->getView($name, $data);
    }

    public function footer($name = '', $data = [])
    {
        $name = (string) $name;

        if ($name === ''):
            $name = 'footer';
        endif;

        $this->getView($name, $data);
    }

    private function getView($view, $data)
    {
        if (ENV == 'admin'):
            $path = ROOT . '/admin/view/' . $view .'.php';
        else:
            $path = ROOT . '/content/themes/default/' . $view .'.php';
        endif;

        extract($data);

        if (is_file($path)):
            require_once $path;
        else:
            throw new \InvalidArgumentException(sprintf('View not exist %s', $view));
        endif;
            
    }
}