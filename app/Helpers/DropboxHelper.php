<?php


namespace App\Helpers;

use Alorel\Dropbox\Operation\Files\CreateFolder;
use Alorel\Dropbox\Operation\Files\ListFolder\ListFolder;
use Alorel\Dropbox\Operation\Files\Delete;
use Alorel\Dropbox\Operation\Files\Download;
use Alorel\Dropbox\Operation\Files\GetTemporaryLink;
use Alorel\Dropbox\Operation\Files\GetMetadata;

use GuzzleHttp\Exception\ClientException;

class DropboxHelper {

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
            $createFolder = new CreateFolder(false, env('DROPBOX_TOKEN', 'fake-token'));
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
            $listFolder = new ListFolder(false, env('DROPBOX_TOKEN', 'fake-token'));
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
     * @return string $link
     */
    public function download($path) {
	    $link = '';

        try {
            $fileMetaData = self::getMetaData($path);

            if(!is_null($fileMetaData)) {
                $temporaryLink = new GetTemporaryLink(false, env('DROPBOX_TOKEN', 'fake-token'));
                $response = $temporaryLink->raw(self::BASE_FOLDER . $path);
                $jsonResponse = $response->getBody();
                $link = json_decode($jsonResponse)->link;
            }
        } catch (ClientException $e) { // Error on request 409 Conflicted

        }

	    return $link;
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
            $getMetaData = new GetMetaData(false, env('DROPBOX_TOKEN', 'fake-token'));
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
            $delete = new Delete(false, env('DROPBOX_TOKEN', 'fake-token'));
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
