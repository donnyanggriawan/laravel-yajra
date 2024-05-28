<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HomeController extends Controller
{
    public function index() {
        if (request()->ajax()) {
            $users = User::query();

            // menambahkan no urut
            $datatables = DataTables::of($users);
            $datatables->addColumn('DT_RowIndex', function ($user) {
                static $index = 1;
                return $index++;
            });

            // menambahkan filter pencarian berdasarkan kolom 'name'
            if ($search = request()->get('search')['value']) {
                $users->where('name', 'like', "%{$search}%");
            }
            return $datatables->make();
        }
        return view('home');
    }
}
