<?php

namespace Core;


class Template implements TemplateInterface
{
    const TEMPLATE_DIRECTORY = "App/Templates/";
    const TEMPLATE_EXTENSION = ".php";

    public function render(string $tamplateName, $data)
    {
        require_once self::TEMPLATE_DIRECTORY . $tamplateName . self::TEMPLATE_EXTENSION;
    }
}