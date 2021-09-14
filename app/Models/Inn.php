<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inn extends Model
{
    use HasFactory;

    protected $fillable = ['inn', 'status', 'message'];

    /**
     * Аксессор, который отвечает на то актуальны ли данные в БД или пора обновить
     * @return bool
     */
    public function getIsAliveAttribute(): bool
    {
        return !now()->diffInDays($this->updated_at) > 0;
    }
}
