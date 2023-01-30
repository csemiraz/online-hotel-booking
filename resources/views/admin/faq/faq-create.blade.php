@extends('admin.layouts.app')
@section('title', 'Create | FAQ')
@section('heading', 'Create FAQ')
@section('button')
    <a href="{{ route('admin_faq_view') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_faq_store') }}" method="post">
                        @csrf 

                        <div class="form-group mb-3">
                            <label>Question*</label>
                            <input type="text" name="question" class="form-control" value="{{ old('question') }}">
                        </div>

                        <div class="form-group mb-3">
                            <label>Answer*</label>
                            <textarea name="answer" class="form-control snote" cols="30" rows="10">{{ old('answer') }}</textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection