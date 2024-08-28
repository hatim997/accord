<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InsuranceProvider;

class SelectSearchController extends Controller
{
  public function selectSearch(Request $request)
  {
    $results = [];
    $output = '';
    if($request->ajax()) {
      $search = $request->get('query');
      $results = InsuranceProvider::where('name', 'LIKE', "%$search%")
        ->select('id', 'name', 'contact_info', 'best_rating_number', 'naic_number')
        ->get();

      if (count($results)>0) {
        $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
        foreach($results as $row)
        {
        $output .= '
          <li style="list-style: none;" data-id="' . $row->id . '" data-naic="' . $row->naic_number .  '" data-brn="' . $row->best_rating_number . '"><a href="#">'.$row->name.'</a></li>
        ';
        }
        $output .= '</ul>';
      }
    } else {
      $output .= '<li><a href="#">No results</a></li>';
    }
      return Response($output);

    //return response()->json($results);
  }
}
