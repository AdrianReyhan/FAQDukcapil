<?php

namespace App\Models;

use App\Models\FaqCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FaqQuestion extends Model
{
    use SoftDeletes;

    public $table = 'faq_questions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'answer',
        'question',
        'faq_category_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(FaqCategory::class, 'faq_category_id');
    }
}
