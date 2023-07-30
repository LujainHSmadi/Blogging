<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

trait  UploadImageTrait
{
    // ================================================================
    // ================= Save File In Folder Function =================
    // ================================================================
    function saveFile($orginal_image, $upload_location)
    {
        $name_gen = hexdec(uniqid());
        $img_ext = $orginal_image->getClientOriginalExtension();
        $img_name = $name_gen . '.' . $img_ext;
        $last_image = $upload_location . $img_name;
        $orginal_image->move($upload_location, $img_name);
        return $last_image;
    }
}
