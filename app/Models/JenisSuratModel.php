<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\SuratModel;

class JenisSuratModel extends Model
{
    protected $table = "jenis_surat";
    protected $primaryKey = "id_jenis_surat";
    protected $fillable = ['nama', 'kode'];

    public function surat(): HasMany
    {
        return $this->hasMany(SuratModel::class);
    }
}
