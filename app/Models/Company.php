<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Company extends Model
{
    protected $table = 'companies';
    protected $fillable = ['description','name','location','employees_count','owner_id','profile_picture','type'];
    use HasFactory;
    public function getCompanies()
    {
        return DB::table('companies')->where('owner_id',Auth::user()->id)->get();
    }
    public function getCompany($id)
    {
        return DB::table('companies')->where('id',$id)->get()[0];
    }

}
