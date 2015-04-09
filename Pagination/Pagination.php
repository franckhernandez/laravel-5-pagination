<?php  namespace App\Lib\Pagination;

use App\Lib\Pagination\Config\Config;
use App\Lib\Pagination\Generator\Generator;
use App\Lib\Pagination\Render\BootstrapTrait;

class Pagination extends Config {

    /**
     * trait
     */
    use BootstrapTrait;

    /**
     * @var Generator
     */
    private $generator;

    /**
     * @param Generator $generator
     */
    public function __construct(Generator $generator) {
        $this->generator = $generator;
    }

    /**
     * @param $paginator
     * @param $baseUrl
     * @return $this
     */
    public function set($paginator, $baseUrl) {
        return $this->setConfig($paginator, $baseUrl);
    }

    /**
     * @return array
     */
    public function currentPages() {
        return $this->generator->makeCurrentPages($this);
    }

    /**
     * @param null $previousPage
     * @param null $nextPage
     * @return string html
     */
    public function renderBootstrap($previousPage = null, $nextPage = null) {
        return $this->render($this, $previousPage, $nextPage);
    }
}