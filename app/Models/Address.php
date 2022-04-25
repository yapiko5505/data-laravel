<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable=['name', 'postal', 'address', 'phone', 'email', 'todo'];

    public function scopeNameEqual($query, $keyword)
    {
        return $query->where('name', $keyword);
    }

    public function getData()
    {
        return $this->id . ' ' . $this->name . ' ' . $this->postal . ' ' . $this->address . ' ' . $this->phone . ' ' . $this->email . ' ' .$this->todo;
    }
}
