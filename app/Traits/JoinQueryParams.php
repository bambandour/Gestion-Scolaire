<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

trait JoinQueryParams{

    public function test(){
        return 'hello gars';
    }
    public function join($model,$relation){
        return $model::with($relation)->get();
    }

    public function hasJoin($relation):bool
    {
        $join = request()->input('join');
         if(!$join)
         {
            return false;
         }
         $tabjoin = explode(',', $join);
         $tabjoin = array_map('trim', $tabjoin);
        return in_array($relation , $tabjoin);
    }

}

