<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.index', [
            'title' => 'Dashboard',
        ]);
    }

    public function posts()
    {
        return view('admin.posts', [
            'title' => 'Posts',
        ]);
    }

    public function wisata()
    {
        return view('admin.wisata', [
            'title' => 'Wisata',
        ]);
    }

    public function agenda()
    {
        return view('admin.agenda', [
            'title' => 'Agenda',
        ]);
    }

    public function setadmin()
    {
        return view('admin.setadmin', [
            'title' => 'Set Admin',
        ]);
    }

    // Metode lain yang Anda perlukan
}
