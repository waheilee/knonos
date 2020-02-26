<?php

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Services\Web\IndexService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    protected $indexService;

    public function __construct(IndexService $indexService)
    {
        $this->indexService = $indexService;
    }
    public function index()
    {
        return view('web.index');
    }

    public function store(Request $request)
    {
        $data = $this->indexService->create($request);
        return $data;

        dd($request->all());
    }

    public function success()
    {
        return view('web.congratulation');
    }
}