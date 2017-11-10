<?php

namespace App\Models;

use Carbon\Carbon;
use Gridonic\JsonResponse\SuccessJsonResponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
  use SoftDeletes;

    public function addTag($data)
    {
       return $this->insert([
            'name'  => $data['tag_name'],
            'color' => $data['tag_color'],
            'created_at' => Carbon::now()
        ]);
    }

    public function get()
    {
       return $this->orderBy('created_at','desc')->paginate(20);
    }

    /**
     * @return string
     */
    public function getJsonTagsList()
    {
       $tags = $this->orderBy('created_at','DESC')->select(['id','name','color'])->get();
       $array = [];
       foreach($tags as $key => $tag){
           $array[$key]['id']   = $tag->id;
           $array[$key]['text'] = $tag->name;
       }
       return response()->json($array)->getContent();
    }
    
    public function deleteTag($id)
    {
       return $this->where('id',$id)->delete();
    }

    public function getOne($id)
    {
        return $this->find($id);
    }

    public function updateTag($data)
    {
        return $this->where('id',$data['tag_id'])
            ->update([
            'name' => $data['tag_name'],
            'color'=> $data['tag_color']
        ]);
    }

}