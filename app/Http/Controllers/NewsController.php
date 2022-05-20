<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Repositories\Interfaces\NewsRepositoryInterface;
use App\Services\Rpc\JsonRpcServise;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**     
     *
     * @param JsonRpcServise $jsonRpcServise     
     */
    public function __construct(private NewsRepositoryInterface $newsRepository, private JsonRpcServise $jsonRpcServise)
    {                             
    }

    /**     
     *     
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $this->jsonRpcServise->create();

        $news = $this->newsRepository->all();        

        return view('news.index', ['news' => $news]);
    }

    /**     
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show(int $id)
    {
        $this->jsonRpcServise->create();

        $newsArticle = $this->newsRepository->find($id);       

        return view('news.article', [
            'title' => $newsArticle->title,
            'content' => $newsArticle->content,
        ]);
    }
}
