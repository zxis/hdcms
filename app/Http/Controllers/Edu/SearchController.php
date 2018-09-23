<?php

namespace App\Http\Controllers\Edu;

use App\Models\Article;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function lists(Request $request)
    {
        $w = $request->query('w');
        switch ($request->query('t')) {
            case 'article':
                $data = Article::search($w)->paginate(10);
                break;
            case 'topic':
                $data = Topic::search($w)->paginate(10);
                break;
            case 'video':
                break;
            default:
                return back()->with('error', '类型错误');
        }
        return view('edu.search_lists', compact('data'));
    }
}
