<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TesdaRequest extends Model
{
    use HasFactory;

    protected $fillable = [
    'user_id',
    'request_type',
    'name',
    'email',
    'message',
    'status',
];
    // new: relation to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
