<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IP extends Model
{
    use HasFactory;

    public function up()
    {
        Schema::create('ips', function (Blueprint $table) {
            $table->id();
            $table->string('address')->unique();
            $table->timestamps();
        });
    }
}
