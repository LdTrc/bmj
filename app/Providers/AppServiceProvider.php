<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\inventory;
use App\Models\warranty;
use App\Models\product;
use App\Models\supplier;
use App\Models\datasupp;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        $inventories = inventory::all();
        $notifications = [];
        $currentDate = date("Y-m-d");
        $oneWeek = date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "+ 1 week" ) );
        foreach($inventories as $inventory){
            $warranties = warranty::where('inventory_id',$inventory->id)->get();
            
            foreach ($warranties as $warranty){
                $warranty->order_date = date("Y-m-d", strtotime($warranty->order_date));
                $warranty->endDate = date("Y-m-d", strtotime( date( "Y-m-d", strtotime( $warranty->order_date ) ) . "+".$warranty->warranty." month" ) );
                if($currentDate < $warranty->endDate && $warranty->endDate < $oneWeek){
                    $datetime2 = strtotime($warranty->endDate);
                    $datetime1 = strtotime($currentDate);

                    $secs = $datetime2 - $datetime1;// == <seconds between the two times>
                    $day = $secs / 86400;
                    $warrantyItem = [
                        "productName" => $warranty->inventory->product->namabarang,
                        "quantity" => $warranty->quantity,
                        "order_date" => $warranty->order_date,
                        "endDate" => $warranty->endDate,
                        "days_left" => $day
                    ];
                    array_push($notifications,$warrantyItem);
                }
            }
        }

        View::share('notifications', $notifications);
    }
}
