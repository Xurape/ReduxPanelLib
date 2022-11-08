<?php

namespace Xuap\ReduxPanelLib\Utils;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Facade;

class ReduxPanelUtils
{
    public static function convertSteamID($steamid)
    {
        if (preg_match('/^STEAM_/', $steamid)) {
            $parts = explode(':', $steamid);
            return bcadd(bcadd(bcmul($parts[2], '2'), '76561197960265728'), $parts[1]);
        } else
            return $steamid;
    }
}
