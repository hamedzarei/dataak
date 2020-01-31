<?php
/**
 * Created by PhpStorm.
 * User: zrhm7232
 * Date: 1/31/20
 * Time: 1:57 PM
 */

namespace App\Http\Services;

use Illuminate\Http\UploadedFile as File;

class FileService
{
    private static function createDirectory($dir)
    {
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
    }

    private static function getDirFromUserId($user_id)
    {
        $base = 'images/';
        $user_id = md5($user_id);

        return $base.$user_id;
    }

    public static function upload(File $file, $user_id)
    {
        $path = self::getDirFromUserId($user_id);
        self::createDirectory($path);

        $new_filename = uniqid($user_id);

        $file->move($path, $new_filename);

        return "$path/$new_filename";
    }
}