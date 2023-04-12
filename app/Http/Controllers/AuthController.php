<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(){
        if(null !== session('user')){
            return redirect('home');
        }
        return view('login');
    }

    public function signin(Request $request){
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $client = new Client();
        try {
            $response = $client->post('https://netzwelt-devtest.azurewebsites.net/Account/SignIn', [
                'json' => [
                    'username' => $request->username,
                    'password' => $request->password,
                ]
            ]);

            $data = json_decode($response->getBody(), true);

            if (isset($data['username'])) {
                session(['user' => $data]);
                return redirect('home');
                //return response()->json(['status' => 'success']);
            }
        } catch (RequestException $e) {
            if ($e->getResponse() && $e->getResponse()->getStatusCode() == 404) {
                // Custom error message for 404 error
                $errorMessage = json_decode($e->getResponse()->getBody()->getContents())->message;
            } else {
                // Generic error message for other exceptions
                $errorMessage = 'An error occurred while trying to sign in. Please try again later.';
            }

            // Log the error
           // Log::error('Error in SignInController: ' . $e->getMessage());

            // Return the error message to the user
            return back()->withErrors(['error' => $errorMessage])->withInput();
        }
    }

    public function logout(Request $request)
    {
        session()->flush();
        return redirect('account/login');
    }
}
