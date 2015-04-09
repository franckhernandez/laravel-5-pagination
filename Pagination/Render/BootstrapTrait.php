<?php  namespace App\Lib\Pagination\Render; 

trait BootstrapTrait {

    private function render($paginator, $previousPage, $nextPage) {
        if($previousPage) {
            $previousPage = $this->previousPage($paginator, $previousPage);
        }
        if($nextPage) {
            $nextPage = $this->nextPage($paginator, $nextPage);
        }
        if($paginator->lastPage > 1) {
            $currentPage = $this->makeCurrentPages($paginator);
        }
        return $previousPage.$currentPage.$nextPage;
    }

    private function previousPage($paginator, $previousPage) {
        if( $paginator->hasPrevPage )
        {
            return '<li>
                <a href="'.$paginator->prevPageUrl.'">
                    <span>'.$previousPage.'</span>
                </a>
            </li>';
        }
        return;
    }

    private function nextPage($paginator, $nextPage) {
        if( $paginator->hasNextPage )
        {
            return '<li>
                <a href="'.$paginator->nextPageUrl.'">
                    <span>'.$nextPage.'</span>
                </a>
            </li>';
        }
        return;
    }


    private function makeCurrentPages($paginator) {
        $r = '';
        foreach($paginator->currentPages() as $currentPage) {
            if($paginator->currentPage == $currentPage->num) {
                $r .= '<li class="active"><a href="'.$currentPage->url.'">'.$currentPage->num.'</a></li>';
            } else {
                $r .= '<li><a href="'.$currentPage->url.'">'.$currentPage->num.'</a></li>';
            }
        }
        return $r;
    }

}