@extends('backend.master')
@section('site-title')
    ロジとら
@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            @if(Session::has('msg'))
                <script>
                    $(document).ready(function(){
                        swal("{{Session::get('msg')}}","", "success");
                    });
                </script>
            @endif
            <h3 class="page-title bold">貨物管理
                    <hr>
            </h3>
            <div class="col-md-8">
                <form method="post" class="form-inline" action="{{route('luggage.search')}}">
                    {{csrf_field()}}
                    <input style="color: blue" class="input-small form-control" value="{{$search}}" type="text" name="search" placeholder="検索語を入力">
                    <button class="btn purple-medium" name="filter">検索</button>
                </form>
            </div>
            <br>
            <hr>
            <br>
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet box purple-medium">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-briefcase"></i>貨物リスト
                            </div>
                            <div class="tools">
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>
                                        荷物ID
                                    </th>
                                    <th>
                                        積日時
                                    </th>
                                    <th>
                                        積地
                                    </th>
                                    <th>
                                        市区町村
                                    </th>
                                    <th>
                                        降日時
                                    </th>
                                    <th>
                                        降地
                                    </th>
                                    <th>
                                        市区町村
                                    </th>
                                    <th>
                                        荷物
                                    </th>
                                    <th>
                                        荷物重量
                                    </th>
                                    <th>
                                        車輌
                                    </th>
                                    <th>
                                        運賃(税抜)
                                    </th>
                                    <th>
                                        電話番号
                                    </th>
                                    <th>
                                        担当者
                                    </th>
                                    <th>
                                        動作
                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($luggage as $data)
                                <tr id="row1">
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->loading_date}}</td>
                                    <td>{{$data->loading_space}}</td>
                                    <td>{{$data->loading_city}}</td>
                                    <td>{{$data->drop_date}}</td>
                                    <td>{{$data->drop_space}}</td>
                                    <td>{{$data->drop_city}}</td>
                                    <td>{{$data->baggage_name}}</td>
                                    <td>{{$data->baggage_weight}}</td>
                                    <td>{{$data->vehicle_inf}}</td>
                                    <td>{{$data->fares_money}}</td>
                                    <td>{{$data->phone_number}}</td>
                                    <td>{{$data->person_charge}}</td>
                                    <td>
                                        <a class="btn bg-dark bg-font-dark" data-toggle="modal" href="{{route('luggage.update', $data->id)}}" data-target="#myModal{{$data->id}}"><i class="fa fa-edit"></i> 表示/編集</a>
                                        <a class="btn red" data-toggle="modal" href="#deleteModal{{$data->id}}"><i class="fa fa-trash"></i> 削除</a>
                                    </td>
                                </tr>

                                        <!-- Modal -->
                                        <div class="modal fade text-left" id="myModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{route('luggage.update', $data->id)}}" method="post" class="form-horizontal">
                                                        {{csrf_field()}}
                                                        {{method_field('put')}}
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                                            <h4 class="modal-title">更新</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-body">
                                                                積日時: <input type="text" value="{{$data->loading_date}}" name="loading_date" class="form-control"><br>
                                                                積地: <input type="text" value="{{$data->loading_space}}" name="loading_space" class="form-control"><br>
                                                                市区町村: <input type="text" value="{{$data->loading_city}}" name="loading_city" class="form-control"><br>
                                                                降日時: <input type="text" value="{{$data->drop_date}}" name="drop_date" class="form-control"><br>
                                                                市区町村: <input type="text" value="{{$data->drop_space}}" name="drop_space" class="form-control"><br>
                                                                荷物: <input type="text" value="{{$data->drop_city}}" name="drop_city" class="form-control"><br>
                                                                荷物重量: <input type="text" value="{{$data->baggage_name}}" name="baggage_name" class="form-control"><br>
                                                                車輌: <input type="text" value="{{$data->baggage_weight}}" name="baggage_weight" class="form-control"><br>
                                                                運賃(税抜): <input type="text" value="{{$data->vehicle_inf}}" name="vehicle_inf" class="form-control"><br>
                                                                運賃(税抜): <input type="text" value="{{$data->fares_money}}" name="fares_money" class="form-control"><br>
                                                                担当者: <input type="text" value="{{$data->person_charge}}" name="person_charge" class="form-control"><br>
                                                                電話番号: <input type="text" value="{{$data->phone_number}}" name="phone_number" class="form-control"><br>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">閉める</button>
                                                                    <button type="submit" class="btn blue-sharp">変更保管</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>

                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>     


                                <div id="deleteModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h2 class="modal-title" style="color: red;">本当に削除しますか？</h2>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" data-dismiss="modal" class="btn default">閉める</button>
                                                <a type="submit" href="{{route('luggage.delete', $data->id)}}" class="btn red" id="delete"><i class="fa fa-trash"></i> 削除</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
            <!-- END PAGE CONTENT-->
         
        </div>
    </div>
@endsection