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

    public static function getPlayerInfo($steamid = null)
    {
        if($steamid == null)
            return "Please fill out all data.";

        $id = ReduxPanelUtils::convertSteamID($steamid);

        return Http::get(config('reduxpanel.URL') . "/modules/api/data?comando=info_jogador&api_key=".config('reduxpanel.API_KEY')."&id=$id");
    }
    
    public static function addServer($nome = null, $ip = null, $porta = null, $rcon = null)
    {
        if($nome == null || $ip == null || $porta == null || $rcon == null)
            return "Please fill out all data.";

        return Http::get(config('reduxpanel.URL') . "/modules/api/data?comando=addservidor&api_key=".config('reduxpanel.API_KEY')."&nome=$nome&ip_numerico=$ip&porta=$porta&rcon=$rcon");
    }
}
