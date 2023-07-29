<?php

namespace Modules\LogActivity\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Jenssegers\Agent\Facades\Agent;

class Logger
{
    public static function make(): void
    {
        $request = new Request();
        $log = [
            'user_id'         => $request->user() ? $request->user()->id : null,
            'activity'        => 'request',
            'description'     => $request->method() . ' ' . $request->fullUrl(),
            'ip_address'      => $request->ip(),
            'user_agent'      => $request->header('User-Agent'),
            'device'          => Agent::device(),
            'platform'        => Agent::platform(),
            'browser'         => Agent::browser(),
            'browser_version' => Agent::version(Agent::browser()),
            'is_mobile'       => Agent::isMobile(),
            'is_desktop'      => Agent::isDesktop(),
            'is_tablet'       => Agent::isTablet(),
            'languages'       => implode(', ', Agent::languages()),
            'is_robot'        => Agent::isRobot(),
            'robot_name'      => Agent::robot()
        ];
        Log::info(implode($log));
    }
}
