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
        $this->URL = $URL;
        $this->API_KEY = $API_KEY;
    }

    protected static function getFacadeAccessor()
    {
        return 'reduxpanel';
    }

    public static function getPanelVersion()
    {
        return Http::get($this->URL . '/modules/api/data?comando=versao')['versao'];
    }
}
