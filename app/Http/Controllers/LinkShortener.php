<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class LinkShortener extends Controller
{
    public function redirect(Request $request, Link $link)
    {
        if (! $link->is_active)
            abort(404);

        $agent = new Agent();

        $link->statistics()->create([
            'ip' => $request->ip(),
            'agent' => [
                'platform' => $agent->platform() ?? null,
                'browser' => $agent->browser() ?? null,
                'robot' => $agent->robot() ?? null,
                'languages' => $agent->languages() ?? null,
                'deviceType' => $agent->deviceType() ?? null,
                'device' => $agent->device() ?? null,
                'referer' => $request->header('referer') ?? null,
            ],
        ]);

        return redirect($link->destination, $link->code);
    }
}
