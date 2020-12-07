<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Luggage;
use App\Emptycar;
use Session;

class LuggagesController extends Controller
{
    public function __construct()
    {
	}	
	public function member(){
        $data['luggage_num'] = session('luggage_num');
        $data['emptycar_num'] = session('emptycar_num');
        return view('pages.member',$data);
    }

    public function index()
    {
		$data['luggage_num'] = session('luggage_num');
		$data['emptycar_num'] = session('emptycar_num');
    	return view('pages.luggage_search',$data);
    }
    public function create()
    {
		
		$data['luggage_num'] = session('luggage_num');
		$data['emptycar_num'] = session('emptycar_num');
		return view('pages.luggage_store',$data);
    }
	public function store(Request $request)
	{
		$rules = [
			'loading_date' => 'required',
			'emptyplace' => 'required',
			'loading_city' => 'required',
			'drop_date' => 'required',
			'emptyOtherplace' => 'required',
			'drop_city' => 'required',
			'baggage_name' =>'required',
			'baggage_weight' => 'required|numeric',
			'fares_money' => 'required|numeric'
		];
		$customMessages = [
			'required' => 'ここを入力してください。',
			'numeric' => 'このカーンは数字である必要があります。'
		];
	
		$this->validate($request, $rules, $customMessages);
		$user = auth()->user();
		$user_id = $user->id;
		$luggage = new Luggage([
			'urgent_matter' => $request->get('emergency_case'),
			'user_id' => $user_id,
			'loading_date' => $request->get('loading_date'),
			'loading_time' => $request->get('loading_time'),
			'loading_space' => $request->get('emptyplace'),
			'loading_city' => $request->get('loading_city'),
			'drop_date' => $request->get('drop_date'),
			'drop_time' => $request->get('drop_time'),
			'drop_space' => $request->get('emptyOtherplace'),
			'drop_city' => $request->get('drop_city'),
			'baggage_name' => $request->get('baggage_name'),
			'baggage_weight' => $request->get('baggage_weight'),
			'vehicle_inf' => $request->get('vehicle_inf'),
			'vehicle_type1' => $request->get('vehicle_type1'),
			'vehicle_type1_content' => $request->get('vehicle_type1_content'),
			'vehicle_type2' => $request->get('vehicle_type2'),
			'vehicle_type3' => $request->get('vehicle_type3'),
			'bigo' => $request->get('bigo'),
			'fares_money' => $request->get('fares_money'),
			'is_consultation' => $request->get('is_consultation'),
			'phone_number' => '027-386-4141',
			'person_charge' => '担当'
			
		]);
		$luggage->save();
		session(['luggage_num' => Luggage::count()]);
 			return redirect('luggage_info');
	}
	public function show(Request $request)
	{
		$data['luggage_num'] = session('luggage_num');
		$data['emptycar_num'] = session('emptycar_num');
		
		if($request->first_sortlist){
			session(['first_sortlist' => $request->first_sortlist]);
			session(['first_sortflag' => $request->first_sortflag]);
		}
		if($request->second_sortlist){
			session(['second_sortlist' => $request->second_sortlist]);
			session(['second_sortflag' => $request->second_sortflag]);
		}
		if($request->third_sortlist){
			session(['third_sortlist' => $request->third_sortlist]);
			session(['third_sortflag' => $request->third_sortflag]);
		}
		$first_sortlist = session('first_sortlist');
		$first_sortflag = session('first_sortflag');
		$second_sortlist = session('second_sortlist');
		$second_sortflag = session('second_sortflag');
		$third_sortlist = session('third_sortlist');
		$third_sortflag = session('third_sortflag');
		if (isset($request->page_num)) {
			session(['page_number' => $request->page_num]);
			$page_number = session('page_number');	
		} else {
			$page_number = 10;
		}
		$showdata = DB::table('luggage')->join('users', 'luggage.user_id', '=', 'users.id');

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
			$data['datas'] = $showdata->Paginate($page_number);
			$data['page_num'] = $page_number;
		return view('pages.luggage_info', $data);
	}

