<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Emptycar;

class EmptycarsController extends Controller
{

	public function __construct()
	{ }
	public function index()
	{
		$data['luggage_num'] = session('luggage_num');
		$data['emptycar_num'] = session('emptycar_num');
		return view('pages.emptyTruck_search', $data);
	}
	public function create()
	{
		$data['luggage_num'] = session('luggage_num');
		$data['emptycar_num'] = session('emptycar_num');
		return view('pages.emptyTruck_store',$data);
	}
	public function store(Request $request)
	{
		$rules = [
			'emptycar_date' => 'required',
			'emptyplaceSpec' => 'required',
			'city' => 'required',
			'beginplace' => 'required',
			'endplace' => 'required',
			'drop_date' => 'required',
			'vehicle' => 'required',
			'type1' => 'required'
		];
	
		$customMessages = [
			'required' => 'ここを入力してください。',
			'numeric' => 'このカーンは数字である必要があります。'
		];
	
		$this->validate($request, $rules, $customMessages);
		
		$emptycar = new Emptycar([
			// 'emptycar_id' => $request->get('emptycar_id'),
			'user_id' => auth()->user()->id,
			'urgent_matter' => $request->get('emergency_case'),
			'emptycar_date' => $request->get('emptycar_date'),
			'emptycar_time' => $request->get('loading_time'),
			'emptycar_space' => $request->get('emptyplaceSpec'),
			'emptycar_city' => $request->get('city'),
			'land_pos_loading' => $request->get('beginplace'),
			'drop_date' => $request->get('drop_date'),
			'drop_time' => $request->get('drop_time'),
			// 'drop_city' => $request->get('drop_city'),
			'land_pos_drop' => $request->get('endplace'),
			'vehicle_inf' => $request->get('vehicle'),
			'vehicle_type1' => $request->get('type1'),
			'vehicle_type1_content' => $request->get('type_Other'),
			'vehicle_type2' => $request->get('type2'),
			'vehicle_type3' => $request->get('type3'),
			'bigo' => $request->get('bigo'),
			'phone_number' => '027-386-4141',
			'person_charge' => '担当'
			
		]);
		$emptycar->save();
		session(['emptycar_num' => Emptycar::count()]);
		return redirect('/emptyTruck_info');
	}
	public function show()
	{
		$data['luggage_num'] = session('luggage_num');
		$data['emptycar_num'] = session('emptycar_num');
		$data['results'] = Emptycar::Paginate(10);
		$data['page_num'] = 10;
		return view('pages.emptyTruck_info', $data);
	}
	public function show_per_num(Request $request)
	{
		if (isset($request->page_num)) {
			session(['emptyTruck_page_number' => $request->page_num]);
			$page_number = session('emptyTruck_page_number');	
		} else {
			$page_number = session('emptyTruck_page_number');	
		}

		$data['page_num'] = $page_number;

		if($request->first_sortlist){
			session(['emptyTruck_first_sortlist' => $request->first_sortlist]);
			session(['emptyTruck_first_sortflag' => $request->first_sortflag]);
		}
		if($request->second_sortlist){
			session(['emptyTruck_second_sortlist' => $request->second_sortlist]);
			session(['emptyTruck_second_sortflag' => $request->second_sortflag]);
		}
		if($request->third_sortlist){
			session(['emptyTruck_third_sortlist' => $request->third_sortlist]);
			session(['emptyTruck_third_sortflag' => $request->third_sortflag]);
		}
		$first_sortlist = session('emptyTruck_first_sortlist');
		$first_sortflag = session('emptyTruck_first_sortflag');
		$second_sortlist = session('emptyTruck_second_sortlist');
		$second_sortflag = session('emptyTruck_second_sortflag');
		$third_sortlist = session('emptyTruck_third_sortlist');
		$third_sortflag = session('emptyTruck_third_sortflag');
		$user_id = auth()->user()->id;
		$showdata = Emptycar::query()->where('user_id', $user_id);
		if (isset($first_sortlist)) {
		
			if($first_sortflag == 'asc'){
				$showdata->orderBy($first_sortlist, 'asc');
			}
			else{
				$showdata->orderBy($first_sortlist, 'desc');
			}
		}
		if (isset($second_sortlist)) {
			if($second_sortflag == 'asc'){
				$showdata->orderBy($second_sortlist, 'asc');
			}
			else{
				$showdata->orderBy($second_sortlist, 'desc');
			}
		}
		if (isset($third_sortlist)) {
			if($third_sortflag == 'asc'){
				$showdata->orderBy($third_sortlist, 'asc');
			}
			else{
				$showdata->orderBy($third_sortlist, 'desc');
			}
		} 
		$data['results'] = $showdata->Paginate($page_number);

		$data['luggage_num'] = session('luggage_num');
		$data['emptycar_num'] = session('emptycar_num');
		 
		return view('pages.emptyTruck_info', $data);
	}
	public function edit()
	{
		$user_id = auth()->user()->id;
		$data['showdatas'] = Emptycar::query()->where('user_id', $user_id)->Paginate(10);
		// $data['showdatas'] = Emptycar::Paginate(10);
		$total_rows = Emptycar::query()->where('user_id', $user_id)->count();
		session(['total_rows' => $total_rows]);
		$data['total_rows'] = session('total_rows');
		$data['luggage_num'] = session('luggage_num');
		$data['emptycar_num'] = session('emptycar_num');
		return view('pages.emptyTruck_edit', $data);
	}
	public function update(Request $request, $id)
	{
		$rules = [
			'emptycar_date' => 'required',
			'emptyplaceSpec' => 'required',
			'emptycar_city' => 'required',
			'beginplace' => 'required',
			'endplace' => 'required',
			'drop_date' => 'required',
			'phone_number' => 'required|numeric',
			'person_charge' => 'required',
			// 'vehicle_info' => 'required'
		];
	
		$customMessages = [
			'required' => 'ここを入力してください。',
			'numeric' => 'このカーンは数字である必要があります。'
		];
	
		$this->validate($request, $rules, $customMessages);
		$emptycar = Emptycar::find($id);
		$emptycar->urgent_matter = $request->get('urgent_matter');
		$emptycar->emptycar_date = $request->get('emptycar_date');
		$emptycar->emptycar_time = $request->get('emptycar_time');
		$emptycar->emptycar_space = $request->get('emptyplaceSpec');
		$emptycar->emptycar_city = $request->get('emptycar_city');
		$emptycar->land_pos_loading = $request->get('beginplace');
		$emptycar->drop_date = $request->get('drop_date');
		$emptycar->drop_time = $request->get('drop_time');
		$emptycar->drop_city = $request->get('drop_city');
		$emptycar->land_pos_drop = $request->get('endplace');
		$emptycar->vehicle_inf = $request->get('vehicle_inf');
		$emptycar->vehicle_type1 = $request->get('vehicle_type1');
		$emptycar->vehicle_type1_content = $request->get('vehicle_type1_content');
		$emptycar->vehicle_type2 = $request->get('vehicle_type2');
		$emptycar->vehicle_type3 = $request->get('vehicle_type3');
		$emptycar->bigo = $request->get('bigo');
		$emptycar->phone_number = $request->get('phone_number');
		$emptycar->person_charge = $request->get('person_charge');
		$emptycar->save();
		// return redirect('/emptyTruck_edit');
		return redirect()->action('EmptycarsController@edit');
	}
	//show resutls with the show numbers 

