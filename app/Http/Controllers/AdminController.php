<?php

namespace App\Http\Controllers;

use App\Services\Rpc\JsonRpcServise;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class AdminController extends Controller
{    
	/**     
     *
     * @param JsonRpcServise $jsonRpcServise     
     */
    public function __construct(private JsonRpcServise $jsonRpcServise)
    {              
    }

    /**     
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {        
        $activities = $this->jsonRpcServise->show();               

        $page = Paginator::resolveCurrentPage() ?: 1;        
        $activitiesResult = Collection::make($activities['result']['data']);        
        $activitiesPangination = new LengthAwarePaginator(
        	$activitiesResult->forPage($page, config('services.activity.per_page')),
        	 $activities['result']['total'], 
        	 config('services.activity.per_page'), 
        	 $page, 
        	 ['path' => '/admin/activity']
        );              

        return view('admin.index', ['activities' => $activitiesPangination]);
    }
}