	public function search(Request $request){
		$data['luggage_num'] = session('luggage_num');
		$data['emptycar_num'] = session('emptycar_num');
		$search_flag = $request->get('search_start');

		if(isset($search_flag) && $search_flag == 'search_start'){
			session(['search_key' => $request->post()]);
		}
		$data['datas'] = DB::table('luggage')->join('users', 'luggage.user_id', '=', 'users.id');
			
		$loading_start = session('search_key.loading_start');
		$loading_end = session('search_key.loading_end');
		if(isset($loading_start) && isset($loading_end)){
			$data['datas']->where('luggage.loading_date','>', session('search_key.loading_start'));
			$data['datas']->where('luggage.loading_date','<', session('search_key.loading_end'));
		}

		$beginplaces_str = session('search_key.beginplace');

		$beginplaces_str = substr($beginplaces_str, 0, -1);
		$beginplace_arr = explode(',', $beginplaces_str);
		if(isset($beginplace)){
			$data['datas'] = $data['datas']->whereIn('luggage.loading_space',$beginplace_arr);
		}

		$endplace_str = session('search_key.endplace');
		$endplace_str = substr($endplace_str, 0, -1);
		$endplace_arr = explode(',', $endplace_str);
		if(isset($endplace)){
			$data['datas'] = $data['datas']->whereIn('luggage.drop_space',$endplace_arr);
		}

		$drop_start = session('search_key.drop_start');
		$drop_end = session('search_key.drop_end');	
		if(isset($drop_start) && isset($drop_end)){
			$data['datas']->where('luggage.drop_date','>', $drop_start);
			$data['datas']->where('luggage.drop_date','<', $drop_end);
		}

		$vehicle_inf = session('search_key.vehicle_inf');
		if(isset($vehicle_inf)){
			$data['datas'] = $data['datas']->where('luggage.vehicle_inf',$vehicle_inf);
		}

		$vehicle_type1 = session('search_key.type');
		if(isset($vehicle_type1)){
			$data['datas'] = $data['datas']->where('luggage.vehicle_type1',$vehicle_type1);
		}	

		$vehicle_type1_content = session('search_key.othertype');
		if(isset($vehicle_type1_content)){
			$data['datas']->where('luggage.vehicle_type1_content',$vehicle_type1_content);
		}

		$vehicle_type2 = session('search_key.spec_cond1');
		if(isset($vehicle_type2)){
			$data['datas'] = $data['datas']->where('luggage.vehicle_type2',$vehicle_type2);
		}

		$vehicle_type3 = session('search_key.spec_cond2');
		if(isset($vehicle_type3)){
			$data['datas'] = $data['datas']->where('luggage.vehicle_type3',$vehicle_type3);
		}
		
		if($request->first_sortlist){
			session(['first_sortlist' => $request->first_sortlist]);
			session(['first_sortflag' => $request->first_sortflag]);
		}
		if($request->second_sortlist){
			session(['second_sortlist' => $request->second_sortlist]);
			session(['second_sortflag' => $request->second_sortflag]);
		}
		if($request->third_sortlist){
			session(['third_sortlist' => $request->third_sortlist]);
			session(['third_sortflag' => $request->third_sortflag]);
		}
		$first_sortlist = session('first_sortlist');
		$first_sortflag = session('first_sortflag');
		$second_sortlist = session('second_sortlist');
		$second_sortflag = session('second_sortflag');
		$third_sortlist = session('third_sortlist');
		$third_sortflag = session('third_sortflag');
		if (isset($request->page_num)) {
			session(['page_num' => $request->page_num]);
			$page_num = session('page_num');	
		} else {
			$page_num = 10;
		}
		
		if (isset($first_sortlist)) {
		
			if($first_sortflag == 'asc'){
				$data['datas']->orderBy($first_sortlist, 'asc');
			}
			else{
				$data['datas']->orderBy($first_sortlist, 'desc');
			}
		}
		if (isset($second_sortlist)) {
			if($second_sortflag == 'asc'){
				$data['datas']->orderBy($second_sortlist, 'asc');
			}
			else{
				$data['datas']->orderBy($second_sortlist, 'desc');
			}
		}
		if (isset($third_sortlist)) {
			if($third_sortflag == 'asc'){
				$data['datas']->orderBy($third_sortlist, 'asc');
			}
			else{
				$data['datas']->orderBy($third_sortlist, 'desc');
			}
		} 
		$data['datas'] = $data['datas']->Paginate($page_num);
		$data['page_num'] = $page_num;
		return view('pages.luggage_search_info',$data);
	}

