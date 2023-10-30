<?php
namespace App\Services;

interface FileServiceInterface
{
    /**
     * upload file with option.
     *
     * @param string $categoryType
     * @param string $path
     * @param File   $dataFile
     *
     * @return string
     */
    public function upload($categoryType, $path, $dataFile);

    public function uploadImage($path, $dataFile);

    public function setDriver($driver);

    public function setMaxSizeByByte($maxSizeInBytes);

    public function keepOriginalName(bool $keepOriginalName);

    public function setFileNamePrefix($keepOriginalName);

    public function addAllowedMimeTypes($mimetypes);

}
