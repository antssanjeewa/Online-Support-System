<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "ref_number",
        "customer_name",
        "description",
        "email",
        "phone_number",
        "is_opened",
        "status"
    ];


    public function replies(){
        return $this->hasMany(Reply::class);
    }

    public function scopePending($query)
    {
        $query->where('state', 'pending');
    }


    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('ref_number', 'like', '%' . $search . '%')
                    ->orWhere('customer_name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('phone_number', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
                });
        })->when($filters['status'] ?? null, function ($query, $status) {
            $query->where('status', $status);
        })->latest();
    }

    
}
