<?php
namespace App\Attachment;
use Intervention\Image\ImageManager;

class HomeAttachment{
    
    const DIRECTORY = UPLOAD_PATH . DIRECTORY_SEPARATOR . 'home';

    public static function upload ($post)
    {
        $image = $post->getImage();
        if (empty($image) || $post->shouldUpload()===false){
            return;
        }
       
        $directory = self::DIRECTORY;
        if (file_exists($directory)=== false){
            mkdir($directory, 0777,true);
        }
        if (!empty($post->getOldImage())){
            $formats = ['small','large'];
            foreach($formats as $format){
                $oldFile = $directory. DIRECTORY_SEPARATOR . $post->getOldImage() . '_' . $format . '.jpg';
                if (file_exists($oldFile)){
                    unlink($oldFile);
                }
            }
        }
        $filename = uniqid("",true);
        $manager = new ImageManager(['driver'=>'gd']);
        $manager
            ->make($image)
            ->fit(350,200)
            ->save($directory . DIRECTORY_SEPARATOR . $post->getName(). '_small.jpg'); 
        $manager
            ->make($image)
            ->resize(230,null,function($constraint){
                $constraint->aspectRatio();
            })
            ->save($directory . DIRECTORY_SEPARATOR . $post->getName().'_large.jpg');                    
        $post->setImage($filename);
    }  
    public static function detach ($post){
        if (!empty($post->getImage())){
            $formats = ['small','large'];
            foreach($formats as $format){
                $file = self::DIRECTORY. DIRECTORY_SEPARATOR . $post->getImage() . '_' . $format . '.jpg';
                if (file_exists($file)){
                    unlink($file);
                }
            }
        }
    } 

}