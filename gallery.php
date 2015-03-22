<?php
class Gallery {
    public $path; //this will be later set as a variable in index.php
    public function setPath($path) {
        $this->path = $path;
    }

    private function getDirectory($path) {
        return scandir($path);
    }
    public function getImages($extensions = array()) {
        $images = $this->getDirectory($this->path); //list all files
        
        
        foreach($images as $index => $image) {
            $explode = explode('.', $image);
            $extension = end($explode);
            if(!in_array($extension, $extensions)) { //check if files extensions meet the criteria set in index.php
                unset($images[$index]);
            } else {
                $images[$index] = array( //make an array of images and corresponding miniatures
                    'full' => $this->path . '/' . $image,
                    'thumb' => $this->path . '/thumbs/' . $image  
                    );
            }
           
        }
        return (count($images)) ? $images : false;   
    }   
}
?>