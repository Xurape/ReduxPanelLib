<?php 

namespace Xuap\ReduxPanelLib\Facades;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Facade;

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
}
