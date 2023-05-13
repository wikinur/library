<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $fillable = ['transaction_id', 'book_id'];

    /**
     * Get the user that owns the TransactionDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class);
    }

    /**
     * Get the books that owns the TransactionDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function books(): BelongsTo
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }
}
