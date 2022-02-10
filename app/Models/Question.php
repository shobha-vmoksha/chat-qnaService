<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    // use HasFactory;
    use HasFactory, SoftDeletes;

    protected $table = "questions";

    protected $guarded = [];
}