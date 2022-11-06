<?php

namespace Xuap\ReduxPanelLib\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallReduxPanelLib extends Command
{
    protected $signature = 'reduxpanel:install';

    protected $description = 'Install the ReduxPanel Library';

    public function handle()
    {
        $this->info('Installing ReduxPanel Library...');

        $this->info('Publishing configuration...');

        if (! $this->configExists('reduxpanel.php')) {
            $this->publishConfiguration();
            $this->info('Published configuration');
        } else {
            if ($this->shouldOverwriteConfig()) {
                $this->info('Overwriting configuration file...');
                $this->publishConfiguration($force = true);
            } else {
                $this->info('Existing configuration was not overwritten');
            }
        }

        $this->info('Installed ReduxPanel Library');
    }

    private function configExists($fileName)
    {
        return File::exists(config_path($fileName));
    }

    private function shouldOverwriteConfig()
    {
        return $this->confirm(
            'Config file already exists. Do you want to overwrite it?',
            false
        );
    }

    private function publishConfiguration($forcePublish = false)
    {
        $params = [
            '--provider' => "Xuap\ReduxPanelLib\Providers\ReduxPanelServiceProvider",
            '--tag' => "config"
        ];

        if ($forcePublish === true) {
            $params['--force'] = true;
        }

       $this->call('vendor:publish', $params);
    }
}
