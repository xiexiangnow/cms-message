<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * Created by PhpStorm.
 * User: xiexiang
 * Date: 2018/10/28
 * Time: 1:38 PM
 */

class Area extends Model {

    public function getAreas()
    {
        return Area::all();
    }

    public function getAreaById($id)
    {
        return Area::find($id);
    }
}