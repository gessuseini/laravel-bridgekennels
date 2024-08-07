<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LockController extends Controller
{
    public function toggleLock($key)
    {
        $secretKey = 'gessuseini6969'; // Replace with your actual secret key

        if ($key !== $secretKey) {
            abort(403, 'Unauthorized action.');
        }

        $path = storage_path('app/lock_status.txt');
        $currentStatus = file_exists($path) ? trim(file_get_contents($path)) : '0';
        $newStatus = $currentStatus === '1' ? '0' : '1';

        file_put_contents($path, $newStatus);

        return redirect('/')->with('status', $newStatus === '1' ? 'Site is now locked.' : 'Site is now unlocked.');
    }
}
