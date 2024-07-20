<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketSale extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'ticket_type', 'quantity', 'price', 'total_revenue'];
}
