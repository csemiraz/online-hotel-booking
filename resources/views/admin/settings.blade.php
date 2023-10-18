@extends('admin.layouts.app')
@section('title', 'Settings | Admin')
@section('heading', 'Settings')
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_setting_update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-12">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="v-1-tab" data-toggle="pill" href="#v-1" role="tab" aria-controls="v-1" aria-selected="true">
                                        Home Page
                                    </a>
                                    <a class="nav-link" id="v-2-tab" data-toggle="pill" href="#v-2" role="tab" aria-controls="v-2" aria-selected="false">
                                        Logo & Favicon
                                    </a>
                                    <a class="nav-link" id="v-3-tab" data-toggle="pill" href="#v-3" role="tab" aria-controls="v-3" aria-selected="false">
                                        Top Bar
                                    </a>
                                    <a class="nav-link" id="v-4-tab" data-toggle="pill" href="#v-4" role="tab" aria-controls="v-4" aria-selected="false">
                                        Theme Color
                                    </a>
                                    <a class="nav-link" id="v-5-tab" data-toggle="pill" href="#v-5" role="tab" aria-controls="v-5" aria-selected="false">
                                        Google Analytic
                                    </a>
                                    <a class="nav-link" id="v-6-tab" data-toggle="pill" href="#v-6" role="tab" aria-controls="v-6" aria-selected="false">
                                        Footer Area
                                    </a>
                                    <a class="nav-link" id="v-7-tab" data-toggle="pill" href="#v-7" role="tab" aria-controls="v-7" aria-selected="false">
                                        Copyright area
                                    </a>
                                    <a class="nav-link" id="v-8-tab" data-toggle="pill" href="#v-8" role="tab" aria-controls="v-8" aria-selected="false">
                                        Social Links
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-9 col-md-8 col-sm-12">
                                <div class="tab-content" id="v-pills-tabContent">
                                     <!-- Home Page Start -->
                                    <div class="pt_0 tab-pane fade show active" id="v-1" role="tabpanel" aria-labelledby="v-1-tab">
                                        <div class="form-group mb-3">
                                            <label>Home Features Status</label>
                                            <select name="home_feature_status" class="form-control">
                                                <option {{ $setting_data->home_feature_status=='Show' ? 'selected' : '' }} value="Show">Show</option>
                                                <option {{ $setting_data->home_feature_status=='Hide' ? 'selected' : '' }} value="Hide">Hide</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Home Room Total</label>
                                            <input type="text" class="form-control" name="home_room_total" value="{{ $setting_data->home_room_total }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Home Room Status</label>
                                            <select name="home_room_status" class="form-control">
                                                <option {{ $setting_data->home_room_status=='Show' ? 'selected' : '' }} value="Show">Show</option>
                                                <option {{ $setting_data->home_room_status=='Hide' ? 'selected' : '' }} value="Hide">Hide</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Home Testimonial Status</label>
                                            <select name="home_testimonial_status" class="form-control">
                                                <option {{ $setting_data->home_testimonial_status=='Show' ? 'selected' : '' }} value="Show">Show</option>
                                                <option {{ $setting_data->home_testimonial_status=='Hide' ? 'selected' : '' }} value="Hide">Hide</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Home Latest Post Total</label>
                                            <input type="text" class="form-control" name="home_latest_post_total" value="{{ $setting_data->home_latest_post_total }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Home Latest Post Status</label>
                                            <select name="home_latest_post_status" class="form-control">
                                                <option {{ $setting_data->home_latest_post_status=='Show' ? 'selected' : '' }} value="Show">Show</option>
                                                <option {{ $setting_data->home_latest_post_status=='Hide' ? 'selected' : '' }} value="Hide">Hide</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Home page End -->

                                    <!-- Photo Item Start -->
                                    <div class="pt_0 tab-pane fade" id="v-2" role="tabpanel" aria-labelledby="v-2-tab">
                                        <div class="form-group mb-3">
                                            <label>
                                                Existing Logo
                                            </label>
                                            <div>
                                                <img src="{{ asset('images/'.$setting_data->logo) }}" alt="" class="w_200">
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>
                                                Change Logo
                                            </label>
                                            <div>
                                                <input type="file" name="logo">
                                            </div>
                                        </div>

                                        <hr />

                                        <div class="form-group mb-3">
                                            <label>
                                                Existing Favicon
                                            </label>
                                            <div>
                                                <img src="{{ asset('images/'.$setting_data->favicon) }}" alt="" style="height: 50px;">
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>
                                                Change Favicon
                                            </label>
                                            <div>
                                                <input type="file" name="favicon">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Photo Item End -->

                                     <!-- Top Bar Start -->
                                    <div class="pt_0 tab-pane fade" id="v-3" role="tabpanel" aria-labelledby="v-3-tab">  
                                     <div class="form-group mb-3">
                                        <label>Top Bar Phone</label>
                                        <input type="text" class="form-control" name="top_bar_phone" value="{{ $setting_data->top_bar_phone }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Top Bar Email</label>
                                        <input type="text" class="form-control" name="top_bar_email" value="{{ $setting_data->top_bar_email }}">
                                    </div>
                                 </div>
                                 <!-- Top Bar End -->

                                    <!-- Theme Color Start -->
                                <div class="pt_0 tab-pane fade" id="v-4" role="tabpanel" aria-labelledby="v-4-tab">
                                    <div class="form-group mb-3">
                                        <label>Theme Color 1</label>
                                        <input type="text" class="form-control jscolor" name="theme_color_1" value="{{ $setting_data->theme_color_1 }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Theme Color 2</label>
                                        <input type="text" class="form-control jscolor" name="theme_color_2" value="{{ $setting_data->theme_color_2 }}">
                                    </div>
                                </div>
                                <!-- Theme Color End -->

                                 <!-- Analytics Start -->
                                 <div class="pt_0 tab-pane fade" id="v-5" role="tabpanel" aria-labelledby="v-5-tab">
                                    <div class="form-group mb-3">
                                       <label>Analytic Id</label>
                                       <input type="text" class="form-control" name="analytic_id" value="{{ $setting_data->analytic_id }}">
                                    </div>
                                </div>
                                <!-- Analytics End -->

                                  <!-- Footer Start -->
                                  <div class="pt_0 tab-pane fade" id="v-6" role="tabpanel" aria-labelledby="v-6-tab">  
                                    <div class="form-group mb-3">
                                       <label>Footer Address</label>
                                       <textarea name="footer_address" class="form-control" cols="30" rows="10">{{ $setting_data->footer_address }}</textarea>
                                   </div>
                                   <div class="form-group mb-3">
                                    <label>Footer Phone</label>
                                    <input type="text" class="form-control" name="footer_phone" value="{{ $setting_data->footer_phone }}">
                                </div>
                                   <div class="form-group mb-3">
                                       <label>Footer Email</label>
                                       <input type="text" class="form-control" name="footer_email" value="{{ $setting_data->footer_email }}">
                                   </div>
                                </div>
                                <!-- Footer End -->

                                 <!-- Copyright Start -->
                                 <div class="pt_0 tab-pane fade" id="v-7" role="tabpanel" aria-labelledby="v-7-tab">  
                                    <div class="form-group mb-3">
                                       <label>Copyright Text</label>
                                       <textarea name="copyright" class="form-control" cols="30" rows="10">{{ $setting_data->copyright }}</textarea>
                                   </div>
                                </div>
                                <!-- Copyright End -->

                                <!-- Social Start -->
                                <div class="pt_0 tab-pane fade" id="v-8" role="tabpanel" aria-labelledby="v-8-tab">  
                                    <div class="form-group mb-3">
                                        <label class="form-label">Facebook</label>
                                        <input type="text" class="form-control" name="facebook" value="{{ $setting_data->facebook }}">
                                    </div>
                                    <div class="form-group mb-3">
                                    <label class="form-label">Twitter</label>
                                    <input type="text" class="form-control" name="twitter" value="{{ $setting_data->twitter }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-label">LinkedIn</label>
                                        <input type="text" class="form-control" name="linkedin" value="{{ $setting_data->linkedin }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-label">Pinterest</label>
                                        <input type="text" class="form-control" name="pinterest" value="{{ $setting_data->pinterest }}">
                                    </div>
                               
                                </div>
                                <!-- Social End -->

                                </div>
                            </div>
                        </div>

                        <div class="form-group mt_30">
                            <button type="submit" class="btn btn-primary btn-block">Update</button>
                        </div>
                    </form>
            </div>
            </div>
        </div>
    </div>
    </div>
@endsection