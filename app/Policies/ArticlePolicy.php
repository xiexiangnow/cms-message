<?php
namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Faker\Provider\Base;

class ArticlePolicy extends BasePolicy {


    /**
     * @return bool
     */
    public function addArticle()
    {
        return false;
    }

    /**
     * @return bool
     */
    public function updateArticle()
    {
        return false;
    }

    /**
     * @return bool
     */
    public function deleteArticle()
    {
        return false;
    }


}