<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\FooRepositories;
use Illuminate\Http\Request;

class FooController extends Controller {

    private $repository;

    public function __construct(FooRepositories $repository)
    {
        $this->repository = $repository;
    }

    public function foo()
    {
        return $this->repository->get();
    }

}
