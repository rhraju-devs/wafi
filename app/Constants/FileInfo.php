<?php

namespace App\Constants;

class FileInfo
{
    public function fileInfo(){

        $data['employee'] = [
            'path' => 'assets/images/employee',
            'size'  => '40x40',
        ];
        $data['logoIcon'] = [
            'path'      => 'assets/images/logoIcon',
            'size' => '150x42'
        ];
        $data['userProfile'] = [
            'path'      => 'assets/images/profile',
            'size' => '150x150'
        ];
        $data['adminProfile'] = [
            'path'      => 'assets/images/adminProfile',
            'size' => '150x150'
        ];

        return $data;
	}


}
