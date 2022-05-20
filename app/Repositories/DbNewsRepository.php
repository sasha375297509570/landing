<?php

namespace App\Repositories;

use App\Models\News;
use App\Repositories\Interfaces\NewsRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class DbNewsRepository implements NewsRepositoryInterface 
{	
	
	public function all(): LengthAwarePaginator
	{		
		return News::paginate(10);
	}	
	 
	/**
     *
     * @param int $id
     * @return News
     */
	public function find(int $id): News
	{		
		return News::findOrFail($id);
	}
}
