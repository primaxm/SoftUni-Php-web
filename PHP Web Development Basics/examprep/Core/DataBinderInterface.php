<?php

namespace Core;


interface DataBinderInterface
{
    public function binde(array $form, string $className);
}