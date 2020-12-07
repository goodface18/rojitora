<!--begin:: Widgets/Inbound Bandwidth-->
<div class="col-xl-2">
    <div class="kt-portlet kt-portlet--fit kt-portlet--head-noborder kt-portlet--login">
        <div class="kt-portlet__body kt-portlet__space-x" id="logged">
        <!-- <div class="alert mb-0 pb-0" v-if="has_error" style="color:red">
            <p>エラー、メールまたはパスワードが無効です。</p>
        </div> -->
        <form class="kt-form" id="my_form" method="post" action="{{ route('login') }}">
            {{ csrf_field() }}
            @if ($errors->has("failed"))
                <h6 style="color:#e96565">
                {{$errors->first("failed")}}
                </h6>
            @endif
            <div class="kt-portlet__body mb-3">
                <div class="form-group mb-3">
                    <label for="memberID">会員ID</label>
                    <input  type="text"  name="member_id" class="form-control form-control-sm {{ $errors->has('identity') ? ' has-error' : '' }}"
                        value="{{ old('member_id') }}"/>
                        @if ($errors->has("member_id"))
                            <h6 style="color:#e96565">
                            {{$errors->first("member_id")}}
                            </h6>
                        @endif
                </div>

                <div class="form-group mb-3">
                    <label for="password">パスワード</label>
                    <input type="password" name="password" id="password" class="form-control form-control-sm"/>
                    @if ($errors->has("password"))
                        <h6 style="color:#e96565">
                        {{$errors->first("password")}}
                        </h6>
                    @endif
                </div>

                <div class="form-group mb-1">
                    <a href="javascript:{}" onclick="document.getElementById('my_form').submit(); return false;">
                        <img class="w-100" src="/media/img/login_btn.png" alt />
                    </a>
                </div>
                <a href="{{url('forget')}}" class="mb-3 mt-0">
                    <strong style="color:#fecf5f">会員ID、パスワード</strong><span style="color:#fff">を</span>
                    <br>
                    <span href="javascript:void(0)" class="mb-3" style="color:#fff;">お忘れの方はこちら</span>
                </a>
                <span>または</span>
                <h3 class="mb-0">0120-050-570</h3>
                <span>までお問い合わせください</span>
            </div>
        </form>
        </div>
    </div>
    <!--end:: Widgets/Inbound Bandwidth-->
    <div class="kt-space-20"></div>

    <!--begin:: Widgets/Outbound Bandwidth-->
    <div class="kt-portlet kt-portlet--fit kt-portlet--head-noborder kt-portlet--services">
        <a href="/register" style="color: #fff;">
            <div class="kt-portlet__body kt-portlet__space-x d-flex justify-content-center flex-wrap mb-3" >
                <p>ロジとら の</p>
                <p>サービスは全て無料</p>
                <div class="btn mt-2" style="background-color:#ed9312; color:#fff;">
                    まずは
                    <br />
                    <div style="font-size:17px;">無料会員登録</div>
                </div>
            </div>
        </a>
    </div>
    <!--end:: Widgets/Outbound Bandwidth-->
    <div class="kt-space-20"></div>
    <!--begin:: Widgets/Outbound Bandwidth-->
    <div class="kt-portlet kt-portlet--fit kt-portlet--head-noborder kt-portlet--light">
        <a href="/using">
            <div class="kt-portlet__body kt-portlet__space-x">
                <div class="kt-current_info__content kt-widget5 mb-3">
                    <div class="kt-widget5__item">
                        <div class="kt-widget5__content d-flex justify-content-center flex-wrap">
                            <div class="kt-widget5__pic">
                                <img class="kt-widget7__img" src="/media/img/light_icon.png" />
                            </div>
                        <div class="kt-widget5__section">
                            <span style="font-size:17px; font-weight:bold; color:#000;">ご利用方法</span>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!--end:: Widgets/Outbound Bandwidth-->
    <div class="kt-space-20"></div>

    <!--begin:: Widgets/Outbound Bandwidth-->
    <div class="kt-portlet kt-portlet--fit kt-portlet--head-noborder kt-portlet--first_time">
        <a href="/question_answer">
            <div class="kt-portlet__body kt-portlet__space-x d-flex justify-content-center flex-wrap mb-3" >
                <span class="btn mt-1 mb-2" style="background-color:#396ec2;color: #fff;font-size:17px;">初めての方</span>
                <span>よくある質問</span>
            </div>
        </a>
    </div>
    <!--end:: Widgets/Outbound Bandwidth-->
    <div class="kt-space-20"></div>
    <!--begin:: Widgets/Outbound Bandwidth-->
    <div class="kt-portlet kt-portlet--fit kt-portlet--head-noborder kt-portlet--phone">
        <div class="kt-portlet__title kt-portlet__space-x d-flex justify-content-center flex-wrap">
            <a style="background-color:#f5f5f5;color: #000;font-weight: bold;">お問い合わせ</a>
        </div>
        <div class="kt-portlet__body kt-portlet__space-x d-flex justify-content-center flex-wrap mb-3">
            <a class="phone_number">0120-050-570</a>
            <span class="btn btn-sm">受付時間 8:00〜18:00</span>
        </div>
        <ul>
            <li>
            <a href="/corpInfo">運営会社情報</a>
            </li>
            <li>
            <a href="/membership">利用規約</a>
            </li>
        </ul>
    </div>
    <!--end:: Widgets/Outbound Bandwidth-->
</div>
