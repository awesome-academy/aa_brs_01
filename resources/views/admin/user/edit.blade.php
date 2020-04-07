@extends('admin.master')
@section('title','chỉnh sửa user')
@section('content')
@include('admin.layouts.sidebar')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">Chỉnh sửa thông tin</li>
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Chỉnh sửa thông tin</h1>
        </div>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    @if($user->avatar!='')
                    <img class="card-img-top" src="{{url($user->avatar)}}"  style="width:100%">
                    @endif
                    <h4>{{$user->name}}</h4>
                    @if($user->role!=1)
                    <h4>Thành viên</h4>
                    @else <h4>Quản trị viên</h4>
                    @endif
        
                </div>
            </div>
        </div>
        <div class="col-6">
            <form method="post">
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <fieldset>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Vai trò</label>
                        <div class="col-lg-10">
                            <select name = "role">
                                <option value="0">Thành viên</option>
                                <option value="1">Quản trị viên</option>
                             </select>
                        </div>
                    </div>
                  
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type ="reset" class="btn btn-default">Hủy bỏ</button>
                            <button type="submit" class="btn btn-primary">Sửa</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
    
@endsection