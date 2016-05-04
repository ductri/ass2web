<?php

namespace Aspose\Storage;

use Aspose\Storage\ApiException as Exception;
use Aspose\Storage\ApiClient;

class StorageApi {

    function __construct() {
        $this->apiClient = new ApiClient();
    }

    /**
     * DeleteFile
     * Remove a specific file. Parameters: path - file path e.g. /file.ext, versionID - file's version, storage - user's storage name.
     * Path, string:  (required)

     * versionId, string:  (optional)

     * storage, string:  (optional)

     * @return RemoveFileResponse
     */
    public function DeleteFile($Path, $versionId = null, $storage = null) {
        // verify required params are set
        if ($Path == '') {
            throw new Exception("missing required params");
        }
        //parse inputs
        $resourcePath = "/storage/file/{Path}/?appSid={appSid}&amp;versionId={versionId}&amp;storage={storage}";
        //$resourcePath = str_replace("{format}", "json", $resourcePath);
        $resourcePath = str_replace("toFormat={toFormat}", "format={format}", str_replace("/?", "?", str_replace("&amp;", "&", str_replace("\\*", "", $resourcePath))));
        $method = "DELETE";
        $queryParams = array();
        $headerParams = array();
        $headerParams['Accept'] = 'application/xml,application/json';
        $headerParams['Content-Type'] = 'application/json';

        if ($Path != null) {
            $resourcePath = str_replace("{" . "Path" . "}", $this->apiClient->toQueryValue($Path), $resourcePath);
        } else {
            $resourcePath = str_replace("&Path={" . "Path" . "}", "", $resourcePath);
        }
        if ($versionId != null) {
            $resourcePath = str_replace("{" . "versionId" . "}", $this->apiClient->toQueryValue($versionId), $resourcePath);
        } else {
            $resourcePath = str_replace("&versionId={" . "versionId" . "}", "", $resourcePath);
        }
        if ($storage != null) {
            $resourcePath = str_replace("{" . "storage" . "}", $this->apiClient->toQueryValue($storage), $resourcePath);
        } else {
            $resourcePath = str_replace("&storage={" . "storage" . "}", "", $resourcePath);
        }
        //make the API Call
        if (!isset($body)) {
            $body = null;
        }
        if (isset($file)) {
            $body = $file;
        }
        $response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $body, $headerParams);

        if (!$response) {
            return null;
        }

