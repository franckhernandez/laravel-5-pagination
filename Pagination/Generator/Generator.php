<?php  namespace App\Lib\Pagination\Generator;

use App\Lib\Pagination\Generator\Traits\HelperTrait;
use App\Lib\Pagination\Generator\Traits\PaginationTrait;

class Generator  {

    /**
     * @trait
     */
    use HelperTrait, PaginationTrait;

    /**
     * @vars
     */
    private $currentPage;
    private $restPage;


    public function makeCurrentPages($pagination) {

        $this->resultCurrentPages = array();
        $this->currentPage = 1;

        if($pagination->lastPage <= 10) {
            $this->paginate($pagination, $this->currentPage, $pagination->lastPage);
            return $this->resultCurrentPages;
        }

        if($pagination->currentPage <= 7) {
            $this->paginate($pagination, $this->currentPage, 6);
            $this->addPunctuation($pagination);
            $this->addLastPage($pagination);
            return $this->resultCurrentPages;
        }

        $this->restPage = $this->paginate($pagination, $this->currentPage, 1);
        $this->addPunctuation($pagination);

        $this->restPage = $this->paginate($pagination, ($pagination->currentPage-2), ($pagination->currentPage+1));

        if($this->restPage == 1) {
            $this->addLastPage($pagination, false);
        } else {
            if($this->restPage > 1) {
                $this->addPunctuation($pagination);
                $this->addLastPage($pagination);
            }
        }

        return $this->resultCurrentPages;
    }
}