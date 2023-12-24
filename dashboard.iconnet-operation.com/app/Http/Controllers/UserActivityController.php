<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserActivityController extends Controller
{

  public function index() {
      $activity = DB::connection(config('activitylog.database_connection'))
          ->table(config('activitylog.table_name'))
          ->latest()
          ->get();
  
          $title = "aktifitas user";
      // return $activity;
      return view('activity.index',compact('activity', 'title'));
  }
  
}
