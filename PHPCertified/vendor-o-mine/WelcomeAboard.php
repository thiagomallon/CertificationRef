<?php

namespace VendorOMine;

use Composer\Script\Event;

/**
 * This class implements customized messages for install and update packages.
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
class WelcomeAboard
{
    public static function postInstall(Event $event)
    {
        $composer = $event->getIO();
        $composer->write("\n\n            
            Let's go, matey! There is always\n 
            room for one more.\n
            by T.Mallon\n\n\n");
    }

    public static function postUpdate(Event $event)
    {
        $composer = $event->getIO();
        $composer->write("\n\n            
            This is the right way, matey!\n
            Keep our sails clean..\n
            by T.Mallon\n\n\n");
    }
}
