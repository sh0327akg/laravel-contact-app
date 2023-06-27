<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * ホワイトリスト
     */
    protected $fillable = [
        'department_id',
        'name',
        'email',
        'content',
        'age',
        'gender',
    ];

    /**
     * 性別の値を文字列に変換
     *
     * @param int $value
     * @return string|null
     */
    public function getGenderAttribute(int $value): ?string
    {
        $genders = [1 => '男性', 2 => '女性', 3 => '未解答'];

        return $genders[$value] ?? null;
    }
}
