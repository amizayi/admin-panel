<?php

namespace Modules\LogActivity\Services;


use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Modules\LogActivity\Fields\LogFields;
use Modules\LogActivity\Contracts\Services\LoggerService;

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
            LogFields::IP_ADDRESS => $request->ip(),
            LogFields::URL        => $request->url(),
            LogFields::ACTION     => $request->route()?->getActionMethod(),
            LogFields::USER_ID    => auth()->user()?->id ?? null,
            LogFields::DEVICE     => $agent->device(),
            LogFields::PLATFORM   => $agent->platform(),
            LogFields::BROWSER    => $agent->browser(),
            LogFields::IS_MOBILE  => $agent->isMobile(),
            LogFields::IS_DESKTOP => $agent->isDesktop(),
            LogFields::IS_TABLET  => $agent->isTablet(),
            LogFields::DATE_TIME  => now(),
        ];
    }
}
