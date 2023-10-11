<?php

namespace App\Http\Controllers;

use App\Http\Services\UsersService;
use Illuminate\Http\Request;
use Exception;

class UsersController extends Controller
{
    protected $usersService;

    public function __construct(UsersService $usersService)
    {
        $this->usersService = $usersService;
    }

    public function usersList(Request $request){
        try {
            //Capture data from API 
            $data = $this->usersService->listPaginateUsers();
            if(empty($data)){
                $paginatedItems="";
                $currentPage="";
                $max_links="";
                $numPages="";
                return view('welcome',compact('paginatedItems','currentPage','max_links','numPages'));
            }
            //Extracts the non-paged data of interest
            $dataCollection = collect($data['users']);
            //Pagination
            $currentPage = $request->input('page');
            if(empty($currentPage)){
                $currentPage = 1;
            }
            $itemsPerPage = 10;        
            $paginatedItems = array_slice($dataCollection->all(), ($currentPage - 1) * $itemsPerPage, $itemsPerPage);
            
            if(count($dataCollection)>0){            
                $numPages = ceil(count($dataCollection)/$itemsPerPage);
                $inicio = ($itemsPerPage*$currentPage)-$itemsPerPage;
            } else {
                $currentPage = 0;
            }
            $max_links = 3;
            //prevents forced paging above the existing number of data
            if($currentPage>$numPages){
                return redirect('/');
            }
            return view('welcome',compact('paginatedItems','currentPage','max_links','numPages'));
        } catch (\Exception $e) {
            throw $e;
        }        
    }
}