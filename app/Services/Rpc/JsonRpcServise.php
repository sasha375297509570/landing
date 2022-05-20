<?php

namespace App\Services\Rpc;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Log;

class JsonRpcServise
{
    /**
     *
     * @param JsonRpcClient $jsonRpcClient     
     */
    public function __construct(private JsonRpcClient $jsonRpcClient)
    {       
    }

    /**
     *
     * @return array
     */
    public function create(): array
    {
    	try {    	    
    	    return $this->jsonRpcClient->send(
    	        config('services.activity.modules.0'), 
    	        'create', 
    	        [
    	    	    'url' => URL::full(), 
    	    	    'date' => (new \DateTime('now'))->format('Y-m-d H:i:s')
    	        ]
    	    );            
    	} catch (\Exception $e) {
            Log::warning($e->getMessage());
        }        
    }


    /**
     *
     * @return array
     */
    public function show(): array
    {       
    	try {
    	    return $this->jsonRpcClient->send(
    	        config('services.activity.modules.0'), 
    	        'show',
    	        [    	             	
    	        ]
    	    );
    	} catch (\Exception $e) {    		
            Log::warning($e->getMessage());
        }        
    }
}	
