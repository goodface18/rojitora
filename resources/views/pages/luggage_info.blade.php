@extends('layouts.app')

@section('content')

<div class="kt-portlet kt-portlet--height-fluid kt-current_info mr-4">
    @include('includes.info')
    <div class="kt-portlet__body">
        <div class="luggage-header">
            <div class="luggage-search kt-align-center mb-3">
                <img class="kt-widget7__img tooltip_sty" src="{{asset('media/img/package01_icon.png')}}" alt="">
                荷物情報検索結果
            </div>
            <div class="message row mt-3 mb-5">
                <div class="col-3"></div>
                <div class="search_message carry kt-align-center col-6 mt-4">
                    <span class = "search_message_carry">お電話にて問合番号・担当をお伝えください。</span>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
        <!--begin::Portlet-->
        <div class="luggage_search">

            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head luggage row align-items-center">
                    <div class="kt-portlet__head-label col-xl-4">
                        <h3 class="kt-portlet__head-title">
                            荷物情報登録件数:{{$datas->total()}} 件
                        </h3>
                    </div>
                    <div class="col-xl-6"></div>
                    <div class=" col-xl-2 order-2 order-xl-1">
                        <div class="kt-form kt-form--label-right">
                            <div class="kt-form__group kt-form__group--inline">
                                <div class="kt-form__control">
                                    <form name="form_page" action="{{url('luggage_info')}}" method="post">
                                        @csrf
                                        <!-- <input type="hidden" name="search_key" value="{{serialize(session('search_key'))}}"> -->
                                        <label>表示数選択:</label>
                                        <select class="form-control col-5 bootstrap-select" name="page_num" id="page_num">
                                            <option value="10" {{ $page_num == 10 ? 'selected' : '' }} >10</option>
                                            <option value="20" {{ $page_num == 20 ? 'selected' : '' }} >20</option>
                                            <option value="30" {{ $page_num == 30 ? 'selected' : '' }} >30</option>
                                            <option value="50" {{ $page_num == 50 ? 'selected' : '' }} >50</option>
                                            <option value="100" {{ $page_num == 100 ? 'selected' : '' }} >100</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">

                    <!--begin: Search Form -->
                    <div class="kt-form kt-form--label-right">
                        <form action="{{url('luggage_info')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-xl-1 sort_sign col">
                                    <label class="col text-center">並べ替え</label>
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
                                    <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
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
                                    <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
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
                                <div class="col-xl-1">
                                    <div class="kt-margin-b-20-tablet-and-mobile">
                                        <button type="submit" class="btn btn-brand btn-elevate btn-pill"> 並べ替え</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!--end: Search Form -->
                </div>
                <div class="kt-portlet__body kt-portlet__body--fit">
                    <div class="row">
                        <table class="table table-bordered luggage_edit">
                            <thead >
                                <tr>
                                    <th>問合番号</th>
                                    <th>荷主会社</th>
                                    <th>担当</th>
                                    <th>TEL</th>
                                    <th>積込日時</th>
                                    <th>積地</th>
                                    <th>荷降日時</th>
                                    <th>降地</th>
                                    <th>車輌</th>
                                    <th>種類１</th>
                                    <th>種類２</th>
                                    <th>種類３</th>
                                    <th>荷物</th>
                                    <th>備考</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $number = 0;
                                    if(isset($_GET['page']))
                                        {
                                            $page = $_GET['page'];
                                            $number = 10*($page-1);
                                        }
                                @endphp

                                @foreach($datas as $data)
                                    <tr>
                                        <td>{{$loop->iteration + $number}}</td>
                                        <td>テラテクニカル</td>
                                        <td>{{$data->person_charge}}</td>
                                        <td>{{$data->phone_number}}</td>
                                        <td>{{$data->loading_date}}</td>
                                        <td>{{$data->loading_space}}</td>
                                        <td>{{$data->drop_date}}</td>
                                        <td>{{$data->drop_space}}</td>
                                        <td>{{$data->vehicle_inf}}</td>
                                        <td>{{$data->vehicle_type1}}</td>
                                        <td>{{$data->vehicle_type2}}</td>
                                        <td>{{$data->vehicle_type3}}</td>
                                        <td>{{$data->baggage_name}}</td>
                                        <td>{{$data->bigo}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $datas->onEachSide(1)->links('vendor.pagination.default') }}
                    <div class="kt-action_info__content kt-align-center mt-4">
                        <div class="kt-widget5_section-left">
                        <a href="{{url('luggage_create')}}"> <button type="button" class="btn  btn-wide luggage-search-btn" style = "width:20%;">条件入力に戻る</button></a>
                        </div>
                    </div>
                    <!--end: Datatable -->
                </div>
            </div>
        </div>
        <!--end::Portlet-->
    </div>
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
