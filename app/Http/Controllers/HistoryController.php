<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function add(Request $request) {
        $user = Auth::user();
        $movieId = $request->input('id');
    
        $history = $user->history;
    
        $movies = $history->history ?? [];
    
        if (!in_array($movieId, array_column($movies, 'id'))) {
            $movies[] = [
                'id' => $movieId,
                'time' => now(),
                'liked' => false
            ];
            $history->history = $movies;
            $history->save();
    
            dump($history->history);
        } else {
            dump("Movie ID {$movieId} is already in the history.");
        }

        return redirect()->back();
    }   
}
