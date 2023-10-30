<?php
namespace App\Services\Production;

use App\Services\FileServiceInterface;

class FileServices implements FileServiceInterface
{
    protected $FileServiceRepository;
    protected $driver = 'public';
    protected $maxSizeInBytes = 10485760;
    protected $keepOriginalName = true;
    protected $fileNamePrefix = null;
    protected $allowedMimeTypes = [
        'image/jpeg',
        'image/png',
        'image/gif',
        'image/webp'
        //...add other mimetype
    ];

    /**
     * @param $categoryType
     * @param $path
     * @param $dataFile
     * @return mixed|string|null
     * @throws \Exception
     */
    public function upload($categoryType, $path, $dataFile)
    {
        switch ($categoryType) {
            case 'image':
                return $this->uploadImage($path, $dataFile); break;

            default:
                return null;
        }
    }

    /**
     * @param string $driver
     */
    public function setDriver($driver)
    {
        $this->driver = $driver;
    }

    /**
     * @param $maxSizeInBytes
     * @return void
     */
    public function setMaxSizeByByte($maxSizeInBytes)
    {
        $this->maxSizeInBytes = $maxSizeInBytes;
    }

    /**
     * @param bool $keepOriginalName
     * @return void
     */
    public function keepOriginalName(bool $keepOriginalName)
    {
        $this->keepOriginalName = $keepOriginalName;
    }

    /**
     * @param $keepOriginalName
     * @return void
     */
    public function setFileNamePrefix($keepOriginalName)
    {
        $this->fileNamePrefix = $keepOriginalName;
    }

    /**
     * Thêm một hoặc nhiều mimetypes vào danh sách cho phép.
     *
     * @param string|array $mimetypes
     */
    public function addAllowedMimeTypes($mimetypes)
    {
        if (is_string($mimetypes)) {
            $this->allowedMimeTypes[] = $mimetypes;
        } elseif (is_array($mimetypes)) {
            $this->allowedMimeTypes = array_merge($this->allowedMimeTypes, $mimetypes);
        }
    }

    /**
     * @param $path
     * @param $dataFile
     * @return mixed
     * @throws \Exception
     */
    public function uploadImage($path, $dataFile)
    {
        // $maxSizeInBytes mặc định là 10MB (10 * 1024 * 1024 bytes)
        $fileSize = $dataFile->getSize();

        if (isset($fileSize) > $this->maxSizeInBytes) {
            throw new \Exception('File size exceeds the allowed limit.');
        }

        $mimeType = $dataFile->getMimeType();

        if (!in_array($mimeType, $this->allowedMimeTypes)) {
            throw new \Exception('File type not allowed.');
        }

        $originalName = pathinfo($dataFile->getClientOriginalName(), PATHINFO_FILENAME);
        $fileExtension = $dataFile->getClientOriginalExtension();

        $newFileName = $this->keepOriginalName ? $originalName : time() . '-' . str_random(8);

        if (!isset($this->fileNamePrefix)) {
            $newFileName = $this->fileNamePrefix . '_' . $newFileName;
        }

        $newFileNameWithExtension = "{$newFileName}.{$fileExtension}";

        $pathFullName = $dataFile->storeAs($path, $newFileNameWithExtension, $this->driver);

        //$pathFullName = $dataFile->store($path, 'public');

        return $pathFullName;
    }
}
