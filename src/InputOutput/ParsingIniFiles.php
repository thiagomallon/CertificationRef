<?php
/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage App\InputOutput
 */
namespace App\InputOutput;

/**
 * Class ParseIni
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
class ParsingIniFiles
{
    /**
     * The getIniData method implementa uso da função parse_ini_file(), que retorna array com valores/chaves
     * do que existe declarado no arquivo .ini
     * @param string $filename Path do arquivo ini a ser capturado
     * @return array Array de chaves/valores do conteúdo do arquivo .ini
     */
    public function getIniData($filename = 'config/config.ini')
    {
        return parse_ini_file($filename);
    }
}
