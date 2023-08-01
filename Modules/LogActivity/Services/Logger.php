<?php

namespace Modules\LogActivity\Services;


use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Modules\LogActivity\Fields\LogFields;

class Logger
{
    public static function info(Request $request): array
    {
        $agent = new Agent();

        return [
            LogFields::IP_ADDRESS   => $request->ip(),
            LogFields::URL          => $request->url(),
            LogFields::ACTION       => $request->route()?->getActionMethod(),
            LogFields::USER_ID      => auth()->user()?->id ?? null,
            LogFields::DEVICE       => $agent->device(),
            LogFields::PLATFORM     => $agent->platform(),
            LogFields::BROWSER      => $agent->browser(),
            LogFields::IS_MOBILE    => $agent->isMobile(),
            LogFields::IS_DESKTOP   => $agent->isDesktop(),
            LogFields::IS_TABLET    => $agent->isTablet(),
        ];
    }
}