	public function simple_search(Request $request){
		$loading_start = $request->get('loading_start');
		$loading_end = $request->get('loading_end');
		$drop_start = $request->get('drop_start');
		$drop_end = $request->get('drop_end');
		$data['luggage_num'] = session('luggage_num');
		$data['emptycar_num'] = session('emptycar_num');
		$data['datas'] = DB::table('luggage')->join('users', 'luggage.user_id', '=', 'users.id')
		->where(function($query) use ($loading_start,$loading_end){
			if(!empty($loading_start) && !empty($loading_end)){
				$query->where('luggage.loading_date','>=', $loading_start);
				$query->where('luggage.loading_date','<=', $loading_end);
			}
		})
		->orwhere('luggage.loading_space',$request->get('loading_space'))
		->orwhere('luggage.drop_space',$request->get('drop_space'))
		->orwhere(function($query) use ($drop_start,$drop_end){
			if(!empty($drop_start) && !empty($drop_end)){
				$query->where('luggage.drop_date','>=', $drop_start);
				$query->where('luggage.drop_date','<=', $drop_end);
			}
		})
		->Paginate(10);

		session(['luggage_loading_country' => $request->get('loading_country')]);
		session(['luggage_loading_space' => $request->get('loading_space')]);
		session(['luggage_drop_country' => $request->get('luggage_drop_country')]);
		session(['luggage_drop_space' => $request->get('drop_space')]);
		$data['corp_name'] = Auth::user()->corp_name;
		$data['page_num'] = 10;
		return view('pages.luggage_info', $data);
	}	
	public function edit()
	{
		$user_id = auth()->user()->id;
		$data['showdatas'] = Luggage::query()->where('user_id',$user_id)->Paginate(10);
		$luggage_num = Luggage::query()->where('user_id', $user_id)->count();
		$data['page_num'] = 10;
		session(['luggage_num' => $luggage_num]);
		$data['luggage_num'] = session('luggage_num');
		$data['emptycar_num'] = session('emptycar_num');
		return view('pages.luggage_edit', $data);
	}

	public function pageNum_get(Request $request)
	{
		if($request->first_sortlist){
			session(['first_sortlist' => $request->first_sortlist]);
			session(['first_sortflag' => $request->first_sortflag]);
		}
		if($request->second_sortlist){
			session(['second_sortlist' => $request->second_sortlist]);
			session(['second_sortflag' => $request->second_sortflag]);
		}
		if($request->third_sortlist){
			session(['third_sortlist' => $request->third_sortlist]);
			session(['third_sortflag' => $request->third_sortflag]);
		}
		$first_sortlist = session('first_sortlist');
		$first_sortflag = session('first_sortflag');
		$second_sortlist = session('second_sortlist');
		$second_sortflag = session('second_sortflag');
		$third_sortlist = session('third_sortlist');
		$third_sortflag = session('third_sortflag');
		if (isset($request->page_num)) {
			session(['page_number' => $request->page_num]);
			$page_number = session('page_number');	
		} else {
			$page_number = 10;
		}
		$user_id = auth()->user()->id;
		$showdata = Luggage::query()->where('user_id', $user_id);
		
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
		$data['showdatas'] = $showdata->Paginate($page_number);
		
		$data['luggage_num'] = session('luggage_num');
		$data['emptycar_num'] = session('emptycar_num');
		
		$data['page_num'] = $page_number;
		return view('pages.luggage_edit', $data);
	}

	public function update(Request $request, $id)
	{
	
		$request->validate([
			'loading_date' => 'required',
			'emptyplace' => 'required',
			'loading_city' => 'required',
			'drop_date' => 'required',
			'emptyOtherplace' => 'required',
			'drop_city' => 'required',
			'baggage_name' =>'required',
			'baggage_weight' => 'required|numeric',
			'fares_money' => 'required|numeric',
			'phone_number' => 'required|numeric',
			'person_charge' => 'required'
		]);

		$luggage = Luggage::find($id);
		$luggage->urgent_matter = $request->get('emergency_case');
		$luggage->loading_date = $request->get('loading_date');
		$luggage->loading_space = $request->get('emptyplace');
		$luggage->loading_city = $request->get('loading_city');
		$luggage->drop_date = $request->get('drop_date');
		$luggage->drop_city = $request->get('drop_city');
		$luggage->baggage_name = $request->get('baggage_name');
		$luggage->baggage_weight = $request->get('baggage_weight');
		$luggage->vehicle_type1_content = $request->get('vehicle_type1_content');
		$luggage->fares_money = $request->get('fares_money');
		$luggage->is_consultation = $request->get('is_consultation');
		$luggage->urgent_matter = $request->get('phone_number');
		$luggage->loading_time = $request->get('loading_time');
		$luggage->drop_time = $request->get('drop_time');
		$luggage->drop_space = $request->get('emptyOtherplace');
		$luggage->vehicle_inf = $request->get('vehicle_inf');
		$luggage->vehicle_type1 = $request->get('vehicle_type1');
		$luggage->vehicle_type2 = $request->get('vehicle_type2');
		$luggage->vehicle_type3 = $request->get('vehicle_type3');
		$luggage->bigo = $request->get('bigo');
		$luggage->person_charge = $request->get('person_charge');
		$luggage->save();
		return redirect('/luggage_edit');
	}
	public function destroy($id)
	{
		$luggage = Luggage::find($id);
		if ($luggage != null) {
			$luggage->delete();
			session(['luggage_num' => Luggage::count()]);
			return redirect('/luggage_edit');
		}
		return redirect('/luggage_edit');
	}
	public function destroy_all()
	{
		$user_id = auth()->user()->id;
		DB::table('luggage')->where('user_id', $user_id)->delete();
		session(['luggage_num' => 0]);
		return redirect('/luggage_edit');
	}
	public function edit_table($id){
		$data['luggage_num'] = session('luggage_num');
		$data['emptycar_num'] = session('emptycar_num');
		$data['editdata'] = Luggage::find($id);
		return view('pages.table_edit', $data);
	}

