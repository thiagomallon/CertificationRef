<?php

namespace VendorOMine;

use Composer\Script\Event;

/**
 * This class implements customized messages for install and update packages.
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
class WelcomeAboard
{
    public static function preInstall(Event $event)
    {
        $composer = $event->getIO();
        $composer->write("\n\n            
            Wake up matey!\n 
            Go to the port get a few things I ordered from an old friend..\n
            by T.Mallon\n\n\n");
    }

    public static function postInstall(Event $event)
    {
        $composer = $event->getIO();
        $composer->write("\n\n            
            Take a look matey! There is always\n 
            room for one us!\n
            by T.Mallon\n\n\n");
    }

    public static function preUpdate(Event $event)
    {
        $composer = $event->getIO();
        $composer->write("\n\n            
            Hey, matey!\n            
            Go clean up this mess!
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

    public static function preAutoLoadDump(Event $event)
    {
        $composer = $event->getIO();
        $composer->write("\n\n 
            Damn, matey!\n
            This old map is making us going in circles.\n
            Go get a new map for us!\n
            by T.Mallon\n\n\n");
    }
    
    public static function postAutoLoadDump(Event $event)
    {
        $composer = $event->getIO();
        $composer->write("\n\n           
            Oh yes, matey!\n
            Now you are sailing like a butterfly!\n
            by T.Mallon\n\n\n");
    }
}
