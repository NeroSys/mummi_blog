<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 11/9/17
 * Time: 12:03 PM
 */

namespace common\models;


use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model
{

    public $image;

    public function rules()
    {
        return [
            [['image'], 'required'],
            [['image'], 'file', 'extensions' => 'jpg, png, jpeg' ]
        ];
    }


    public function uploadFile(UploadedFile $file, $currentImage){

        $this->image = $file;

        if ($this->validate()){

            $this->deleteCurrentImage($currentImage);

            return $this->saveImg();

        }
        return null;

//        проверить и возврат

    }

    private function getFolder(){

        return \Yii::getAlias('@frontend').'/web/upload/';
    }

    private function generateFilename(){

        return strtolower(md5(uniqid($this->image->baseName)).'.'. $this->image->extension);

    }

    public function deleteCurrentImage($currentImage){

        if ($this->fileExists($currentImage)){

            unlink($this->getFolder() . $currentImage);
        }
    }

    public function fileExists($currentImage){

        if (!empty($currentImage) && $currentImage != null){

            return file_exists($this->getFolder() . $currentImage);
        }

    }

    public function saveImg(){

        $filename = $filename = $this->generateFilename();

        $this->image->saveAs($this->getFolder() . $filename);

        return $filename;
    }
}


