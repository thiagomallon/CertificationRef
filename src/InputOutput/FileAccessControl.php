<?php
/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage App\InputOutput
 */
namespace App\InputOutput;

/**
 * Class FileAccessControl
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
class FileAccessControl
{
    /**
     * The implementingIsDir method
     * @param string $dir description
     * @return bool Relativo à existência do diretório
     */
    public function implementingIsDir($dir)
    {
        return is_dir($dir);
    }

    /**
     * The implementingIsExecutable method
     * @param datatype $filepath description
     * @return datatype description
     */
    public function implementingIsExecutable($filepath)
    {
        
    }

    /**
     * The implementingIsFile method
     * @param datatype $filepath description
     * @return datatype description
     */
    public function implementingIsFile($filepath)
    {
        
    }

    /**
     * The implementingIsLink method
     * @param datatype $filepath description
     * @return datatype description
     */
    public function implementingIsLink($filepath)
    {
        
    }

    /**
     * The implementingIsReadable method
     * @param datatype $filepath description
     * @return datatype description
     */
    public function implementingIsReadable($filepath)
    {
        
    }

    /**
     * The implementingIsWritable method
     * @param datatype $filepath description
     * @return datatype description
     */
    public function implementingIsWritable($filepath)
    {
        
    }

    /**
     * The implementingIsUploadedFile method
     * @param datatype $filename description
     * @return datatype description
     */
    public function implementingIsUploadedFile($filename)
    {
        
    }
}
