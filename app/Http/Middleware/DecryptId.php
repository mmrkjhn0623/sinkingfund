<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DecryptId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $parameter
     * @return mixed
     */

    public function handle(Request $request, Closure $next, string $parameter = '')
    {
        $key = 'your-encryption-key-32-characters-long';
        $method = 'AES-256-CBC';

        // Base64 URL decoding
        function base64UrlDecode($data) {
            $data .= str_repeat('=', (4 - strlen($data) % 4) % 4); // Add padding
            return base64_decode(strtr($data, '-_', '+/'));
        }

        // Decrypt the given ID
        function decryptid($encryptedid, $key, $method) {
            list($encrypted_data, $iv) = explode('::', base64UrlDecode($encryptedid), 2); // Decode and split IV
            return openssl_decrypt($encrypted_data, $method, $key, 0, $iv);
        }

        // Check if the parameter exists in the request
        if ($request->route($parameter)) {
            $encryptedId = $request->route($parameter);
        }

        if ($request->has('memberid')){
            $encryptedId = $request->input('memberid');
        }

        try {    
            $decryptedId = decryptid($encryptedId, $key, $method);
            // Replace the encrypted parameter in the request with its decrypted value
            $request->route()->setParameter($parameter, $decryptedId);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Invalid encrypted ID'.$request->route($parameter).' - '], 400);
        }
        
        return $next($request);
    }
}
