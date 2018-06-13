<?php


namespace App\Helpers;

use Alorel\Dropbox\Operation\Files\CreateFolder;
use Alorel\Dropbox\Operation\Files\ListFolder\ListFolder;
use Alorel\Dropbox\Operation\Files\Delete;
use Alorel\Dropbox\Operation\Files\Download;
use Alorel\Dropbox\Operation\Files\GetMetadata;

use GuzzleHttp\Exception\ClientException;

class DropboxClass {

    const DROPBOX_TOKEN = 'I7BNS6E3BqAAAAAAAAAACYKPSNRni75LOHPJthUcjs14yK7cXFUI6Qo7HsDKjxDk';

    const BASE_FOLDER = '/empresas/';

    /**
     * Create folder on dropbox storage
     * 
     * @param string $name
     * @return boolean $created true: created | false: didn't create
     */
    public function createFolder($name) {
        $created = null;

        try {
            $createFolder = new CreateFolder(false, self::DROPBOX_TOKEN);
            $response = $createFolder->raw(self::BASE_FOLDER . $name);
            $jsonResponse = json_decode($response->getBody());

            if (isset($jsonResponse->id)) {
                $created = true;
            }
        } catch(ClientException $e) { // Error on request 409 Conflicted
            $created = false;
        }
        
        return $created;
    }

    /**
     * List content of the directory
     * 
     * @param string $folder
     * @return array $entries
     */
    public function listDirectory($folder) {
        $entries = null;

        try {
            $listFolder = new ListFolder(false, self::DROPBOX_TOKEN);
            $response = $listFolder->raw(self::BASE_FOLDER . $folder);
            $jsonResponse = json_decode($response->getBody());
            $entries = $jsonResponse->entries;
        } catch(ClientException $e) { // Error on request 409 Conflicted
            $entries = array();
        }

        return $entries;
    }

    /**
     * Download file of the folder
     * 
     * @param string $path
     * @return void
     */
    public function download($path) {
        try {
            $fileMetaData = self::getMetaData($path);

            if(!is_null($fileMetaData)) {
                $download = new Download(false, self::DROPBOX_TOKEN);
                $response = $download->raw(self::BASE_FOLDER . $path);

                header("Pragma: public");
                header("Expires: 0");
                header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
                header("Cache-Control: public");
                header("Content-Description: File Transfer");
                header("Content-type: application/octet-stream");
                header("Content-Disposition: attachment; filename=\"" . $fileMetaData->name . "\"");
                header("Content-Transfer-Encoding: binary");
                header("Content-Length: " . $fileMetaData->size);
                echo $response->getBody();
            }
        } catch (ClientException $e) { // Error on request 409 Conflicted

        }
    }

    /**
     * Get metadata from the file
     * 
     * @param string $path
     * @return object $object json object from the file that search in dropbox storage
     */
    public function getMetaData($path) {
        $object = null;

        try {
            $getMetaData = new GetMetaData(false, self::DROPBOX_TOKEN);
            $response = $getMetaData->raw(self::BASE_FOLDER . $path);

            $object = json_decode($response->getBody());
        } catch (ClientException $e) { // Error on request 409 Conflicted
            $object = null;
        }

        return $object;
    }

    /**
     * Delete file of the folder
     * 
     * @param string $path path of folder or file to delete
     * @return boolean true: deleted | false: didn't delete
     */
    public function delete($path) {
        $deleted = null;

        try {
            $delete = new Delete(false, self::DROPBOX_TOKEN);
            $response = $delete->raw(self::BASE_FOLDER . $path);
            $jsonResponse = json_decode($response->getBody());

            if (isset($jsonResponse->id)) {
                $deleted = true;
            }
        } catch(ClientException $e) { // Error on request 409 Conflicted
            $deleted = false;
        }

        return $deleted;
    }

}