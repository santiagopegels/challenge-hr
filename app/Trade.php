<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    public $timestamps = false;

    public $fillable = [
        'type',
        'user_id',
        'symbol',
        'shares',
        'price',
        'timestamp',
    ];

    protected $casts = [
        'price' => 'integer',
        'shares' => 'integer',
        'user_id' => 'integer',
        'timestamp' => 'date',
    ];

    public function setTimestampAttribute($value)
    {
        $this->attributes['timestamp'] = !is_null($value)
            ? Carbon::createFromTimestampMs($value)
            : null;
    }

    public function getTimestampAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['timestamp'])->getTimestampMs();
    }

    public function scopeFilter($query, $filters)
    {
        return $query->when($filters['type'], function ($query) use ($filters) {
            $query->where('type', $filters['type']);
        })->when($filters['user_id'], function ($query) use ($filters) {
            $query->where('user_id', $filters['user_id']);
        });
    }
}
