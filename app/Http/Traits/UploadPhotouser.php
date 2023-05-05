<?php

namespace App\Http\Traits;

trait UploadPhotouser {
    public function savePhotos($photo , $folder)
    {

        $file_extension =  $photo->getClientOriginalExtension() ;
        $file_name = time().'.'.$file_extension ;
        $path = $folder ;
        $photo->move($path , $file_name) ;

        return $file_name ;
    }
}
