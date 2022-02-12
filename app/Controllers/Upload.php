<?php

namespace App\Controllers;

class Upload extends BaseController
{
    public function uploadPage($id)
    {
        return view('uploadresult'.$id);
    }
}
