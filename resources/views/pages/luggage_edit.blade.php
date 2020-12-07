@extends('layouts.app')

@section('content')
<div class="kt-portlet kt-portlet--height-fluid kt-current_info mr-4">
    @include('includes.info')
    <div class="kt-portlet__body luggage-header luggage-search kt-align-center mb-3">
        <div class="luggage-header luggage-search kt-align-center mb-3">
            <img class="kt-widget7__img tooltip_sty" src="{{asset('media/img/package01_icon.png')}}" alt="">
            荷物情報修正・削除
        </div>
    </div>
    <div class="kt-portlet__body bg-grey pt-3 pb-3">
        <div class="row">
            <div class="kt-portlet__head-label col-lg-6">
                <h3 class="kt-portlet__head-title">
                    荷物情報登録件数：{{$luggage_num}} 件
                </h3>
            </div>
            <div class="col-lg-4"></div>
            <div class="col-lg-2 text-right">
                <form name="form_page" action="{{url('luggage_edit')}}" method="post">
                    @csrf
                    <label>表示数選択:</label>
                    <select class="form-control col-5 bootstrap-select" name="page_num" id="page_num" value="{{ old('page_num')}}">
                        <option value="10" @if(isset($page_num) && $page_num=="10" ){{"selected"}} @endif>10</option>
                        <option value="20" @if(isset($page_num) && $page_num=="20" ){{"selected"}} @endif>20</option>
                        <option value="30" @if(isset($page_num) && $page_num=="30" ){{"selected"}} @endif>30</option>
                        <option value="50" @if(isset($page_num) && $page_num=="50" ){{"selected"}} @endif>50</option>
                        <option value="100" @if(isset($page_num) && $page_num=="100" ){{"selected"}} @endif>100</option>
                    </select>
                </form>
            </div>
        </div>
    </div>
    <!--begin::Portlet-->
    <div class="kt-portlet__body kt-form pr-0 pl-0 pt-2 pb-1">
        <!--begin: Search Form -->
        <form action="{{url('luggage_edit')}}" method="post">
            @csrf
            <div class="row ml-0">
                <div class="col-lg-1 bg-custom-grey form-control text-center">
                    並べ替え
                </div>
                <div class="col-lg-10 row">
                    <div class="col-md-4">
                        <div class="kt-form__group kt-form__group--inline check-sort">
                            <div class="kt-form__label filter_sort">
                                <label>1番目:</label>
                            </div>
                            <div class="kt-form__control first_control">

                                <select class="form-control bootstrap-select" name="first_sortlist">
                                    <option value="" style="display:none;">選択してください</option>
                                    <option value="" selected>指定しない</option>
                                    <option value="id" {{session('first_sortlist') == 'id'? 'selected':'' }}>問合番号</option>
                                    <option value="person_charge" {{session('first_sortlist') == 'person_charge'? 'selected':'' }}>担当</option>
                                    <option value="loading_date" {{session('first_sortlist') == 'loading_date'? 'selected':'' }}>積込日時</option>
                                    <option value="loading_space" {{session('first_sortlist') == 'loading_space'? 'selected':'' }}>積地</option>
                                    <option value="drop_date" {{session('first_sortlist') == 'drop_date'? 'selected':'' }}>荷降日時</option>
                                    <option value="drop_space" {{session('first_sortlist') == 'drop_space'? 'selected':'' }}>降地</option>
                                    <option value="vehicle_inf" {{session('first_sortlist') == 'vehicle_inf'? 'selected':'' }}>車輌</option>
                                    <option value="vehicle_type1" {{session('first_sortlist') == 'vehicle_type1'? 'selected':'' }}>種類１</option>
                                    <option value="vehicle_type2" {{session('first_sortlist') == 'vehicle_type2'? 'selected':'' }}>種類２</option>
                                    <option value="vehicle_type3" {{session('first_sortlist') == 'vehicle_type3'? 'selected':'' }}>種類3</option>
                                </select>
                            </div>
                            <div class="kt-form__control second_control">
                                <select class="form-control bootstrap-select" name="first_sortflag">
                                    <option value="" style="display:none;">選択してください</option>
                                    <option value="asc" {{session('first_sortflag') == 'asc'? 'selected':'' }}>昇順</option>
                                    <option value="desc" {{session('first_sortflag') == 'desc'? 'selected':'' }}>降順</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="kt-form__group kt-form__group--inline check-sort">
                            <div class="kt-form__label filter_sort">
                                <label>2番目:</label>
                            </div>
                            <div class="kt-form__control first_control">
                                <select class="form-control bootstrap-select" name="second_sortlist">
                                    <option value="" style="display:none;">選択してください</option>
                                    <option value="" selected>指定しない</option>
                                    <option value="id" {{session('second_sortlist') == 'id'? 'selected':'' }}>問合番号</option>
                                    <option value="person_charge" {{session('second_sortlist') == 'person_charge'? 'selected':'' }}>担当</option>
                                    <option value="loading_date" {{session('second_sortlist') == 'loading_date'? 'selected':'' }}>積込日時</option>
                                    <option value="loading_space" {{session('second_sortlist') == 'loading_space'? 'selected':'' }}>積地</option>
                                    <option value="drop_date" {{session('second_sortlist') == 'drop_date'? 'selected':'' }}>荷降日時</option>
                                    <option value="drop_space" {{session('second_sortlist') == 'drop_space'? 'selected':'' }}>降地</option>
                                    <option value="vehicle_inf" {{session('second_sortlist') == 'vehicle_inf'? 'selected':'' }}>車輌</option>
                                    <option value="vehicle_type1" {{session('second_sortlist') == 'vehicle_type1'? 'selected':'' }}>種類１</option>
                                    <option value="vehicle_type2" {{session('second_sortlist') == 'vehicle_type2'? 'selected':'' }}>種類２</option>
                                    <option value="vehicle_type3" {{session('second_sortlist') == 'vehicle_type3'? 'selected':'' }}>種類3</option>
                                </select>
                            </div>
                            <div class="kt-form__control second_control">
                                <select class="form-control bootstrap-select" name="second_sortflag">
                                    <option value="" style="display:none;">選択してください</option>
                                    <option value="asc" {{session('second_sortflag') == 'asc'? 'selected':'' }}>昇順</option>
                                    <option value="desc" {{session('second_sortflag') == 'desc'? 'selected':'' }}>降順</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="kt-form__group kt-form__group--inline check-sort">
                            <div class="kt-form__label filter_sort">
                                <label>3番目:</label>
                            </div>
                            <div class="kt-form__control first_control">
                                <select class="form-control bootstrap-select" name="third_sortlist">
                                    <option value="" style="display:none;">選択してください</option>
                                    <option value="" selected>指定しない</option>
                                    <option value="id" {{session('third_sortlist') == 'id'? 'selected':'' }}>問合番号</option>
                                    <option value="person_charge" {{session('third_sortlist') == 'person_charge'? 'selected':'' }}>担当</option>
                                    <option value="loading_date" {{session('third_sortlist') == 'loading_date'? 'selected':'' }}>積込日時</option>
                                    <option value="loading_space" {{session('third_sortlist') == 'loading_space'? 'selected':'' }}>積地</option>
                                    <option value="drop_date" {{session('third_sortlist') == 'drop_date'? 'selected':'' }}>荷降日時</option>
                                    <option value="drop_space" {{session('third_sortlist') == 'drop_space'? 'selected':'' }}>降地</option>
                                    <option value="vehicle_inf" {{session('third_sortlist') == 'vehicle_inf'? 'selected':'' }}>車輌</option>
                                    <option value="vehicle_type1" {{session('third_sortlist') == 'vehicle_type1'? 'selected':'' }}>種類１</option>
                                    <option value="vehicle_type2" {{session('third_sortlist') == 'vehicle_type2'? 'selected':'' }}>種類２</option>
                                    <option value="vehicle_type3" {{session('third_sortlist') == 'vehicle_type3'? 'selected':'' }}>種類3</option>
                                </select>
                            </div>
                            <div class="kt-form__control second_control">
                                <select class="form-control bootstrap-select" name="third_sortflag">
                                    <option value="" style="display:none;">選択してください</option>
                                    <option value="asc" {{session('third_sortflag') == 'asc'? 'selected':'' }}>昇順</option>
                                    <option value="desc" {{session('third_sortflag') == 'desc'? 'selected':'' }}>降順</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1 pl-0 pr-0 text-right">
                    <button type="submit" class="btn btn-brand btn-pill btn-yellow"> 並べ替え</button>
                </div>
            </div>
        </form>
    </div>
    <div class="kt-portlet__body pt-0 pb-2 pl-0">
        <div class="row">
            <div class="col-xl-2">
                <a class="btn btn-info" href="{{url('/luggage/all_delete')}}" role="button">一消去</a>
            </div>
        </div>
    </div>
    <div class="kt-portlet__body kt-portlet__body--fit">

        <!--begin: Datatable -->
        <table class="table table-bordered luggage_edit">
            <thead>
                <tr>
                    <th>一斉消去</th>
                    <th>消去</th>
                    <th>修正</th>
                    <th>問合番号</th>
                    <th>積込日時</th>
                    <th>積地</th>
                    <th>荷降日時</th>
                    <th>降地</th>
                    <th>車輌</th>
                    <th>種類１</th>
                    <th>種類２</th>
                    <th>種類３</th>
                    <th>担当</th>
                    <th>備考</th>
                </tr>
            </thead>
            <tbody>
                @php

                $add_number = 0;
                if(isset($_GET['page']))
                {
                $page = $_GET['page'];
                $add_number = $page_num * ($page-1);
                }

                @endphp
                @foreach ($showdatas as $showdata)
                <tr>
                    <td><a class="btn btn-danger" href="{{url('/luggage/all_delete')}}" role="button">All Delete</a></td>
                    <td><a class="btn btn-danger deleteRecord" href="{{url('/luggage/'.$showdata->id.'/delete')}}" role="button">Row Delete</a></td>
                    <td><a class="btn btn-info" href="{{url('/luggage/'.$showdata->id.'/edit')}}" zrole="button">Edit</a></td>
                    <td>{{$loop->iteration + $add_number }}</td>
                    <td>{{$showdata->loading_date}}</td>
                    <td>{{$showdata->loading_space}}</td>
                    <td>{{$showdata->drop_date}}</td>
                    <td>{{$showdata->drop_space}}</td>
                    <td>{{$showdata->vehicle_type}}</td>
                    <td>{{$showdata->vehicle_type1}}</td>
                    <td>{{$showdata->vehicle_type2}}</td>
                    <td>{{$showdata->vehicle_type3}}</td>
                    <td>{{$showdata->person_charge}}</td>
                    <td>{{$showdata->user_id}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $showdatas->onEachSide(1)->links('vendor.pagination.default') }}

        <!--end: Datatable -->
    </div>
    <!--end::Portlet-->
</div>
@endsection

@section('sidebar')
  @auth
    @include('includes.sidebar02')
  @else
    @include('includes.sidebar01')
  @endauth
@endsection
@section('scripts')
jQuery(document).ready(function(){
$("#page_num").change(function(){
document.form_page.submit();
});
});
@stop