	public function luggageTableUpdate(Request $request,$id){
		$rules = [
			'loading_date' => 'required',
			'emptyplace' => 'required',
			'loading_city' => 'required',
			'drop_date' => 'required',
			'emptyOtherplace' => 'required',
			'drop_city' => 'required',
			'baggage_name' =>'required',
			'baggage_weight' => 'required|numeric',
			'fares_money' => 'required|numeric',
			'phone_number' => 'required',
			'person_charge' => 'required'
		];
		$customMessages = [
			'required' => 'ここを入力してください。',
			'numeric' => 'このカーンは数字である必要があります。'
		];
	
		$this->validate($request, $rules, $customMessages);

		$updateData = Luggage::find($id);
		$updateData->urgent_matter = $request->get('emergency_case');
		$updateData->loading_date = $request->get('loading_date');
		$updateData->loading_time = $request->get('loading_time');
		$updateData->loading_space = $request->get('emptyplace');
		$updateData->loading_city = $request->get('loading_city');
		$updateData->drop_date = $request->get('drop_date');
		$updateData->drop_time = $request->get('drop_time');
		$updateData->drop_space = $request->get('emptyOtherplace');
		$updateData->drop_city = $request->get('drop_city');
		$updateData->baggage_name = $request->get('baggage_name');
		$updateData->baggage_weight = $request->get('baggage_weight');
		$updateData->vehicle_inf = $request->get('vehicle_inf');
		$updateData->vehicle_type1 = $request->get('vehicle_type1');
		$updateData->vehicle_type1_content = $request->get('vehicle_type1_content');
		$updateData->vehicle_type2 = $request->get('vehicle_type2');
		$updateData->vehicle_type3 = $request->get('vehicle_type3');
		$updateData->bigo = $request->get('bigo');
		$updateData->fares_money = $request->get('fares_money');
		$updateData->is_consultation = $request->get('is_consultation');
		$updateData->phone_number = $request->get('phone_number');
		$updateData->person_charge = $request->get('person_charge');
		$updateData->save();
		return redirect('/luggage_edit');
	}
	public function luggageList()
	{
		$luggage = Luggage::orderBy('id', 'desc')->Paginate(10);
		$search = '';
		return view('backend.office.office', compact('luggage', 'search'));
	}
	public function luggageDestroy($id)
	{
		$delete_luggage = Luggage::find($id);
		$delete_luggage->delete();
		return back()->withMsg("正常に削除されました。");
	}
	public function adminSearch(Request $request)
    {
        $luggage1 = Luggage::query();
        $search = $request->search;
        $luggage1->where('id', 'LIKE', '%' .$search. '%');
        $luggage1->orwhere('loading_date', 'LIKE', '%' .$search. '%');
        $luggage1->orwhere('loading_space', 'LIKE', '%' .$search. '%');
        $luggage1->orwhere('loading_city', 'LIKE', '%' .$search. '%');
        $luggage1->orwhere('drop_date', 'LIKE', '%' .$search. '%');
        $luggage1->orwhere('drop_space', 'LIKE', '%' .$search. '%');
        $luggage1->orwhere('drop_city', 'LIKE', '%' .$search. '%');
        $luggage1->orwhere('baggage_name', 'LIKE', '%' .$search. '%');
        $luggage1->orwhere('baggage_weight', 'LIKE', '%' .$search. '%');
        $luggage1->orwhere('vehicle_inf', 'LIKE', '%' .$search. '%');
        $luggage1->orwhere('fares_money', 'LIKE', '%' .$search. '%');
        $luggage1->orwhere('phone_number', 'LIKE', '%' .$search. '%');
        $luggage = $luggage1->Paginate(10);
        // var_dump($employee); exit;
		return view('backend.office.office', compact('luggage','search'));        
	}
}
