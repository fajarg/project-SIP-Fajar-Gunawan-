<?php

namespace App\Exports;

use App\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;

class PostExport implements FromQuery
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct(string $category)
    {
        $this->category = $category;
    }

    public function query()
    {
        return Post::query()->where('category', 'like', '%'. $this->category);
    }
}
