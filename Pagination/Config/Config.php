<?php  namespace App\Lib\Pagination\Config;

abstract class Config {

    public $baseUrl;
    public $currentPage;
    public $currentPages;

    public $prevPageUrl;
    public $hasPrevPage;

    public $nextPageUrl;
    public $hasNextPage;

    public $lastPage;

    public function setConfig($paginator, $baseUrl) {
        $this->baseUrl = $baseUrl;
        $this->currentPage = $paginator->currentPage();

        // previous page
        $this->prevPageUrl = $paginator->previousPageUrl();
        $this->hasPrevPage = $this->prevPageUrl;

        // next page
        $this->nextPageUrl = $paginator->nextPageUrl();
        $this->hasNextPage = $this->nextPageUrl;

        // last page
        $this->lastPage = $paginator->lastPage();

        return $this;
    }

    public function url($params) {
        return $this->baseUrl.'/?page='.$params;;
    }
}