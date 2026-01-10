<?php
// app/Models/StoreVoice.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreVoice extends Model
{
    protected $fillable = [
        'store_id', 'title', 'excerpt', 'body', 'image',
        'interviewed_at', 'published_at',
        'is_published', 'sort_order', 'delete_flg',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
?>