        $responseObject = $this->apiClient->deserialize($response, 'RemoveFileResponse');
        return $responseObject;
    }

    /**
     * GetDiscUsage
     * Check the disk usage of the current account. Parameters: storage - user's storage name.
     * storage, string:  (optional)

     * @return DiscUsageResponse
     */
    public function GetDiscUsage($storage = null) {
        //parse inputs
        $resourcePath = "/storage/disc/?appSid={appSid}&amp;storage={storage}";
        //$resourcePath = str_replace("{format}", "json", $resourcePath);
        $resourcePath = str_replace("toFormat={toFormat}", "format={format}", str_replace("/?", "?", str_replace("&amp;", "&", str_replace("\\*", "", $resourcePath))));
        $method = "GET";
        $queryParams = array();
        $headerParams = array();
        $headerParams['Accept'] = 'application/xml,application/json';
        $headerParams['Content-Type'] = 'application/json';

        if ($storage != null) {
            $resourcePath = str_replace("{" . "storage" . "}", $this->apiClient->toQueryValue($storage), $resourcePath);
        } else {
            $resourcePath = str_replace("&storage={" . "storage" . "}", "", $resourcePath);
        }
        //make the API Call
        if (!isset($body)) {
            $body = null;
        }
        if (isset($file)) {
            $body = $file;
        }
        $response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $body, $headerParams);

        if (!$response) {
            return null;
        }

        $responseObject = $this->apiClient->deserialize($response, 'DiscUsageResponse');
        return $responseObject;
    }

    /**
     * GetDownload
     * Download a specific file. Parameters: path - file path e.g. /file.ext, versionID - file's version, storage - user's storage name.
     * Path, string:  (required)

     * versionId, string:  (optional)

     * storage, string:  (optional)

     * @return ResponseMessage
     */
    public function GetDownload($Path, $versionId = null, $storage = null) {
        // verify required params are set
        if ($Path == '') {
            throw new Exception("missing required params");
        }
        //parse inputs
        $resourcePath = "/storage/file/{Path}/?appSid={appSid}&amp;versionId={versionId}&amp;storage={storage}";
        //$resourcePath = str_replace("{format}", "json", $resourcePath);
        $resourcePath = str_replace("toFormat={toFormat}", "format={format}", str_replace("/?", "?", str_replace("&amp;", "&", str_replace("\\*", "", $resourcePath))));
        $method = "GET";
        $queryParams = array();
        $headerParams = array();
        $headerParams['Accept'] = 'application/xml,application/octet-stream';
        $headerParams['Content-Type'] = 'application/json';

        if ($Path != null) {
            $resourcePath = str_replace("{" . "Path" . "}", $this->apiClient->toQueryValue($Path), $resourcePath);
        } else {
            $resourcePath = str_replace("&Path={" . "Path" . "}", "", $resourcePath);
        }
        if ($versionId != null) {
            $resourcePath = str_replace("{" . "versionId" . "}", $this->apiClient->toQueryValue($versionId), $resourcePath);
        } else {
            $resourcePath = str_replace("&versionId={" . "versionId" . "}", "", $resourcePath);
        }
        if ($storage != null) {
            $resourcePath = str_replace("{" . "storage" . "}", $this->apiClient->toQueryValue($storage), $resourcePath);
        } else {
            $resourcePath = str_replace("&storage={" . "storage" . "}", "", $resourcePath);
        }
        //make the API Call
        if (!isset($body)) {
            $body = null;
        }
        if (isset($file)) {
            $body = $file;
        }
        $response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $body, $headerParams);

        if (!$response) {
            return null;
        }

        $responseObject = $this->apiClient->deserialize($response, 'ResponseMessage');
        return $responseObject;
    }

    /**
     * GetIsExist
     * Check if a specific file or folder exists. Parameters: path - file or folder path e.g. /file.ext or /Folder1, versionID - file's version, storage - user's storage name.
     * Path, string:  (required)

     * versionId, string:  (optional)

     * storage, string:  (optional)

     * @return FileExistResponse
     */
    public function GetIsExist($Path, $versionId = null, $storage = null) {
        // verify required params are set
        if ($Path == '') {
            throw new Exception("missing required params");
        }
        //parse inputs
        $resourcePath = "/storage/exist/{Path}/?appSid={appSid}&amp;versionId={versionId}&amp;storage={storage}";
        //$resourcePath = str_replace("{format}", "json", $resourcePath);
        $resourcePath = str_replace("toFormat={toFormat}", "format={format}", str_replace("/?", "?", str_replace("&amp;", "&", str_replace("\\*", "", $resourcePath))));
        $method = "GET";
        $queryParams = array();
        $headerParams = array();
        $headerParams['Accept'] = 'application/xml,application/json';
        $headerParams['Content-Type'] = 'application/json';

        if ($Path != null) {
            $resourcePath = str_replace("{" . "Path" . "}", $this->apiClient->toQueryValue($Path), $resourcePath);
        } else {
            $resourcePath = str_replace("&Path={" . "Path" . "}", "", $resourcePath);
        }
        if ($versionId != null) {
            $resourcePath = str_replace("{" . "versionId" . "}", $this->apiClient->toQueryValue($versionId), $resourcePath);
        } else {
            $resourcePath = str_replace("&versionId={" . "versionId" . "}", "", $resourcePath);
        }
        if ($storage != null) {
            $resourcePath = str_replace("{" . "storage" . "}", $this->apiClient->toQueryValue($storage), $resourcePath);
        } else {
            $resourcePath = str_replace("&storage={" . "storage" . "}", "", $resourcePath);
        }
        //make the API Call
        if (!isset($body)) {
            $body = null;
        }
        if (isset($file)) {
            $body = $file;
        }
        $response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $body, $headerParams);

        if (!$response) {
            return null;
        }

        $responseObject = $this->apiClient->deserialize($response, 'FileExistResponse');
        return $responseObject;
    }

    /**
     * GetListFileVersions
     * Get the file's versions list. Parameters: path - file path e.g. /file.ext or /Folder1/file.ext, storage - user's storage name.
     * Path, string:  (required)

     * storage, string:  (optional)

     * @return FileVersionsResponse
     */
    public function GetListFileVersions($Path, $storage = null) {
        // verify required params are set
        if ($Path == '') {
            throw new Exception("missing required params");
        }
        //parse inputs
        $resourcePath = "/storage/version/{Path}/?appSid={appSid}&amp;storage={storage}";
        //$resourcePath = str_replace("{format}", "json", $resourcePath);
        $resourcePath = str_replace("toFormat={toFormat}", "format={format}", str_replace("/?", "?", str_replace("&amp;", "&", str_replace("\\*", "", $resourcePath))));
        $method = "GET";
        $queryParams = array();
        $headerParams = array();
        $headerParams['Accept'] = 'application/xml,application/json';
        $headerParams['Content-Type'] = 'application/json';

        if ($Path != null) {
            $resourcePath = str_replace("{" . "Path" . "}", $this->apiClient->toQueryValue($Path), $resourcePath);
        } else {
            $resourcePath = str_replace("&Path={" . "Path" . "}", "", $resourcePath);
        }
        if ($storage != null) {
            $resourcePath = str_replace("{" . "storage" . "}", $this->apiClient->toQueryValue($storage), $resourcePath);
        } else {
            $resourcePath = str_replace("&storage={" . "storage" . "}", "", $resourcePath);
        }
        //make the API Call
        if (!isset($body)) {
            $body = null;
        }
        if (isset($file)) {
            $body = $file;
        }
        $response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $body, $headerParams);

        if (!$response) {
            return null;
        }

        $responseObject = $this->apiClient->deserialize($response, 'FileVersionsResponse');
        return $responseObject;
    }

    /**
     * PostMoveFile
     * Move a specific file.
     * src, string: source file path e.g. /file.ext (required)

     * dest, string:  (required)

     * versionId, string: source file's version, (optional)

     * storage, string: user's source storage name (optional)

     * destStorage, string: user's destination storage name (optional)

     * @return MoveFileResponse
     */
    public function PostMoveFile($src, $dest, $versionId = null, $storage = null, $destStorage = null) {
        // verify required params are set
        if ($src == '' || $dest == '') {
            throw new Exception("missing required params");
        }
        //parse inputs
        $resourcePath = "/storage/file/{src}/?dest={dest}&amp;appSid={appSid}&amp;versionId={versionId}&amp;storage={storage}&amp;destStorage={destStorage}";
        //$resourcePath = str_replace("{format}", "json", $resourcePath);
        $resourcePath = str_replace("toFormat={toFormat}", "format={format}", str_replace("/?", "?", str_replace("&amp;", "&", str_replace("\\*", "", $resourcePath))));
        $method = "POST";
        $queryParams = array();
        $headerParams = array();
        $headerParams['Accept'] = 'application/xml,application/json';
        $headerParams['Content-Type'] = 'application/json';

        if ($src != null) {
            $resourcePath = str_replace("{" . "src" . "}", $this->apiClient->toQueryValue($src), $resourcePath);
        } else {
            $resourcePath = str_replace("&src={" . "src" . "}", "", $resourcePath);
        }
        if ($dest != null) {
            $resourcePath = str_replace("{" . "dest" . "}", $this->apiClient->toQueryValue($dest), $resourcePath);
        } else {
            $resourcePath = str_replace("&dest={" . "dest" . "}", "", $resourcePath);
        }
        if ($versionId != null) {
            $resourcePath = str_replace("{" . "versionId" . "}", $this->apiClient->toQueryValue($versionId), $resourcePath);
        } else {
            $resourcePath = str_replace("&versionId={" . "versionId" . "}", "", $resourcePath);
        }
        if ($storage != null) {
            $resourcePath = str_replace("{" . "storage" . "}", $this->apiClient->toQueryValue($storage), $resourcePath);
        } else {
            $resourcePath = str_replace("&storage={" . "storage" . "}", "", $resourcePath);
        }
        if ($destStorage != null) {
            $resourcePath = str_replace("{" . "destStorage" . "}", $this->apiClient->toQueryValue($destStorage), $resourcePath);
        } else {
            $resourcePath = str_replace("&destStorage={" . "destStorage" . "}", "", $resourcePath);
        }
        //make the API Call
        if (!isset($body)) {
            $body = null;
        }
        if (isset($file)) {
            $body = $file;
        }
        $response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $body, $headerParams);

        if (!$response) {
            return null;
        }

        $responseObject = $this->apiClient->deserialize($response, 'MoveFileResponse');
        return $responseObject;
    }

    /**
     * PutCopy
     * Copy a specific file. Parameters: path - source file path e.g. /file.ext, versionID - source file's version, storage - user's source storage name, newdest - destination file path, destStorage - user's destination storage name.
     * Path, string:  (required)

     * newdest, string:  (required)

     * versionId, string:  (optional)

     * storage, string:  (optional)

     * destStorage, string:  (optional)

     * file, File:  (required)

     * @return ResponseMessage
     */
    public function PutCopy($Path, $newdest, $versionId = null, $storage = null, $destStorage = null, $file) {
        // verify required params are set
        if ($Path == '' || $newdest == '' || $file == '') {
            throw new Exception("missing required params");
        }
        //parse inputs
        $resourcePath = "/storage/file/{Path}/?appSid={appSid}&amp;newdest={newdest}&amp;versionId={versionId}&amp;storage={storage}&amp;destStorage={destStorage}";
        //$resourcePath = str_replace("{format}", "json", $resourcePath);
        $resourcePath = str_replace("toFormat={toFormat}", "format={format}", str_replace("/?", "?", str_replace("&amp;", "&", str_replace("\\*", "", $resourcePath))));
        $method = "PUT";
        $queryParams = array();
        $headerParams = array();
        $headerParams['Accept'] = 'application/xml,application/json';
        $headerParams['Content-Type'] = 'multipart/form-data';

        if ($Path != null) {
            $resourcePath = str_replace("{" . "Path" . "}", $this->apiClient->toQueryValue($Path), $resourcePath);
        } else {
            $resourcePath = str_replace("&Path={" . "Path" . "}", "", $resourcePath);
        }
        if ($newdest != null) {
            $resourcePath = str_replace("{" . "newdest" . "}", $this->apiClient->toQueryValue($newdest), $resourcePath);
        } else {
            $resourcePath = str_replace("&newdest={" . "newdest" . "}", "", $resourcePath);
        }
        if ($versionId != null) {
            $resourcePath = str_replace("{" . "versionId" . "}", $this->apiClient->toQueryValue($versionId), $resourcePath);
        } else {
            $resourcePath = str_replace("&versionId={" . "versionId" . "}", "", $resourcePath);
        }
        if ($storage != null) {
            $resourcePath = str_replace("{" . "storage" . "}", $this->apiClient->toQueryValue($storage), $resourcePath);
        } else {
            $resourcePath = str_replace("&storage={" . "storage" . "}", "", $resourcePath);
        }
        if ($destStorage != null) {
            $resourcePath = str_replace("{" . "destStorage" . "}", $this->apiClient->toQueryValue($destStorage), $resourcePath);
        } else {
            $resourcePath = str_replace("&destStorage={" . "destStorage" . "}", "", $resourcePath);
        }
        //make the API Call
        if (!isset($body)) {
            $body = null;
        }
        if (isset($file)) {
            $body = $file;
        }
        $response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $body, $headerParams);

        if (!$response) {
            return null;
        }

        $responseObject = $this->apiClient->deserialize($response, 'ResponseMessage');
        return $responseObject;
    }

    /**
     * PutCreate
     * Upload a specific file. Parameters: path - source file path e.g. /file.ext, versionID - source file's version, storage - user's source storage name, newdest - destination file path, destStorage - user's destination storage name.
     * Path, string:  (required)

     * versionId, string:  (optional)

     * storage, string:  (optional)

     * file, File:  (required)

     * @return ResponseMessage
     */
    public function PutCreate($Path, $versionId = null, $storage = null, $file) {
        // verify required params are set
        if ($Path == '' || $file == '') {
            throw new Exception("missing required params");
        }
        //parse inputs
        $resourcePath = "/storage/file/{Path}/?appSid={appSid}&amp;versionId={versionId}&amp;storage={storage}";
        //$resourcePath = str_replace("{format}", "json", $resourcePath);
        $resourcePath = str_replace("toFormat={toFormat}", "format={format}", str_replace("/?", "?", str_replace("&amp;", "&", str_replace("\\*", "", $resourcePath))));
        $method = "PUT";
        $queryParams = array();
        $headerParams = array();
        $headerParams['Accept'] = 'application/xml,application/json';
        $headerParams['Content-Type'] = 'multipart/form-data';

        if ($Path != null) {
            $resourcePath = str_replace("{" . "Path" . "}", $this->apiClient->toQueryValue($Path), $resourcePath);
        } else {
            $resourcePath = str_replace("&Path={" . "Path" . "}", "", $resourcePath);
        }
        if ($versionId != null) {
            $resourcePath = str_replace("{" . "versionId" . "}", $this->apiClient->toQueryValue($versionId), $resourcePath);
        } else {
            $resourcePath = str_replace("&versionId={" . "versionId" . "}", "", $resourcePath);
        }
        if ($storage != null) {
            $resourcePath = str_replace("{" . "storage" . "}", $this->apiClient->toQueryValue($storage), $resourcePath);
        } else {
            $resourcePath = str_replace("&storage={" . "storage" . "}", "", $resourcePath);
        }
        //make the API Call
        if (!isset($body)) {
            $body = null;
        }
        if (isset($file)) {
            $body = $file;
        }
        $response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $body, $headerParams);

        if (!$response) {
            return null;
        }

        $responseObject = $this->apiClient->deserialize($response, 'ResponseMessage');
        return $responseObject;
    }

    /**
     * DeleteFolder
     * Remove a specific folder. Parameters: path - folder path e.g. /Folder1, storage - user's storage name, recursive - is subfolders and files must be deleted for specified path.
     * Path, string:  (required)

     * storage, string:  (optional)

     * recursive, bool:  (optional)

     * @return RemoveFolderResponse
     */
    public function DeleteFolder($Path, $storage = null, $recursive = null) {
        // verify required params are set
        if ($Path == '') {
            throw new Exception("missing required params");
        }
        //parse inputs
        $resourcePath = "/storage/folder/{Path}/?appSid={appSid}&amp;storage={storage}&amp;recursive={recursive}";
        //$resourcePath = str_replace("{format}", "json", $resourcePath);
        $resourcePath = str_replace("toFormat={toFormat}", "format={format}", str_replace("/?", "?", str_replace("&amp;", "&", str_replace("\\*", "", $resourcePath))));
        $method = "DELETE";
        $queryParams = array();
        $headerParams = array();
        $headerParams['Accept'] = 'application/xml,application/json';
        $headerParams['Content-Type'] = 'application/json';

        if ($Path != null) {
            $resourcePath = str_replace("{" . "Path" . "}", $this->apiClient->toQueryValue($Path), $resourcePath);
        } else {
            $resourcePath = str_replace("&Path={" . "Path" . "}", "", $resourcePath);
        }
        if ($storage != null) {
            $resourcePath = str_replace("{" . "storage" . "}", $this->apiClient->toQueryValue($storage), $resourcePath);
        } else {
            $resourcePath = str_replace("&storage={" . "storage" . "}", "", $resourcePath);
        }
        if ($recursive != null) {
            $resourcePath = str_replace("{" . "recursive" . "}", $this->apiClient->toQueryValue($recursive), $resourcePath);
        } else {
            $resourcePath = str_replace("&recursive={" . "recursive" . "}", "", $resourcePath);
        }
        //make the API Call
        if (!isset($body)) {
            $body = null;
        }
        if (isset($file)) {
            $body = $file;
        }
        $response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $body, $headerParams);

        if (!$response) {
            return null;
        }

        $responseObject = $this->apiClient->deserialize($response, 'RemoveFolderResponse');
        return $responseObject;
    }

    /**
     * GetListFiles
     * Get the file listing of a specific folder. Parametres: path - start with name of storage e.g. root folder '/'or some folder '/folder1/..', storage - user's storage name.
     * Path, string:  (optional)

     * storage, string:  (optional)

     * @return ResponseMessage
     */
    public function GetListFiles($Path, $storage = null) {
        // verify required params are set
        if ($Path == '') {
            throw new Exception("missing required params");
        }
        //parse inputs
        $resourcePath = "/storage/folder/{Path}/?appSid={appSid}&amp;storage={storage}";
        //$resourcePath = str_replace("{format}", "json", $resourcePath);
        $resourcePath = str_replace("toFormat={toFormat}", "format={format}", str_replace("/?", "?", str_replace("&amp;", "&", str_replace("\\*", "", $resourcePath))));
        $method = "GET";
        $queryParams = array();
        $headerParams = array();
        $headerParams['Accept'] = 'application/xml,application/json';
        $headerParams['Content-Type'] = 'application/json';

        if ($Path != null) {
            $resourcePath = str_replace("{" . "Path" . "}", $this->apiClient->toQueryValue($Path), $resourcePath);
        } else {
            $resourcePath = str_replace("&Path={" . "Path" . "}", "", $resourcePath);
        }
        if ($storage != null) {
            $resourcePath = str_replace("{" . "storage" . "}", $this->apiClient->toQueryValue($storage), $resourcePath);
        } else {
            $resourcePath = str_replace("&storage={" . "storage" . "}", "", $resourcePath);
        }
        //make the API Call
        if (!isset($body)) {
            $body = null;
        }
        if (isset($file)) {
            $body = $file;
        }
        $response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $body, $headerParams);

        if (!$response) {
            return null;
        }

        $responseObject = $this->apiClient->deserialize($response, 'ResponseMessage');
        return $responseObject;
    }

    /**
     * PostMoveFolder
     * Move a specific folder. Parameters: src - source folder path e.g. /Folder1, storage - user's source storage name, dest - destination folder path e.g. /Folder2, destStorage - user's destination storage name.
     * src, string:  (required)

     * dest, string:  (required)

     * storage, string:  (optional)

     * destStorage, string:  (optional)

     * @return MoveFolderResponse
     */
    public function PostMoveFolder($src, $dest, $storage = null, $destStorage = null) {
        // verify required params are set
        if ($src == '' || $dest == '') {
            throw new Exception("missing required params");
        }
        //parse inputs
        $resourcePath = "/storage/folder/{src}/?dest={dest}&amp;appSid={appSid}&amp;storage={storage}&amp;destStorage={destStorage}";
        //$resourcePath = str_replace("{format}", "json", $resourcePath);
        $resourcePath = str_replace("toFormat={toFormat}", "format={format}", str_replace("/?", "?", str_replace("&amp;", "&", str_replace("\\*", "", $resourcePath))));
        $method = "POST";
        $queryParams = array();
        $headerParams = array();
        $headerParams['Accept'] = 'application/xml,application/json';
        $headerParams['Content-Type'] = 'application/json';

        if ($src != null) {
            $resourcePath = str_replace("{" . "src" . "}", $this->apiClient->toQueryValue($src), $resourcePath);
        } else {
            $resourcePath = str_replace("&src={" . "src" . "}", "", $resourcePath);
        }
        if ($dest != null) {
            $resourcePath = str_replace("{" . "dest" . "}", $this->apiClient->toQueryValue($dest), $resourcePath);
        } else {
            $resourcePath = str_replace("&dest={" . "dest" . "}", "", $resourcePath);
        }
        if ($storage != null) {
            $resourcePath = str_replace("{" . "storage" . "}", $this->apiClient->toQueryValue($storage), $resourcePath);
        } else {
            $resourcePath = str_replace("&storage={" . "storage" . "}", "", $resourcePath);
        }
        if ($destStorage != null) {
            $resourcePath = str_replace("{" . "destStorage" . "}", $this->apiClient->toQueryValue($destStorage), $resourcePath);
        } else {
            $resourcePath = str_replace("&destStorage={" . "destStorage" . "}", "", $resourcePath);
        }
        //make the API Call
        if (!isset($body)) {
            $body = null;
        }
        if (isset($file)) {
            $body = $file;
        }
        $response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $body, $headerParams);

        if (!$response) {
            return null;
        }

        $responseObject = $this->apiClient->deserialize($response, 'MoveFolderResponse');
        return $responseObject;
    }

    /**
     * PutCopyFolder
     * Copy a folder. Parameters: path - source folder path e.g. /Folder1, storage - user's source storage name, newdest - destination folder path e.g. /Folder2, destStorage - user's destination storage name.
     * Path, string:  (required)

     * newdest, string:  (required)

     * storage, string:  (optional)

     * destStorage, string:  (optional)

     * @return ResponseMessage
     */
    public function PutCopyFolder($Path, $newdest, $storage = null, $destStorage = null) {
        // verify required params are set
        if ($Path == '' || $newdest == '') {
            throw new Exception("missing required params");
        }
        //parse inputs
        $resourcePath = "/storage/folder/{Path}/?appSid={appSid}&amp;newdest={newdest}&amp;storage={storage}&amp;destStorage={destStorage}";
        //$resourcePath = str_replace("{format}", "json", $resourcePath);
        $resourcePath = str_replace("toFormat={toFormat}", "format={format}", str_replace("/?", "?", str_replace("&amp;", "&", str_replace("\\*", "", $resourcePath))));
        $method = "PUT";
        $queryParams = array();
        $headerParams = array();
        $headerParams['Accept'] = 'application/xml,application/json';
        $headerParams['Content-Type'] = 'application/json';

        if ($Path != null) {
            $resourcePath = str_replace("{" . "Path" . "}", $this->apiClient->toQueryValue($Path), $resourcePath);
        } else {
            $resourcePath = str_replace("&Path={" . "Path" . "}", "", $resourcePath);
        }
        if ($newdest != null) {
            $resourcePath = str_replace("{" . "newdest" . "}", $this->apiClient->toQueryValue($newdest), $resourcePath);
        } else {
            $resourcePath = str_replace("&newdest={" . "newdest" . "}", "", $resourcePath);
        }
        if ($storage != null) {
            $resourcePath = str_replace("{" . "storage" . "}", $this->apiClient->toQueryValue($storage), $resourcePath);
        } else {
            $resourcePath = str_replace("&storage={" . "storage" . "}", "", $resourcePath);
        }
        if ($destStorage != null) {
            $resourcePath = str_replace("{" . "destStorage" . "}", $this->apiClient->toQueryValue($destStorage), $resourcePath);
        } else {
            $resourcePath = str_replace("&destStorage={" . "destStorage" . "}", "", $resourcePath);
        }
        //make the API Call
        if (!isset($body)) {
            $body = null;
        }
        if (isset($file)) {
            $body = $file;
        }
        $response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $body, $headerParams);

        if (!$response) {
            return null;
        }

        $responseObject = $this->apiClient->deserialize($response, 'ResponseMessage');
        return $responseObject;
    }

    /**
     * PutCreateFolder
     * Create the folder. Parameters: path - source folder path e.g. /Folder1, storage - user's source storage name, newdest - destination folder path e.g. /Folder2, destStorage - user's destination storage name.
     * Path, string:  (required)

     * storage, string:  (optional)

     * destStorage, string:  (optional)

     * @return ResponseMessage
     */
    public function PutCreateFolder($Path, $storage = null, $destStorage = null) {
        // verify required params are set
        if ($Path == '') {
            throw new Exception("missing required params");
        }
        //parse inputs
        $resourcePath = "/storage/folder/{Path}/?appSid={appSid}&amp;storage={storage}&amp;destStorage={destStorage}";
        //$resourcePath = str_replace("{format}", "json", $resourcePath);
        $resourcePath = str_replace("toFormat={toFormat}", "format={format}", str_replace("/?", "?", str_replace("&amp;", "&", str_replace("\\*", "", $resourcePath))));
        $method = "PUT";
        $queryParams = array();
        $headerParams = array();
        $headerParams['Accept'] = 'application/xml,application/json';
        $headerParams['Content-Type'] = 'application/json';

        if ($Path != null) {
            $resourcePath = str_replace("{" . "Path" . "}", $this->apiClient->toQueryValue($Path), $resourcePath);
        } else {
            $resourcePath = str_replace("&Path={" . "Path" . "}", "", $resourcePath);
        }
        if ($storage != null) {
            $resourcePath = str_replace("{" . "storage" . "}", $this->apiClient->toQueryValue($storage), $resourcePath);
        } else {
            $resourcePath = str_replace("&storage={" . "storage" . "}", "", $resourcePath);
        }
        if ($destStorage != null) {
            $resourcePath = str_replace("{" . "destStorage" . "}", $this->apiClient->toQueryValue($destStorage), $resourcePath);
        } else {
            $resourcePath = str_replace("&destStorage={" . "destStorage" . "}", "", $resourcePath);
        }
        //make the API Call
        if (!isset($body)) {
            $body = null;
        }
        if (isset($file)) {
            $body = $file;
        }
        $response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $body, $headerParams);

        if (!$response) {
            return null;
        }

        $responseObject = $this->apiClient->deserialize($response, 'ResponseMessage');
        return $responseObject;
    }

    /**
     * GetIsStorageExist
     * Check if a specific storage exists.
     * name, string: Storage name (required)

     * @return StorageExistResponse
     */
    public function GetIsStorageExist($name) {
        // verify required params are set
        if ($name == '') {
            throw new Exception("missing required params");
        }
        //parse inputs
        $resourcePath = "/storage/{name}/exist/?appSid={appSid}";
        //$resourcePath = str_replace("{format}", "json", $resourcePath);
        $resourcePath = str_replace("toFormat={toFormat}", "format={format}", str_replace("/?", "?", str_replace("&amp;", "&", str_replace("\\*", "", $resourcePath))));
        $method = "GET";
        $queryParams = array();
        $headerParams = array();
        $headerParams['Accept'] = 'application/xml,application/json';
        $headerParams['Content-Type'] = 'application/json';

        if ($name != null) {
            $resourcePath = str_replace("{" . "name" . "}", $this->apiClient->toQueryValue($name), $resourcePath);
        } else {
            $resourcePath = str_replace("&name={" . "name" . "}", "", $resourcePath);
        }
        //make the API Call
        if (!isset($body)) {
            $body = null;
        }
        if (isset($file)) {
            $body = $file;
        }
        $response = $this->apiClient->callAPI($resourcePath, $method, $queryParams, $body, $headerParams);

        if (!$response) {
            return null;
        }

        $responseObject = $this->apiClient->deserialize($response, 'StorageExistResponse');
        return $responseObject;
    }

}
