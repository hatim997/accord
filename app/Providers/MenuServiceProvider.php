<?php

namespace App\Providers;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class MenuServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap services.
   */
  public function boot(): void
  {
    $verticalMenuJson = file_get_contents(base_path('resources/menu/verticalMenuser.json'));
    $verticalMenuData = json_decode($verticalMenuJson);
    // Share all menuData to all the views
    View::share('menuData', [$verticalMenuData]);
    $verticalMenuJsonu = file_get_contents(base_path('resources/menu/verticalMenuu.json'));
    $verticalMenuDatau = json_decode($verticalMenuJsonu);
    // Share all menuData to all the views
    View::share('menuDatau', [$verticalMenuDatau]);

    $verticalMenuJsona = file_get_contents(base_path('resources/menu/verticalMenushipper.json'));
    $verticalMenuDatas = json_decode($verticalMenuJsona);
    // Share all menuData to all the views
    View::share('menuDatas', [$verticalMenuDatas]);

    $verticalMenuJsona = file_get_contents(base_path('resources/menu/verticalMenuagent.json'));
    $verticalMenuDataa = json_decode($verticalMenuJsona);
    // Share all menuData to all the views
    View::share('menuDataa', [$verticalMenuDataa]);
  }
  public function bootu(): void
  {
    $verticalMenuJson = file_get_contents(base_path('resources/menu/verticalMenuu.json'));
    $verticalMenuData = json_decode($verticalMenuJson);
    // Share all menuData to all the views
    View::share('menuDatau', [$verticalMenuData]);
  }

  public function boota(): void
  {
    $verticalMenuJson = file_get_contents(base_path('resources/menu/verticalMenuagent.json'));
    $verticalMenuData = json_decode($verticalMenuJson);
    // Share all menuData to all the views
    View::share('menuDataa', [$verticalMenuData]);
  }
}
