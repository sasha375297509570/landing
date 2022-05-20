<?php

namespace App\Http\Controllers;

use App\Services\Rpc\JsonRpcServise;
use Illuminate\Http\Request;

class DefaultController extends Controller
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
     * @return \Illuminate\View\View
     */
    public function index()
    {        
        $this->jsonRpcServise->create();  

        return view('default.index');
    }
}
