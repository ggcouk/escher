<?php

/**
 * Escher Framework v2.0
 *
 * @copyright 2000-2015 Digital Design Labs Ltd
 * @package \TDM\Escher
 * @license https://raw.github.com/digitaldesignlabs/escher/master/LICENSE
 */

namespace TDM\Escher;

/**
 * Settings
 *
 * This class will import into itself all the keys it finds in settings.ini
 * file that it finds at the root level of the application.
 *
 * @author Mike Hall
 * @copyright 2014 Digital Design Labs Ltd
 */

class Settings extends Singleton
{
    public function __construct()
    {
        // Read the settings file
        $settingsFile = ROOTDIR . '/settings.ini';
        if (!is_readable($settingsFile)) {
            trigger_error("Expected settings file at " . $settingsFile);
            return;
        }

        // Parse the settings file
        $settings = parse_ini_file($settingsFile, YES);
        foreach ($settings as $key => $value) {
            $this->$key = $value;
        }
    }
}
