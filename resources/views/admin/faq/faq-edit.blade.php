@extends('admin.layouts.app')
@section('title', 'Edit | FAQ')
@section('heading', 'Edit FAQ')
@section('button')
    <a href="{{ route('admin_faq_view') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_faq_update', $faq->id) }}" method="post">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label>Question*</label>
                            <div>
                                <input name="question" value="{{ $faq->question }}" class="form-control" type="text">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Answer*</label>
                            <textarea name="answer" class="form-control snote" cols="30" rows="10">{{ $faq->answer }}</textarea>
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