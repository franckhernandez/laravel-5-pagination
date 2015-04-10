# Laravel 5 Pagination

# Installation

Copy Pagination into your "app/Lib/" directory

Add service provider "App\Lib\Pagination\PaginationServiceProvider"

# Usage

#### Controller
```
use **App\Lib\Pagination\Pagination**;

class HomeController extends Controller {

    private **$pagination**;

    public function __construct(**Pagination $pagination**) {
        **$this->pagination = $pagination**;
    }

	public function index(Request $request) {
	
	    // Eloquent 3 per/page
	    $products = Product::paginate(3);
	    
	    // Pagination set($products, $baseUrl)
        **$paginator = $this->pagination->set($products, $request->getBaseUrl());**
        
        // Return view
        return view('home')
            ->with(compact('products', '**paginator**'));
	}

```


#### View

```
<nav style="margin-top: 30px">
    <ul class="pagination">
        {!! $paginator->renderBootstrap('Prev', 'Next') !!}
    </ul>
</nav>
```
**or**
```
@if($paginator->hasPrevPage)
    <li>
        <a href="{{ $paginator->prevPageUrl }}">Prev</a>
    </li>
@endif

@if($paginator->lastPage > 1)
    @foreach($paginator->currentPages as $currentPage)
        @if($paginator->currentPage == $currentPage->num)
            <li class="active">
                <a href="{{ $currentPage->url }}">{{ $currentPage->num  }}</a>
            </li>
        @else
            <li>
                <a href="{{ $currentPage->url }}">{{ $currentPage->num  }}</a>
            </li>
        @endif
    @endforeach
@endif

@if($paginator->hasNextPage)
    <li>
        <a href="{{ $paginator->nextPageUrl }}">Next</a>
    </li>
@endif
```
