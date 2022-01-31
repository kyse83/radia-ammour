<?php
namespace App\Model;
use App\Helpers\Text;
use \DateTime;

class Home{
    private $id;
    private $name;
    private $image;
    private $oldImage;
    private $pendingUpload = false;


    public function getName():?string
    {
        return $this->name;
    }

    public function setName(string $name):self
    {
        for ($i=1; $i < 4 ; $i++) { 
            if (isset($_POST['submit'.$i])){
                $this->name = "image".$i;
            }
        }
        
        return $this;
    }
   

    public function getID(): ?int
    {
        return $this->id;
    }
    public function setID(int $id): self
    {
        $this->id = $id;
        return $this;

    }
   
    public function getImage():?string
    {
       return $this->image;
    }

    public function getImageURL(string $format):?string 
    {
        if (empty($this->image)){
            return null;
        }
        return '/uploads/home/'.$this->name.'_'.$format.'.jpg';
    }

    public function setImage($image):self
    {
        if (is_array($image)&& !empty($image['tmp_name'])){
            if(!empty($this->image)){
                $this->oldImage = $this->image;
            }
            $this->pendingUpload = true;
            $this->image = $image['tmp_name'];
        }
        if (is_string($image) && !empty($image)){
            $this->image = $image;
        }
        return $this;
    }

    /**
     * Get the value of oldImage
     */ 
    public function getOldImage():? string
    {
        return $this->oldImage;
    }

    public function shouldUpload():bool 
    {
        return $this->pendingUpload;
    }


}

?>