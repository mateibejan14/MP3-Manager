<?php
/**
 * Created by PhpStorm.
 * User: mateibejan
 * Date: 29.08.2018
 * Time: 16:32
 */

namespace App\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader {

    private $targetDirectory;

    public function __construct($targetDirectory) {

        $this->targetDirectory = $targetDirectory;

    }

    public function upload(UploadedFile $file) {


        $fileName = md5(uniqid('', FALSE)).'.'.$file->guessExtension();

        $file->move($this->getTargetDirectory(), $fileName);

        return $fileName;

    }

    public function getTargetDirectory() {

        return $this->targetDirectory;

    }

}