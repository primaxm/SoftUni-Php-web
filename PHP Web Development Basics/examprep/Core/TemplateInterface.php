<?php

namespace Core;


interface TemplateInterface
{
    public function render(string $tamplateName, $data);
}