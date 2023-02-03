@extends('admin.layouts.app')
@section('title', 'Edit | Terms Page')
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_page_terms_update') }}" method="post">
                        @csrf

                        <div class="form-group mb-3">
                            <label>Terms Heading *</label>
                            <input name="terms_heading" class="form-control" type="text" value="{{ $page_data->terms_heading }}">
                        </div>

                        <div class="form-group mb-3">
                            <label>Terms Content *</label>
                            <textarea name="terms_content" class="form-control snote" cols="30" rows="10">{{ $page_data->terms_content }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label>Terms Status *</label>
                            <select name="terms_status" class="form-control">
                                <option value="1" @if($page_data->terms_status == 1) selected @endif>Show</option>
                                <option value="0"  @if($page_data->terms_status == 0) selected @endif>Hide</option>
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
