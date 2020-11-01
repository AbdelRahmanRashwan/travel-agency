<?php

if (! function_exists('saveFileToUploads')) {
    function saveFileToUploads($name) {
        $file = \request()->file($name);
        $file->move('uploads', $file->getClientOriginalName());
        return $file->getClientOriginalName();
    }
}
