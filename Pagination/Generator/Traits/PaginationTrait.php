<?php  namespace App\Lib\Pagination\Generator\Traits;

trait PaginationTrait {

    private function paginate($pagination, $min, $max) {

        $this->perpage($pagination, $min, $max);

        return ( $pagination->lastPage - $this->currentPage );

    }

    private function perpage($pagination, $min, $max) {

        for($i = $min; $i < ($pagination->lastPage+1); $i++) {
            $this->addPage($pagination, $i);
            if($i >= ($max+1)) { break; }
        }

        $this->currentPage = $i;

        return $i;

    }
}
