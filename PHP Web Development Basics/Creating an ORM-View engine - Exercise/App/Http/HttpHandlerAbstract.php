<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 5.11.2018 г.
 * Time: 12:56 ч.
 */

namespace App\Http;


use Core\DataBinderInterface;
use Core\TemplateInterface;

class HttpHandlerAbstract
{
    /**
     * @var TemplateInterface
     */
    private $template;

    /**
     * @var DataBinderInterface
     */
    protected $dataBinder;

    /**
     * HttpHandlerAbstract constructor.
     * @param TemplateInterface $template
     */
    public function __construct(TemplateInterface $template, DataBinderInterface $dataBinder)
    {
        $this->template = $template;
        $this->dataBinder = $dataBinder;
    }

    public function render(string $templateName, $data = null) {
        $this->template->render($templateName, $data);
    }

    public function redirect($url) {
        header("Location: $url");
    }


}