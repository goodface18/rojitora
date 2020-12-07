@extends('backend.master')
@section('site-title')
    ロジとら
@endsection
@section('main-content')
    <div class="page-content-wrapper">

        <div class="page-content">
            @if(Session::has('msg'))
            <script>
                $(document).ready(function(){
                    swal("{{Session::get('msg')}}","", "success");
                });
            </script>
            @endif
            <h3 class="page-title bold">空車管理
            </h3>
            <div class="col-md-8">
                <form method="post" class="form-inline" action="{{route('emptycar.search')}}">
                    {{csrf_field()}}
                    <input style="color: blue" class="input-small form-control" value="{{$search}}" type="text" name="search" placeholder="検索語を入力">
                    <button class="btn purple" name="filter">検索</button>
                </form>
            </div>
            <br>
            <hr>
            <br>
            <div class="portlet box purple">
                <div class="portlet-title col-md-12">
                    <div class="caption col-md-4">
                        <i class="fa fa-th"></i>空車リスト</div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-hover" id="order_table">
                            <thead>
                                <tr>
                                    <th scope="col"> 空車ID </th>
                                    <th scope="col"> 空車日時 </th>
                                    <th scope="col"> 空車地</th>
                                    <th scope="col"> 市区町村 </th>
                                    <th scope="col"> 積可能地 </th>
                                    <th scope="col"> 降日時 </th>
                                    <th scope="col"> 降可能地 </th>
                                    <th scope="col"> 車輌 </th>
                                    <th scope="col"> 電話番号 </th>
                                    <th scope="col"> 担当者 </th>
                                    <th scope="col"> 動作 </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($emptycar as $data)

                                <tr>
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->emptycar_date}}</td>
                                    <td>{{$data->emptycar_space}}</td>
                                    <td>{{$data->emptycar_city}}</td>
                                    <td>{{$data->emptycar_land_pos_loading}}</td>
                                    <td>{{$data->drop_date}}</td>
                                    <td>{{$data->land_pos_drop}}</td>
                                    <td>{{$data->vehicle_inf}}</td>
                                    <td>{{$data->phone_number}}</td>
                                    <td>{{$data->person_charge}}</td>
                                    <td>
                                        <a class="btn bg-dark bg-font-dark" data-toggle="modal" href="{{route('emptycar.update', $data->id)}}" data-target="#myModal{{$data->id}}"><i class="fa fa-edit"></i> 表示/編集</a>
                                        <a href="{{route('emptycar.delete', $data->id)}}" class="btn btn-danger">削除</a>

                                        <!-- Modal -->
                                        <div class="modal fade text-left" id="myModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{route('emptycar.update', $data->id)}}" method="post" class="form-horizontal">
                                                        {{csrf_field()}}
                                                        {{method_field('put')}}
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                                            <h4 class="modal-title">更新</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-body">
                                                                空車日時: <input type="text" value="{{$data->emptycar_date}}" name="emptycar_date" class="form-control"><br>
                                                                空車地: <input type="text" value="{{$data->emptycar_space}}" name="emptycar_space" class="form-control"><br>
                                                                市区町村: <input type="text" value="{{$data->emptycar_city}}" name="emptycar_city" class="form-control"><br>
                                                                積可能地: <input type="text" value="{{$data->emptycar_land_pos_loading}}" name="emptycar_land_pos_loading" class="form-control"><br>
                                                                降日時: <input type="text" value="{{$data->drop_date}}" name="drop_date" class="form-control"><br>
                                                                降可能地: <input type="text" value="{{$data->land_pos_drop}}" name="land_pos_drop" class="form-control"><br>
                                                                車輌: <input type="text" value="{{$data->vehicle_inf}}" name="vehicle_inf" class="form-control"><br>
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
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        {{$emptycar->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
