<?php /** @noinspection PhpComposerExtensionStubsInspection */


namespace App\Services;


use Illuminate\Support\Facades\Http;

class DistanceServices
{
    public static function calculateDistance ($origin, $destinations) {
        $origin = '40.7486,-73.9864';
        $destinations = '40.7486,-72.9864';
        $req = Http::get('https://maps.googleapis.com/maps/api/distancematrix/json',[
            'origins' => $origin,
            'destinations' => $destinations,
            'key' => config('services.distance.key'),
        ]);

        $body = json_decode($req->body());
        return round($body->rows[0]->elements[0]->distance->value/1000);
    }
}