	public function destroy($id)
	{
		$emptycar = Emptycar::find($id);
		if ($emptycar != null) {
			$emptycar->delete();
			session(['emptycar_num' => Emptycar::count()]);
			return redirect('/emptyTruck_edit');
		}
		return redirect('/emptyTruck_edit');
	}
	public function destroy_all()
	{
		$user_id = auth()->user()->id;
		DB::table('emptycars')->where('user_id', $user_id)->delete();
		session(['emptycar_num' => 0]);
		return redirect('/emptyTruck_edit');
	}
	public function search(Request $request)
	{
		$data['luggage_num'] = session('luggage_num');
		$data['emptycar_num'] = session('emptycar_num');

		$search_flag = $request->get('search_start');
		if(isset($search_flag) && $search_flag == 'search_start'){
			session(['emptytruck_search_key' => $request->post()]);
		}
		$data['results'] = Emptycar::query();
		
		$request_loading_start = session('emptytruck_search_key.loading_start');
		$request_loading_end = session('emptytruck_search_key.loading_end');
		if(isset($request_loading_start) && isset($request_loading_end)){
			$data['results']->where('emptycar_date', '>', $request_loading_start);
			$data['results']->where('emptycar_date', '<', $request_loading_end);
		}

		$request_drop_start = session('emptytruck_search_key.drop_start');
		$request_drop_end = session('emptytruck_search_key.drop_end');
		if(isset($request_drop_end) && isset($request_drop_start)){
			$data['results']->where('drop_date', '>', $request_drop_start);
			$data['results']->where('drop_date', '<', $request_drop_end);
		}

		$beginplaces_str = session('emptytruck_search_key.beginplace');
		if(!empty($beginplaces_str)){
			$beginplaces_str = substr($beginplaces_str, 0, -1);
			$beginplace_arr = explode(',', $beginplaces_str);
			$data['results']->where(function($data) use($beginplace_arr){
				foreach($beginplace_arr as $beginplace){
					$data->orwhere('land_pos_loading','like', '%'.$beginplace.'%');
				}
			});
		}

		$endplaces_str = session('emptytruck_search_key.endplace');
		if(!empty($endplaces_str)){
			$endplaces_str = substr($endplaces_str, 0, -1);
			$endplace_arr = explode(',', $endplaces_str);
			$data['results']->where(function($data) use($endplace_arr){
				foreach($endplace_arr as $endplace){
					$data->orwhere('land_pos_drop','like', '%'.$endplace.'%');
				}
			});
		}

		$request_truck = session('emptytruck_search_key.truck');
		if(isset($request_truck) && !empty($request_truck)){
			$data['results']->where('vehicle_inf', $request_truck);
		}
			
		$request_type = session('emptytruck_search_key.type');
		if(isset($request_type)){
			$data['results']->where('vehicle_type1', $request_type);
		}

		$request_other_type = session('emptytruck_search_key.other_type');
		if(isset($request_other_type)){
			$data['results']->where('vehicle_type1_content', $request_other_type);
		}
		
		$request_spec_cond1 = session('emptytruck_search_key.spec_cond1');
		if(isset($request_spec_cond1)){
			$data['results']->where('vehicle_type2', $request_spec_cond1);
		}
		
		$request_spec_cond2 = session('emptytruck_search_key.spec_cond2');
		if(isset($request_spec_cond2)){
			$data['results']->where('vehicle_type3', $request_spec_cond2);
		}

		if($request->first_sortlist){
			session(['emptyTruck_first_sortlist' => $request->first_sortlist]);
			session(['emptyTruck_first_sortflag' => $request->first_sortflag]);
		}
		if($request->second_sortlist){
			session(['emptyTruck_second_sortlist' => $request->second_sortlist]);
			session(['emptyTruck_second_sortflag' => $request->second_sortflag]);
		}
		if($request->third_sortlist){
			session(['emptyTruck_third_sortlist' => $request->third_sortlist]);
			session(['emptyTruck_third_sortflag' => $request->third_sortflag]);
		}
		$first_sortlist = session('emptyTruck_first_sortlist');
		$first_sortflag = session('emptyTruck_first_sortflag');
		$second_sortlist = session('emptyTruck_second_sortlist');
		$second_sortflag = session('emptyTruck_second_sortflag');
		$third_sortlist = session('emptyTruck_third_sortlist');
		$third_sortflag = session('emptyTruck_third_sortflag');

		if (isset($request->page_num)) {
			session(['emptyTruck_page_number' => $request->page_num]);
			$page_number = session('emptyTruck_page_number');	
		} else {
			$page_number = 10;
		}
		
		if (isset($first_sortlist)) {
		
			if($first_sortflag == 'asc'){
				$data['results']->orderBy($first_sortlist, 'asc');
			}
			else{
				$data['results']->orderBy($first_sortlist, 'desc');
			}
		}
		if (isset($second_sortlist)) {
			if($second_sortflag == 'asc'){
				$data['results']->orderBy($second_sortlist, 'asc');
			}
			else{
				$data['results']->orderBy($second_sortlist, 'desc');
			}
		}
		if (isset($third_sortlist)) {
			if($third_sortflag == 'asc'){
				$data['results']->orderBy($third_sortlist, 'asc');
			}
			else{
				$data['results']->orderBy($third_sortlist, 'desc');
			}
		}

		if (isset($request->page_num)) {
			session(['emptytruck_page_num' => $request->page_num]);
			$page_num = session('emptytruck_page_num');	
		} else {
			$page_num = 10;
		}
		$data['page_num'] = $page_num;
		$data['results'] = $data['results']->Paginate($page_num);
		return view('pages.emptyTruck_search_info',$data);
	}
	public function simpleTruck_search(Request $request)
	{
		$data['luggage_num'] = session('luggage_num');
		$data['emptycar_num'] = session('emptycar_num');
		$data['page_num'] = 10;

		$loading_start = $request->get('loading_start');
		$loading_end = $request->get('loading_end');
		$drop_start = $request->get('drop_start');
		$drop_end = $request->get('drop_end');
		$data['results'] = Emptycar::query();
		if(isset($loading_start) && isset($loading_end)){
			$data['results']->where(function ($query) use ($loading_start, $loading_end) {
				if (!empty($loading_start) && !empty($loading_end)) {
					$query->where('emptycar_date', '>=', $loading_start);
					$query->where('emptycar_date', '<=', $loading_end);
				}
			});
		}
		$loading_space = $request->get('loading_space');
		$drop_space = $request->get('drop_space');
		if(isset($loading_space) && !empty($loading_space)){
			$data['results']->where('land_pos_loading','like', '%'.$loading_space.'%');
		}
		if(isset($drop_space) && !empty($drop_space)){
			$data['results']->where('land_pos_drop','like', '%'.$drop_space.'%');
		}
		if(isset($drop_start)){
			$data['results']->where(function ($query) use ($drop_start, $drop_end) {
				if (!empty($drop_start) && !empty($drop_end)) {
					$query->where('drop_date', '>=', $drop_start);
					$query->where('drop_date', '<=', $drop_end);
				}
			});
		}
		session(['emptycar_loading_country' => $request->get('loading_country')]);
		session(['emptycar_loading_space' => $loading_space]);
		session(['emptycar_drop_country' => $request->get('drop_country')]);
		session(['emptycar_drop_space' => $drop_space]);
		$data['results'] = $data['results']->Paginate(10);
		$data['corp_name'] = Auth::user()->corp_name;
		return view('pages.emptyTruck_info', $data);
	}
	public function edit_table($id)
	{
		$edit_data['edit_data'] = Emptycar::find($id);
		return view('pages.trucktable_edit', $edit_data);
	}
	public function update_table(Request $request, $id)
	{
		$luggage = Luggage::find($id);
		$luggage->loading_time = $request->get('loading_time');
		$luggage->loading_space = $request->get('loading_space');
		$luggage->drop_time = $request->get('drop_time');
		$luggage->drop_space = $request->get('drop_space');
		$luggage->vehicle_inf = $request->get('vehicle_inf');
		$luggage->vehicle_type1 = $request->get('vehicle_type1');
		$luggage->vehicle_type2 = $request->get('vehicle_type2');
		$luggage->vehicle_type3 = $request->get('vehicle_type3');
		$luggage->bigo = $request->get('bigo');
		$luggage->person_charge = $request->get('person_charge');
		$luggage->save();
		return redirect('/luggage_edit');
	}
	public function emptycarList()
	{
		$search = '';
		$emptycar = Emptycar::orderBy('id', 'desc')->Paginate(10);
		return view('backend.payroll.payroll-chart', compact('emptycar', 'search'));
	}
	public function emptycarDestroy($id)
	{
		$delete_emptycar = Emptycar::find($id);
		$delete_emptycar->delete();
		return back()->withMsg("正常に削除されました。");
	}
	public function adminSearch(Request $request)
	{
		$emptycar1 = Emptycar::query();
		$search = $request->search;
		$emptycar1->where('id', 'LIKE', '%' . $search . '%');
		$emptycar1->orwhere('emptycar_date', 'LIKE', '%' . $search . '%');
		$emptycar1->orwhere('emptycar_space', 'LIKE', '%' . $search . '%');
		$emptycar1->orwhere('land_pos_loading', 'LIKE', '%' . $search . '%');
		$emptycar1->orwhere('drop_date', 'LIKE', '%' . $search . '%');
		$emptycar1->orwhere('land_pos_drop', 'LIKE', '%' . $search . '%');
		$emptycar1->orwhere('vehicle_inf', 'LIKE', '%' . $search . '%');
		$emptycar1->orwhere('phone_number', 'LIKE', '%' . $search . '%');
		$emptycar = $emptycar1->Paginate(10);
		// var_dump($employee); exit;
		return view('backend.payroll.payroll-chart', compact('emptycar', 'search'));
	}
}
