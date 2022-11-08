<?php 

namespace Xuap\ReduxPanelLib\Facades;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Facade;
use Xuap\ReduxPanelLib\Utils\ReduxPanelUtils;

class ReduxPanel extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'reduxpanel';
    }

    public static function getPanelVersion()
    {
        return Http::get(config('reduxpanel.URL') . '/modules/api/data?comando=versao')['versao'];
    }

    public static function getPlayerInfo($steamid)
    {
        $id = ReduxPanelUtils::convertSteamID($steamid);

        return Http::get(config('reduxpanel.URL') . "/modules/api/data?comando=info_jogador&api_key=".config('reduxpanel.API_KEY')."&id=$id");
    }
}
