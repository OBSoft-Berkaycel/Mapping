<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoogleApi extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'google_apis';
}
