@extends('layouts.app')

@section('content')

    <!--begin:: Widgets/Blog-->
    <div class="kt-current_info__wrapper" style="padding-top: 50px;">
        <div class="kt-current_info__text1 kt-align-center">
            無料会員登録
                <img alt="Logo" style= "vertical-align: sub;" src="{{asset('media/img/arrow-man.png')}}" class="kt-header__brand-logo-sticky" />
            <p class="kt-font-xl kt-font-boldest"> 会員登録すると、明日以降の全ての情報が閲覧可能</p>
        </div>
    </div>
    <div class="kt-portlet" style="background-color: #efefef; color: #000;font-size: 15px;font-weight: bold;border-radius: 5px;">
        <div class="text-center mt-5" style="color: #000;">
            <h3><b>入力フォーム</b></h3>
        </div>
        <!--begin::Form-->
        <form class="kt-form" action="/register" method="post">
            {{ csrf_field() }}
            <div class="kt-portlet__body">
                @if($errors->any())
                    <h6 style="color:#e96565">入力した内容に不備がございます。</h6>
                @endif
                <div class="form-group ">
                    <label class="font-weight-bolder">御社名</label>
                    <input type="text" class="form-control" id="corp_name" name="corp_name" placeholder="(例) 株式会社ロジとら" value="{{old('corp_name')}}">
                    @if ($errors->has("corp_name"))
                        <h6 style="color:#e96565">
                        {{$errors->first("corp_name")}}
                        </h6>
                    @endif
                </div>
                <div class="form-group">
                    <label class="font-weight-bolder" for="exampleInputPassword1">フリガナ</label>
                    <input type="text" name="second_input" id="second_input" class="form-control" placeholder="(例) カブシキガイシャロジとら" value="{{old('second_input')}}">
                    @if ($errors->has("second_input"))
                        <h6 style="color:#e96565">
                        {{$errors->first("second_input")}}
                        </h6>
                    @endif
                </div>
                <div class="form-group">
                    <label class="font-weight-bolder">ご住所</label>
                    <div class="input-group row">
                        <input type="text" name="post_address" id="post_address" placeholder="郵便番号（ハイフンなし）" class="col-3 form-control" aria-describedby="basic-addon2" value="{{old('post_address')}}">
                        @if ($errors->has("post_address"))
                            <h6 style="color:#e96565">
                            {{$errors->first("post_address")}}
                            </h6>
                        @endif
                    </div>
                    <div class="input-group row">
                        <div class = "col">
                            <div class="row ml-n4">
                                <div class = "col-6">
                                    <select class="form-control" name="first_address" placeholder="選択してください" id="first_address">
                                      <option value="" style="display: none;">選択してください</option>
                                      <option value="0"></option>
                                      <option value="1" {{old('first_address')==1 ? 'selected':''}}>北海道</option>
                                      <option value="2" {{old('first_address')==2 ? 'selected':''}}>青森県</option>
                                      <option value="3" {{old('first_address')==3 ? 'selected':''}}>岩手県</option>
                                      <option value="4" {{old('first_address')==4 ? 'selected':''}}>宮城県</option>
                                      <option value="5" {{old('first_address')==5 ? 'selected':''}}>秋田県</option>
                                      <option value="6" {{old('first_address')==6 ? 'selected':''}}>山形県</option>
                                      <option value="7" {{old('first_address')==7 ? 'selected':''}}>福島県</option>
                                      <option value="8" {{old('first_address')==8 ? 'selected':''}}>茨城県</option>
                                      <option value="9" {{old('first_address')==9 ? 'selected':''}}>栃木県</option>
                                      <option value="10" {{old('first_address')==10 ? 'selected':''}}>群馬県</option>
                                      <option value="11" {{old('first_address')==11 ? 'selected':''}}>埼玉県</option>
                                      <option value="12" {{old('first_address')==12 ? 'selected':''}}>千葉県</option>
                                      <option value="13" {{old('first_address')==13 ? 'selected':''}}>東京都</option>
                                      <option value="14" {{old('first_address')==14 ? 'selected':''}}>神奈川県</option>
                                      <option value="15" {{old('first_address')==15 ? 'selected':''}}>新潟県</option>
                                      <option value="16" {{old('first_address')==16 ? 'selected':''}}>富山県</option>
                                      <option value="17" {{old('first_address')==17 ? 'selected':''}}>石川県</option>
                                      <option value="18" {{old('first_address')==18 ? 'selected':''}}>福井県</option>
                                      <option value="19" {{old('first_address')==19 ? 'selected':''}}>山梨県</option>
                                      <option value="20" {{old('first_address')==20 ? 'selected':''}}>長野県</option>
                                      <option value="21" {{old('first_address')==21 ? 'selected':''}}>静岡県</option>
                                      <option value="22" {{old('first_address')==22 ? 'selected':''}}>岐阜県</option>
                                      <option value="23" {{old('first_address')==23 ? 'selected':''}}>愛知県</option>
                                      <option value="24" {{old('first_address')==24 ? 'selected':''}}>三重県</option>
                                      <option value="25" {{old('first_address')==25 ? 'selected':''}}>滋賀県</option>
                                      <option value="26" {{old('first_address')==26 ? 'selected':''}}>京都府</option>
                                      <option value="27" {{old('first_address')==27 ? 'selected':''}}>兵庫県</option>
                                      <option value="28" {{old('first_address')==28 ? 'selected':''}}>大阪府</option>
                                      <option value="29" {{old('first_address')==29 ? 'selected':''}}>和歌山県</option>
                                      <option value="30" {{old('first_address')==30 ? 'selected':''}}>奈良県</option>
                                      <option value="31" {{old('first_address')==31 ? 'selected':''}}>島根県</option>
                                      <option value="32" {{old('first_address')==32 ? 'selected':''}}>鳥取県</option>
                                      <option value="33" {{old('first_address')==33 ? 'selected':''}}>岡山県</option>
                                      <option value="34" {{old('first_address')==34 ? 'selected':''}}>広島県</option>
                                      <option value="35" {{old('first_address')==35 ? 'selected':''}}>山口県</option>
                                      <option value="36" {{old('first_address')==36 ? 'selected':''}}>徳島県</option>
                                      <option value="37" {{old('first_address')==37 ? 'selected':''}}>香川県</option>
                                      <option value="38" {{old('first_address')==38 ? 'selected':''}}>愛媛県</option>
                                      <option value="39" {{old('first_address')==39 ? 'selected':''}}>高知県</option>
                                      <option value="40" {{old('first_address')==40 ? 'selected':''}}>福岡県</option>
                                      <option value="41" {{old('first_address')==41 ? 'selected':''}}>佐賀県</option>
                                      <option value="42" {{old('first_address')==42 ? 'selected':''}}>長崎県</option>
                                      <option value="43" {{old('first_address')==43 ? 'selected':''}}>熊本県</option>
                                      <option value="44" {{old('first_address')==44 ? 'selected':''}}>大分県</option>
                                      <option value="45" {{old('first_address')==45 ? 'selected':''}}>宮崎県</option>
                                      <option value="46" {{old('first_address')==46 ? 'selected':''}}>鹿児島県</option>
                                      <option value="47" {{old('first_address')==47 ? 'selected':''}}>沖縄県</option>
                                    </select>
                                </div>
                                <div class = "col-6">
                                    <input type="text" class="form-control ml-2" name="second_address" placeholder="(例) 宮崎市" value="{{old('second_address')}}" id="third_address" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input-group row">
                        <input type="text" class="form-control" name="third_address" placeholder="(例) 綿貫町 1475-4 ⾼南 F" id="third_address" value="{{old('fourth_address')}}" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="form-group">
                    <label class="font-weight-bolder" for="exampleInputPassword1">ご担当者様</label>
                    <input type="text" class="form-control" id="hello" placeholder="(例) 露地虎一郎" name="hello" value="{{old('hello')}}">
                    @if ($errors->has("hello"))
                        <h6 style="color:#e96565">
                            {{$errors->first("hello")}}
                        </h6>
                    @endif
                </div>
                <div class="form-group">
                    <label class="font-weight-bolder">フリガナ</label>
                    <input type="text" id="third_input" name="third_input" placeholder="(例) ロジとら タロウ" class="form-control" value="{{old('third_input')}}">
                    @if ($errors->has("third_input"))
                        <h6 style="color: #e96565">
                        {{$errors->first("third_input")}}
                        </h6>
                    @endif
                </div>
                <div class="form-group">
                    <label class="font-weight-bolder" for="exampleInputPassword1">TEL</label>
                    <input type="text" class="form-control" id="tel" placeholder="(例) 0120 - 050 - 570" name="tel" value="{{old('tel')}}">
                    @if ($errors->has("tel"))
                        <h6 style="color: #e96565">
                        {{$errors->first("tel")}}
                        </h6>
                    @endif
                </div>
                <div class="form-group">
                    <label class="font-weight-bolder">FAX</label>
                    <input type="text" class="form-control" id="fax" name="fax" placeholder="03-63693549" value="{{old('fax')}}">
                    @if ($errors->has("fax"))
                        <h6 style="color: #e96565">
                        {{$errors->first("fax")}}
                        </h6>
                    @endif
                </div>
                <div class="form-group">
                    <label class="font-weight-bolder" for="exampleInputPassword1">メールアドレス</label>
                    <input type="text" class="form-control" id="email_address" placeholder="(例) sample@abcd.co.jp" name="email_address" value="{{old('email_address')}}">
                    @if ($errors->has("email_address"))
                        <h6 style="color: #e96565">
                        {{$errors->first("email_address")}}
                        </h6>
                    @endif
                </div>
                <div class="form-group">
                    <label class="font-weight-bolder">パスワード</label>
                    <input type="password" class="form-control" id="register_pwd" name="register_pwd" placeholder="※ 5文字以上の半角英数字" value="{{old('register_pwd')}}">
                    @if ($errors->has("register_pwd"))
                        <h6 style="color: #e96565">
                        {{$errors->first("register_pwd")}}
                        </h6>
                    @endif
                </div>
                <div class="form-group">
                    <label class="font-weight-bolder" for="exampleInputPassword1">パスワード確認用</label>
                    <input type="password" class="form-control" id="confirm_pwd" name="confirm_pwd" placeholder="※ コピーペースト不可" value="{{old('confirm_pwd')}}">
                    @if ($errors->has("confirm_pwd"))
                        <h6 style="color: #e96565">
                            {{$errors->first("confirm_pwd")}}
                        </h6>
                    @endif
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label class="font-weight-bolder">紹介先</label>
                            <!-- <input type="text" class="form-control" id="contact_address" name="contact_address" value="{{old('contact_address')}}"  aria-describedby="postcode-error" aria-invalid="false"> -->
                            <select class="form-control" name="contact_address" placeholder="選択してください" id="contact_address">
                              <option value="" style="display: none;">選択してください</option>
                              <option value="0"></option>
                              <option value="1" {{old('contact_address')==1 ? 'selected':''}}>テラテクニカル 株式会社</option>
                              <option value="2" {{old('contact_address')==2 ? 'selected':''}}>トラどら</option>
                              <option value="3" {{old('contact_address')==2 ? 'selected':''}}>その他</option>
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
                            <!-- <input type="text" class="form-control" name="meeting_part" id="meeting_part" value="{{old('meeting_part')}}"> -->
                            <select id="reazonid" class="form-control" name="meeting_part">
                              <option value="" style="display: none;">選択してください</option>
                              <option value="0"></option>
                              <option value="1" {{old('meeting_part')==1 ? 'selected':''}}>電話営業</option>
                              <option value="2" {{old('meeting_part')==2 ? 'selected':''}}>FAX営業</option>
                              <option value="3" {{old('meeting_part')==3 ? 'selected':''}}>メール広告</option>
                              <option value="4" {{old('meeting_part')==4 ? 'selected':''}}>紹介</option>
                              <option value="5" {{old('meeting_part')==5 ? 'selected':''}}>新聞広告</option>
                              <option value="6" {{old('meeting_part')==6 ? 'selected':''}}>その他</option>
                            </select>
                            @if ($errors->has("meeting_part"))
                                <h6 style="color: #e96565">
                                {{$errors->first("meeting_part")}}
                                </h6>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-2" style="color: #000;">
                <h5><b>プルダウン電話営業・FAX営業・メール広告・紹介・新聞広告・その他利用規約をご確認の<br>上、「登録内容確認」を教えてください。登録内容確認のボタン</b></h5>
            </div>
            <div class="text-center mt-5" style="color: #000;">
                <h5><b>操作不明点がございましたら、お気軽にお問い合わせください。<br> 受付時間8:00〜18:00<br>0120-050-570</b></h5>
            </div>
            <div class="kt-portlet__foot">
                <div class="kt-form__actions d-flex justify-content-center flex-wrap">
                    <button class="btn first_time_btn" type="submit">登録内容確認</button>
                </div>
            </div>
            <div class="kt-space-40"></div>
            <div class="kt-space-20"></div>
        </form>

        <!--end::Form-->
    </div>
    <!--end:: Widgets/Blog-->
@endsection

@section('sidebar')
  @auth
    @include('includes.sidebar02')
  @else
    @include('includes.sidebar01')
  @endauth
@endsection
