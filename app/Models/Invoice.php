<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \App\Models\Client;

class Invoice extends Model
{
    public function Client() {
    	return $this->belongsTo("App\Models\Client", "client_id");
    }
    public function LineItems() {
    	return $this->hasMany("App\Models\InvoiceItem", "invoice_id");
    }
    public function Payments() {
    	return $this->hasMany("App\Models\Payment", "invoice_id");
    }
}
