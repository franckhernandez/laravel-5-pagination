# Laravel 5 Pagination

# Installation

#### Copy Pagination into your "app/Lib" directory


#### Add service provider "App\Lib\Pagination\PaginationServiceProvider"

# Usage

#### In view

```
<nav style="margin-top: 30px">
    <ul class="pagination">
        {!! $paginator->renderBootstrap('Prev', 'Next') !!}
    </ul>
</nav>
```
