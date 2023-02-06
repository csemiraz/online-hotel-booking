<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PostController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\PhotoController;
use App\Http\Controllers\Front\TermsController;
use App\Http\Controllers\Front\VideoController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\PrivacyController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminPhotoController;
use App\Http\Controllers\Admin\AdminSlideController;
use App\Http\Controllers\Admin\AdminVideoController;
use App\Http\Controllers\Front\DisclaimerController;
use App\Http\Controllers\Front\SubscriberController;
use App\Http\Controllers\Admin\AdminAmenityController;
use App\Http\Controllers\Admin\AdminFeatureController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminSubscriberController;
use App\Http\Controllers\Admin\AdminTestimonialController;

/* Front */
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/post/{id}', [PostController::class, 'post_detail'])->name('post_detail');
Route::get('/photo-gallery', [PhotoController::class, 'index'])->name('photo_gallery');
Route::get('/video-gallery', [VideoController::class, 'index'])->name('video_gallery');
Route::get('/faq', [FaqController::class, 'index'])->name('faq');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/terms-and-conditions', [TermsController::class, 'index'])->name('terms');
Route::get('/privacy-policy', [PrivacyController::class, 'index'])->name('privacy');
Route::get('/disclaimer', [DisclaimerController::class, 'index'])->name('disclaimer');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/send-email', [ContactController::class, 'send_email'])->name('contact_send_email');
Route::post('/subscriber/send-email', [SubscriberController::class, 'send_email'])->name('subscriber_send_email');
Route::get('/subscriber/verify/{email}/{token}', [SubscriberController::class, 'verify'])->name('subscriber_verify');



/* Admin */
Route::get('admin/login', [AdminLoginController::class, 'index'])->name('admin_login');
Route::post('admin/login-submit', [AdminLoginController::class, 'login_submit'])->name('admin_login_submit');
Route::get('admin/logout', [AdminLoginController::class, 'logout'])->name('admin_logout');
Route::get('admin/forget-password', [AdminLoginController::class, 'forget_password'])->name('admin_forget_password');
Route::post('admin/forget-password-submit', [AdminLoginController::class, 'forget_password_submit'])->name('admin_forget_password_submit');
Route::get('admin/reset-password/{token}/{email}', [AdminLoginController::class, 'reset_password'])->name('admin_reset_password');
Route::post('admin/reset-password-submit', [AdminLoginController::class, 'reset_password_submit'])->name('admin_reset_password_submit');


