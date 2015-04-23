<?php

class Arrays
{

    /* Método altera valor dos índices do array, por referência */
    public function changedByReference()
    {
        $sports = array(
            'basketball' => array(
                'Michael Jordon',
                'Shane Heal',
                'Andrew Gaze'
            ),
            'football' => array(
                'Ronaldo',
                'Wayne Rooney',
                'David Beckham'
            ),
            'hockey' => array(
                'Josh Baely',
                'Peter Regin',
                'Frans Nielsen'
            )
        );
        // navega array e altera valores por referência
        foreach ($sports as $sport => $players) {
            $$sport = $players;
        }
        // imprime valores concatenando com vírgula
        foreach ($basketball as $players) {
            echo $players . ",";
        }
    }
}
