@extends('layouts.app')

@section('content')
<div class="kt-portlet kt-portlet--height-fluid kt-current_info mr-4">
    @include('includes.info')
    <!-- <div class="kt-portlet__body"> -->
    <div class="kt-portlet__body">
        <div class="kt-widget5__content">
            <div class="row">
                <div class="col-4 text-right"></div>
                <div class="col-4 text-center"><h2 class="kt-widget5__normal text-dark"><img src="{{asset('media/img/box.png')}}" class="mr-3">荷物情報新規登録
                    </h2>
                </div>
                <div class="col-4 text-right mt-4">
                        <label class="kt-radio kt-radio--brand text-dark kt-font-lg">
                            <i class="fa fa-circle icon" style="font-size:11px;color:#ff6600"></i>必須
                        </label>
                </div>
            </div>
        </div>
    </div>
        <!-- </div> -->
    <div class="kt-portlet__body bg-grey text-dark">
        <div class="kt-form mt-5">
            <div class="kt-portlet__body">
                <form class="kt-form form_style" action="/luggage_store" method="post">
                    @csrf
                    <input type="hidden" name="emptyplace" value="">
                    <input type="hidden" name="emptyOtherplace" value="">
                    <div class="form-group">
                        <label class="kt-checkbox kt-checkbox--brand kt-font-xl text-dark">
                            <input type="checkbox" name="emergency_case">緊急案件
                                <span class="bg-white border-dark"></span>
                        </label>
                        <label class="form-group kt-font-xl text-dark ml-5">
                            ※大至急手配しなくてはいけない案件の場合はチェックしてください。
                        </label>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group mr-5">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <label class="kt-font-xl"><i class="fa fa-circle icon mt-n3" style="font-size:11px;color:#ff6600"></i>積日時
                                            </label>
                                            <div class="input-group top-z-index">
                                                <input type="text" class="col form-control kt-font-xl input_style" data-date-format="yyyy-mm-dd" id="kt_datepicker_1" name="loading_date" value="{{old('loading_date')}}">
                                                @if ($errors->has("loading_date"))
                                                    <h5 style="color:#e96565">{{$errors->first("loading_date")}}</h5>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <label class="kt-font-xl">時間
                                            </label>
                                            <select class="col form-control input_style kt-font-xl" id="loading_time" name="loading_time">
                                                <option {{old('loading_time') === '0' ? 'selected' : ''}} value="0">0時</option>
                                                <option {{old('loading_time') === '1' ? 'selected' : ''}} value="1">1時</option>
                                                <option {{old('loading_time') === '2' ? 'selected' : ''}} value="2">2時</option>
                                                <option {{old('loading_time') === '3' ? 'selected' : ''}} value="3">3時</option>
                                                <option {{old('loading_time') === '4' ? 'selected' : ''}} value="4">4時</option>
                                                <option {{old('loading_time') === '5' ? 'selected' : ''}} value="5">5時</option>
                                                <option {{old('loading_time') === '6' ? 'selected' : ''}} value="6">6時</option>
                                                <option {{old('loading_time') === '7' ? 'selected' : ''}} value="7">7時</option>
                                                <option {{old('loading_time') === '8' ? 'selected' : ''}} value="8">8時</option>
                                                <option {{old('loading_time') === '9' ? 'selected' : ''}} value="9">9時</option>
                                                <option {{old('loading_time') === '10' ? 'selected' : ''}} value="10">10時</option>
                                                <option {{old('loading_time') === '11' ? 'selected' : ''}} value="11">11時</option>
                                                <option {{old('loading_time') === '12' ? 'selected' : ''}} value="12">12時</option>
                                                <option {{old('loading_time') === '13' ? 'selected' : ''}} value="13">13時</option>
                                                <option {{old('loading_time') === '14' ? 'selected' : ''}} value="14">14時</option>
                                                <option {{old('loading_time') === '15' ? 'selected' : ''}} value="15">15時</option>
                                                <option {{old('loading_time') === '16' ? 'selected' : ''}} value="16">16時</option>
                                                <option {{old('loading_time') === '17' ? 'selected' : ''}} value="17">17時</option>
                                                <option {{old('loading_time') === '18' ? 'selected' : ''}} value="18">18時</option>
                                                <option {{old('loading_time') === '19' ? 'selected' : ''}} value="19">19時</option>
                                                <option {{old('loading_time') === '20' ? 'selected' : ''}} value="20">20時</option>
                                                <option {{old('loading_time') === '21' ? 'selected' : ''}} value="21">21時</option>
                                                <option {{old('loading_time') === '22' ? 'selected' : ''}} value="22">22時</option>
                                                <option {{old('loading_time') === '23' ? 'selected' : ''}} value="23">23時</option>
                                                <option {{old('loading_time') === '30' ? 'selected' : ''}} value="30">午前</option>
                                                <option {{old('loading_time') === '31' ? 'selected' : ''}} value="31">午後</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mr-5">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <label class="kt-font-xl"><i class="fa fa-circle icon mt-n3" style="font-size:11px; color:#ff6600"></i>降日時
                                            </label>
                                            <div class="input-group top-z-index">
                                            <input type="text" class="col form-control kt-font-xl input_style" data-date-format="yyyy-mm-dd" id="kt_datepicker_1" name="drop_date" value="{{old('drop_date')}}">
                                            @if ($errors->has("drop_date"))
                                                <h5 style="color:#e96565">{{$errors->first("drop_date")}}</h5>
                                            @endif
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <label class="kt-font-xl">時間
                                            </label>
                                            <select class="col form-control input_style kt-font-xl" id="drop_time" name="drop_time">
                                            <option {{old('drop_time') === '0' ? 'selected' : ''}} value="0">0時</option>
                                                <option {{old('drop_time') === '1' ? 'selected' : ''}} value="1">1時</option>
                                                <option {{old('drop_time') === '2' ? 'selected' : ''}} value="2">2時</option>
                                                <option {{old('drop_time') === '3' ? 'selected' : ''}} value="3">3時</option>
                                                <option {{old('drop_time') === '4' ? 'selected' : ''}} value="4">4時</option>
                                                <option {{old('drop_time') === '5' ? 'selected' : ''}} value="5">5時</option>
                                                <option {{old('drop_time') === '6' ? 'selected' : ''}} value="6">6時</option>
                                                <option {{old('drop_time') === '7' ? 'selected' : ''}} value="7">7時</option>
                                                <option {{old('drop_time') === '8' ? 'selected' : ''}} value="8">8時</option>
                                                <option {{old('drop_time') === '9' ? 'selected' : ''}} value="9">9時</option>
                                                <option {{old('drop_time') === '10' ? 'selected' : ''}} value="10">10時</option>
                                                <option {{old('drop_time') === '11' ? 'selected' : ''}} value="11">11時</option>
                                                <option {{old('drop_time') === '12' ? 'selected' : ''}} value="12">12時</option>
                                                <option {{old('drop_time') === '13' ? 'selected' : ''}} value="13">13時</option>
                                                <option {{old('drop_time') === '14' ? 'selected' : ''}} value="14">14時</option>
                                                <option {{old('drop_time') === '15' ? 'selected' : ''}} value="15">15時</option>
                                                <option {{old('drop_time') === '16' ? 'selected' : ''}} value="16">16時</option>
                                                <option {{old('drop_time') === '17' ? 'selected' : ''}} value="17">17時</option>
                                                <option {{old('drop_time') === '18' ? 'selected' : ''}} value="18">18時</option>
                                                <option {{old('drop_time') === '19' ? 'selected' : ''}} value="19">19時</option>
                                                <option {{old('drop_time') === '20' ? 'selected' : ''}} value="20">20時</option>
                                                <option {{old('drop_time') === '21' ? 'selected' : ''}} value="21">21時</option>
                                                <option {{old('drop_time') === '22' ? 'selected' : ''}} value="22">22時</option>
                                                <option {{old('drop_time') === '23' ? 'selected' : ''}} value="23">23時</option>
                                                <option {{old('drop_time') === '30' ? 'selected' : ''}} value="30">午前</option>
                                                <option {{old('drop_time') === '31' ? 'selected' : ''}} value="31">午後</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group ml-5">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <label class="kt-font-xl"><i class="fa fa-circle icon mt-n3" style="font-size:11px; color:#ff6600"></i>積地
                                            </label>
                                            <div class="input-group">
                                                <div class="box_empty form-control kt-font-xl input_style" id="box_empty">
                                                <!-- @if(!empty($_POST["emptyplace"])) -->
                                                    <input type="button" id="empty01" value="{{old('emptyplace')}}" class="btn btn-danger">
                                                <!-- @endif -->
                                                </div>
                                            </div>
                                            @if ($errors->has("emptyplace"))
                                                <h5 style="color:#e96565">{{$errors->first("emptyplace")}}</h5>
                                            @endif
                                        </div>
                                        <div class="col-xl-6">
                                            <label class="kt-font-xl">市区町村
                                            </label>
                                            <div class="input-group">
                                                <input class="col form-control kt-font-xl input_style" name="loading_city" value="{{old('loading_city')}}">
                                            </div>
                                            @if ($errors->has("loading_city"))
                                                <h5 style="color:#e96565">{{$errors->first("loading_city")}}</h5>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ml-5">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <label class="kt-font-xl"><i class="fa fa-circle icon mt-n3" style="font-size:11px; color:#ff6600"></i>降地
                                            </label>
                                            <div class="input-group">
                                            <div class="box_emptyOther form-control kt-font-xl input_style" id="box_emptyOther">
                                                @isset($_POST["emptyOtherplace"])
                                                    <input type="button" id="empty02" value="{{old('emptyOtherplace')}}" class="btn btn-danger mb-3 mr-3">
                                                @endisset
                                            </div>
                                            </div>
                                            @if ($errors->has("emptyOtherplace"))
                                                <h5 style="color:#e96565">{{$errors->first("emptyOtherplace")}}</h5>
                                            @endif
                                        </div>
                                        <div class="col-xl-6">
                                            <label class="kt-font-xl">市区町村
                                            </label>
                                            <div class="input-group">
                                                <input class="col form-control kt-font-xl input_style" name="drop_city" value="{{old('drop_city')}}">
                                            </div>
                                            @if ($errors->has("drop_city"))
                                                <h5 style="color:#e96565">{{$errors->first("drop_city")}}</h5>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('includes.map')
                    <div class="kt-widget5__content text-dark">
                        <div class="form-group row mt-4">
                            <label class="col-2 col-form-label kt-font-xl"><i class="fa fa-circle icon" style="font-size:11px;color:#ff6600"></i>荷物</label>
                            <div class="col-5 mt-3">
                                <input class="col form-control kt-font-xl input_style" name="baggage_name" value="{{old('baggage_name')}}">
                                @if ($errors->has("baggage_name"))
                                    <h5 style="color:#e96565">{{$errors->first("baggage_name")}}</h5>
                                @endif
                            </div>
                            <label class="col-2 col-form-label kt-font-xl text-right mt-3"> 荷物重量</label>
                            <div class="col-2 mt-3">
                                <input class="col form-control kt-font-xl input_style ml-5" name="baggage_weight" value="{{old('baggage_weight')}}">
                                @if ($errors->has("baggage_weight"))
                                    <h5  class= "ml-5" style="color:#e96565">{{$errors->first("baggage_weight")}}</h5>
                                @endif
                            </div>
                            <label class="col-1 col-form-label kt-font-lg text-right mt-4">kg</label>
                        </div>
                        <div class="form-group row">
                            <label class="col-2 col-form-label kt-font-xl"><i class="fa fa-circle icon" style="font-size:11px;color:#ff6600"></i>車輌</label>
                            <div class="col-10 mt-3">
                                <div class="kt-radio-inline">
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle_inf" {{old('vehicle_inf') === '指定なし' ? 'checked' : ''}} value="指定なし">指定なし
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle_inf" {{old('vehicle_inf') === '15t' ? 'checked' : ''}} value="15t">15t
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle_inf" {{old('vehicle_inf') === '10t' ? 'checked' : ''}} value="10t">10t
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle_inf" {{old('vehicle_inf') === '7t' ? 'checked' : ''}} value="7t">7t
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle_inf" {{old('vehicle_inf') === '4t' ? 'checked' : ''}} value="4t">4t
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle_inf" {{old('vehicle_inf') === '2t' ? 'checked' : ''}} value="2t">2t
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle_inf" {{old('vehicle_inf') === '軽' ? 'checked' : ''}} value="軽">軽
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle_inf" {{old('vehicle_inf') === 'トレーラー' ? 'checked' : ''}} value="トレーラー">トレーラー
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-2 col-form-label kt-font-xl"><i class="fa fa-circle icon" style="font-size:11px;color:#ff6600"></i>種類1</label>
                            <div class="col-10 mt-3">
                                <div class="kt-radio-inline">
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle_type1" {{old('vehicle_type1') === '指定なし' ? 'checked' : ''}} value="指定なし">指定なし
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle_type1" {{old('vehicle_type1') === 'ウイング' ? 'checked' : ''}} value="ウイング">ウイング
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle_type1" {{old('vehicle_type1') === '箱' ? 'checked' : ''}} value="箱">箱
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle_type1" {{old('vehicle_type1') === '平' ? 'checked' : ''}} value="平">平
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle_type1" {{old('vehicle_type1') === 'ユニック' ? 'checked' : ''}} value="ユニック">ユニック
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle_type1" {{old('vehicle_type1') === 'ウイング・箱' ? 'checked' : ''}} value="ウイング・箱">ウイング・箱
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg mb-4">
                                        <input type="radio" name="vehicle_type1" {{old('vehicle_type1') === 'ウイング・平' ? 'checked' : ''}} value="ウイング・平">ウイング・平
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle_type1" {{old('vehicle_type1') === '平・ユニック' ? 'checked' : ''}} value="平・ユニック">平・ユニック
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle_type1" {{old('vehicle_type1') === 'その他' ? 'checked' : ''}} value="その他">その他
                                        <span></span>
                                    </label>
                                    <label class="kt-text kt-text--brand kt-font-lg">
                                        <input type="text" class="form-control kt-font-xl input_style" name="vehicle_type1_content" value="{{old('vehicle_type1_content')}}">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-2 col-form-label kt-font-xl">種類2</label>
                            <div class="col-10">
                                <div class="kt-radio-inline">
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle_type2" {{old('vehicle_type2') === '指定なし' ? 'checked' : ''}} value="指定なし">指定なし
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle_type2" {{old('vehicle_type2') === '高床' ? 'checked' : ''}} value="高床">高床
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle_type2" {{old('vehicle_type2') === '中低床' ? 'checked' : ''}} value="中低床">中低床
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle_type2" {{old('vehicle_type2') === '低床' ? 'checked' : ''}} value="低床">低床
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle_type2" {{old('vehicle_type2') === 'フルワイド' ? 'checked' : ''}} value="フルワイド">フルワイド
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle_type2" {{old('vehicle_type2') === 'セミワイド' ? 'checked' : ''}} value="セミワイド">セミワイド
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg mb-4">
                                        <input type="radio" name="vehicle_type2" {{old('vehicle_type2') === '標準' ? 'checked' : ''}} value="標準">標準
                                        <span></span>
                                    </label><br>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle_type2" {{old('vehicle_type2') === 'ロング' ? 'checked' : ''}} value="ロング">ロング
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle_type2" {{old('vehicle_type2') === 'ショート' ? 'checked' : ''}} value="ショート">ショート
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-2 col-form-label kt-font-xl">種類3</label>
                            <div class="col-10">
                                <div class="kt-radio-inline">
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle_type3" {{old('vehicle_type3') === '指定なし' ? 'checked' : ''}} value="指定なし">指定なし
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle_type3" {{old('vehicle_type3') === '総輪エアサス' ? 'checked' : ''}} value="総輪エアサス">総輪エアサス
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle_type3" {{old('vehicle_type3') === '後輪エアサス' ? 'checked' : ''}} value="後輪エアサス">後輪エアサス
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle_type3" {{old('vehicle_type3') === 'エアサスゲート' ? 'checked' : ''}} value="エアサスゲート">エアサスゲート
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle_type3" {{old('vehicle_type3') === 'アルミ' ? 'checked' : ''}} value="アルミ">アルミ
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle_type3" {{old('vehicle_type3') === '幌' ? 'checked' : ''}} value="幌">幌
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg mb-4">
                                        <input type="radio" name="vehicle_type3" {{old('vehicle_type3') === 'パワーゲート' ? 'checked' : ''}} value="パワーゲート">パワーゲート
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle_type3" {{old('vehicle_type3') === 'フラット' ? 'checked' : ''}} value="フラット">フラット
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle_type3" {{old('vehicle_type3') === 'スタンション' ? 'checked' : ''}} value="スタンション">スタンション
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle_type3" {{old('vehicle_type3') === 'ジョルダー' ? 'checked' : ''}} value="ジョルダー">ジョルダー
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle_type3" {{old('vehicle_type3') === '冷凍' ? 'checked' : ''}} value="冷凍">冷凍
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle_type3" {{old('vehicle_type3') === '冷蔵' ? 'checked' : ''}} value="冷蔵">冷蔵
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-2 col-form-label kt-font-xl">備考</label>
                            <div class="col-10 mt-3">
                                <textarea class="form-control kt-font-lg input_style" spellcheck="true" rows="7" name="bigo"></textarea>
                                <label class="col-form-label kt-font-xl" style="color: #ff6600">※備考には金額、連絡先等は明記しないでください</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-2 col-form-label kt-font-xl"><i class="fa fa-circle icon" style="font-size:11px;color:#ff6600"></i>運賃(税抜)</label>
                            <div class="col-3 mt-2 mb-3">
                                <input class="col form-control kt-font-xl input_style" name="fares_money" value="{{old('fares_money')}}">
                                @if ($errors->has("fares_money"))
                                    <h5 style="color:#e96565">{{$errors->first("fares_money")}}</h5>
                                @endif
                            </div>
                            <label class="col-6 col-form-label kt-font-lg mt-3">円 &nbsp &nbsp &nbsp ※状況によって運賃を上げる相談に乗れる場合はチェック</label>
                            <label class="col-1 kt-checkbox kt-checkbox--brand text-dark mt-4">
                                <input type="checkbox" name="is_consultation">相談OK
                                <span class="bg-white border-dark"></span>
                            </label>
                        </div>
                        
                        <div class="form-group row mb-5 mt-5">
                            <button class="btn btn-primary first_time_btn custom-btn" type="submit" style="width: 300px; height: 80px; border-radius: 10px 10px">登錄内容確認</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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
    jQuery(document).ready(function() {
        $(".box_emptyOther").click(function() {
            $('.box_empty').css('border-color', '#d9d9d9');
            $('.box_empty').css('background-color', '#fff');
            $('.box_emptyOther').css('border-color', '#F03');
            $('.box_emptyOther').css('background-color', '#EEFFFF');
        });

        $(".box_empty").click(function() {
            $('.box_empty').css('border-color', '#F03');
            $('.box_empty').css('background-color', '#EEFFFF');
            $('.box_emptyOther').css('border-color', '#d9d9d9');
            $('.box_emptyOther').css('background-color', '#fff');
        });
        $('.map_area input').click(function() {
            var cname = '';
            var wkvalue = '';
            var idname = event.target.id;
            idname = idname.substr(idname.length - 6, 6);
            var inputValue = event.target.value;
            console.log(inputValue);
            var divname = idname.substr(0, 4);

            if ($('.box_empty').css('background-color') === 'rgb(238, 255, 255)') {
                if (divname === 'pref') {
                    cname = '.box_empty';
                    wkvalue = $('input[name="emptyplace"]').val();
                    if (wkvalue.match(inputValue)) {
                        wkvalue = wkvalue.replace(inputValue, '');
                        $('input[name="emptyplace"]').val(wkvalue);
                    } else {
                        $('input[name="emptyplace"]').val(inputValue);
                    }
                    wkvalue = $('input[name="emptyplace"]').val();
                }
            } else if ($('.box_emptyOther').css('background-color') === 'rgb(238, 255, 255)') {
                if (divname === 'pref') {
                    cname = '.box_emptyOther';
                    wkvalue = $('input[name="emptyOtherplace"]').val();
                    if (wkvalue.match(inputValue)) {
                        wkvalue = wkvalue.replace(inputValue, '');
                        $('input[name="emptyOtherplace"]').val(wkvalue);
                    } else {
                        $('input[name="emptyOtherplace"]').val(inputValue);
                    }
                    wkvalue = $('input[name="emptyOtherplace"]').val();
                }
            }
            $(cname).empty();
            $(cname).append('<input type="reset" id="' + idname + '" class = "btn btn-danger" value="' + inputValue + '">');
        });
        $(".box_empty").on("click", "input", function() {
            $('input[name="emptyplace"]').val('');
            var inputId = $(this).attr('id');
            $('.box_empty > #' + inputId).remove();
        });
        $(".box_emptyOther").on("click", "input", function() {
            $('input[name="emptyOtherplace"]').val('');
            var inputId = $(this).attr('id');
            $('.box_emptyOther > #' + 'inputId').remove();
        });
    });

@stop
