<?php

namespace App\Core;

class View implements \Countable, IView
{
    public function display($template, $data = [])
    {
        $path = $this->path($template);
        echo $this->render($path, $data);
    }

    public function count()
    {
        return count($this->data);
    }

    protected function path($template)
    {
        $item = str_replace('.', '/', $template);
        $path = __DIR__ . '/../../App/Views/' . $item . '.php';

        if (!file_exists($path)) {
            throw new \Error('Template not found');
        }

        return $path;
    }

    protected function render($template, $data)
    {
        ob_start();

        if (!empty($data)) {
            foreach ($data as $prop => $value) {
                $$prop = $value;
            }
        }
        include $template;
        $content = ob_get_contents();

        ob_end_clean();

        return $content;
    }
}