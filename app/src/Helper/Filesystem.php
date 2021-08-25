<?php
declare(strict_types=1);

namespace PTA\Helper;

class Filesystem {

    public static function checkDirectory(string $path)
    {
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        if (!is_writable($path)) {
            chmod($path, 0777);
        }
        if (!is_writable($path)) {
            throw new \Exception("Directory ".$path." is not writable and cannot be changed. Please change permissions manually");
        }
    }

}