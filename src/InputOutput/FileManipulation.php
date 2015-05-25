<?php

/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage App\InputOutput
 */
namespace App\InputOutput;

/**
 * FileManipulation class. There is many modes to open a file. The following list shows the possible
 * modes to do this:
 *
 * r - open the file for reading only and place the file pointer at the beginning of the file.
 * r+ - same as above but you can also write.
 *
 * w - open for writing only, place the pointer at the beginning of the file and trucate it.
 * w+ - same as above but you can also read.
 *
 * a - open for writing only an place the pointer at the end of the file.
 * a+ - same as above but you can also read the file.
 *
 * x - try to create a file, it it exists fopen will return false and an E_WARNING error will be thrown.
 * The file will be created for writing only and the file pointer obviously will be placed at the beginning
 * of the file.
 * x+ - same as above but you'll be able also to read the file.
 *
 * c - Try to open a file to writing only, if the file doesnt exists, it creates the file, if it exists
 * 'c' mode will not truncate it and will place the file pointer at the beginning of the file.
 * Unlinke 'x' mode, 'c' mode will not generates an E_WARNING error if the file exists.
 *
 * c+ - same as above, but you'll be able also to read the file.
 *
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
class FileManipulation
{
    /**
     * Método
     * @return datatype description
     */
    public function factoryFile()
    {
        
    }
}
