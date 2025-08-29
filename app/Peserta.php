<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $nim
 * @property int $id_tim
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Tim $tim
 * @property Mahasiswa $mahasiswa
 * @property Finalist[] $finalists
 */
class Peserta extends Model
{
    use SoftDeletes;
    /**
     * @var array
     */
    protected $fillable = ['nim', 'id_tim', 'created_at', 'updated_at', 'deleted_at'];

    public static function linkPesertaToTim($nim, $id_tim){
        Peserta::create([
            'nim' => $nim,
            'id_tim' => $id_tim
        ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tim()
    {
        return $this->belongsTo('App\Tim', 'id_tim');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mahasiswa()
    {
        return $this->belongsTo('App\Mahasiswa', 'nim', 'nim');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function finalists()
    {
        return $this->hasMany('App\Finalist', 'id_tim');
    }
}
