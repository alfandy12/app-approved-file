<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileSubmission extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'file',
        'note'
    ];
    // Definisikan relasi ke model history
    public function history()
    {
        return $this->hasMany(FileSubmissionHistory::class);
    }

    
}
