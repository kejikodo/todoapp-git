<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task; // Task モデルの名前空間を正しく指定

class Folder extends Model
{
    use HasFactory;

    // Userモデルとの関連を定義
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Taskモデルとの関連を定義
    public function tasks()
    {
        return $this->hasMany(Task::class); // 正しい名前空間に修正
    }
}

