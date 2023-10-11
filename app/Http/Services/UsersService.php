<?php
namespace App\Http\Services;
use Exception;
use Illuminate\Support\Facades\Http;


class UsersService{

    public function listPaginateUsers(){
        try {
            //Capture data from API 
            $response = Http::withoutVerifying()->get('https://run.mocky.io/v3/ce47ee53-6531-4821-a6f6-71a188eaaee0');
            
            if ($response->successful()) {
                $data = json_decode($response, true);
                return $data;                
            }

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}

?>