<center>
<a href="https://reduxpanel.com" target="_blank">
<img src="https://i.imgur.com/tys3mXz.png" alt="ReduxPanel" width=300 />
</a>
<p>

<a href="https://laravel.com" target="_blank">

<img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="200" alt="Laravel Logo">

</a>

</p>

</center>

# Introduction

ReduxPanelLib is a [Laravel](https://laravel.com) Package to give a better experience and ease the hard work of making an external API to connect ReduxPanel to. With this package all you need is a little time to get your API Key on the configuration file and your panel URL and you're ready to go! 


# Table of contents
  - [Introduction](#introduction)
  - [Installation](#installation)
  - [Configuration](#configuration)
  - [Usage](#usage)
    - [Get current panel version](#getpanelcurrentversion)
  - [Todo](#todo)
  - [Note](#note)
  
# Installation
To install the library all you need to do is run the **_composer require_** command of the repository like this:

```php
composer require xuap/reduxpanellib
```

After running the command, you'll need to create the configuration file using the following command:

```php
php artisan reduxpanel:install
```

# Configuration
## Config file:
- ```/config/reduxpanel.php```
    ```php
    <?php

    return [
        /*
        |--------------------------------------------------------------------------
        | Default URL for the ReduxPanel
        |--------------------------------------------------------------------------
        |
        | This is the panel url which will allow the library
        | to communicate with your ReduxPanel service.
        |
        */
        'URL' => "",

        /*
        |--------------------------------------------------------------------------
        | API Key generated
        |--------------------------------------------------------------------------
        |
        | Go to:
        | -> https://<your_panel_link>/modulos
        | -> Check "Informações"
        | -> Copy the "API KEY" and place if below
        |
        */
        'API_KEY' => ""
    ];
    ```

## Steps:
- First step is just pasting your <a href="https://reduxpanel.com" target="_blank">ReduxPanel</a> link into the config parameter **"URL"** like this:
    ```php
    return [
        'URL' => "https://example.reduxpanel.com"

        ...
    ];
    ```
- Second step is going to your <a href="https://reduxpanel.com" target="_blank">ReduxPanel</a> and go to the **"API"** page. Next, you'll click on the **_Copy API Key_** button and then paste in onto the next line:
    ```php
    // With Example API Key
    return [

        ...

        'API_KEY' => "PAkKYXvOjstpZwX76pVqaoV6VDi4Hvec"
    ];
    ```

# Usage
First, include on every controller/other that you'll want to use the library the following facade:
```php
use Xuap\ReduxPanelLib\Facades\ReduxPanel;
```

## <p id="getpanelcurrentversion">- Get current panel version</p>
To get the current panel version, you can simply use:
```php
    ReduxPanel::getPanelVersion();

    // Or specifically in a controller like

    ...

    public static function returnVersion()
    {
        return ReduxPanel::getPanelVersion();
    }
```


# Todo
```= Others =```
- [X] ~~Make function for get panel version~~
- [ ] Make function to get info from a player's id

```= Servers =```
- [ ] Make function to add a server
- [ ] Make function to delete a server

```= Plans =```
- [ ] Make function to list plans
- [ ] Make function to create plans
- [ ] Make function to remove plans

```= Groups =```
- [ ] Make function to create groups
- [ ] Make function to edit groups
- [ ] Make function to delete groups

```= Assign Groups =```
- [ ] Make function to assign groups
- [ ] Make function to edit an assigned group 
- [ ] Make function to remove an assigned group 

# Note
    This is a WIP library.