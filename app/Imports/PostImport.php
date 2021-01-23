<?php

namespace App\Imports;

use App\Post;
use Maatwebsite\Excel\Concerns\ToModel;

class PostImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $now = date('Y-m-d H:i:s');
        return new Post([
            'user_id'=>$row['0'],
            'title'=>$row['1'],
            'content'=>$row['2'],
            'category'=>$row['3'],
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);
    }
}
