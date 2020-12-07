@extends('layouts.app')

@section('content')
<div class="kt-portlet kt-portlet--height-fluid kt-current_info mr-4">
    @include('includes.info')
    <div class="kt-portlet__body luggage-header pb-0">
        <div class="luggage-search kt-align-center mb-3">
            <img class="kt-widget7__img tooltip_sty" src="{{asset('media/img/truck_icon-2.png')}}" alt="">
            空車情報検索結果
        </div>
    </div>
    <div class="kt-portlet__body luggage-header message mt-3 mb-3 pt-0">
        <div class="row">
            <div class="col-3"></div>
            <div class="search_message kt-align-center col-6 mt-4">
                <span class = "search_message_carry_blue">お電話にて問合番号・担当をお伝えください。</span>
            </div>
            <div class="col-3"></div>
        </div>
    </div>

    <!--begin::Portlet-->
    <!-- <div class="kt-portlet__body luggage_search"> -->
    <div class="kt-portlet__body luggage bg-grey">
        <div class="row">
            <div class="kt-portlet__head-label col-xl-4">
                <h3 class="kt-portlet__head-title">
                    空車情報登録件数：{{$results->total()}} 件
                </h3>
            </div>
            <div class="col-xl-6"></div>
            <div class=" col-xl-2 order-2 order-xl-1">
                <div class="kt-form kt-form--label-right">
                    <div class="kt-form__group kt-form__group--inline">
                        <div class="kt-form__control">
                            <form name="form_page" action="{{url('emptyTruck_info')}}" method="post">
                                @csrf
                                <label>表示数選択:</label>
                                <select class="form-control col-5 bootstrap-select" name="page_num" id="page_num">
                                    <option value="10" {{$page_num == 10 ? 'selected' : ''}}>10</option>
                                    <option value="20" {{$page_num == 20 ? 'selected' : ''}}>20</option>
                                    <option value="30" {{$page_num == 30 ? 'selected' : ''}}>30</option>
                                    <option value="50" {{$page_num == 50 ? 'selected' : ''}}>50</option>
                                    <option value="100" {{$page_num == 100 ? 'selected' : ''}}>100</option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="kt-portlet__body kt-form">
        <!--begin: Search Form -->
        <form action="{{url('emptyTruck_info')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-xl-1 sort_sign row  align-items-center">
                    並べ替え
                </div>
                <div class="col-xl-10 row align-items-center">
                    <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                        <div class="kt-form__group kt-form__group--inline check-sort">
                            <div class="kt-form__label filter_sort">
                                <label>1番目:</label>
                            </div>
                            <div class="kt-form__control first_control">
                                <select class="form-control bootstrap-select" name="first_sortlist">
                                    <option value="" style="display:none;">選択してください</option>
                                    <option value= "" selected>指定しない</option>
                                    <option value="id" {{session('emptyTruck_first_sortlist') == 'id'? 'selected':'' }}>問合番号</option>
                                    <option value="emptycar_time" {{session('emptyTruck_first_sortlist') == 'id'? 'selected':'' }}>担当</option>
                                    <option value="emptycar_date" {{session('emptyTruck_first_sortlist') == 'emptycar_date'? 'selected':'' }}>空車日時</option>
                                    <option value="land_pos_loading" {{session('emptyTruck_first_sortlist') == 'land_pos_loading'? 'selected':'' }}>積可能地</option>
                                    <option value="drop_date" {{session('emptyTruck_first_sortlist') == 'drop_date'? 'selected':'' }}>荷降日時</option>
                                    <option value="land_pos_drop" {{session('emptyTruck_first_sortlist') == 'land_pos_drop'? 'selected':'' }}>降可能地</option>
                                    <option value="vehicle_inf" {{session('emptyTruck_first_sortlist') == 'vehicle_inf'? 'selected':'' }}>車輌</option>
                                    <option value="vehicle_type1" {{session('emptyTruck_first_sortlist') == 'vehicle_type1'? 'selected':'' }}>種類１</option>
                                    <option value="vehicle_type2" {{session('emptyTruck_first_sortlist') == 'vehicle_type2'? 'selected':'' }}>種類２</option>
                                    <option value="vehicle_type3" {{session('emptyTruck_first_sortlist') == 'vehicle_type3'? 'selected':'' }}>種類3</option>
                                </select>
                            </div>
                            <div class="kt-form__control second_control">
                                <select class="form-control bootstrap-select" name="first_sortflag">
                                    <option value="" style="display:none;">選択してください</option>
                                    <option value="asc" {{session('emptyTruck_first_sortflag') == 'asc'? 'selected':'' }}>昇順</option>
                                    <option value="desc" {{session('emptyTruck_first_sortflag') == 'desc'? 'selected':'' }}>降順</option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                        <div class="kt-form__group kt-form__group--inline check-sort">
                            <div class="kt-form__label filter_sort">
                                <label>2番目:</label>
                            </div>
                            <div class="kt-form__control first_control">
                                <select class="form-control bootstrap-select" name="second_sortlist">
                                    <option value="" style="display:none;">選択してください</option>
                                    <option value= "" selected>指定しない</option>
                                    <option value="id" {{session('emptyTruck_second_sortlist') == 'id'? 'selected':'' }}>問合番号</option>
                                    <option value="emptycar_time" {{session('emptyTruck_second_sortlist') == 'id'? 'selected':'' }}>担当</option>
                                    <option value="emptycar_date" {{session('emptyTruck_second_sortlist') == 'emptycar_date'? 'selected':'' }}>空車日時</option>
                                    <option value="land_pos_loading" {{session('emptyTruck_second_sortlist') == 'land_pos_loading'? 'selected':'' }}>積可能地</option>
                                    <option value="drop_date" {{session('emptyTruck_second_sortlist') == 'drop_date'? 'selected':'' }}>荷降日時</option>
                                    <option value="land_pos_drop" {{session('emptyTruck_second_sortlist') == 'land_pos_drop'? 'selected':'' }}>降可能地</option>
                                    <option value="vehicle_inf" {{session('emptyTruck_second_sortlist') == 'vehicle_inf'? 'selected':'' }}>車輌</option>
                                    <option value="vehicle_type1" {{session('emptyTruck_second_sortlist') == 'vehicle_type1'? 'selected':'' }}>種類１</option>
                                    <option value="vehicle_type2" {{session('emptyTruck_second_sortlist') == 'vehicle_type2'? 'selected':'' }}>種類２</option>
                                    <option value="vehicle_type3" {{session('emptyTruck_second_sortlist') == 'vehicle_type3'? 'selected':'' }}>種類3</option>
                                </select>
                            </div>
                            <div class="kt-form__control second_control">
                                <select class="form-control bootstrap-select" name="second_sortflag">
                                    <option value="" style="display:none;">選択してください</option>
                                    <option value="asc" {{session('emptyTruck_second_sortflag') == 'asc'? 'selected':'' }}>昇順</option>
                                    <option value="desc" {{session('emptyTruck_second_sortflag') == 'desc'? 'selected':'' }}>降順</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                        <div class="kt-form__group kt-form__group--inline check-sort">
                            <div class="kt-form__label filter_sort">
                                <label>3番目:</label>
                            </div>
                            <div class="kt-form__control first_control">
                                <select class="form-control bootstrap-select" name="third_sortlist">
                                    <option value="" style="display:none;">選択してください</option>
                                    <option value= "" selected>指定しない</option>
                                    <option value="id" {{session('emptyTruck_third_sortlist') == 'id'? 'selected':'' }}>問合番号</option>
                                    <option value="emptycar_time" {{session('emptyTruck_third_sortlist') == 'id'? 'selected':'' }}>担当</option>
                                    <option value="emptycar_date" {{session('emptyTruck_third_sortlist') == 'emptycar_date'? 'selected':'' }}>空車日時</option>
                                    <option value="land_pos_loading" {{session('emptyTruck_third_sortlist') == 'land_pos_loading'? 'selected':'' }}>積可能地</option>
                                    <option value="drop_date" {{session('emptyTruck_third_sortlist') == 'drop_date'? 'selected':'' }}>荷降日時</option>
                                    <option value="land_pos_drop" {{session('emptyTruck_third_sortlist') == 'land_pos_drop'? 'selected':'' }}>降可能地</option>
                                    <option value="vehicle_inf" {{session('emptyTruck_third_sortlist') == 'vehicle_inf'? 'selected':'' }}>車輌</option>
                                    <option value="vehicle_type1" {{session('emptyTruck_third_sortlist') == 'vehicle_type1'? 'selected':'' }}>種類１</option>
                                    <option value="vehicle_type2" {{session('emptyTruck_third_sortlist') == 'vehicle_type2'? 'selected':'' }}>種類２</option>
                                    <option value="vehicle_type3" {{session('emptyTruck_third_sortlist') == 'vehicle_type3'? 'selected':'' }}>種類3</option>
                                </select>
                            </div>
                            <div class="kt-form__control second_control">
                                <select class="form-control bootstrap-select" name="third_sortflag">
                                    <option value="" style="display:none;">選択してください</option>
                                    <option value="asc" {{session('emptyTruck_third_sortflag') == 'asc'? 'selected':'' }}>昇順</option>
                                    <option value="desc" {{session('emptyTruck_third_sortflag') == 'desc'? 'selected':'' }}>降順</option>
                                </select>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-xl-1">
                    <div class="kt-margin-b-20-tablet-and-mobile">
                        <button type="submit" class="btn btn-brand btn-elevate btn-pill-blue"> 並べ替え</button>
                    </div>
                </div>
            </div>
        </form>
        <!--end: Search Form -->
    </div>
    <div class="kt-portlet__body kt-portlet__body--fit">

        <!--begin: Datatable -->
            <table class="table table-bordered ">
                <thead class="blue">
                    <tr>
                        <th>問合番号</th>
                        <th>荷主会社</th>
                        <th>担当</th>
                        <th>TEL</th>
                        <th>空車日時</th>
                        <th>空車地</th>
                        <th>積可能地</th>
                        <th>荷降日時</th>
                        <th>降可能地</th>
                        <th>車輌</th>
                        <th>種類１</th>
                        <th>種類２</th>
                        <th>種類３</th>
                        <th>備考</th>
                        <th>入力日時</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                        $add_number = 0;
                        if(isset($_GET['page']))
                        {
                            $page = $_GET['page'];
                            $add_number = 10*($page-1);
                        }

                    @endphp
                        @foreach($results as $result)
                        <tr>
                            <td>{{$add_number + $loop->iteration}}</td>
                            <td>テラテクニカル</td>
                            <td>{{$result->person_charge}}</td>
                            <td>{{$result->phone_number}}</td>
                            <td>{{$result->emptycar_date}}</td>
                            <td>{{$result->emptycar_space}}</td>
                            <td>{{$result->land_pos_loading}}</td>
                            <td>{{$result->drop_date}}</td>
                            <td>{{$result->land_pos_drop}}</td>
                            <td>{{$result->vehicle_inf}}</td>
                            <td>{{$result->vehicle_type1}}</td>
                            <td>{{$result->vehicle_type2}}</td>
                            <td>{{$result->vehicle_type3}}</td>
                            <td>{{$result->bigo}}</td>
                            <td>{{$result->created_at}}</td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
            {{$results->onEachSide(1)->links('vendor.pagination.default') }}

            <div class="kt-action_info__content kt-align-center mt-4">
                <div class="kt-widget5_section-right">
                    <a href="{{url('emtpyTruck_create')}}">
                        <button type="button" class="btn  btn-wide luggage-search-btn" style = "width:20%">条件入力に戻る</button>
                    </a>
                </div>
            </div>
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
