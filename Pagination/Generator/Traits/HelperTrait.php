<?php  namespace App\Lib\Pagination\Generator\Traits;

trait HelperTrait {
    private function addPage($pagination, $num, $punctuation = null) {
        $stdClass = new \stdClass();
        $stdClass->num = $punctuation ?:$num;
        $stdClass->url = $pagination->url($num);
        array_push($this->resultCurrentPages, $stdClass);
    }

    private function addPunctuation($pagination) {
        $this->decrementRestPage();
        $this->addPage($pagination, (++$this->currentPage), '...');
    }

    private function addLastPage($pagination, $beforePage = true) {
        if($beforePage) {
            $this->addPage($pagination, $pagination->lastPage-1);
        }
        $this->addPage($pagination, $pagination->lastPage);
    }

    private function decrementRestPage() {
        $this->restPage--;
    }

}