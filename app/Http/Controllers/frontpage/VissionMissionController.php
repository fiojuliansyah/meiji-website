<?php

namespace App\Http\Controllers\frontpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VissionMissionController extends Controller
{
      public function index()
      {

      return view('frontpage/about_us/vission_mission');
      }


      public function create()
      {

      }


      public function store(Request $request)
      {


      }
      public function show(string $id)
      {

      }


      public function edit(string $id)
      {

      }


      public function update(Request $request, string $id)
      {

      }


      public function destroy(string $id)
      {

      }
}
