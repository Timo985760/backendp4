<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AllergeenModel extends Model
{
    protected $table = 'Allergeen';
    protected $primaryKey = 'Id';
    protected $fillable = [
        'Naam',
        'Omschrijving',
        'IsActief',
        'Opmerking',
    ];
    public $timestamps = true;

    public function getAllergenen()
    {
        return DB::select('CALL SP_GetAllAllergenen()');
    }

    public function getAllergeenById(int $id)
    {
        $result = DB::select('CALL SP_GetAllAllergenenById(?)', [$id]);
        return $result[0] ?? null;
    }
}
