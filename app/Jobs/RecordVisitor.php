<?php

namespace App\Jobs;

use App\Models\Shortener;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Jenssegers\Agent\Agent;
use Stevebauman\Location\Facades\Location;

class RecordVisitor implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(private Shortener $shortener, private Agent $agent)
    {
    }

    public function handle(): void
    {
        $location = Location::get(request()->ip());
        if ($location) {
            $country = $location->countryName;
            $city = $location->cityName;
        } else {
            $country = $city = null;
        }
        $this->shortener->visitors()->create([
            'ip_address' => request()->ip(),
            'country' => $country,
            'city' => $city,
            'platform' => $this->agent->platform(),
            'device' => $this->agent->device(),
            'device_type' => $this->agent->deviceType(),
            'browser' => $this->agent->browser(),
            'referer' => parse_url(request()->header('referer'), PHP_URL_HOST),
        ]);
    }
}
