<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nama_ormawa
 * @property Kategori[] $kategoris
 * @property User[] $users
 */
class Ormawa extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['nama_ormawa'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kategoris()
    {
        return $this->hasMany('App\Kategori', 'id_ormawa');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\User', 'id_ormawa');
    }
}
