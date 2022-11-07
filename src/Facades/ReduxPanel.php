<?php 

namespace Xuap\ReduxPanelLib\Facades;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Facade;

class ReduxPanel extends Facade
{
    private $URL;
    private $API_KEY;

    public function __construct($URL, $API_KEY)
    {
        self::$URL = config('reduxpanel.URL');
        self::$API_KEY = config('reduxpanel.API_KEY');
    }

    protected static function getFacadeAccessor()
    {
        return 'reduxpanel';
    }

    public static function getPanelVersion()
    {
        return Http::get(self::$URL . '/modules/api/data?comando=versao')['versao'];
    }
}
