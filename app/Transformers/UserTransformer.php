<?php
namespace App\Transformers;
use App\Models\User;
use League\Fractal\TransformerAbstract;

/**
 * Created by PhpStorm.
 * User: xiexiang
 * Date: 2017/3/30
 * Time: 下午4:30
 */
class UserTransformer extends  TransformerAbstract
{
    public function transform(User $user)
    {
        return [
            'id'          => $user->id,
            'name'        => $user->name,
            'sex'         => (int)$user->sex,
            'description' => $user->description,
            'job'         => $user->job,
            'created_at'  => (string)$user->created_at
        ];
    }
}