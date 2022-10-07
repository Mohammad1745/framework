<?php

namespace Framework\View;

class View
{
    private static string $viewPath = "../resources/views";

    /**
     * @param string $view
     * @param array $data
     * @return bool|string
     */
    public static function render (string $view, array $data=[]): bool|string
    {
        $view = str_replace('.', '/', $view);
        $view = self::$viewPath.'/'.$view.'.php';
        ob_start();
        foreach ($data as $key => $value) {
            $$key = $value;
        }
        include ($view);
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
}