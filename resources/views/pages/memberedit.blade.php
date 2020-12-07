@extends('layouts.app')

@section('content')
<div class="kt-portlet kt-portlet--height-fluid kt-current_info mr-4">
    @include('includes.info')
    <div class="kt-portlet__body ask_sign">
    <div  class = "ask-sign-title kt-align-center">
        会員情報修正登録
        <img class="kt-widget7__img member-icon" src="{{asset('media/img/member_icon.png')}}" alt="">
    </div>
    <div  class = "required-sign kt-align-right">
        <i class="fa fa-circle icon" style="font-size:11px;color:#ff6600"></i>必須
    </div>
    <!--begin::Portlet-->
    <div class="ask-sign-body">

        <!--begin::Form-->
        <form class="kt-form" action="{{route('memberedit')}}" method="post">
          {{ csrf_field() }}
            <div class="kt-portlet__body form-check">
              @if($errors->any())
                  <h6 style="color:#e96565">入力した内容に不備がございます。</h6>
              @endif
                <div class="form-group">
                    <label>問合番号</label>
                    <div class="input-group row">
                        <div class="col-lg-3">
                            <input type="text" name="member_id" id="member_id" class="form-control" aria-describedby="basic-addon1" value="{{$user->member_id}}" disabled>
                        </div>
                    </div>
                    <div style="border-top: 1px solid #000000; margin-top: 26px"></div>
                </div>
                <div class="form-group">
                    <label>御社名</label>
                        <div class="input-group row">
                            <div class="input-group-prepend"><span><i class="fa fa-circle icon" style="font-size:11px;color:#ff6600"></i></span></div>
                            <input type="text" name="corp_name" id="corp_name" class="form-control" aria-describedby="basic-addon1" value="{{old('corp_name')?old('corp_name'):$user->corp_name}}">
                            @if ($errors->has("corp_name"))
                                <h6 style="color:#e96565">
                                {{$errors->first("corp_name")}}
                                </h6>
                            @endif
                        </div>
                        <div class="input-group row">
                            <div class="input-group-prepend"><span><i class="fa fa-circle icon" style="font-size:11px;color:#ff6600"></i></span></div>
                            <input type="text" name="second_input" id="second_input" class="form-control" aria-describedby="basic-addon1" value="{{old('second_input')?old('second_input'):$user->second_input}}">
                            @if ($errors->has("second_input"))
                                <h6 style="color:#e96565">
                                {{$errors->first("second_input")}}
                                </h6>
                            @endif
                        </div>
                        <div style="border-top: 1px solid #000000; margin-top: 26px"></div>
                </div>

                <div class="form-group">
                    <label class="font-weight-bolder">ご住所</label>
                    <div class="input-group row">
                      <div class="input-group-prepend"><span><i class="fa fa-circle icon" style="font-size:11px;color:#ff6600"></i></span></div>
                        <input type="text" name="post_address" id="post_address" class="col-3 form-control" aria-describedby="basic-addon2" value="{{old('post_address')?old('post_address'):$user->post_address}}">
                        @if ($errors->has("post_address"))
                            <h6 style="color:#e96565">
                            {{$errors->first("post_address")}}
                            </h6>
                        @endif
                    </div>
                    <div class="input-group row">
                      <span><i class="fa fa-circle icon" style="font-size:11px;color:#ff6600"></i></span>
                        <div class = "col">
                            <div class="row ml-n4">
                                <div class = "col-6">
                                    <select class="form-control" name="second_address" id="second_address">
                                      <option value="" style="display: none;"></option>
                                      <option value="1" {{(old('second_address')?old('second_address'):$user->second_address)==1 ? 'selected':''}}>北海道</option>
                                      <option value="2" {{(old('second_address')?old('second_address'):$user->second_address)==2 ? 'selected':''}}>青森県</option>
                                      <option value="3" {{(old('second_address')?old('second_address'):$user->second_address)==3 ? 'selected':''}}>岩手県</option>
                                      <option value="4" {{(old('second_address')?old('second_address'):$user->second_address)==4 ? 'selected':''}}>宮城県</option>
                                      <option value="5" {{(old('second_address')?old('second_address'):$user->second_address)==5 ? 'selected':''}}>秋田県</option>
                                      <option value="6" {{(old('second_address')?old('second_address'):$user->second_address)==6 ? 'selected':''}}>山形県</option>
                                      <option value="7" {{(old('second_address')?old('second_address'):$user->second_address)==7 ? 'selected':''}}>福島県</option>
                                      <option value="8" {{(old('second_address')?old('second_address'):$user->second_address)==8 ? 'selected':''}}>茨城県</option>
                                      <option value="9" {{(old('second_address')?old('second_address'):$user->second_address)==9 ? 'selected':''}}>栃木県</option>
                                      <option value="10" {{(old('second_address')?old('second_address'):$user->second_address)==10 ? 'selected':''}}>群馬県</option>
                                      <option value="11" {{(old('second_address')?old('second_address'):$user->second_address)==11 ? 'selected':''}}>埼玉県</option>
                                      <option value="12" {{(old('second_address')?old('second_address'):$user->second_address)==12 ? 'selected':''}}>千葉県</option>
                                      <option value="13" {{(old('second_address')?old('second_address'):$user->second_address)==13 ? 'selected':''}}>東京都</option>
                                      <option value="14" {{(old('second_address')?old('second_address'):$user->second_address)==14 ? 'selected':''}}>神奈川県</option>
                                      <option value="15" {{(old('second_address')?old('second_address'):$user->second_address)==15 ? 'selected':''}}>新潟県</option>
                                      <option value="16" {{(old('second_address')?old('second_address'):$user->second_address)==16 ? 'selected':''}}>富山県</option>
                                      <option value="17" {{(old('second_address')?old('second_address'):$user->second_address)==17 ? 'selected':''}}>石川県</option>
                                      <option value="18" {{(old('second_address')?old('second_address'):$user->second_address)==18 ? 'selected':''}}>福井県</option>
                                      <option value="19" {{(old('second_address')?old('second_address'):$user->second_address)==19 ? 'selected':''}}>山梨県</option>
                                      <option value="20" {{(old('second_address')?old('second_address'):$user->second_address)==20 ? 'selected':''}}>長野県</option>
                                      <option value="21" {{(old('second_address')?old('second_address'):$user->second_address)==21 ? 'selected':''}}>静岡県</option>
                                      <option value="22" {{(old('second_address')?old('second_address'):$user->second_address)==22 ? 'selected':''}}>岐阜県</option>
                                      <option value="23" {{(old('second_address')?old('second_address'):$user->second_address)==23 ? 'selected':''}}>愛知県</option>
                                      <option value="24" {{(old('second_address')?old('second_address'):$user->second_address)==24 ? 'selected':''}}>三重県</option>
                                      <option value="25" {{(old('second_address')?old('second_address'):$user->second_address)==25 ? 'selected':''}}>滋賀県</option>
                                      <option value="26" {{(old('second_address')?old('second_address'):$user->second_address)==26 ? 'selected':''}}>京都府</option>
                                      <option value="27" {{(old('second_address')?old('second_address'):$user->second_address)==27 ? 'selected':''}}>兵庫県</option>
                                      <option value="28" {{(old('second_address')?old('second_address'):$user->second_address)==28 ? 'selected':''}}>大阪府</option>
                                      <option value="29" {{(old('second_address')?old('second_address'):$user->second_address)==29 ? 'selected':''}}>和歌山県</option>
                                      <option value="30" {{(old('second_address')?old('second_address'):$user->second_address)==30 ? 'selected':''}}>奈良県</option>
                                      <option value="31" {{(old('second_address')?old('second_address'):$user->second_address)==31 ? 'selected':''}}>島根県</option>
                                      <option value="32" {{(old('second_address')?old('second_address'):$user->second_address)==32 ? 'selected':''}}>鳥取県</option>
                                      <option value="33" {{(old('second_address')?old('second_address'):$user->second_address)==33 ? 'selected':''}}>岡山県</option>
                                      <option value="34" {{(old('second_address')?old('second_address'):$user->second_address)==34 ? 'selected':''}}>広島県</option>
                                      <option value="35" {{(old('second_address')?old('second_address'):$user->second_address)==35 ? 'selected':''}}>山口県</option>
                                      <option value="36" {{(old('second_address')?old('second_address'):$user->second_address)==36 ? 'selected':''}}>徳島県</option>
                                      <option value="37" {{(old('second_address')?old('second_address'):$user->second_address)==37 ? 'selected':''}}>香川県</option>
                                      <option value="38" {{(old('second_address')?old('second_address'):$user->second_address)==38 ? 'selected':''}}>愛媛県</option>
                                      <option value="39" {{(old('second_address')?old('second_address'):$user->second_address)==39 ? 'selected':''}}>高知県</option>
                                      <option value="40" {{(old('second_address')?old('second_address'):$user->second_address)==40 ? 'selected':''}}>福岡県</option>
                                      <option value="41" {{(old('second_address')?old('second_address'):$user->second_address)==41 ? 'selected':''}}>佐賀県</option>
                                      <option value="42" {{(old('second_address')?old('second_address'):$user->second_address)==42 ? 'selected':''}}>長崎県</option>
                                      <option value="43" {{(old('second_address')?old('second_address'):$user->second_address)==43 ? 'selected':''}}>熊本県</option>
                                      <option value="44" {{(old('second_address')?old('second_address'):$user->second_address)==44 ? 'selected':''}}>大分県</option>
                                      <option value="45" {{(old('second_address')?old('second_address'):$user->second_address)==45 ? 'selected':''}}>宮崎県</option>
                                      <option value="46" {{(old('second_address')?old('second_address'):$user->second_address)==46 ? 'selected':''}}>鹿児島県</option>
                                      <option value="47" {{(old('second_address')?old('second_address'):$user->second_address)==47 ? 'selected':''}}>沖縄県</option>
                                    </select>
                                </div>
                                <div class = "col-6">
                                    <input type="text" class="form-control ml-2" name="third_address" value="{{old('third_address')?old('third_address'):$user->third_address}}" id="third_address" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input-group row">
                      <div class="input-group-prepend"><span><i class="fa fa-circle icon" style="font-size:11px;color:#ff6600"></i></span></div>
                        <input type="text" class="form-control" name="fourth_address" id="fourth_address" value="{{old('fourth_address')?old('fourth_address'):$user->fourth_address}}" aria-describedby="basic-addon1">
                    </div>
                    <div style="border-top: 1px solid #000000; margin-top: 26px"></div>
                </div>

                <div class="form-group">
                    <label>ご担当者様</label>
                        <div class="input-group row">
                            <div class="input-group-prepend"><span><i class="fa fa-circle icon" style="font-size:11px;color:#ff6600"></i></span></div>
                            <input type="text" class="form-control" id="hello" name="hello" aria-describedby="basic-addon1" value="{{old('hello')?old('hello'):$user->hello}}">
                            @if ($errors->has("hello"))
                                <h6 style="color:#e96565">
                                    {{$errors->first("hello")}}
                                </h6>
                            @endif
                        </div>
                        <div class="input-group row">
                            <div class="input-group-prepend"><span><i class="fa fa-circle icon" style="font-size:11px;color:#ff6600"></i></span></div>
                            <input type="text" class="form-control" id="third_input" name="third_input" aria-describedby="basic-addon1" value="{{old('third_input')?old('third_input'):$user->third_input}}">
                            @if ($errors->has("third_input"))
                                <h6 style="color: #e96565">
                                {{$errors->first("third_input")}}
                                </h6>
                            @endif
                        </div>
                        <div style="border-top: 1px solid #000000; margin-top: 26px"></div>
                </div>
                <div class="form-group">
                    <label>TEL</label>
                    <div class="input-group row">
                        <div class="input-group-prepend"><span><i class="fa fa-circle icon" style="font-size:11px;color:#ff6600"></i></span></div>
                        <input type="text" class="form-control" id="tel" name="tel" aria-describedby="basic-addon1" value="{{old('tel')?old('tel'):$user->tel}}">
                        @if ($errors->has("tel"))
                            <h6 style="color: #e96565">
                            {{$errors->first("tel")}}
                            </h6>
                        @endif
                    </div>
                    <div style="border-top: 1px solid #000000; margin-top: 26px"></div>
                    <div class="kt-space-40"></div>
                    <label>FAX</label>
                    <div class="input-group row">
                        <div class="input-group-prepend"><span><i class="fa fa-circle icon" style="font-size:11px;color:#ff6600"></i></span></div>
                        <input type="text" class="form-control" id="fax" name="fax" aria-describedby="basic-addon1" value="{{old('fax')?old('fax'):$user->fax}}">
                        @if ($errors->has("fax"))
                            <h6 style="color: #e96565">
                            {{$errors->first("fax")}}
                            </h6>
                        @endif
                    </div>
                    <div style="border-top: 1px solid #000000; margin-top: 26px"></div>
                </div>
                <div class="form-group">
                    <label>メールアドレス</label>
                    <div class="input-group">
                        <div class="input-group-prepend"><span><i class="fa fa-circle icon" style="font-size:11px;color:#ff6600"></i></span></div>
                            <input type="email" class="form-control" id="email_address" name="email_address" placeholder="(例) sample@abcd.co.jp" aria-describedby="basic-addon2" value="{{old('email_address')?old('email_address'):$user->email_address}}">
                            @if ($errors->has("email_address"))
                                <h6 style="color: #e96565">
                                {{$errors->first("email_address")}}
                                </h6>
                            @endif
                    </div>
                    <div style="border-top: 1px solid #000000; margin-top: 26px"></div>
                </div>
                <div class="form-group row" style="border-bottom: 1px solid #000000; padding-bottom: 16px">
                    <div class="col-lg-6">
                        <label>パスワード</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span><i class="fa fa-circle icon" style="font-size:11px;color:#ff6600"></i></span></div>
                            <input type="password" id="register_pwd" name="register_pwd" class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <label class="">パスワード（確認用</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span><i class="fa fa-circle icon" style="font-size:11px;color:#ff6600"></i></span></div>
                            <input type="password" id="confirm_pwd" name="confirm_pwd" class="form-control">
                        </div>
                    </div>
                    @if ($errors->has("register_pwd"))
                        <h6 style="color: #e96565">
                        {{$errors->first("register_pwd")}}
                        </h6>
                    @endif
                </div>

                <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label class="font-weight-bolder">紹介先</label>
                            <!-- <input type="text" class="form-control" id="contact_address" name="contact_address" value="{{old('contact_address')?old('contact_address'):$user->contact_address}}"  aria-describedby="postcode-error" aria-invalid="false"> -->
                            <select class="form-control" name="contact_address" placeholder="選択してください" id="contact_address">
                              <option value="" style="display: none;">選択してください</option>
                              <option value="0"></option>
                              <option value="1" {{(old('contact_address')?old('contact_address'):$user->contact_address)==1 ? 'selected':''}}>テラテクニカル 株式会社</option>
                              <option value="2" {{(old('contact_address')?old('contact_address'):$user->contact_address)==2 ? 'selected':''}}>トラどら</option>
                              <option value="2" {{(old('contact_address')?old('contact_address'):$user->contact_address)==3 ? 'selected':''}}>その他</option>
                            </select>
                            @if ($errors->has("contact_address"))
                                <h6 style="color: #e96565">
                                {{$errors->first("contact_address")}}
                               </h6>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label class="font-weight-bolder">「ロジとら」をどこで知りましたか？</label>
                            <!-- <input type="text" class="form-control" name="meeting_part" id="meeting_part" value="{{old('meeting_part')?old('meeting_part'):$user->meeting_part}}"> -->
                            <select id="meeting_part" class="form-control" name="meeting_part">
                              <option value="" style="display: none;">選択してください</option>
                              <option value="0"></option>
                              <option value="1" {{(old('meeting_part')?old('meeting_part'):$user->meeting_part)==1 ? 'selected':''}}>電話営業</option>
                              <option value="2" {{(old('meeting_part')?old('meeting_part'):$user->meeting_part)==2 ? 'selected':''}}>FAX営業</option>
                              <option value="3" {{(old('meeting_part')?old('meeting_part'):$user->meeting_part)==3 ? 'selected':''}}>メール広告</option>
                              <option value="4" {{(old('meeting_part')?old('meeting_part'):$user->meeting_part)==4 ? 'selected':''}}>紹介</option>
                              <option value="5" {{(old('meeting_part')?old('meeting_part'):$user->meeting_part)==5 ? 'selected':''}}>新聞広告</option>
                              <option value="6" {{(old('meeting_part')?old('meeting_part'):$user->meeting_part)==6 ? 'selected':''}}>その他</option>
                            </select>
                            @if ($errors->has("meeting_part"))
                                <h6 style="color: #e96565">
                                {{$errors->first("meeting_part")}}
                                </h6>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="kt-form__actions kt-align-center">
                    <div><button type="submit" class="reset btn">登錄內容確認</button></div>

                </div>
            </div>
        </form>

        <!--end::Form-->
    </div>
    <!--end::Portlet-->
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
