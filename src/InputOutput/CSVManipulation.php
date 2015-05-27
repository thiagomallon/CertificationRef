<?php
/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage App\InputOutput
 */
namespace App\InputOutput;

use App\ErrorsAndExceptions\FileNotFoundException;

/**
 * Class CSVManipulation
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
class CSVManipulation
{
    /**
     * The writingOnCSV method
     * @param string $filename Nome do arquivo a ser atribuído conteúdo
     * @param array $content Conteúdo a ser atribuído ao arquivo, devendo esse ser do
     * array.
     * @return null
     */
    public function writingOnCSV($content, $filename = 'data/streams/SpreadSheet.csv')
    {
        $handle = fopen($filename, 'a');
        fputcsv($handle, $content);
        fclose($handle);
    }

    /**
     * The readingCSV method implementa forma simplificada de leitura de arquivo csv, onde apenas a
     * primeira coluna seria lida. Caso não receba o path do arquivo, seta um path padrão, caso receba
     * um path de arquivo inexistênte, joga uma exceção.
     * @param string $filename Nome do arquivo ao qual deseja-se acessar o conteúdo
     * @return datatype description
     */
    public function readingCSV($filename = 'data/streams/SpreadSheet.csv')
    {
        if (file_exists($filename)) {
            $handle = fopen($filename, 'r');
            $content = '';
            while ($row = fgetcsv($handle)) {
                $content .= $row[0];
            }
            fclose($handle);
            return $content;
        } else {
            throw new FileNotFoundException('File not found');
        }
    }
}
