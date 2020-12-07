@extends('layouts.app')

@section('content')
<div class="kt-portlet kt-portlet--height-fluid kt-current_info mr-4">
    @include('includes.info')
    <div class="kt-portlet__body">
        <div class="kt-widget5__content">
            <div class="row">
                <div class="col-4 text-right"></div>
                <div class="col-4 text-center"><h2 class="kt-widget5__normal text-dark"><img src="{{asset('media/img/freight.png')}}" class="mr-3">空車情報新規登録
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
    <div class="kt-portlet__body bg-grey text-dark">
        <div class="kt-form mt-5">
            <div class="kt-portlet__body">
                <form class="kt-form form_style" action="{{url('emptyTruck_store')}}" method="post">
                    @csrf
                    <input type="hidden" name="emptyplaceSpec" value="">
                    <input type="hidden" name="beginplace" value="">
                    <input type="hidden" name="endplace" value="">
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
                                <div class="form-group mr-xl-5">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <label class="kt-font-xl"><i class="fa fa-circle icon mt-n3" style="font-size:11px; color:#ff6600"></i>空車日時
                                            </label>
                                            <div class="input-group">

                                            <input type="text" class="col form-control kt-font-xl input_style" data-date-format="yyyy-mm-dd" id="kt_datepicker_1" name="emptycar_date" value="{{old('emptycar_date')}}">
                                            @if ($errors->has("emptycar_date"))
                                                <h5 style="color:#e96565">{{$errors->first("emptycar_date")}}</h5>
                                            @endif
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <label class="kt-font-xl">時間
                                            </label>
                                            <select class="col form-control input_style kt-font-xl" id="loading_time" name="loading_time">
                                                <option value="0" {{old('loading_time')==='0' ? 'selected' : ''}}>0時</option>
                                                <option value="1" {{old('loading_time')==='1' ? 'selected' : ''}}>1時</option>
                                                <option value="2" {{old('loading_time')==='2' ? 'selected' : ''}}>2時</option>
                                                <option value="3" {{old('loading_time')==='3' ? 'selected' : ''}}>3時</option>
                                                <option value="4" {{old('loading_time')==='4' ? 'selected' : ''}}>4時</option>
                                                <option value="5" {{old('loading_time')==='5' ? 'selected' : ''}}>5時</option>
                                                <option value="6" {{old('loading_time')==='6' ? 'selected' : ''}}>6時</option>
                                                <option value="7" {{old('loading_time')==='7' ? 'selected' : ''}}>7時</option>
                                                <option value="8" {{old('loading_time')==='8' ? 'selected' : ''}}>8時</option>
                                                <option value="9" {{old('loading_time')==='9' ? 'selected' : ''}}>9時</option>
                                                <option value="10" {{old('loading_time')==='10' ? 'selected' : ''}}>10時</option>
                                                <option value="11" {{old('loading_time')==='11' ? 'selected' : ''}}>11時</option>
                                                <option value="12" {{old('loading_time')==='12' ? 'selected' : ''}}>12時</option>
                                                <option value="13" {{old('loading_time')==='13' ? 'selected' : ''}}>13時</option>
                                                <option value="14" {{old('loading_time')==='14' ? 'selected' : ''}}>14時</option>
                                                <option value="15" {{old('loading_time')==='15' ? 'selected' : ''}}>15時</option>
                                                <option value="16" {{old('loading_time')==='16' ? 'selected' : ''}}>16時</option>
                                                <option value="17" {{old('loading_time')==='17' ? 'selected' : ''}}>17時</option>
                                                <option value="18" {{old('loading_time')==='18' ? 'selected' : ''}}>18時</option>
                                                <option value="19" {{old('loading_time')==='19' ? 'selected' : ''}}>19時</option>
                                                <option value="20" {{old('loading_time')==='20' ? 'selected' : ''}}>20時</option>
                                                <option value="21" {{old('loading_time')==='21' ? 'selected' : ''}}>21時</option>
                                                <option value="22" {{old('loading_time')==='22' ? 'selected' : ''}}>22時</option>
                                                <option value="23" {{old('loading_time')==='23' ? 'selected' : ''}}>23時</option>
                                                <option value="30" {{old('loading_time')==='午前' ? 'selected' : ''}}>午前</option>
                                                <option value="31" {{old('loading_time')==='午後' ? 'selected' : ''}}>午後</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mr-xl-5">
                                    <label class="kt-font-xl"><i class="fa fa-circle icon" style="font-size:11px; color:#ff6600"></i>積可能地
                                    </label>
                                    <div class="input-group">
                                        <div class="box_left form-control kt-font-xl input_style" id="box_left">
                                            @if(!empty($_POST['beginplace']))
                                                $secFilter_place = substr($_POST['beginplace'], 0, -1);
                                                $beginplaces = explode(',' , $secFilter_place);

                                                @foreach($beginplaces as $beginplace)
                                                    <input type="button" id="{{'area' . $loop->iteration }}" value="{{$beginplace}}" class="btn btn-danger mb-3 mr-3">
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    @if ($errors->has("beginplace"))
                                        <h5 style="color:#e96565">{{$errors->first("beginplace")}}</h5>
                                    @endif
                                </div>
                                <div class="form-group mr-xl-5">
                                    <div class="row mt-5">
                                        <div class="col-xl-6">
                                            <label class="kt-font-xl"><i class="fa fa-circle icon mt-n3" style="font-size:11px; color:#ff6600"></i>降日時
                                            </label>
                                            <div class="input-group">
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
                                                <option value="0" {{old('drop_time') === '0' ? 'selected' : ''}}>0時</option>
                                                <option value="1" {{old('drop_time') === '1' ? 'selected' : ''}}>1時</option>
                                                <option value="2" {{old('drop_time') === '2' ? 'selected' : ''}}>2時</option>
                                                <option value="3" {{old('drop_time') === '3' ? 'selected' : ''}}>3時</option>
                                                <option value="4" {{old('drop_time') === '4' ? 'selected' : ''}}>4時</option>
                                                <option value="5" {{old('drop_time') === '5' ? 'selected' : ''}}>5時</option>
                                                <option value="6" {{old('drop_time') === '6' ? 'selected' : ''}}>6時</option>
                                                <option value="7" {{old('drop_time') === '7' ? 'selected' : ''}}>7時</option>
                                                <option value="8" {{old('drop_time') === '8' ? 'selected' : ''}}>8時</option>
                                                <option value="9" {{old('drop_time') === '9' ? 'selected' : ''}}>9時</option>
                                                <option value="10" {{old('drop_time') === '10' ? 'selected' : ''}}>10時</option>
                                                <option value="11" {{old('drop_time') === '11' ? 'selected' : ''}}>11時</option>
                                                <option value="12" {{old('drop_time') === '12' ? 'selected' : ''}}>12時</option>
                                                <option value="13" {{old('drop_time') === '13' ? 'selected' : ''}}>13時</option>
                                                <option value="14" {{old('drop_time') === '14' ? 'selected' : ''}}>14時</option>
                                                <option value="15" {{old('drop_time') === '15' ? 'selected' : ''}}>15時</option>
                                                <option value="16" {{old('drop_time') === '16' ? 'selected' : ''}}>16時</option>
                                                <option value="17" {{old('drop_time') === '17' ? 'selected' : ''}}>17時</option>
                                                <option value="18" {{old('drop_time') === '18' ? 'selected' : ''}}>18時</option>
                                                <option value="19" {{old('drop_time') === '19' ? 'selected' : ''}}>19時</option>
                                                <option value="20" {{old('drop_time') === '20' ? 'selected' : ''}}>20時</option>
                                                <option value="21" {{old('drop_time') === '21' ? 'selected' : ''}}>21時</option>
                                                <option value="22" {{old('drop_time') === '22' ? 'selected' : ''}}>22時</option>
                                                <option value="23" {{old('drop_time') === '23' ? 'selected' : ''}}>23時</option>
                                                <option value="30" {{old('drop_time') === '午前' ? 'selected' : ''}}>午前</option>
                                                <option value="31" {{old('drop_time') === '午後' ? 'selected' : ''}}>午後</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mr-xl-5">
                                    <label class="kt-font-xl"><i class="fa fa-circle icon" style="font-size:11px; color:#ff6600"></i>降可能地
                                    </label>
                                    <div class="input-group">
                                        <div class="box_right form-control kt-font-xl input_style" id="box_right">
                                            @if(!empty($_POST['endplace']))
                                                @php
                                                    $second_filter_place = substr($edit_data->endplace, 0, -1);
                                                    $endPlaceArray = explode(',' , $second_filter_place);
                                                @endphp
                                                @foreach($endPlaceArray as $arraydata)
                                                    <input type="button" id="{{'array' . $loop->iteration }}" value="{{$arraydata}}" class="btn btn-danger mb-3 mr-3">
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                            @if ($errors->has("endplace"))
                                                <h5 style="color:#e96565">{{$errors->first("endplace")}}</h5>
                                            @endif
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group ml-xl-5">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <label class="kt-font-xl"><i class="fa fa-circle icon mt-n3" style="font-size:11px; color:#ff6600"></i>空車地
                                            </label>
                                            <div class="input-group">
                                                <div class="box_empty_spec form-control kt-font-xl input_style" id="box_empty_spec" style="height:60px">
                                                @if(!empty($_POST["emptyplaceSpec"]))
                                                    <input type="button" id="empty01" value="{{old('emptyplaceSpec')}}" class="btn btn-danger mb-3 mr-3">
                                                @endif
                                                </div>
                                            </div>
                                                @if ($errors->has("emptyplaceSpec"))
                                                    <h5 style="color:#e96565">{{$errors->first("emptyplaceSpec")}}</h5>
                                                @endif
                                        </div>
                                        <div class="col-xl-6">
                                            <label class="kt-font-xl">市区町村
                                            </label>
                                            <div class="input-group">
                                                <input class="col form-control kt-font-xl input_style" name="city" value="{{old('city')}}">
                                                @if ($errors->has("city"))
                                                    <h5 style="color:#e96565">{{$errors->first("city")}}</h5>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('includes.map')
                    <div class="kt-portlet__content text-dark">
                        <div class="form-group row">
                            <label class="col-2 col-form-label kt-font-xl"><i class="fa fa-circle icon" style="font-size:11px;color:#ff6600"></i>車輌</label>
                            <div class="col-10 mt-3">
                                <div class="kt-radio-inline">
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle" {{old('vehicle') === '指定なし' ? 'checked' : ''}}  value="指定なし">指定なし
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle" {{old('vehicle') === '15t' ? 'checked' : ''}} value="15t">15t
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle" {{old('vehicle') === '10t' ? 'checked' : ''}} value="10t">10t
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle" {{old('vehicle') === '7t' ? 'checked' : ''}} value="7t">7t
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle" {{old('vehicle') === '4t' ? 'checked' : ''}} value="4t">4t
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle" {{old('vehicle') === '2t' ? 'checked' : ''}} value="2t">2t
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle" {{old('vehicle') === '軽' ? 'checked' : ''}} value="軽">軽
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="vehicle" {{old('vehicle') === 'トレーラー' ? 'checked' : ''}} value="トレーラー">トレーラー
                                        <span></span>
                                    </label>
                                </div>
                                @if ($errors->has("vehicle"))
                                    <h5 style="color:#e96565">{{$errors->first("vehicle")}}</h5>
                                @endif

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-2 col-form-label kt-font-xl"><i class="fa fa-circle icon" style="font-size:11px;color:#ff6600"></i>種類1</label>
                            <div class="col-10 mt-3">
                                <div class="kt-radio-inline">
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="type1" {{old('type1') === '指定なし' ? 'checked' : ''}} value="指定なし">指定なし
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="type1" {{old('type1') === 'ウイング' ? 'checked' : ''}} value="ウイング">ウイング
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="type1" {{old('type1') === '箱' ? 'checked' : ''}} value="箱">箱
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="type1" {{old('type1') === '平' ? 'checked' : ''}} value="平">平
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="type1" {{old('type1') === 'ユニック' ? 'checked' : ''}} value="ユニック">ユニック
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="type1" {{old('type1') === 'ウイング・箱' ? 'checked' : ''}} value="ウイング・箱">ウイング・箱
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg mb-4">
                                        <input type="radio" name="type1" {{old('type1') === 'ウイング・平' ? 'checked' : ''}} value="ウイング・平">ウイング・平
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="type1" {{old('type1') === '平・ユニック' ? 'checked' : ''}} value="平・ユニック">平・ユニック
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="type1" {{old('type1') === 'その他' ? 'checked' : ''}} value="その他">その他
                                        <span></span>
                                    </label>
                                    <label class="kt-text kt-text--brand kt-font-lg">
                                        <input type="text" class="form-control kt-font-xl input_style" value="{{old('typeOther')}}" name="typeOther">
                                    </label>
                                </div>
                                @if ($errors->has("type1"))
                                    <h5 style="color:#e96565">{{$errors->first("type1")}}</h5>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-2 col-form-label kt-font-xl">種類2</label>
                            <div class="col-10">
                                <div class="kt-radio-inline">
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="type2" {{old('type2') === '指定なし' ? 'checked' : ''}} value="指定なし">指定なし
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="type2" {{old('type2') === '高床' ? 'checked' : ''}} value="高床">高床
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="type2" {{old('type2') === '中低床' ? 'checked' : ''}} value="中低床">中低床
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="type2" {{old('type2') === '低床' ? 'checked' : ''}} value="低床">低床
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="type2" {{old('type2') === 'フルワイド' ? 'checked' : ''}} value="フルワイド">フルワイド
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="type2" {{old('type2') === 'セミワイド' ? 'checked' : ''}} value="セミワイド">セミワイド
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg mb-4">
                                        <input type="radio" name="type2" {{old('type2') === '標準' ? 'checked' : ''}} value="標準">標準
                                        <span></span>
                                    </label><br>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="type2" {{old('type2') === 'ロング' ? 'checked' : ''}} value="ロング">ロング
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="type2" {{old('type2') === 'ショート' ? 'checked' : ''}} value="ショート">ショート
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
                                        <input type="radio" name="type3" {{old('type3') === '指定なし' ? 'checked' : ''}} value="指定なし">指定なし
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="type3" {{old('type3') === '総輪エアサス' ? 'checked' : ''}} value="総輪エアサス">総輪エアサス
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="type3" {{old('type3') === '後輪エアサス' ? 'checked' : ''}} value="後輪エアサス">後輪エアサス
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="type3" {{old('type3') === 'エアサスゲート' ? 'checked' : ''}} value="エアサスゲート">エアサスゲート
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="type3" {{old('type3') === 'アルミ' ? 'checked' : ''}} value="アルミ">アルミ
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="type3" {{old('type3') === '幌' ? 'checked' : ''}} value="幌">幌
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg mb-4">
                                        <input type="radio" name="type3" {{old('type3') === 'パワーゲート' ? 'checked' : ''}} value="パワーゲート">パワーゲート
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="type3" {{old('type3') === 'フラット' ? 'checked' : ''}} value="フラット">フラット
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="type3" {{old('type3') === 'スタンション' ? 'checked' : ''}} value="スタンション">スタンション
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="type3" {{old('type3') === 'ジョルダー' ? 'checked' : ''}} value="ジョルダー">ジョルダー
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="type3" {{old('type3') === '冷凍' ? 'checked' : ''}} value="冷凍">冷凍
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--brand kt-font-lg">
                                        <input type="radio" name="type3" {{old('type3') === '冷蔵' ? 'checked' : ''}} value="冷蔵">冷蔵
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-2 col-form-label kt-font-xl">備考</label>
                            <div class="col-10 mt-3">
                                <textarea class="form-control kt-font-lg input_style" spellcheck="true" rows="7" name="bigo">{{old('bigo')}}</textarea>
                                <label class="col-form-label kt-font-xl" style="color: #ff6600">※備考には金額、連絡先等は明記しないでください</label>
                            </div>
                        </div>
                        <!--end::Form-->
                        <!--begin::Form-->
                        <div class="form-group row mb-5 mt-5">
                            <button class="btn btn-primary first_time_btn custom-btn" style="max-width: 300px; height: 80px; border-radius: 10px 10px">登錄内容確認</button>
                        </div>
                        <!--end::Form-->
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
