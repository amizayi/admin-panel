<?php

namespace Modules\LogActivity\Services\V1;


use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Modules\LogActivity\Contracts\V1\Services\LoggerService;
use Modules\LogActivity\Entities\V1\LogActivity\LogActivityFields;

class Logger implements LoggerService
{
    /**
     * Get the information for logging a request.
     *
     * This method returns an array containing various log fields related to the request information.
     *
     * @param Request $request The HTTP request object.
     *
     * @return array An associative array with the following keys:
     * - 'ip_address': The IP address of the user making the request.
     * - 'url': The URL of the current request.
     * - 'action': The action method being called for the current route.
     * - 'user_id': The ID of the authenticated user (or null if not authenticated).
     * - 'device': The type of device the user is accessing the application from.
     * - 'platform': The user's platform (e.g., Windows, macOS, Linux).
     * - 'browser': The user's browser.
     * - 'is_mobile': A boolean indicating whether the user is accessing the application from a mobile device.
     * - 'is_desktop': A boolean indicating whether the user is accessing the application from a desktop device.
     * - 'is_tablet': A boolean indicating whether the user is accessing the application from a tablet device.
     */
    public function info(Request $request): array
    {
        $agent = new Agent();

        return [
            LogActivityFields::IP_ADDRESS => $request->ip(),
            LogActivityFields::URL        => $request->url(),
            LogActivityFields::ACTION     => $request->route()?->getActionMethod(),
            LogActivityFields::USER_ID    => auth()->user()?->id ?? null,
            LogActivityFields::DEVICE     => $agent->device(),
            LogActivityFields::PLATFORM   => $agent->platform(),
            LogActivityFields::BROWSER    => $agent->browser(),
            LogActivityFields::IS_MOBILE  => $agent->isMobile(),
            LogActivityFields::IS_DESKTOP => $agent->isDesktop(),
            LogActivityFields::IS_TABLET  => $agent->isTablet(),
            LogActivityFields::DATE_TIME  => now(),
        ];
    }
}
