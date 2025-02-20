<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class barang extends Model
{
    /**
     * Get the user that owns the stok
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getstok(): BelongsTo
    {
        return $this->belongsTo(stok::class, 'nama_barang_id', 'id');
    }

    /**
     * Get the user that owns the stok
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getsuplier(): BelongsTo
    {
        return $this->belongsTo(suplier::class, 'suplier_id', 'id');
    }

    /**
     * Get the user that owns the stok
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getadmin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'admin_id', 'id');
    }

}
