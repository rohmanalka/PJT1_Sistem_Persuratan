<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\UserModel;

class SuratModel extends Model
{
    protected $table = "surat";
    protected $primaryKey = "id_surat";
    protected $fillable = [
        'id_jenis_surat',
        'id_user',
        'nomor_surat',
        'tanggal_surat',
        'judul',
        'isi',
        'status',
        'tanggal_surat',
        'catatan',
        'approved_at',
        'approved_by',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class, 'id_user', 'id_user');
    }

    public function jenisSurat(): BelongsTo
    {
        return $this->belongsTo(JenisSuratModel::class, 'id_jenis_surat', 'id_jenis_surat');
    }

    public function approver(): BelongsTo
    {
        return $this->belongsTo(UserModel::class, 'approved_by', 'id_user');
    }
}
