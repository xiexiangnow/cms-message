<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * Created by PhpStorm.
 * User: xiexiang
 * Date: 2018/10/28
 * Time: 1:27 PM
 */

class Region extends Model {

    public function getRegions()
    {
        return Region::all();
    }

    public function insetData($data)
    {
        return Region::insert($data);
    }

}