@extends('admin.layouts.app')
@section('title', 'Edit | Sign In Page')
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_page_signin_update') }}" method="post">
                        @csrf

                        <div class="form-group mb-3">
                            <label>Sign In Heading *</label>
                            <input name="signin_heading" class="form-control" type="text" value="{{ $page_data->signin_heading }}">
                        </div>

                        <div class="form-group mb-3">
                            <label>Sign In Status *</label>
                            <select name="signin_status" class="form-control">
                                <option value="1" @if($page_data->signin_status == 1) selected @endif>Show</option>
                                <option value="0"  @if($page_data->signin_status == 0) selected @endif>Hide</option>
                            </select>
                        </div>
                     
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
