<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Services\Delivery\Dotman;
use Illuminate\Console\Command;

class checkDeliveryStatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delivery:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $delivery_order = new Dotman(config('services.product_delivery.api'));
        $orders = Order::whereNotNull('delivery_ref_id')->get();
        foreach ($orders as $key => $order) {
            $delivery = $delivery_order->retrieveOrder($order->delivery_ref_id);
            if ($delivery['data']['order_id'] == null) {
                $order->update(['status' => 'pending']);
            }else{
                if(strtolower($delivery['data']['order_details']['status']) == 'not received' || strtolower($delivery['data']['order_details']['status']) == 'not assigned' || strtolower($delivery['data']['order_details']['status']) == 'being processed'){
                    $order->update(['status' => 'pending']);
                }elseif ((strtolower($delivery['data']['order_details']['status']) == 'out for delivery' || strtolower($delivery['data']['order_details']['status']) == 'delayed' || strtolower($delivery['data']['order_details']['status']) == 'no response' || strtolower($delivery['data']['order_details']['status']) == 'redirect')) {
                    $order->update(['status' => 'in progress']);        
                }elseif ((strtolower($delivery['data']['order_details']['status']) == 'cancelled' || strtolower($delivery['data']['order_details']['status']) == 'rejected')) {
                    $order->update(['status' => 'canceled']);
                }elseif (strtolower($delivery['data']['order_details']['status']) == 'delivered'){
                    $order->update(['status' => 'completed']);
                }
            }
            
        }
        return $orders;
    }
}
