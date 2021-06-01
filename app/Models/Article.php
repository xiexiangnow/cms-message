<?php
namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Article extends Model
{
    use softDeletes;
    const LIST_SIZE = 6;           //每页显示条数
    const LAST_ARTICLE_LIMIT = 5;   //最新文章
    /**
     * @param $where
     * @return mixed
     */
    public function get($where)
    {
        $article = new Article();
        if($where['cate_id']){
            $article = $article->where('cate_id',$where['cate_id']);
        }
        if($where['keyword']){
            $article = $article->where('title','like','%'.$where['keyword'].'%');
        }
        return $article->orderBy('is_top','DESC')
            ->orderBy('sort','DESC')
            ->orderBy('id','DESC')
            ->paginate(self::LIST_SIZE);
    }
    /**
     * @param $id
     * @return bool|mixed|null
     */
    static public function deleteArticle($id)
    {
        return Article::where('id',$id)->delete();
    }
    /**
     * @param $data
     * @return mixed
     */
    static public function insertArticle($data)
    {
        return Article::insert([
            'cate_id'     => $data['cate_id'],
            'keyword'     => $data['keyword'],
            'author'      => $data['author'] ? $data['author'] : "本站作者",
            'is_top'      => $data['is_top'],
            'title'       => $data['title'],
            'content'     => $data['content'],
            'description' => $data['description'],
            'sort'        => $data['sort'] ? $data['sort'] : 0,
            'view'        => $data['view'] ? $data['view'] : 0,
            'updated_at'  => Carbon::now(),
            'created_at'  => Carbon::now()
        ]);
    }
    /**
     * @param $data
     * @return mixed
     */
    static public function updateArticle($data)
    {
        return Article::where('id',$data['id'])->update([
            'cate_id'     => $data['cate_id'],
            'keyword'     => $data['keyword'],
            'author'      => $data['author'] ? $data['author'] : "本站作者",
            'is_top'      => $data['is_top'],
            'title'       => $data['title'],
            'content'     => $data['content'],
            'description' => $data['description'],
            'sort'        => $data['sort'] ? $data['sort'] : 0,
            'view'        => $data['view'] ? $data['view'] : 0,
            'updated_at'  => Carbon::now()
        ]);
    }
    /**
     * @param $id
     * @return mixed
     */
    static public function getDetail($id)
    {
        return Article::find($id);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category','cate_id', 'cate_id');
    }
    /**
     * @return mixed
     */
    static public function getLastArticle()
    {
       return Article::orderBy('is_top','DESC')
           ->orderBy('id','DESC')
           ->take(self::LAST_ARTICLE_LIMIT)
           ->get();
    }
    /**
     * @param $cateId
     * @return mixed
     */
    static public function isHaveArticleByCateId($cateId)
    {
        return Article::where('cate_id',$cateId)->count();
    }
    /**
     * @return mixed
     */
    static public function getArticleSum()
    {
        return Article::count();
    }
    /**
     * @return mixed
     */
    static public function getNowMonthSum()
    {
        return Article::whereBetween('created_at',
            [Carbon::now()->startOfMonth(),Carbon::now()->endOfMonth()]
        )->count();
    }
}
