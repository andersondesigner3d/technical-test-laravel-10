<?php

namespace App\Http\Controllers;

use App\Http\Services\UsersService;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    protected $usersService;

    public function __construct(UsersService $usersService)
    {
        $this->usersService = $usersService;
    }

    public function usersList(Request $request){

        $data = $this->usersService->listPaginateUsers();
        $dataCollection = collect($data['users']);
        $currentPage = $request->input('page');
        if(empty($currentPage)){
            $currentPage = 1;
        }
        $itemsPerPage = 10;        
        $paginatedItems = array_slice($dataCollection->all(), ($currentPage - 1) * $itemsPerPage, $itemsPerPage);

        //dd($paginatedItems);

        //Pagination
        if(count($dataCollection)>0){            
            $numPages = ceil(count($dataCollection)/$itemsPerPage);
            $inicio = ($itemsPerPage*$currentPage)-$itemsPerPage;
        } else {
            $currentPage = 0;
        }
        $max_links = 3;        
        
       


        
        return view('welcome',compact('paginatedItems','currentPage','max_links','numPages'));
    }
}
