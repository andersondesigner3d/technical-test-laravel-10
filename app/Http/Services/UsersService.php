<?php
namespace App\Http\Services;
use Exception;
use Illuminate\Support\Facades\Http;


class UsersService{

    public function listPaginateUsers(){
        try {
            $response = Http::withoutVerifying()->get('https://run.mocky.io/v3/ce47ee53-6531-4821-a6f6-71a188eaaee0');
            
            // Verifique se a resposta da API é bem-sucedida (código 200 OK).
            if ($response->successful()) {
                $data = json_decode($response, true);
                //$data = $response->json();
                return $data;
                // Faça algo com os dados da API aqui.
                return response()->json($data);
            }

            // Lide com outros códigos de resposta aqui, se necessário.

        } catch (\Exception $e) {
            // Lide com erros de conexão ou outras exceções aqui.
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    



}



?>