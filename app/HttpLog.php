<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HttpLog extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'actor_id',
        'request_url',
        'agent_environment',
        'agent_ip',
        'agent_device',
        'agent_platform',
        'agent_browser',
        'agent_robot_name',
        'agent_is_robot',
        'agent_is_phone',
        'agent_is_desktop',
    ];

    public function actor()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
}
