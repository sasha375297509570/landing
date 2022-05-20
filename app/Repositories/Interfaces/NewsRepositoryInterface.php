<?php

namespace App\Repositories\Interfaces;

interface NewsRepositoryInterface
{
    public function all();

    /**
     *
     * @param int $id     
     */
    public function find(int $id);
}
