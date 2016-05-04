<?php

use Aspose\Storage\StorageApi;

class StorageApiTest extends PHPUnit_Framework_TestCase {
    
    protected $storage;

    protected function setUp()
    {        
        $this->storage = new StorageApi();
    }  
   
    public function testDeleteFile()
    {
        $result = $this->storage->DeleteFile($Path="info.txt", $versionId = null, $storage = null);        
        $this->assertEquals(200, $result->Code);
    }
    
    public function testDeleteFolder()
    {
        $result = $this->storage->DeleteFolder($Path="testing", $storage = null, $recursive = null);        
        $this->assertEquals(200, $result->Code);
    }
    
    public function testGetDiscUsage()
    {
        $result = $this->storage->GetDiscUsage($storage = null);        
        $this->assertEquals(200, $result->Code);
    }
    
    public function testGetDownload()
    {
        $result = $this->storage->GetDownload($Path="info.txt", $versionId = null, $storage = null);
        $fh = fopen(getcwd(). '/Data/Output/info.txt', 'w');
        fwrite($fh, $result);
        fclose($fh);
        $this->assertFileExists(getcwd(). '/Data/Output/info.txt');
    }
    
    public function testGetIsExist()
    {
        $result = $this->storage->GetIsExist($Path="info.txt", $versionId = null, $storage = null);        
        $this->assertEquals(200, $result->Code);
    }
    
    public function testGetIsStorageExist()
    {
        $result = $this->storage->GetIsStorageExist($name="Testing123");        
        $this->assertEquals(200, $result->Code);
    }
    
    public function testGetListFileVersions()
    {
        $result = $this->storage->GetListFileVersions($Path="info.txt", $storage = null);        
        $this->assertEquals(200, $result->Code);
    } 
    
    public function testGetListFiles()
    {
        $result = $this->storage->GetListFiles($Path = "Testing123", $storage = null);        
        $this->assertEquals(200, $result->Code);
    }
    
    public function testPostMoveFile()
    {
        $result = $this->storage->PostMoveFile($src="info.txt", $dest="testing/info.txt", $versionId = null, $storage = null, $destStorage = null);        
        $this->assertEquals(200, $result->Code);
    }
    
    public function testPostMoveFolder()
    {
        $result = $this->storage->PostMoveFolder($src="copy-testing", $dest="Testing123/copy-testing", $versionId = null, $storage = null, $destStorage = null);        
        $this->assertEquals(200, $result->Code);
    }
    
    public function testPutCopy()
    {
        $file = getcwd(). '/Data/Input/info.txt';
        $result = $this->storage->PutCopy($Path="info.txt", $newdest="copy-info.txt", $versionId = null, $storage = null, $destStorage = null, $file);
        $this->assertEquals(200, $result->Code);
    }
    
    public function testPutCopyFolder()
    {
        $result = $this->storage->PutCopyFolder($Path="testing", $newdest="copy-testing", $versionId = null, $storage = null, $destStorage = null);
        $this->assertEquals(200, $result->Code);
    }
    
    public function testPutCreate()
    {
        $file = getcwd(). '/Data/Input/info.txt';
        $result = $this->storage->PutCreate($Path="info.txt", $versionId = null, $storage = null, $file);
        $this->assertEquals(200, $result->Code);
    }
    
    public function testPutCreateFolder()
    {
        $result = $this->storage->PutCreateFolder($Path="Testing123", $storage = null, $destStorage = null);
        $this->assertEquals(200, $result->Code);
    }
                         
}    