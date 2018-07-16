<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function scholarship()
    {
        return $this->belongsTo(scholarship::class);
    }

    public function commentUser()
    {
        return $this->belongsTo(user::class);
    }

    public function getDate()
    {
        if(!$this->created_at){
            return null;
        }
        $date           = $this->created_at->diffForHumans();
        // $dateIndoFormat = Carbon::parse($date)->format('l, d/m/Y');
        return $date;
    }
}
