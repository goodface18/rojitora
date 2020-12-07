<div class="col-xl-2 pr-0 pl-0 pt-0">
    <!--begin:: Widgets/Inbound Bandwidth-->
    <div class="kt-portlet  kt-portlet--check kt-portlet--fit kt-portlet--head-noborder">
        <div class="kt-portlet__body kt-portlet__space-x sidebar02">
            <div class ="kt-align-center sidebar-name mb-3">簡易検索 </div>
            <div class = "kt-align-center loads-check">荷物情報検索</div>
        </div>
    </div>
    <div class = "kt-portlet">
        <div class = "kt-portlet__body kt-portlet_check">
            <form  action="{{url('luggage_simple_search')}}" class="kt-form" method="post">
                @csrf
                <div class="form-group">
                    <label>積地</label>
                    <select class="form-control mb-2" id="area01" name="loading_country">
                        <option value="null" style="display:none">地方を選択</option>
                        <option value="0"></option>
                        <option value="1" {{session('luggage_loading_country') == '1' ? 'selected' : ''}}>北海道</option>
                        <option value="2" {{session('luggage_loading_country') == '2' ? 'selected' : ''}}>北東北</option>
                        <option value="3" {{session('luggage_loading_country') == '3' ? 'selected' : ''}}>南東北</option>
                        <option value="4" {{session('luggage_loading_country') == '4' ? 'selected' : ''}}>北関東</option>
                        <option value="5" {{session('luggage_loading_country') == '5' ? 'selected' : ''}}>南関東</option>
                        <option value="6" {{session('luggage_loading_country') == '6' ? 'selected' : ''}}>甲信越</option>
                        <option value="7" {{session('luggage_loading_country') == '7' ? 'selected' : ''}}>北陸</option>
                        <option value="8" {{session('luggage_loading_country') == '8' ? 'selected' : ''}}>中京</option>
                        <option value="9" {{session('luggage_loading_country') == '9' ? 'selected' : ''}}>関西</option>
                        <option value="10" {{session('luggage_loading_country') == '10' ? 'selected' : ''}}>中国</option>
                        <option value="11" {{session('luggage_loading_country') == '11' ? 'selected' : ''}}>四国</option>
                        <option value="12" {{session('luggage_loading_country') == '12' ? 'selected' : ''}}>九州・沖縄</option>
                    </select>

                    <select class="form-control" name="loading_space" id="pref01">
                        <option value="null" style="display:none">県を選択</option>
                        <option value="0" data-val="0"></option>
                        <option value="北海" {{session('luggage_loading_space') == '北海' ? 'selected' : ''}} data-val="1">北海道</option>
                        <option value="青森" {{session('luggage_loading_space') == '青森' ? 'selected' : ''}} data-val="2">青森県</option>
                        <option value="岩手" {{session('luggage_loading_space') == '岩手' ? 'selected' : ''}} data-val="2">岩手県</option>
                        <option value="宮城" {{session('luggage_loading_space') == '宮城' ? 'selected' : ''}} data-val="3">宮城県</option>
                        <option value="秋田" {{session('luggage_loading_space') == '秋田' ? 'selected' : ''}} data-val="2">秋田県</option>
                        <option value="山形" {{session('luggage_loading_space') == '山形' ? 'selected' : ''}} data-val="3">山形県</option>
                        <option value="福島" {{session('luggage_loading_space') == '福島' ? 'selected' : ''}} data-val="3">福島県</option>
                        <option value="茨城" {{session('luggage_loading_space') == '茨城' ? 'selected' : ''}} data-val="4">茨城県</option>
                        <option value="栃木" {{session('luggage_loading_space') == '栃木' ? 'selected' : ''}} data-val="4">栃木県</option>
                        <option value="群馬" {{session('luggage_loading_space') == '群馬' ? 'selected' : ''}} data-val="4">群馬県</option>
                        <option value="埼玉" {{session('luggage_loading_space') == '埼玉' ? 'selected' : ''}} data-val="5">埼玉県</option>
                        <option value="千葉" {{session('luggage_loading_space') == '千葉' ? 'selected' : ''}} data-val="5">千葉県</option>
                        <option value="東京" {{session('luggage_loading_space') == '東京' ? 'selected' : ''}} data-val="5">東京都</option>
                        <option value="神奈川" {{session('luggage_loading_space') == '神奈川' ? 'selected' : ''}} data-val="5">神奈川県</option>
                        <option value="新潟" {{session('luggage_loading_space') == '新潟' ? 'selected' : ''}} data-val="6">新潟県</option>
                        <option value="富山" {{session('luggage_loading_space') == '富山' ? 'selected' : ''}} data-val="7">富山県</option>
                        <option value="石川" {{session('luggage_loading_space') == '石川' ? 'selected' : ''}} data-val="7">石川県</option>
                        <option value="福井" {{session('luggage_loading_space') == '福井' ? 'selected' : ''}} data-val="7">福井県</option>
                        <option value="山梨" {{session('luggage_loading_space') == '山梨' ? 'selected' : ''}} data-val="6">山梨県</option>
                        <option value="長野" {{session('luggage_loading_space') == '長野' ? 'selected' : ''}} data-val="6">長野県</option>
                        <option value="静岡" {{session('luggage_loading_space') == '静岡' ? 'selected' : ''}} data-val="8">静岡県</option>
                        <option value="岐阜" {{session('luggage_loading_space') == '岐阜' ? 'selected' : ''}} data-val="8">岐阜県</option>
                        <option value="愛知" {{session('luggage_loading_space') == '愛知' ? 'selected' : ''}} data-val="8">愛知県</option>
                        <option value="三重" {{session('luggage_loading_space') == '三重' ? 'selected' : ''}} data-val="8">三重県</option>
                        <option value="滋賀" {{session('luggage_loading_space') == '滋賀' ? 'selected' : ''}} data-val="9">滋賀県</option>
                        <option value="京都" {{session('luggage_loading_space') == '京都' ? 'selected' : ''}} data-val="9">京都府</option>
                        <option value="兵庫" {{session('luggage_loading_space') == '兵庫' ? 'selected' : ''}} data-val="9">兵庫県</option>
                        <option value="大阪" {{session('luggage_loading_space') == '大阪' ? 'selected' : ''}} data-val="9">大阪府</option>
                        <option value="和歌山" {{session('luggage_loading_space') == '和歌山' ? 'selected' : ''}} data-val="9">和歌山県</option>
                        <option value="奈良" {{session('luggage_loading_space') == '奈良' ? 'selected' : ''}} data-val="9">奈良県</option>
                        <option value="島根" {{session('luggage_loading_space') == '島根' ? 'selected' : ''}} data-val="10">島根県</option>
                        <option value="鳥取" {{session('luggage_loading_space') == '鳥取' ? 'selected' : ''}} data-val="10">鳥取県</option>
                        <option value="岡山" {{session('luggage_loading_space') == '岡山' ? 'selected' : ''}} data-val="10">岡山県</option>
                        <option value="広島" {{session('luggage_loading_space') == '広島' ? 'selected' : ''}} data-val="10">広島県</option>
                        <option value="山口" {{session('luggage_loading_space') == '山口' ? 'selected' : ''}} data-val="10">山口県</option>
                        <option value="徳島" {{session('luggage_loading_space') == '徳島' ? 'selected' : ''}} data-val="11">徳島県</option>
                        <option value="香川" {{session('luggage_loading_space') == '香川' ? 'selected' : ''}} data-val="11">香川県</option>
                        <option value="愛媛" {{session('luggage_loading_space') == '愛媛' ? 'selected' : ''}} data-val="11">愛媛県</option>
                        <option value="高知" {{session('luggage_loading_space') == '高知' ? 'selected' : ''}} data-val="11">高知県</option>
                        <option value="福岡" {{session('luggage_loading_space') == '福岡' ? 'selected' : ''}} data-val="12">福岡県</option>
                        <option value="佐賀" {{session('luggage_loading_space') == '佐賀' ? 'selected' : ''}} data-val="12">佐賀県</option>
                        <option value="長崎" {{session('luggage_loading_space') == '長崎' ? 'selected' : ''}} data-val="12">長崎県</option>
                        <option value="熊本" {{session('luggage_loading_space') == '熊本' ? 'selected' : ''}} data-val="12">熊本県</option>
                        <option value="大分" {{session('luggage_loading_space') == '大分' ? 'selected' : ''}} data-val="12">大分県</option>
                        <option value="宮崎" {{session('luggage_loading_space') == '宮崎' ? 'selected' : ''}} data-val="12">宮崎県</option>
                        <option value="鹿児島" {{session('luggage_loading_space') == '鹿児島' ? 'selected' : ''}} data-val="12">鹿児島県</option>
                        <option value="沖縄" {{session('luggage_loading_space') == '沖縄' ? 'selected' : ''}} data-val="12">沖縄県</option>
                    </select>
                </div>

                <div class = "form-group mb-2">
                    <input type="text" class="col form-control input_style" data-date-format="yyyy-mm-dd" id="kt_datepicker_1" name="loading_start" placeholder="積日を指定" value="{{old('loading_start')}}">
                </div>
                <div class = "from_text kt-align-center">～</div>
                <div class = "form-group mt-2">
                    <input type="text" class="col form-control input_style" data-date-format="yyyy-mm-dd" id="kt_datepicker_2" name="loading_end" placeholder="積日を指定" value="{{old('loading_end')}}">
                </div>

                <div class="form-group">
                    <label for="exampleSelect2">降地</label>
                    <select class="form-control mb-2" id="area02" name="luggage_drop_country">
                        <option value="null" style="display:none">地方を選択</option>
                        <option value="0"></option>
                        <option value="1" {{session('luggage_drop_country') == '1' ? 'selected' : ''}}>北海道</option>
                        <option value="2" {{session('luggage_drop_country') == '2' ? 'selected' : ''}}>北東北</option>
                        <option value="3" {{session('luggage_drop_country') == '3' ? 'selected' : ''}}>南東北</option>
                        <option value="4" {{session('luggage_drop_country') == '4' ? 'selected' : ''}}>北関東</option>
                        <option value="5" {{session('luggage_drop_country') == '5' ? 'selected' : ''}}>南関東</option>
                        <option value="6" {{session('luggage_drop_country') == '6' ? 'selected' : ''}}>甲信越</option>
                        <option value="7" {{session('luggage_drop_country') == '7' ? 'selected' : ''}}>北陸</option>
                        <option value="8" {{session('luggage_drop_country') == '8' ? 'selected' : ''}}>中京</option>
                        <option value="9" {{session('luggage_drop_country') == '9' ? 'selected' : ''}}>関西</option>
                        <option value="10" {{session('luggage_drop_country') == '10' ? 'selected' : ''}}>中国</option>
                        <option value="11" {{session('luggage_drop_country') == '11' ? 'selected' : ''}}>四国</option>
                        <option value="12" {{session('luggage_drop_country') == '12' ? 'selected' : ''}}>九州・沖縄</option>
                    </select>

                    <select class="form-control" id="pref02" name="drop_space">
                        <option data-val="0" style="display:none;" value="">県を選択</option>
                        <option value="0" data-val="0"></option>
                        <option value="北海" {{session('luggage_drop_space') == '北海' ? 'selected' : ''}} data-val="1">北海道</option>
                        <option value="青森" {{session('luggage_drop_space') == '青森' ? 'selected' : ''}} data-val="2">青森県</option>
                        <option value="岩手" {{session('luggage_drop_space') == '岩手' ? 'selected' : ''}} data-val="2">岩手県</option>
                        <option value="宮城" {{session('luggage_drop_space') == '宮城' ? 'selected' : ''}} data-val="3">宮城県</option>
                        <option value="秋田" {{session('luggage_drop_space') == '秋田' ? 'selected' : ''}} data-val="2">秋田県</option>
                        <option value="山形" {{session('luggage_drop_space') == '山形' ? 'selected' : ''}} data-val="3">山形県</option>
                        <option value="福島" {{session('luggage_drop_space') == '福島' ? 'selected' : ''}} data-val="3">福島県</option>
                        <option value="茨城" {{session('luggage_drop_space') == '茨城' ? 'selected' : ''}} data-val="4">茨城県</option>
                        <option value="栃木" {{session('luggage_drop_space') == '栃木' ? 'selected' : ''}} data-val="4">栃木県</option>
                        <option value="群馬" {{session('luggage_drop_space') == '群馬' ? 'selected' : ''}} data-val="4">群馬県</option>
                        <option value="埼玉" {{session('luggage_drop_space') == '埼玉' ? 'selected' : ''}} data-val="5">埼玉県</option>
                        <option value="千葉" {{session('luggage_drop_space') == '千葉' ? 'selected' : ''}} data-val="5">千葉県</option>
                        <option value="東京" {{session('luggage_drop_space') == '東京' ? 'selected' : ''}} data-val="5">東京都</option>
                        <option value="神奈川" {{session('luggage_drop_space') == '神奈川' ? 'selected' : ''}} data-val="5">神奈川県</option>
                        <option value="新潟" {{session('luggage_drop_space') == '新潟' ? 'selected' : ''}} data-val="6">新潟県</option>
                        <option value="富山" {{session('luggage_drop_space') == '富山' ? 'selected' : ''}} data-val="7">富山県</option>
                        <option value="石川" {{session('luggage_drop_space') == '石川' ? 'selected' : ''}} data-val="7">石川県</option>
                        <option value="福井" {{session('luggage_drop_space') == '福井' ? 'selected' : ''}} data-val="7">福井県</option>
                        <option value="山梨" {{session('luggage_drop_space') == '山梨' ? 'selected' : ''}} data-val="6">山梨県</option>
                        <option value="長野" {{session('luggage_drop_space') == '長野' ? 'selected' : ''}} data-val="6">長野県</option>
                        <option value="静岡" {{session('luggage_drop_space') == '静岡' ? 'selected' : ''}} data-val="8">静岡県</option>
                        <option value="岐阜" {{session('luggage_drop_space') == '岐阜' ? 'selected' : ''}} data-val="8">岐阜県</option>
                        <option value="愛知" {{session('luggage_drop_space') == '愛知' ? 'selected' : ''}} data-val="8">愛知県</option>
                        <option value="三重" {{session('luggage_drop_space') == '三重' ? 'selected' : ''}} data-val="8">三重県</option>
                        <option value="滋賀" {{session('luggage_drop_space') == '滋賀' ? 'selected' : ''}} data-val="9">滋賀県</option>
                        <option value="京都" {{session('luggage_drop_space') == '京都' ? 'selected' : ''}} data-val="9">京都府</option>
                        <option value="兵庫" {{session('luggage_drop_space') == '兵庫' ? 'selected' : ''}} data-val="9">兵庫県</option>
                        <option value="大阪" {{session('luggage_drop_space') == '大阪' ? 'selected' : ''}} data-val="9">大阪府</option>
                        <option value="和歌山" {{session('luggage_drop_space') == '和歌山' ? 'selected' : ''}} data-val="9">和歌山県</option>
                        <option value="奈良" {{session('luggage_drop_space') == '奈良' ? 'selected' : ''}} data-val="9">奈良県</option>
                        <option value="島根" {{session('luggage_drop_space') == '島根' ? 'selected' : ''}} data-val="10">島根県</option>
                        <option value="鳥取" {{session('luggage_drop_space') == '鳥取' ? 'selected' : ''}} data-val="10">鳥取県</option>
                        <option value="岡山" {{session('luggage_drop_space') == '岡山' ? 'selected' : ''}} data-val="10">岡山県</option>
                        <option value="広島" {{session('luggage_drop_space') == '広島' ? 'selected' : ''}} data-val="10">広島県</option>
                        <option value="山口" {{session('luggage_drop_space') == '山口' ? 'selected' : ''}} data-val="10">山口県</option>
                        <option value="徳島" {{session('luggage_drop_space') == '徳島' ? 'selected' : ''}} data-val="11">徳島県</option>
                        <option value="香川" {{session('luggage_drop_space') == '香川' ? 'selected' : ''}} data-val="11">香川県</option>
                        <option value="愛媛" {{session('luggage_drop_space') == '愛媛' ? 'selected' : ''}} data-val="11">愛媛県</option>
                        <option value="高知" {{session('luggage_drop_space') == '高知' ? 'selected' : ''}} data-val="11">高知県</option>
                        <option value="福岡" {{session('luggage_drop_space') == '福岡' ? 'selected' : ''}} data-val="12">福岡県</option>
                        <option value="佐賀" {{session('luggage_drop_space') == '佐賀' ? 'selected' : ''}} data-val="12">佐賀県</option>
                        <option value="長崎" {{session('luggage_drop_space') == '長崎' ? 'selected' : ''}} data-val="12">長崎県</option>
                        <option value="熊本" {{session('luggage_drop_space') == '熊本' ? 'selected' : ''}} data-val="12">熊本県</option>
                        <option value="大分" {{session('luggage_drop_space') == '大分' ? 'selected' : ''}} data-val="12">大分県</option>
                        <option value="宮崎" {{session('luggage_drop_space') == '宮崎' ? 'selected' : ''}} data-val="12">宮崎県</option>
                        <option value="鹿児島" {{session('luggage_drop_space') == '鹿児島' ? 'selected' : ''}} data-val="12">鹿児島県</option>
                        <option value="沖縄" {{session('luggage_drop_space') == '沖縄' ? 'selected' : ''}} data-val="12">沖縄県</option>
                    </select>
                </div>
                <div class = "form-group mb-2">
                    <input type="text" class="col form-control input_style" data-date-format="yyyy-mm-dd" id="kt_datepicker_3" name="drop_start" placeholder="降日を指定" value="{{old('drop_start')}}">
                </div>
                <div class="from_text kt-align-center">～</div>

                <div class = "form-group mt-2">
                   <input type="text" class="col form-control input_style" data-date-format="yyyy-mm-dd" id="kt_datepicker_2" name="drop_end" placeholder="降日を指定" value="{{old('drop_end')}}">
                </div>

                <div class="kt-action_info__content">
                    <div class = "kt-widget5_section-left">
                      <button type="submit" class="btn  btn-wide" style =" width:100%">検 索</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <div class="kt-portlet  kt-portlet--check kt-portlet--fit kt-portlet--head-noborder">
        <div class="kt-portlet__body kt-portlet__space-x sidebar02">
            <div class = "kt-align-center emptytruck-check ">空車情報検索</div>
        </div>
    </div>

    <div class = "kt-portlet">
        <div class = "kt-portlet__body kt-portlet_check">
            <form action="{{url('simpleTruck_search')}}" method="post" class="kt-form">
                @csrf
                <div class="form-group">
                    <label for="exampleSelect3">積地</label>
                    <select class="form-control mb-2" id="area11" name="loading_country">
                        <option value="null" style="display:none">地方を選択</option>
                        <option value="0"></option>
                        <option value="1" {{session('emptycar_loading_country') == '1' ? 'selected' : ''}}>北海道</option>
                        <option value="2" {{session('emptycar_loading_country') == '2' ? 'selected' : ''}}>北東北</option>
                        <option value="3" {{session('emptycar_loading_country') == '3' ? 'selected' : ''}}>南東北</option>
                        <option value="4" {{session('emptycar_loading_country') == '4' ? 'selected' : ''}}>北関東</option>
                        <option value="5" {{session('emptycar_loading_country') == '5' ? 'selected' : ''}}>南関東</option>
                        <option value="6" {{session('emptycar_loading_country') == '6' ? 'selected' : ''}}>甲信越</option>
                        <option value="7" {{session('emptycar_loading_country') == '7' ? 'selected' : ''}}>北陸</option>
                        <option value="8" {{session('emptycar_loading_country') == '8' ? 'selected' : ''}}>中京</option>
                        <option value="9" {{session('emptycar_loading_country') == '9' ? 'selected' : ''}}>関西</option>
                        <option value="10" {{session('emptycar_loading_country') == '10' ? 'selected' : ''}}>中国</option>
                        <option value="11" {{session('emptycar_loading_country') == '11' ? 'selected' : ''}}>四国</option>
                        <option value="12" {{session('emptycar_loading_country') == '12' ? 'selected' : ''}}>九州・沖縄</option>
                    </select>

                    <select class="form-control" id="pref11" name="loading_space">
                        <option value="" style="display:none">県を選択</option>
                        <option value="0" data-val="0"></option>
                        <option value="北海" {{session('emptycar_loading_space') == '北海' ? 'selected' : ''}} data-val="1">北海道</option>
                        <option value="青森" {{session('emptycar_loading_space') == '青森' ? 'selected' : ''}} data-val="2">青森県</option>
                        <option value="岩手" {{session('emptycar_loading_space') == '岩手' ? 'selected' : ''}} data-val="2">岩手県</option>
                        <option value="宮城" {{session('emptycar_loading_space') == '宮城' ? 'selected' : ''}} data-val="3">宮城県</option>
                        <option value="秋田" {{session('emptycar_loading_space') == '秋田' ? 'selected' : ''}} data-val="2">秋田県</option>
                        <option value="山形" {{session('emptycar_loading_space') == '山形' ? 'selected' : ''}} data-val="3">山形県</option>
                        <option value="福島" {{session('emptycar_loading_space') == '福島' ? 'selected' : ''}} data-val="3">福島県</option>
                        <option value="茨城" {{session('emptycar_loading_space') == '茨城' ? 'selected' : ''}} data-val="4">茨城県</option>
                        <option value="栃木" {{session('emptycar_loading_space') == '栃木' ? 'selected' : ''}} data-val="4">栃木県</option>
                        <option value="群馬" {{session('emptycar_loading_space') == '群馬' ? 'selected' : ''}} data-val="4">群馬県</option>
                        <option value="埼玉" {{session('emptycar_loading_space') == '埼玉' ? 'selected' : ''}} data-val="5">埼玉県</option>
                        <option value="千葉" {{session('emptycar_loading_space') == '千葉' ? 'selected' : ''}} data-val="5">千葉県</option>
                        <option value="東京" {{session('emptycar_loading_space') == '東京' ? 'selected' : ''}} data-val="5">東京都</option>
                        <option value="神奈川" {{session('emptycar_loading_space') == '神奈川' ? 'selected' : ''}} data-val="5">神奈川県</option>
                        <option value="新潟" {{session('emptycar_loading_space') == '新潟' ? 'selected' : ''}} data-val="6">新潟県</option>
                        <option value="富山" {{session('emptycar_loading_space') == '富山' ? 'selected' : ''}} data-val="7">富山県</option>
                        <option value="石川" {{session('emptycar_loading_space') == '石川' ? 'selected' : ''}} data-val="7">石川県</option>
                        <option value="福井" {{session('emptycar_loading_space') == '福井' ? 'selected' : ''}} data-val="7">福井県</option>
                        <option value="山梨" {{session('emptycar_loading_space') == '山梨' ? 'selected' : ''}} data-val="6">山梨県</option>
                        <option value="長野" {{session('emptycar_loading_space') == '長野' ? 'selected' : ''}} data-val="6">長野県</option>
                        <option value="静岡" {{session('emptycar_loading_space') == '静岡' ? 'selected' : ''}} data-val="8">静岡県</option>
                        <option value="岐阜" {{session('emptycar_loading_space') == '岐阜' ? 'selected' : ''}} data-val="8">岐阜県</option>
                        <option value="愛知" {{session('emptycar_loading_space') == '愛知' ? 'selected' : ''}} data-val="8">愛知県</option>
                        <option value="三重" {{session('emptycar_loading_space') == '三重' ? 'selected' : ''}} data-val="8">三重県</option>
                        <option value="滋賀" {{session('emptycar_loading_space') == '滋賀' ? 'selected' : ''}} data-val="9">滋賀県</option>
                        <option value="京都" {{session('emptycar_loading_space') == '京都' ? 'selected' : ''}} data-val="9">京都府</option>
                        <option value="兵庫" {{session('emptycar_loading_space') == '兵庫' ? 'selected' : ''}} data-val="9">兵庫県</option>
                        <option value="大阪" {{session('emptycar_loading_space') == '大阪' ? 'selected' : ''}} data-val="9">大阪府</option>
                        <option value="和歌山" {{session('emptycar_loading_space') == '和歌山' ? 'selected' : ''}} data-val="9">和歌山県</option>
                        <option value="奈良" {{session('emptycar_loading_space') == '奈良' ? 'selected' : ''}} data-val="9">奈良県</option>
                        <option value="島根" {{session('emptycar_loading_space') == '島根' ? 'selected' : ''}} data-val="10">島根県</option>
                        <option value="鳥取" {{session('emptycar_loading_space') == '鳥取' ? 'selected' : ''}} data-val="10">鳥取県</option>
                        <option value="岡山" {{session('emptycar_loading_space') == '岡山' ? 'selected' : ''}} data-val="10">岡山県</option>
                        <option value="広島" {{session('emptycar_loading_space') == '広島' ? 'selected' : ''}} data-val="10">広島県</option>
                        <option value="山口" {{session('emptycar_loading_space') == '山口' ? 'selected' : ''}} data-val="10">山口県</option>
                        <option value="徳島" {{session('emptycar_loading_space') == '徳島' ? 'selected' : ''}} data-val="11">徳島県</option>
                        <option value="香川" {{session('emptycar_loading_space') == '香川' ? 'selected' : ''}} data-val="11">香川県</option>
                        <option value="愛媛" {{session('emptycar_loading_space') == '愛媛' ? 'selected' : ''}} data-val="11">愛媛県</option>
                        <option value="高知" {{session('emptycar_loading_space') == '高知' ? 'selected' : ''}} data-val="11">高知県</option>
                        <option value="福岡" {{session('emptycar_loading_space') == '福岡' ? 'selected' : ''}} data-val="12">福岡県</option>
                        <option value="佐賀" {{session('emptycar_loading_space') == '佐賀' ? 'selected' : ''}} data-val="12">佐賀県</option>
                        <option value="長崎" {{session('emptycar_loading_space') == '長崎' ? 'selected' : ''}} data-val="12">長崎県</option>
                        <option value="熊本" {{session('emptycar_loading_space') == '熊本' ? 'selected' : ''}} data-val="12">熊本県</option>
                        <option value="大分" {{session('emptycar_loading_space') == '大分' ? 'selected' : ''}} data-val="12">大分県</option>
                        <option value="宮崎" {{session('emptycar_loading_space') == '宮崎' ? 'selected' : ''}} data-val="12">宮崎県</option>
                        <option value="鹿児島" {{session('emptycar_loading_space') == '鹿児島' ? 'selected' : ''}} data-val="12">鹿児島県</option>
                        <option value="沖縄" {{session('emptycar_loading_space') == '沖縄' ? 'selected' : ''}} data-val="12">沖縄県</option>
                    </select>
                </div>

                <div class = "form-group mb-2">
                <input type="text" class="col form-control input_style" data-date-format="yyyy-mm-dd" id="kt_datepicker_5" name="loading_start" placeholder="積日を指定">
                </div>
                <div class="from_text kt-align-center">～</div>

                <div class = "form-group mt-2">
                <input type="text" class="col form-control input_style" data-date-format="yyyy-mm-dd" id="kt_datepicker_6" name="loading_end" placeholder="積日を指定">
                </div>

                <div class="form-group">
                    <label for="exampleSelect4">降地</label>
                    <select class="form-control mb-2" id="area12" name="drop_country">
                        <option value="null" style="display:none">地方を選択</option>
                        <option value="0"></option>
                        <option value="1" {{session('emptycar_drop_country') == '1' ? 'selected' : ''}}>北海道</option>
                        <option value="2" {{session('emptycar_drop_country') == '2' ? 'selected' : ''}}>北東北</option>
                        <option value="3" {{session('emptycar_drop_country') == '3' ? 'selected' : ''}}>南東北</option>
                        <option value="4" {{session('emptycar_drop_country') == '4' ? 'selected' : ''}}>北関東</option>
                        <option value="5" {{session('emptycar_drop_country') == '5' ? 'selected' : ''}}>南関東</option>
                        <option value="6" {{session('emptycar_drop_country') == '6' ? 'selected' : ''}}>甲信越</option>
                        <option value="7" {{session('emptycar_drop_country') == '7' ? 'selected' : ''}}>北陸</option>
                        <option value="8" {{session('emptycar_drop_country') == '8' ? 'selected' : ''}}>中京</option>
                        <option value="9" {{session('emptycar_drop_country') == '9' ? 'selected' : ''}}>関西</option>
                        <option value="10" {{session('emptycar_drop_country') == '10' ? 'selected' : ''}}>中国</option>
                        <option value="11" {{session('emptycar_drop_country') == '11' ? 'selected' : ''}}>四国</option>
                        <option value="12" {{session('emptycar_drop_country') == '12' ? 'selected' : ''}}>九州・沖縄</option>
                    </select>

                    <select class="form-control" id="pref12" name="drop_space">
                        <option value="" style="display:none">県を選択</option>
                        <option value="0" data-val="0"></option>
                        <option value="北海" {{session('emptycar_drop_space') == '北海' ? 'selected' : ''}} data-val="1">北海道</option>
                        <option value="青森" {{session('emptycar_drop_space') == '青森' ? 'selected' : ''}} data-val="2">青森県</option>
                        <option value="岩手" {{session('emptycar_drop_space') == '岩手' ? 'selected' : ''}} data-val="2">岩手県</option>
                        <option value="宮城" {{session('emptycar_drop_space') == '宮城' ? 'selected' : ''}} data-val="3">宮城県</option>
                        <option value="秋田" {{session('emptycar_drop_space') == '秋田' ? 'selected' : ''}} data-val="2">秋田県</option>
                        <option value="山形" {{session('emptycar_drop_space') == '山形' ? 'selected' : ''}} data-val="3">山形県</option>
                        <option value="福島" {{session('emptycar_drop_space') == '福島' ? 'selected' : ''}} data-val="3">福島県</option>
                        <option value="茨城" {{session('emptycar_drop_space') == '茨城' ? 'selected' : ''}} data-val="4">茨城県</option>
                        <option value="栃木" {{session('emptycar_drop_space') == '栃木' ? 'selected' : ''}} data-val="4">栃木県</option>
                        <option value="群馬" {{session('emptycar_drop_space') == '群馬' ? 'selected' : ''}} data-val="4">群馬県</option>
                        <option value="埼玉" {{session('emptycar_drop_space') == '埼玉' ? 'selected' : ''}} data-val="5">埼玉県</option>
                        <option value="千葉" {{session('emptycar_drop_space') == '千葉' ? 'selected' : ''}} data-val="5">千葉県</option>
                        <option value="東京" {{session('emptycar_drop_space') == '東京' ? 'selected' : ''}} data-val="5">東京都</option>
                        <option value="神奈川" {{session('emptycar_drop_space') == '神奈川' ? 'selected' : ''}} data-val="5">神奈川県</option>
                        <option value="新潟" {{session('emptycar_drop_space') == '新潟' ? 'selected' : ''}} data-val="6">新潟県</option>
                        <option value="富山" {{session('emptycar_drop_space') == '富山' ? 'selected' : ''}} data-val="7">富山県</option>
                        <option value="石川" {{session('emptycar_drop_space') == '石川' ? 'selected' : ''}} data-val="7">石川県</option>
                        <option value="福井" {{session('emptycar_drop_space') == '福井' ? 'selected' : ''}} data-val="7">福井県</option>
                        <option value="山梨" {{session('emptycar_drop_space') == '山梨' ? 'selected' : ''}} data-val="6">山梨県</option>
                        <option value="長野" {{session('emptycar_drop_space') == '長野' ? 'selected' : ''}} data-val="6">長野県</option>
                        <option value="静岡" {{session('emptycar_drop_space') == '静岡' ? 'selected' : ''}} data-val="8">静岡県</option>
                        <option value="岐阜" {{session('emptycar_drop_space') == '岐阜' ? 'selected' : ''}} data-val="8">岐阜県</option>
                        <option value="愛知" {{session('emptycar_drop_space') == '愛知' ? 'selected' : ''}} data-val="8">愛知県</option>
                        <option value="三重" {{session('emptycar_drop_space') == '三重' ? 'selected' : ''}} data-val="8">三重県</option>
                        <option value="滋賀" {{session('emptycar_drop_space') == '滋賀' ? 'selected' : ''}} data-val="9">滋賀県</option>
                        <option value="京都" {{session('emptycar_drop_space') == '京都' ? 'selected' : ''}} data-val="9">京都府</option>
                        <option value="兵庫" {{session('emptycar_drop_space') == '兵庫' ? 'selected' : ''}} data-val="9">兵庫県</option>
                        <option value="大阪" {{session('emptycar_drop_space') == '大阪' ? 'selected' : ''}} data-val="9">大阪府</option>
                        <option value="和歌山" {{session('emptycar_drop_space') == '和歌山' ? 'selected' : ''}} data-val="9">和歌山県</option>
                        <option value="奈良" {{session('emptycar_drop_space') == '奈良' ? 'selected' : ''}} data-val="9">奈良県</option>
                        <option value="島根" {{session('emptycar_drop_space') == '島根' ? 'selected' : ''}} data-val="10">島根県</option>
                        <option value="鳥取" {{session('emptycar_drop_space') == '鳥取' ? 'selected' : ''}} data-val="10">鳥取県</option>
                        <option value="岡山" {{session('emptycar_drop_space') == '岡山' ? 'selected' : ''}} data-val="10">岡山県</option>
                        <option value="広島" {{session('emptycar_drop_space') == '広島' ? 'selected' : ''}} data-val="10">広島県</option>
                        <option value="山口" {{session('emptycar_drop_space') == '山口' ? 'selected' : ''}} data-val="10">山口県</option>
                        <option value="徳島" {{session('emptycar_drop_space') == '徳島' ? 'selected' : ''}} data-val="11">徳島県</option>
                        <option value="香川" {{session('emptycar_drop_space') == '香川' ? 'selected' : ''}} data-val="11">香川県</option>
                        <option value="愛媛" {{session('emptycar_drop_space') == '愛媛' ? 'selected' : ''}} data-val="11">愛媛県</option>
                        <option value="高知" {{session('emptycar_drop_space') == '高知' ? 'selected' : ''}} data-val="11">高知県</option>
                        <option value="福岡" {{session('emptycar_drop_space') == '福岡' ? 'selected' : ''}} data-val="12">福岡県</option>
                        <option value="佐賀" {{session('emptycar_drop_space') == '佐賀' ? 'selected' : ''}} data-val="12">佐賀県</option>
                        <option value="長崎" {{session('emptycar_drop_space') == '長崎' ? 'selected' : ''}} data-val="12">長崎県</option>
                        <option value="熊本" {{session('emptycar_drop_space') == '熊本' ? 'selected' : ''}} data-val="12">熊本県</option>
                        <option value="大分" {{session('emptycar_drop_space') == '大分' ? 'selected' : ''}} data-val="12">大分県</option>
                        <option value="宮崎" {{session('emptycar_drop_space') == '宮崎' ? 'selected' : ''}} data-val="12">宮崎県</option>
                        <option value="鹿児島" {{session('emptycar_drop_space') == '鹿児島' ? 'selected' : ''}} data-val="12">鹿児島県</option>
                        <option value="沖縄" {{session('emptycar_drop_space') == '沖縄' ? 'selected' : ''}} data-val="12">沖縄県</option>
                    </select>
                </div>
                <div class = "form-group mb-2">
               <input type="text" class="col form-control input_style" data-date-format="yyyy-mm-dd" id="kt_datepicker_1" name="drop_start" placeholder="降日を指定">
                </div>
                <div class="from_text kt-align-center">～</div>

                <div class = "form-group mt-2">
                    <input type="text" class="col form-control input_style" data-date-format="yyyy-mm-dd" id="kt_datepicker_1" name="drop_end" placeholder="降日を指定">
                </div>

                <div class="kt-action_info__content">
                    <div class = "kt-widget5_section-right">
                           <button type="submit" class="btn  btn-wide" style =" width:100%">検 索</button>
                    </div>
                </div>

            </form>
       </div>
    </div>
    <!--end:: Widgets/Inbound Bandwidth-->
    <div class="kt-space-20"></div>
</div>
