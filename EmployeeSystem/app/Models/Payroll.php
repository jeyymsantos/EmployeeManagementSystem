<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $dateFormat = 'Y/m/d H:i';
    protected $fillable = [
        'id',
        'empID',
        'timeInDate',
        'timeOutDate',
        'markDate',
        'type'
    ];
}
