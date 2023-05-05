<?php

namespace App\Http\Traits;

trait UploadPhotos {
    public function savePhotos($photo , $folder)
    {

        $file_extension =  $photo->getClientOriginalExtension() ;
        $file_extension =  $photo->getClientOriginalExtension() ;
        $file_name = time().'.'.$file_extension ;
        $path = $folder ;
        $photo->move($path , $file_name) ;

        return $file_name ;
    }
}
