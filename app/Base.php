<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Base extends Model implements Auditable, HasMedia
{
    use HasMediaTrait;
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $casts = [
        'deleted_at' => 'datetime'
    ];
}