/* Admin Group */
Route::group(['middleware'=>['admin:admin']], function() {
    Route::get('admin/home', [AdminHomeController::class, 'index'])->name('admin_home');
    Route::get('admin/edit-profile', [AdminProfileController::class, 'edit_profile'])->name('admin_edit_profile');
    Route::post('admin/edit-profile-submit', [AdminProfileController::class, 'edit_profile_submit'])->name('admin_edit_profile_submit');

    Route::get('admin/slide/view', [AdminSlideController::class, 'index'])->name('admin_slide_view');
    Route::get('admin/slide/create', [AdminSlideController::class, 'create'])->name('admin_slide_create');
    Route::post('admin/slide/store', [AdminSlideController::class, 'store'])->name('admin_slide_store');
    Route::get('admin/slide/edit/{id}', [AdminSlideController::class, 'edit'])->name('admin_slide_edit');
    Route::post('admin/slide/update/{id}', [AdminSlideController::class, 'update'])->name('admin_slide_update');
    Route::get('admin/slide/delete/{id}', [AdminSlideController::class, 'delete'])->name('admin_slide_delete');

    Route::get('admin/feature/view', [AdminFeatureController::class, 'index'])->name('admin_feature_view');
    Route::get('admin/feature/create', [AdminFeatureController::class, 'create'])->name('admin_feature_create');
    Route::post('admin/feature/store', [AdminFeatureController::class, 'store'])->name('admin_feature_store');
    Route::get('admin/feature/edit/{id}', [AdminFeatureController::class, 'edit'])->name('admin_feature_edit');
    Route::post('admin/feature/update/{id}', [AdminFeatureController::class, 'update'])->name('admin_feature_update');
    Route::get('admin/feature/delete/{id}', [AdminFeatureController::class, 'delete'])->name('admin_feature_delete');

    Route::get('admin/testimonial/view', [AdminTestimonialController::class, 'index'])->name('admin_testimonial_view');
    Route::get('admin/testimonial/create', [AdminTestimonialController::class, 'create'])->name('admin_testimonial_create');
    Route::post('admin/testimonial/store', [AdminTestimonialController::class, 'store'])->name('admin_testimonial_store');
    Route::get('admin/testimonial/edit/{id}', [AdminTestimonialController::class, 'edit'])->name('admin_testimonial_edit');
    Route::post('admin/testimonial/update/{id}', [AdminTestimonialController::class, 'update'])->name('admin_testimonial_update');
    Route::get('admin/testimonial/delete/{id}', [AdminTestimonialController::class, 'delete'])->name('admin_testimonial_delete');

    Route::get('admin/post/view', [AdminPostController::class, 'index'])->name('admin_post_view');
    Route::get('admin/post/create', [AdminPostController::class, 'create'])->name('admin_post_create');
    Route::post('admin/post/store', [AdminPostController::class, 'store'])->name('admin_post_store');
    Route::get('admin/post/edit/{id}', [AdminPostController::class, 'edit'])->name('admin_post_edit');
    Route::post('admin/post/update/{id}', [AdminPostController::class, 'update'])->name('admin_post_update');
    Route::get('admin/post/delete/{id}', [AdminPostController::class, 'delete'])->name('admin_post_delete');

    Route::get('admin/photo/view', [AdminPhotoController::class, 'index'])->name('admin_photo_view');
    Route::get('admin/photo/create', [AdminPhotoController::class, 'create'])->name('admin_photo_create');
    Route::post('admin/photo/store', [AdminPhotoController::class, 'store'])->name('admin_photo_store');
    Route::get('admin/photo/edit/{id}', [AdminPhotoController::class, 'edit'])->name('admin_photo_edit');
    Route::post('admin/photo/update/{id}', [AdminPhotoController::class, 'update'])->name('admin_photo_update');
    Route::get('admin/photo/delete/{id}', [AdminPhotoController::class, 'delete'])->name('admin_photo_delete');

    Route::get('admin/video/view', [AdminVideoController::class, 'index'])->name('admin_video_view');
    Route::get('admin/video/create', [AdminVideoController::class, 'create'])->name('admin_video_create');
    Route::post('admin/video/store', [AdminVideoController::class, 'store'])->name('admin_video_store');
    Route::get('admin/video/edit/{id}', [AdminVideoController::class, 'edit'])->name('admin_video_edit');
    Route::post('admin/video/update/{id}', [AdminVideoController::class, 'update'])->name('admin_video_update');
    Route::get('admin/video/delete/{id}', [AdminVideoController::class, 'delete'])->name('admin_video_delete');

    Route::get('admin/faq/view', [AdminFaqController::class, 'index'])->name('admin_faq_view');
    Route::get('admin/faq/create', [AdminFaqController::class, 'create'])->name('admin_faq_create');
    Route::post('admin/faq/store', [AdminFaqController::class, 'store'])->name('admin_faq_store');
    Route::get('admin/faq/edit/{id}', [AdminFaqController::class, 'edit'])->name('admin_faq_edit');
    Route::post('admin/faq/update/{id}', [AdminFaqController::class, 'update'])->name('admin_faq_update');
    Route::get('admin/faq/delete/{id}', [AdminFaqController::class, 'delete'])->name('admin_faq_delete');

    Route::get('admin/page/about', [AdminPageController::class, 'about'])->name('admin_page_about');
    Route::post('admin/page/about/update', [AdminPageController::class, 'about_update'])->name('admin_page_about_update');
    Route::get('admin/page/terms', [AdminPageController::class, 'terms'])->name('admin_page_terms');
    Route::post('admin/page/terms/update', [AdminPageController::class, 'terms_update'])->name('admin_page_terms_update');
    Route::get('admin/page/privacy', [AdminPageController::class, 'privacy'])->name('admin_page_privacy');
    Route::post('admin/page/privacy/update', [AdminPageController::class, 'privacy_update'])->name('admin_page_privacy_update');
    Route::get('admin/page/disclaimer', [AdminPageController::class, 'disclaimer'])->name('admin_page_disclaimer');
    Route::post('admin/page/disclaimer/update', [AdminPageController::class, 'disclaimer_update'])->name('admin_page_disclaimer_update');
    Route::get('admin/page/contact', [AdminPageController::class, 'contact'])->name('admin_page_contact');
    Route::post('admin/page/contact/update', [AdminPageController::class, 'contact_update'])->name('admin_page_contact_update');
    Route::get('admin/page/photo-gallery', [AdminPageController::class, 'photo_gallery'])->name('admin_page_photo_gallery');
    Route::post('admin/page/photo-gallery/update', [AdminPageController::class, 'photo_gallery_update'])->name('admin_page_photo_gallery_update');
    Route::get('admin/page/video-gallery', [AdminPageController::class, 'video_gallery'])->name('admin_page_video_gallery');
    Route::post('admin/page/video-gallery/update', [AdminPageController::class, 'video_gallery_update'])->name('admin_page_video_gallery_update');
    Route::get('admin/page/faq', [AdminPageController::class, 'faq'])->name('admin_page_faq');
    Route::post('admin/page/faq/update', [AdminPageController::class, 'faq_update'])->name('admin_page_faq_update');
    Route::get('admin/page/blog', [AdminPageController::class, 'blog'])->name('admin_page_blog');
    Route::post('admin/page/blog/update', [AdminPageController::class, 'blog_update'])->name('admin_page_blog_update');
    Route::get('admin/page/cart', [AdminPageController::class, 'cart'])->name('admin_page_cart');
    Route::post('admin/page/cart/update', [AdminPageController::class, 'cart_update'])->name('admin_page_cart_update');
    Route::get('admin/page/checkout', [AdminPageController::class, 'checkout'])->name('admin_page_checkout');
    Route::post('admin/page/checkout/update', [AdminPageController::class, 'checkout_update'])->name('admin_page_checkout_update');
    Route::get('admin/page/payment', [AdminPageController::class, 'payment'])->name('admin_page_payment');
    Route::post('admin/page/payment/update', [AdminPageController::class, 'payment_update'])->name('admin_page_payment_update');
    Route::get('admin/page/signup', [AdminPageController::class, 'signup'])->name('admin_page_signup');
    Route::post('admin/page/signup/update', [AdminPageController::class, 'signup_update'])->name('admin_page_signup_update');
    Route::get('admin/page/signin', [AdminPageController::class, 'signin'])->name('admin_page_signin');
    Route::post('admin/page/signin/update', [AdminPageController::class, 'signin_update'])->name('admin_page_signin_update');
    Route::get('admin/subscriber/view', [AdminSubscriberController::class, 'view'])->name('admin_subscriber_view');
    Route::get('admin/subscriber/send-email', [AdminSubscriberController::class, 'send_email'])->name('admin_subscriber_send_email');
    Route::post('admin/subscriber/send-email-submit', [AdminSubscriberController::class, 'send_email_submit'])->name('admin_subscriber_send_email_submit');

    Route::get('admin/amenity/view', [AdminAmenityController::class, 'index'])->name('admin_amenity_view');
    Route::get('admin/amenity/create', [AdminAmenityController::class, 'create'])->name('admin_amenity_create');
    Route::post('admin/amenity/store', [AdminAmenityController::class, 'store'])->name('admin_amenity_store');
    Route::get('admin/amenity/edit/{id}', [AdminAmenityController::class, 'edit'])->name('admin_amenity_edit');
    Route::post('admin/amenity/update/{id}', [AdminAmenityController::class, 'update'])->name('admin_amenity_update');
    Route::get('admin/amenity/delete/{id}', [AdminAmenityController::class, 'delete'])->name('admin_amenity_delete');
    
    
    
    
    
});
