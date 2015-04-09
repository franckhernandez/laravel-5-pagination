<?php  namespace App\Lib\Pagination;

use Illuminate\Support\ServiceProvider;

class PaginationServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('pagination', function() {
            $generator = $this->app->make('App\Lib\Pagination\Generator\Generator');
            return new Pagination($generator);
        });
    }
}