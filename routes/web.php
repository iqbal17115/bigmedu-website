<?php
Route::get('/clear-cache', function() {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return "Cache cleared successfully!";
});



Route::get('/locale/{lang}', function($lang) {
	Session::put('locale', $lang);
	return redirect()->back();
})->name('locale');
// Search
Route::get('/search', 'Frontend\FrontController@Search')->name('search');

Route::get('/read.more.news/{id}', function(){

})->name('read.more.news');

// Frontend

Route::get('/','Frontend\FrontController@home')->name('home');
Route::get('menu', 'Frontend\FrontController@MenuUrl')->name('menu_url');
//URL like frontend menu
Route::get('useful_link', 'Frontend\FrontController@usefulUrl')->name('useful_link');
Route::get('quick_link', 'Frontend\FrontController@quickUrl')->name('quick_link');
Route::get('for_students', 'Frontend\FrontController@forStudentsUrl')->name('for_students');
Route::get('get_in_touch', 'Frontend\FrontController@getInTouchUrl')->name('get_in_touch');
Route::get('fast_service', 'Frontend\FrontController@fastServiceUrl')->name('fast_service');
Route::get('offer_url', 'Frontend\FrontController@offerUrl')->name('offer_url');
Route::get('feature_url', 'Frontend\FrontController@featureUrl')->name('feature_url');
Route::get('training_url', 'Frontend\FrontController@trainingUrl')->name('training_url');
//End URL like frontend menu
Route::get('/director/{id}','Frontend\FrontController@director')->name('director');
Route::get('/about/{id}','Frontend\FrontController@about')->name('about');
Route::get('/facility/{id}','Frontend\FrontController@facility')->name('facility');
Route::get('/activity/{id}','Frontend\FrontController@activity')->name('activity');
Route::get('/advisor/{id}','Frontend\FrontController@advisor')->name('advisor');
Route::get('/news/{id}','Frontend\FrontController@news')->name('news');
Route::get('news-all','Frontend\FrontController@newsAll')->name('news-all');
Route::get('general-notice','Frontend\FrontController@generalNotice')->name('general-notice');
Route::get('special-notice','Frontend\FrontController@specialNotice')->name('special-notice');
Route::get('tender-notice','Frontend\FrontController@tenderNotice')->name('tender-notice');
Route::get('news-single-page','Frontend\FrontController@newsSinglePage')->name('news_single_page');
Route::get('/event/{id}','Frontend\FrontController@event')->name('event');
Route::get('event-all','Frontend\FrontController@eventAll')->name('event-all');
Route::get('/notice/{id}','Frontend\FrontController@notice')->name('notice');
Route::get('notice-all','Frontend\FrontController@noticeAll')->name('notice-all');
Route::get('training-enroll-all','Frontend\FrontController@trainingEnrollAll')->name('training_enroll_all');
Route::get('library-front','Backend\LibrarySliderController@libraryFront')->name('library_front');
Route::get('library-subject-wise-book','Backend\LibrarySliderController@librarySubjectWiseBook')->name('library_subject_wise_book');
Route::get('library-book-pdf/{id}','Backend\LibrarySliderController@view_library_book_pdf')->name('view_library_book_pdf');
Route::get('library-news/{id}','Backend\LibraryNewsController@singleLibraryNews')->name('single_library_news');
Route::get('library-all-news','Backend\LibraryNewsController@libraryAllNews')->name('library_all_news');
Route::get('/our_research/{id}','Frontend\FrontController@ourResearch')->name('our_research');
Route::get('/our_development/{id}','Frontend\FrontController@ourDevelopment')->name('our_development');
Route::get('/our_library/{id}','Frontend\FrontController@ourLibrary')->name('our_library');
Route::get('/our_campus/{id}','Frontend\FrontController@ourCampus')->name('our_campus');

Route::get('/ongoing-research','Frontend\FrontController@ongoingResearch')->name('ongoing_research');
Route::get('/completed-research','Frontend\FrontController@completedResearch')->name('completed_research');
Route::get('/conference','Frontend\FrontController@conference')->name('conference');
Route::get('/book-chapter','Frontend\FrontController@bookChapter')->name('book_chapter');
Route::get('/oped','Frontend\FrontController@oped')->name('oped');
Route::get('/ongoing-training','Frontend\FrontController@ongoingTraining')->name('ongoing_training');
Route::get('/upcoming-training','Frontend\FrontController@upcomingTraining')->name('upcoming_training');

Route::get('/bigm-journal-policy','Frontend\FrontController@bigmJournalPolicy')->name('bigm_journal_policy');
Route::post('/store-journal-policy','Frontend\FrontController@storeJournalPolicy')->name('bigm_journal_policy.store');


Route::get('/more/message','Frontend\FrontController@headMessage')->name('more.message');
Route::get('/faculty','Frontend\FrontController@moreFaculty')->name('faculty');
Route::get('/faculty/onleave','Frontend\FrontController@moreFaculty')->name('faculty.onleave');
// Route::get('/faculty/details/{id}','Frontend\FrontController@facultyDetails')->name('faculty.details');
Route::get('/faculty/details/{slug}','Frontend\FrontController@facultyDetails')->name('faculty.details');
Route::get('/more/gallery','Frontend\FrontController@moreGallery')->name('more.gallery');
Route::get('/more/research','Frontend\FrontController@moreResearch')->name('more.research');
Route::get('/contact_us','Frontend\FrontController@contactUs')->name('contact.us');
Route::post('/contact/message/store','Frontend\FrontController@storeContactMessage')->name('contact.message.store');
//Ask Librarian
Route::get('/ask-librarian','Frontend\FrontController@askLibrarian')->name('ask_librarian');
Route::post('/ask-librarian/store','Frontend\FrontController@storeAskLibrarian')->name('ask_librarian.store');
//End Ask Librarian
Route::get('/location','Frontend\LocationController@location')->name('location');
Route::get('/career/jobs','Backend\CareerController@careerJobs')->name('career_jobs');
Route::get('/career/jobs/view/{id}','Backend\CareerController@careerJobsView')->name('career_jobs_view');
Route::get('/gallery','Backend\PhotoGalleryController@photoGallery')->name('gallery');
Route::get('/video/gallery','Backend\VideoGalleryController@videoGallery')->name('video.gallery');
Route::get('/research/detail/{id}','Frontend\FrontController@Research')->name('research.detail');

Route::get('/board-of-trustees','Backend\BoardofTrusteeController@frontend')->name('board_of_trustees');
Route::get('/governing-body','Backend\GoverningBodyController@frontend')->name('governing_body');
Route::get('/member-to-employee','Backend\MemberToEmployeeController@frontendAll')->name('member_to_employee_frontend');
Route::get('/member-to-employee/bigm','Backend\MemberToEmployeeController@frontendFilterBigm')->name('member_to_employee_frontend.bigm');
Route::get('/member-to-employee/project','Backend\MemberToEmployeeController@frontendFilterProject')->name('member_to_employee_frontend.project');

Route::get('/members','Backend\MemberController@frontend')->name('members');
Route::get('/member/profile/{id}','Backend\MemberController@memberProfileFrontend')->name('member.profile');

Route::get('/faculty-members','Backend\MemberToCourseController@facultyMembers')->name('faculty_members');
Route::get('/faculty-members-type-{id}','Backend\MemberToCourseController@facultyMembersTypewise')->name('type_wise_faculty_members');
Route::get('/noc-office-orders','Backend\OfficeOrderController@frontend')->name('noc.office.order');

Route::get('/partnership/{id}','Frontend\FrontController@partnership')->name('partnership');
Route::get('/offer/{id}','Frontend\FrontController@offer')->name('offer');
//Alumni
Route::get('alumni','Frontend\FrontController@alumni')->name('alumni');
//ajax
Route::get('program-wise-batch','Frontend\FrontController@program_wise_batch')->name('program_wise_batch');

//Blog Start
Route::get('/blog/login','Frontend\Blog\BlogController@blogLogin')->name('blog');
Route::get('/blog/register','Frontend\Blog\BlogController@blogRegister')->name('blog');
Route::get('/blog','Frontend\Blog\BlogController@blog')->name('blog');
Route::get('/blog/details','Frontend\Blog\BlogController@blogDetails')->name('blog.details');
//Blog End

Route::get('/login',function(){
	return redirect()->route('login');
});

//Reset Password
Route::get('reset/password','Backend\PasswordResetController@resetPassword')->name('reset.password');
Route::post('check/email','Backend\PasswordResetController@checkEmail')->name('check.email');
Route::get('check/name','Backend\PasswordResetController@checkName')->name('check.name');
Route::get('check/code','Backend\PasswordResetController@checkCode')->name('check.code');
Route::post('submit/check/code','Backend\PasswordResetController@submitCode')->name('submit.check.code');
Route::get('new/password','Backend\PasswordResetController@newPassword')->name('new.password');
Route::post('store/new/password','Backend\PasswordResetController@newPasswordStore')->name('store.new.password');



Auth::routes();

Route::namespace('Frontend\Blog')->prefix('blog_user')->group(function() {
	Route::get('login','Auth\LoginController@showLoginForm')->name('blog_user.login');
	Route::post('login','Auth\LoginController@login')->name('blog_user.login');
	Route::get('register','Auth\RegisterController@showRegistrationForm')->name('blog_user.register');
	Route::post('register','Auth\RegisterController@register')->name('blog_user.register');

	//Blog User Reset Password
	Route::get('reset/password','Auth\PasswordResetController@resetPassword')->name('blog_user.reset.password');
	Route::post('check/email','Auth\PasswordResetController@checkEmail')->name('blog_user.check.email');
	Route::get('check/name','Auth\PasswordResetController@checkName')->name('blog_user.check.name');
	Route::get('check/code','Auth\PasswordResetController@checkCode')->name('blog_user.check.code');
	Route::post('submit/check/code','Auth\PasswordResetController@submitCode')->name('blog_user.submit.check.code');
	Route::get('new/password','Auth\PasswordResetController@newPassword')->name('blog_user.new.password');
	Route::post('store/new/password','Auth\PasswordResetController@newPasswordStore')->name('blog_user.store.new.password');
	
	Route::middleware('auth:blog_user')->group(function() {

		Route::get('/home','BlogController@home')->name('blog_user.home');
		Route::post('logout','Auth\LoginController@logout')->name('blog_user.logout');

		Route::post('/blog/post/store','BlogController@storeBlogPost')->name('blog_user.store_blog_post');

		Route::get('/blog/post/edit/{id}','BlogController@editBlogPost')->name('blog_user.edit_blog_post');
		Route::post('/blog/post/update/{id}','BlogController@updateBlogPost')->name('blog_user.update_blog_post');

		Route::get('/blog/post/delete','BlogController@deleteBlogPost')->name('blog_user.delete_blog_post');

		Route::get('/blog/post/all','BlogController@allBlogPost')->name('blog_user.all_blog_post');

		Route::get('/edit/profile/{id}','BlogController@editProfile')->name('blog_user.edit_profile');
		Route::post('/update/profile/{id}','BlogController@updateProfile')->name('blog_user.update_profile');

		Route::post('/blog/post/insert_comment','BlogController@insertComment')->name('blog_user.insert_comment');

		//ajax
		Route::post('/blog/post/update_like_count','BlogController@updateLikeCount')->name('blog_user.update_like_count');
		

	});

	Route::get('/blog','BlogController@blog')->name('blog');
	Route::get('/blog/details/{id}','BlogController@blogDetails')->name('blog.details');

	

});

Route::middleware(['auth'])->group(function(){

	Route::get('/home', 'Backend\HomeController@index')->name('dashboard');	

	Route::group(['middleware'=>['permission']],function(){

		Route::prefix('menu')->group(function(){
			Route::get('/view', 'Backend\Menu\MenuController@index')->name('menu');
			Route::get('/add', 'Backend\Menu\MenuController@add')->name('menu.add');
			Route::post('/store', 'Backend\Menu\MenuController@store')->name('menu.store');
			Route::get('/edit/{id}', 'Backend\Menu\MenuController@edit')->name('menu.edit');
			Route::post('/update/{id}','Backend\Menu\MenuController@update')->name('menu.update');
			Route::get('/subparent','Backend\Menu\MenuController@getSubParent')->name('menu.getajaxsubparent');

			Route::get('/icon','Backend\Menu\MenuIconController@index')->name('menu.icon');
			Route::post('icon/store','Backend\Menu\MenuIconController@store')->name('menu.icon.store');
			Route::get('icon/edit','Backend\Menu\MenuIconController@edit')->name('menu.icon.edit');
			Route::post('icon/update/{id}','Backend\Menu\MenuIconController@update')->name('menu.icon.update');
			Route::post('icon/delete','Backend\Menu\MenuIconController@delete')->name('menu.icon.delete');
		});

		Route::post('/data/statuschange', 'Backend\DefaultController@statusChange')->name('table.status.change');
		Route::post('/data/delete', 'Backend\DefaultController@delete')->name('table.data.delete');
		Route::get('/sub/menu', 'Backend\DefaultController@SubMenu')->name('table.data.submenu');

		Route::prefix('user')->group(function(){
			Route::get('/list','Backend\UserController@list')->name('user.list');
			Route::get('/add','Backend\UserController@add')->name('user.add');
			Route::post('/store','Backend\UserController@store')->name('user.store');
			Route::get('/edit/{id}','Backend\UserController@edit')->name('user.edit');
			Route::post('/update/{id}','Backend\UserController@update')->name('user.update');
			Route::post('/delete','Backend\UserController@destroy')->name('user.delete');

			Route::get('/role','Backend\Menu\RoleController@index')->name('user.role');
			Route::post('/role/store','Backend\Menu\RoleController@storeRole')->name('user.role.store');
			Route::get('/role/edit','Backend\Menu\RoleController@getRole')->name('user.role.edit');
			Route::post('/role/update/{id}','Backend\Menu\RoleController@updateRole')->name('user.role.update');
			Route::post('/role/delete','Backend\Menu\RoleController@deleteRole')->name('user.role.delete');

			Route::get('/permission','Backend\Menu\MenuPermissionController@index')->name('user.permission');
			Route::get('/permission/store','Backend\Menu\MenuPermissionController@storePermission')->name('user.permission.store');

			//Add Member to User
			Route::get('/add-member-to-user','Backend\UserController@addMemberToUser')->name('user.add_member_to_user');
			Route::post('/store-member-to-user','Backend\UserController@storeMemberToUser')->name('user.store_member_to_user');
			Route::get('/edit-member-to-user/{id}','Backend\UserController@editMemberToUser')->name('user.edit_member_to_user');
			Route::post('/update-member-to-user/{id}','Backend\UserController@updateMemberToUser')->name('user.update_member_to_user');
			//ajax
			Route::get('member-wise-email','Backend\UserController@memberWiseEmail')->name('member_wise_email');
			Route::get('/update-member-profile','Backend\UserController@updateMemberProfile')->name('user.update_member_profile');

			//Department

			Route::get('department','Backend\DepartmentController@index')->name('user.department');		
			Route::get('department/add','Backend\DepartmentController@addDepartment')->name('user.department.add');		
			Route::post('department/store','Backend\DepartmentController@storeDepartment')->name('user.department.store');
			Route::get('department/edit/{id}','Backend\DepartmentController@editDepartment')->name('user.department.edit');
			Route::post('department/update/{id}','Backend\DepartmentController@updateDepartment')->name('user.department.update');
			Route::get('department/delete','Backend\DepartmentController@deleteDepartment')->name('user.department.delete');

			//Project

			Route::get('project','Backend\ProjectController@index')->name('user.project');		
			Route::get('project/add','Backend\ProjectController@addProject')->name('user.project.add');		
			Route::post('project/store','Backend\ProjectController@storeProject')->name('user.project.store');
			Route::get('project/edit/{id}','Backend\ProjectController@editProject')->name('user.project.edit');
			Route::post('project/update/{id}','Backend\ProjectController@updateProject')->name('user.project.update');
			Route::get('project/delete','Backend\ProjectController@deleteProject')->name('user.project.delete');

		});

		// Route::prefix('site')->group(function(){
		// 	Route::get('settings','Backend\SiteSettingController@index')->name('site.setting');		
		// 	Route::post('settings/update','Backend\SiteSettingController@updateSetting')->name('site.setting.update');	
		// 	Route::get('slider','Backend\SliderController@index')->name('site.slider');
		// 	Route::get('slider/add','Backend\SliderController@addSlider')->name('site.slider.add');
		// 	Route::post('slider/store','Backend\SliderController@storeSlider')->name('site.slider.store');
		// });

		// Route::prefix('tour-package')->group(function(){
		// 	Route::get('view','Backend\SiteSettingController@index')->name('tour-package.view');
		// });

		Route::prefix('project-management')->group(function(){
			//Role
			Route::get('role/view','Backend\RoleController@index')->name('project-management.role.view');
			Route::get('role/add','Backend\RoleController@addRole')->name('project-management.role.add');	
			Route::post('role/store','Backend\RoleController@storeRole')->name('project-management.role.store');
			Route::get('role/edit/{id}','Backend\RoleController@editRole')->name('project-management.role.edit');
			Route::post('role/update/{id}','Backend\RoleController@updateRole')->name('project-management.role.update');
			Route::get('role/delete','Backend\RoleController@deleteRole')->name('project-management.role.delete');
			// Profile
			Route::get('resource/profile/view','Backend\ResourceProfileController@index')->name('project-management.resource.profile.view');
			Route::get('resource/profile/edit/{id}','Backend\ResourceProfileController@editProfile')->name('project-management.resource.profile.edit');
			Route::post('resource/profile/update/{id}','Backend\ResourceProfileController@updateProfile')->name('project-management.resource.profile.update');
			//Change Password
			Route::get('change/password','Backend\PasswordChangeController@changePassword')->name('project-management.change.password');
			Route::post('store/password','Backend\PasswordChangeController@storePassword')->name('project-management.store.password');

			//Slider
			Route::get('slider','Backend\SliderController@index')->name('site-setting.slider');		
			Route::get('slider/add','Backend\SliderController@addSlider')->name('site-setting.slider.add');		
			Route::post('slider/store','Backend\SliderController@storeSlider')->name('site-setting.slider.store');
			Route::get('slider/edit/{id}','Backend\SliderController@editSlider')->name('site-setting.slider.edit');
			Route::post('slider/update/{id}','Backend\SliderController@updateSlider')->name('site-setting.slider.update');		
			Route::get('slider/delete','Backend\SliderController@deleteSlider')->name('site-setting.slider.delete');
			//Slider Video
			Route::post('slider/store/video','Backend\SliderController@storeSliderVideo')->name('site-setting.slider.store_video');


			//Advisor
			Route::get('advisor','Backend\AdvisorController@index')->name('site-setting.advisor');		
			Route::get('advisor/add','Backend\AdvisorController@addAdvisor')->name('site-setting.advisor.add');		
			Route::post('advisor/store','Backend\AdvisorController@storeAdvisor')->name('site-setting.advisor.store');
			Route::get('advisor/edit/{id}','Backend\AdvisorController@editAdvisor')->name('site-setting.advisor.edit');
			Route::post('advisor/update/{id}','Backend\AdvisorController@updateAdvisor')->name('site-setting.advisor.update');		
			Route::get('advisor/delete','Backend\AdvisorController@deleteAdvisor')->name('site-setting.advisor.delete');

			//About
			Route::get('about','Backend\AboutController@index')->name('site-setting.about');		
			Route::get('about/add','Backend\AboutController@addAbout')->name('site-setting.about.add');		
			Route::post('about/store','Backend\AboutController@storeAbout')->name('site-setting.about.store');
			Route::get('about/edit/{id}','Backend\AboutController@editAbout')->name('site-setting.about.edit');
			Route::post('about/update/{id}','Backend\AboutController@updateAbout')->name('site-setting.about.update');		
			Route::get('about/delete','Backend\AboutController@deleteAbout')->name('site-setting.about.delete');

			//Director
			Route::get('director','Backend\DirectorController@index')->name('site-setting.director');		
			Route::get('director/add','Backend\DirectorController@addDirector')->name('site-setting.director.add');		
			Route::post('director/store','Backend\DirectorController@storeDirector')->name('site-setting.director.store');
			Route::get('director/edit/{id}','Backend\DirectorController@editDirector')->name('site-setting.director.edit');
			Route::post('director/update/{id}','Backend\DirectorController@updateDirector')->name('site-setting.director.update');		
			Route::get('director/delete','Backend\DirectorController@deleteDirector')->name('site-setting.director.delete');

			//Facility
			Route::get('facility','Backend\FacilityController@index')->name('site-setting.facility');		
			Route::get('facility/add','Backend\FacilityController@addFacility')->name('site-setting.facility.add');		
			Route::post('facility/store','Backend\FacilityController@storeFacility')->name('site-setting.facility.store');
			Route::get('facility/edit/{id}','Backend\FacilityController@editFacility')->name('site-setting.facility.edit');
			Route::post('facility/update/{id}','Backend\FacilityController@updateFacility')->name('site-setting.facility.update');		
			Route::get('facility/delete','Backend\FacilityController@deleteFacility')->name('site-setting.facility.delete');

			//Teacher info
	
			Route::get('teacher/information','Backend\TeacherController@index')->name('site-setting.teacher.information');		
			Route::get('teacher/information/add','Backend\TeacherController@addTeacher')->name('site-setting.teacher.information.add');		
			Route::post('teacher/information/store','Backend\TeacherController@storeTeacher')->name('site-setting.teacher.information.store');
			Route::get('teacher/information/edit/{id}','Backend\TeacherController@editTeacher')->name('site-setting.teacher.information.edit');
			Route::post('teacher/information/update/{id}','Backend\TeacherController@updateTeacher')->name('site-setting.teacher.information.update');		
			Route::get('teacher/information/delete','Backend\TeacherController@deleteTeacher')->name('site-setting.teacher.information.delete');

			//Department Head
			Route::get('department/head/information','Backend\DepartmentHeadController@index')->name('site-setting.department.head.information');		
			Route::get('department/head/information/add','Backend\DepartmentHeadController@addHead')->name('site-setting.department.head.information.add');		
			Route::post('department/head/information/store','Backend\DepartmentHeadController@storeHead')->name('site-setting.department.head.information.store');
			Route::get('department/head/information/edit/{id}','Backend\DepartmentHeadController@editHead')->name('site-setting.department.head.information.edit');
			Route::post('department/head/information/update/{id}','Backend\DepartmentHeadController@updateHead')->name('site-setting.department.head.information.update');		
			Route::get('department/head/information/delete','Backend\DepartmentHeadController@deleteHead')->name('site-setting.department.head.information.delete');	
			
			//News

			Route::get('news-event-notice','Backend\NewsController@index')->name('site-setting.news');		
			Route::get('news-event-notice/add','Backend\NewsController@addNews')->name('site-setting.news.add');		
			Route::post('news-event-notice/store','Backend\NewsController@storeNews')->name('site-setting.news.store');
			Route::get('news-event-notice/edit/{id}','Backend\NewsController@editNews')->name('site-setting.news.edit');
			Route::post('news-event-notice/update/{id}','Backend\NewsController@updateNews')->name('site-setting.news.update');
			Route::get('news-event-notice/delete','Backend\NewsController@deleteNews')->name('site-setting.news.delete');
			
			Route::get('news-event-notice/filter_news','Backend\NewsController@filterNews')->name('site-setting.news.filter_news');
			Route::get('news-event-notice/filter_event','Backend\NewsController@filterEvent')->name('site-setting.news.filter_event');
			Route::get('news-event-notice/filter_notice','Backend\NewsController@filterNotice')->name('site-setting.news.filter_notice');
			Route::get('news-event-notice/filter_general_notice','Backend\NewsController@filterGeneralNotice')->name('site-setting.news.filter_general_notice');
			Route::get('news-event-notice/filter_special_notice','Backend\NewsController@filterSpecialNotice')->name('site-setting.news.filter_special_notice');
			Route::get('news-event-notice/filter_tender_notice','Backend\NewsController@filterTenderNotice')->name('site-setting.news.filter_tender_notice');
			
			//Activity

			Route::get('activity','Backend\ActivityController@index')->name('site-setting.activity');		
			Route::get('activity/add','Backend\ActivityController@addActivity')->name('site-setting.activity.add');		
			Route::post('activity/store','Backend\ActivityController@storeActivity')->name('site-setting.activity.store');
			Route::get('activity/edit/{id}','Backend\ActivityController@editActivity')->name('site-setting.activity.edit');
			Route::post('activity/update/{id}','Backend\ActivityController@updateActivity')->name('site-setting.activity.update');
			Route::get('activity/delete','Backend\ActivityController@deleteActivity')->name('site-setting.activity.delete');
			
			//Offer

			Route::get('offer','Backend\OfferController@index')->name('site-setting.offer');		
			Route::get('offer/add','Backend\OfferController@addOffer')->name('site-setting.offer.add');		
			Route::post('offer/store','Backend\OfferController@storeOffer')->name('site-setting.offer.store');
			Route::get('offer/edit/{id}','Backend\OfferController@editOffer')->name('site-setting.offer.edit');
			Route::post('offer/update/{id}','Backend\OfferController@updateOffer')->name('site-setting.offer.update');
			Route::get('offer/delete','Backend\OfferController@deleteOffer')->name('site-setting.offer.delete');

			//Offer Background Video
			Route::post('offer/store/video','Backend\OfferController@storeOfferVideo')->name('site-setting.offer.store_video');

			//Gallery

			Route::get('gallery','Backend\GalleryController@index')->name('site-setting.gallery');		
			Route::get('gallery/add','Backend\GalleryController@addGallery')->name('site-setting.gallery.add');		
			Route::post('gallery/store','Backend\GalleryController@storeGallery')->name('site-setting.gallery.store');
			Route::get('gallery/edit/{id}','Backend\GalleryController@editGallery')->name('site-setting.gallery.edit');
			Route::post('gallery/update/{id}','Backend\GalleryController@updateGallery')->name('site-setting.gallery.update');
			Route::get('gallery/delete','Backend\GalleryController@deleteGallery')->name('site-setting.gallery.delete');	

			//Research

			Route::get('research','Backend\ResearchController@index')->name('site-setting.research');		
			Route::get('research/add','Backend\ResearchController@addResearch')->name('site-setting.research.add');		
			Route::post('research/store','Backend\ResearchController@storeResearch')->name('site-setting.research.store');
			Route::get('research/edit/{id}','Backend\ResearchController@editResearch')->name('site-setting.research.edit');
			Route::post('research/update/{id}','Backend\ResearchController@updateResearch')->name('site-setting.research.update');
			Route::get('research/delete','Backend\ResearchController@deleteResearch')->name('site-setting.research.delete');	

			//Banner

			Route::get('banner','Backend\BannerController@index')->name('site-setting.banner');		
			Route::get('banner/add','Backend\BannerController@addBanner')->name('site-setting.banner.add');		
			Route::post('banner/store','Backend\BannerController@storeBanner')->name('site-setting.banner.store');
			Route::get('banner/edit/{id}','Backend\BannerController@editBanner')->name('site-setting.banner.edit');
			Route::post('banner/update/{id}','Backend\BannerController@updateBanner')->name('site-setting.banner.update');
			Route::get('banner/delete','Backend\BannerController@deleteBanner')->name('site-setting.banner.delete');	

			//PartnerShip

			Route::get('partnership','Backend\PartnershipController@index')->name('site-setting.partnership');		
			Route::get('partnership/add','Backend\PartnershipController@addPartnership')->name('site-setting.partnership.add');		
			Route::post('partnership/store','Backend\PartnershipController@storePartnership')->name('site-setting.partnership.store');
			Route::get('partnership/edit/{id}','Backend\PartnershipController@editPartnership')->name('site-setting.partnership.edit');
			Route::post('partnership/update/{id}','Backend\PartnershipController@updatePartnership')->name('site-setting.partnership.update');
			Route::get('partnership/delete','Backend\PartnershipController@deletePartnership')->name('site-setting.partnership.delete');	

			//Designation

			Route::get('designation','Backend\DesignationController@index')->name('site-setting.designation');		
			Route::get('designation/add','Backend\DesignationController@addDesignation')->name('site-setting.designation.add');		
			Route::post('designation/store','Backend\DesignationController@storeDesignation')->name('site-setting.designation.store');
			Route::get('designation/edit/{id}','Backend\DesignationController@editDesignation')->name('site-setting.designation.edit');
			Route::post('designation/update/{id}','Backend\DesignationController@updateDesignation')->name('site-setting.designation.update');
			Route::get('designation/delete','Backend\DesignationController@deleteDesignation')->name('site-setting.designation.delete');

			//Follow Us

			Route::get('follow/us','Backend\FollowUsController@index')->name('site-setting.follow.us');		
			Route::get('follow/us/add','Backend\FollowUsController@addFollowUs')->name('site-setting.follow.us.add');		
			Route::post('follow/us/store','Backend\FollowUsController@storeFollowUs')->name('site-setting.follow.us.store');
			Route::get('follow/us/edit/{id}','Backend\FollowUsController@editFollowUs')->name('site-setting.follow.us.edit');
			Route::post('follow/us/update/{id}','Backend\FollowUsController@updateFollowUs')->name('site-setting.follow.us.update');
			Route::get('follow/us/delete','Backend\FollowUsController@deleteFollowUs')->name('site-setting.follow.us.delete');


			//Features

			Route::get('features','Backend\FeaturesController@index')->name('site-setting.features');		
			Route::get('features/add','Backend\FeaturesController@addFeatures')->name('site-setting.features.add');		
			Route::post('features/store','Backend\FeaturesController@storeFeatures')->name('site-setting.features.store');
			Route::get('features/edit/{id}','Backend\FeaturesController@editFeatures')->name('site-setting.features.edit');
			Route::post('features/update/{id}','Backend\FeaturesController@updateFeatures')->name('site-setting.features.update');
			Route::get('features/delete','Backend\FeaturesController@deleteFeatures')->name('site-setting.features.delete');

			//Training & Enroll

			Route::get('training_enroll','Backend\TrainingEnrollController@index')->name('site-setting.training_enroll');		
			Route::get('training_enroll/add','Backend\TrainingEnrollController@addTrainingEnroll')->name('site-setting.training_enroll.add');		
			Route::post('training_enroll/store','Backend\TrainingEnrollController@storeTrainingEnroll')->name('site-setting.training_enroll.store');
			Route::get('training_enroll/edit/{id}','Backend\TrainingEnrollController@editTrainingEnroll')->name('site-setting.training_enroll.edit');
			Route::post('training_enroll/update/{id}','Backend\TrainingEnrollController@updateTrainingEnroll')->name('site-setting.training_enroll.update');
			Route::get('training_enroll/delete','Backend\TrainingEnrollController@deleteTrainingEnroll')->name('site-setting.training_enroll.delete');

			Route::post('training_enroll/background/store','Backend\TrainingEnrollController@storeTrainingBackground')->name('site-setting.training_enroll.background.store');

			//Alumni

			Route::get('alumni','Backend\AlumniController@index')->name('site-setting.alumni');		
			Route::get('alumni/add','Backend\AlumniController@addAlumni')->name('site-setting.alumni.add');		
			Route::post('alumni/store','Backend\AlumniController@storeAlumni')->name('site-setting.alumni.store');
			Route::get('alumni/edit/{id}','Backend\AlumniController@editAlumni')->name('site-setting.alumni.edit');
			Route::post('alumni/update/{id}','Backend\AlumniController@updateAlumni')->name('site-setting.alumni.update');
			Route::get('alumni/delete','Backend\AlumniController@deleteAlumni')->name('site-setting.alumni.delete');

			Route::post('alumni/background/store','Backend\AlumniController@storeAlumniBackground')->name('site-setting.alumni.background.store');

			//Student Feedbacks

			Route::get('student/feedbacks','Backend\StudentFeedbackController@index')->name('site-setting.student_feedbacks');		
			Route::get('student/feedbacks/add','Backend\StudentFeedbackController@addStudentFeedback')->name('site-setting.student_feedbacks.add');		
			Route::post('student/feedbacks/store','Backend\StudentFeedbackController@storeStudentFeedback')->name('site-setting.student_feedbacks.store');
			Route::get('student/feedbacks/edit/{id}','Backend\StudentFeedbackController@editStudentFeedback')->name('site-setting.student_feedbacks.edit');
			Route::post('student/feedbacks/update/{id}','Backend\StudentFeedbackController@updateStudentFeedback')->name('site-setting.student_feedbacks.update');
			Route::get('student/feedbacks/delete','Backend\StudentFeedbackController@deleteStudentFeedback')->name('site-setting.student_feedbacks.delete');

			Route::post('student/feedbacks/background/store','Backend\StudentFeedbackController@storeFeedbackBackground')->name('site-setting.student_feedbacks.background.store');

			//Our Research

			Route::get('our/research','Backend\OurResearchController@index')->name('site-setting.our_research');		
			Route::get('our/research/add','Backend\OurResearchController@addOurResearch')->name('site-setting.our_research.add');		
			Route::post('our/research/store','Backend\OurResearchController@storeOurResearch')->name('site-setting.our_research.store');
			Route::get('our/research/edit/{id}','Backend\OurResearchController@editOurResearch')->name('site-setting.our_research.edit');
			Route::post('our/research/update/{id}','Backend\OurResearchController@updateOurResearch')->name('site-setting.our_research.update');
			Route::get('our/research/delete','Backend\OurResearchController@deleteOurResearch')->name('site-setting.our_research.delete');

			Route::post('our/research/background/store','Backend\OurResearchController@storeResearchBackground')->name('site-setting.our_research.background.store');

			//Our Development

			Route::get('our/development','Backend\OurDevelopmentController@index')->name('site-setting.our_development');		
			Route::get('our/development/add','Backend\OurDevelopmentController@addOurDevelopment')->name('site-setting.our_development.add');		
			Route::post('our/development/store','Backend\OurDevelopmentController@storeOurDevelopment')->name('site-setting.our_development.store');
			Route::get('our/development/edit/{id}','Backend\OurDevelopmentController@editOurDevelopment')->name('site-setting.our_development.edit');
			Route::post('our/development/update/{id}','Backend\OurDevelopmentController@updateOurDevelopment')->name('site-setting.our_development.update');
			Route::get('our/development/delete','Backend\OurDevelopmentController@deleteOurDevelopment')->name('site-setting.our_development.delete');

			Route::post('our/development/background/store','Backend\OurDevelopmentController@storeDevelopmentBackground')->name('site-setting.our_development.background.store');

			//Our Library

			Route::get('our/library','Backend\OurLibraryController@index')->name('site-setting.our_library');		
			Route::get('our/library/add','Backend\OurLibraryController@addOurLibrary')->name('site-setting.our_library.add');		
			Route::post('our/library/store','Backend\OurLibraryController@storeOurLibrary')->name('site-setting.our_library.store');
			Route::get('our/library/edit/{id}','Backend\OurLibraryController@editOurLibrary')->name('site-setting.our_library.edit');
			Route::post('our/library/update/{id}','Backend\OurLibraryController@updateOurLibrary')->name('site-setting.our_library.update');
			Route::get('our/library/delete','Backend\OurLibraryController@deleteOurLibrary')->name('site-setting.our_library.delete');

			Route::post('our/library/background/store','Backend\OurLibraryController@storeLibraryBackground')->name('site-setting.our_library.background.store');

			//Our Campus

			Route::get('our/campus','Backend\OurCampusController@index')->name('site-setting.our_campus');		
			Route::get('our/campus/add','Backend\OurCampusController@addOurCampus')->name('site-setting.our_campus.add');		
			Route::post('our/campus/store','Backend\OurCampusController@storeOurCampus')->name('site-setting.our_campus.store');
			Route::get('our/campus/edit/{id}','Backend\OurCampusController@editOurCampus')->name('site-setting.our_campus.edit');
			Route::post('our/campus/update/{id}','Backend\OurCampusController@updateOurCampus')->name('site-setting.our_campus.update');
			Route::get('our/campus/delete','Backend\OurCampusController@deleteOurCampus')->name('site-setting.our_campus.delete');

			Route::post('our/campus/background/store','Backend\OurCampusController@storeCampusBackground')->name('site-setting.our_campus.background.store');

			//Tag Lines

			Route::get('tagline','Backend\TaglineController@index')->name('site-setting.tagline');		
			Route::get('tagline/add','Backend\TaglineController@addTagline')->name('site-setting.tagline.add');		
			Route::post('tagline/store','Backend\TaglineController@storeTagline')->name('site-setting.tagline.store');
			Route::get('tagline/edit/{id}','Backend\TaglineController@editTagline')->name('site-setting.tagline.edit');
			Route::post('tagline/update/{id}','Backend\TaglineController@updateTagline')->name('site-setting.tagline.update');
			Route::get('tagline/delete','Backend\TaglineController@deleteTagline')->name('site-setting.tagline.delete');

			//Institute Details
			Route::get('institute_details','Backend\InstituteDetailsController@index')->name('site-setting.institute_details');		
			// Route::get('time_schedule/add','Backend\LibraryTimeScheduleController@addSlider')->name('site-setting.time_schedule.add');		
			Route::post('institute_details/store','Backend\InstituteDetailsController@store')->name('site-setting.institute_details.store');
			// Route::get('time_schedule/edit/{id}','Backend\LibraryTimeScheduleController@editSlider')->name('site-setting.time_schedule.edit');
			// Route::post('time_schedule/update/{id}','Backend\LibraryTimeScheduleController@updateSlider')->name('site-setting.time_schedule.update');
			// Route::get('time_schedule/delete','Backend\LibraryTimeScheduleController@deleteSlider')->name('site-setting.time_schedule.delete');


			//Program Crud

			Route::get('program','Backend\ProgramController@index')->name('site-setting.program');		
			Route::get('program/add','Backend\ProgramController@add')->name('site-setting.program.add');		
			Route::post('program/store','Backend\ProgramController@store')->name('site-setting.program.store');
			Route::get('program/edit/{id}','Backend\ProgramController@edit')->name('site-setting.program.edit');
			Route::post('program/update/{id}','Backend\ProgramController@update')->name('site-setting.program.update');
			Route::get('program/delete','Backend\ProgramController@delete')->name('site-setting.program.delete');

			//Course Crud

			Route::get('course','Backend\CourseController@index')->name('site-setting.course');		
			Route::get('course/add','Backend\CourseController@add')->name('site-setting.course.add');		
			Route::post('course/store','Backend\CourseController@store')->name('site-setting.course.store');
			Route::get('course/edit/{id}','Backend\CourseController@edit')->name('site-setting.course.edit');
			Route::post('course/update/{id}','Backend\CourseController@update')->name('site-setting.course.update');
			Route::get('course/delete','Backend\CourseController@delete')->name('site-setting.course.delete');

		});

		
		
	
		Route::prefix('frontend-menu')->group(function(){

			//Post
			Route::get('/post/view', 'Backend\Post\PostController@view')->name('frontend-menu.post.view');
	        Route::get('/post/add','Backend\Post\PostController@add')->name('frontend-menu.post.add');
			Route::post('/post/store','Backend\Post\PostController@store')->name('frontend-menu.post.store');
			Route::get('/post/edit/{id}','Backend\Post\PostController@edit')->name('frontend-menu.post.edit');
			Route::post('/post/update/{id}','Backend\Post\PostController@update')->name('frontend-menu.post.update');
			Route::get('/post/delete', 'Backend\Post\PostController@destroy')->name('frontend-menu.post.destroy');
			
	        //Frontend Menu
	        Route::get('/menu/view', 'Backend\Post\FrontendMenuController@view')->name('frontend-menu.menu.view');
	        Route::get('/menu/course', 'Backend\Post\FrontendMenuController@getCourse')->name('frontend-menu.menu.course');
	        Route::get('/menu/add','Backend\Post\FrontendMenuController@add')->name('frontend-menu.menu.add');
			Route::post('/menu/single/store','Backend\Post\FrontendMenuController@singleStore')->name('frontend-menu.menu.single.store');
			Route::post('/menu/store','Backend\Post\FrontendMenuController@store')->name('frontend-menu.menu.store');
			Route::get('/menu/edit/{id}','Backend\Post\FrontendMenuController@edit')->name('frontend-menu.menu.edit');
			Route::post('/menu/update/{id}','Backend\Post\FrontendMenuController@update')->name('frontend-menu.menu.update');
			Route::get('/menu/delete', 'Backend\Post\FrontendMenuController@destroy')->name('frontend-menu.menu.destroy');

			//Counter Box

			Route::get('counter_box','Backend\CounterBoxController@index')->name('frontend-menu.counter_box');		
			Route::get('counter_box/add','Backend\CounterBoxController@addCounterBox')->name('frontend-menu.counter_box.add');		
			Route::post('counter_box/store','Backend\CounterBoxController@storeCounterBox')->name('frontend-menu.counter_box.store');
			Route::get('counter_box/edit/{id}','Backend\CounterBoxController@editCounterBox')->name('frontend-menu.counter_box.edit');
			Route::post('counter_box/update/{id}','Backend\CounterBoxController@updateCounterBox')->name('frontend-menu.counter_box.update');
			Route::get('counter_box/delete','Backend\CounterBoxController@deleteCounterBox')->name('frontend-menu.counter_box.delete');

			Route::post('counter_box/background/store','Backend\CounterBoxController@storeCounterBackground')->name('frontend-menu.counter_box.background.store');

			//Ongoing Research

			Route::get('ongoing_research','Backend\OngoingResearchController@index')->name('frontend-menu.ongoing_research');		
			Route::get('ongoing_research/add','Backend\OngoingResearchController@add')->name('frontend-menu.ongoing_research.add');		
			Route::post('ongoing_research/store','Backend\OngoingResearchController@store')->name('frontend-menu.ongoing_research.store');
			Route::get('ongoing_research/edit/{id}','Backend\OngoingResearchController@edit')->name('frontend-menu.ongoing_research.edit');
			Route::post('ongoing_research/update/{id}','Backend\OngoingResearchController@update')->name('frontend-menu.ongoing_research.update');
			Route::get('ongoing_research/delete','Backend\OngoingResearchController@delete')->name('frontend-menu.ongoing_research.delete');

			//Completed Research

			Route::get('completed_research','Backend\CompletedResearchController@index')->name('frontend-menu.completed_research');		
			Route::get('completed_research/add','Backend\CompletedResearchController@add')->name('frontend-menu.completed_research.add');		
			Route::post('completed_research/store','Backend\CompletedResearchController@store')->name('frontend-menu.completed_research.store');
			Route::get('completed_research/edit/{id}','Backend\CompletedResearchController@edit')->name('frontend-menu.completed_research.edit');
			Route::post('completed_research/update/{id}','Backend\CompletedResearchController@update')->name('frontend-menu.completed_research.update');
			Route::get('completed_research/delete','Backend\CompletedResearchController@delete')->name('frontend-menu.completed_research.delete');	

			//Op-ed

			Route::get('oped','Backend\OpedController@index')->name('frontend-menu.oped');		
			Route::get('oped/add','Backend\OpedController@add')->name('frontend-menu.oped.add');		
			Route::post('oped/store','Backend\OpedController@store')->name('frontend-menu.oped.store');
			Route::get('oped/edit/{id}','Backend\OpedController@edit')->name('frontend-menu.oped.edit');
			Route::post('oped/update/{id}','Backend\OpedController@update')->name('frontend-menu.oped.update');
			Route::get('oped/delete','Backend\OpedController@delete')->name('frontend-menu.oped.delete');

			//Ongoing Training

			Route::get('ongoing_training','Backend\OngoingTrainingController@index')->name('frontend-menu.ongoing_training');		
			Route::get('ongoing_training/add','Backend\OngoingTrainingController@add')->name('frontend-menu.ongoing_training.add');		
			Route::post('ongoing_training/store','Backend\OngoingTrainingController@store')->name('frontend-menu.ongoing_training.store');
			Route::get('ongoing_training/edit/{id}','Backend\OngoingTrainingController@edit')->name('frontend-menu.ongoing_training.edit');
			Route::post('ongoing_training/update/{id}','Backend\OngoingTrainingController@update')->name('frontend-menu.ongoing_training.update');
			Route::get('ongoing_training/delete','Backend\OngoingTrainingController@delete')->name('frontend-menu.ongoing_training.delete');

			//Upcoming Training

			Route::get('upcoming_training','Backend\UpcomingTrainingController@index')->name('frontend-menu.upcoming_training');		
			Route::get('upcoming_training/add','Backend\UpcomingTrainingController@add')->name('frontend-menu.upcoming_training.add');		
			Route::post('upcoming_training/store','Backend\UpcomingTrainingController@store')->name('frontend-menu.upcoming_training.store');
			Route::get('upcoming_training/edit/{id}','Backend\UpcomingTrainingController@edit')->name('frontend-menu.upcoming_training.edit');
			Route::post('upcoming_training/update/{id}','Backend\UpcomingTrainingController@update')->name('frontend-menu.upcoming_training.update');
			Route::get('upcoming_training/delete','Backend\UpcomingTrainingController@delete')->name('frontend-menu.upcoming_training.delete');

			//BIGM Journal of Policy Analysis

			Route::get('bigm-journal-policy','Backend\ContactMessageController@bigmJournalPolicy')->name('frontend-menu.bigm_journal_policy');

		});

		Route::prefix('member-management')->group(function(){

			Route::get('member/list','Backend\MemberController@list')->name('member_management.list');
			Route::get('member/add','Backend\MemberController@add')->name('member_management.add');
			Route::post('member/store','Backend\MemberController@store')->name('member_management.store');
			Route::get('member/edit/{id}','Backend\MemberController@edit')->name('member_management.edit');
			Route::post('member/update/{id}','Backend\MemberController@update')->name('member_management.update');
			Route::get('member/delete','Backend\MemberController@destroy')->name('member_management.delete');


			//member education delete
			Route::get('member/education/remove/{id}','Backend\MemberController@memberEducationRemove')->name('remove_member_education');
			//member experience delete
			Route::get('member/experience/remove/{id}','Backend\MemberController@memberExperienceRemove')->name('remove_member_experience');
			//member administrative delete
			Route::get('member/administrative/remove/{id}','Backend\MemberController@memberAdministrativeRemove')->name('remove_member_administrative');
			//member area of interest delete
			Route::get('member/area_of_interest/remove/{id}','Backend\MemberController@memberInterestAreaRemove')->name('remove_member_interest_area');
			//member honor and awards delete
			Route::get('member/honor_and_awards/remove/{id}','Backend\MemberController@memberHonorAndAwardsRemove')->name('remove_honor_and_awards');
			//member scholarships delete
			Route::get('member/scholarships/remove/{id}','Backend\MemberController@memberScholarshipsRemove')->name('remove_scholarships');
			//member responsibilities delete
			Route::get('member/responsibilities/remove/{id}','Backend\MemberController@memberResponsibilitiesRemove')->name('remove_responsibilities');
			//member projects delete
			Route::get('member/projects/remove/{id}','Backend\MemberController@memberProjectsRemove')->name('remove_projects');
			//member training delete
			Route::get('member/training/remove/{id}','Backend\MemberController@memberTrainingRemove')->name('remove_training');
			//member certification delete
			Route::get('member/certification/remove/{id}','Backend\MemberController@memberCertificationRemove')->name('remove_certification');
			//member publication book delete
			Route::get('member/publication_book/remove/{id}','Backend\MemberController@memberBookRemove')->name('remove_publish_books');
			//member publication journal delete
			Route::get('member/publication_journal/remove/{id}','Backend\MemberController@memberJournalRemove')->name('remove_publish_journals');
			//member conference delete
			Route::get('member/conference/remove/{id}','Backend\MemberController@memberConference')->name('remove_conference');
			//member op_ed delete
			Route::get('member/op_ed/remove/{id}','Backend\MemberController@memberOpedRemove')->name('remove_op_ed');
			//member taught_course delete
			Route::get('member/taught_course/remove/{id}','Backend\MemberController@memberTaughtCourseRemove')->name('remove_member_taught_course');
			//member language delete
			Route::get('member/language/remove/{id}','Backend\MemberController@memberLanguageRemove')->name('remove_member_language');
			//member social welfare delete
			Route::get('member/social_welfare/remove/{id}','Backend\MemberController@memberSocialWelfareRemove')->name('remove_member_social_welfare');
			//member skill delete
			Route::get('member/skill/remove/{id}','Backend\MemberController@memberSkillRemove')->name('remove_member_skill');

		});

		Route::prefix('board-of-trustees')->group(function(){

			Route::get('board-of-trustees/list','Backend\BoardofTrusteeController@list')->name('board_of_trustee.list');
			Route::get('board-of-trustees/add','Backend\BoardofTrusteeController@add')->name('board_of_trustee.add');
			Route::post('board-of-trustees/store','Backend\BoardofTrusteeController@store')->name('board_of_trustee.store');
			Route::get('board-of-trustees/edit/{id}','Backend\BoardofTrusteeController@edit')->name('board_of_trustee.edit');
			Route::post('board-of-trustees/update/{id}','Backend\BoardofTrusteeController@update')->name('board_of_trustee.update');
			Route::get('board-of-trustees/delete','Backend\BoardofTrusteeController@destroy')->name('board_of_trustee.delete');
			
		});

		Route::prefix('governing-body')->group(function(){

			Route::get('governing-body/list','Backend\GoverningBodyController@list')->name('governing_body.list');
			Route::get('governing-body/add','Backend\GoverningBodyController@add')->name('governing_body.add');
			Route::post('governing-body/store','Backend\GoverningBodyController@store')->name('governing_body.store');
			Route::get('governing-body/edit/{id}','Backend\GoverningBodyController@edit')->name('governing_body.edit');
			Route::post('governing-body/update/{id}','Backend\GoverningBodyController@update')->name('governing_body.update');
			Route::get('governing-body/delete','Backend\GoverningBodyController@destroy')->name('governing_body.delete');
			
		});

		Route::prefix('member-to-course')->group(function(){

			Route::get('member-to-course/list','Backend\MemberToCourseController@list')->name('member_to_course.list');
			Route::get('member-to-course/add','Backend\MemberToCourseController@add')->name('member_to_course.add');
			Route::post('member-to-course/store','Backend\MemberToCourseController@store')->name('member_to_course.store');
			Route::get('member-to-course/edit/{id}','Backend\MemberToCourseController@edit')->name('member_to_course.edit');
			Route::post('member-to-course/update/{id}','Backend\MemberToCourseController@update')->name('member_to_course.update');
			Route::get('member-to-course/delete','Backend\MemberToCourseController@destroy')->name('member_to_course.delete');

			//ajax
			Route::get('program-wise-course','Backend\MemberToCourseController@programWiseCourse')->name('program_wise_course');
			
		});

		Route::prefix('member-to-employee')->group(function(){

			Route::get('member-to-employee/list','Backend\MemberToEmployeeController@list')->name('member_to_employee.list');
			Route::get('member-to-employee/add','Backend\MemberToEmployeeController@add')->name('member_to_employee.add');
			Route::post('member-to-employee/store','Backend\MemberToEmployeeController@store')->name('member_to_employee.store');
			Route::get('member-to-employee/edit/{id}','Backend\MemberToEmployeeController@edit')->name('member_to_employee.edit');
			Route::post('member-to-employee/update/{id}','Backend\MemberToEmployeeController@update')->name('member_to_employee.update');
			Route::get('member-to-employee/delete','Backend\MemberToEmployeeController@destroy')->name('member_to_employee.delete');
			
		});

	});

	Route::prefix('top-menu')->group(function(){
		
		//Contact Us

		// Route::get('contact_us','Backend\ContactUsController@index')->name('frontend-menu.contact.us');		
		// Route::get('contact_us/add','Backend\ContactUsController@addContactUs')->name('frontend-menu.contact.us.add');		
		// Route::post('contact_us/store','Backend\ContactUsController@storeContactUs')->name('frontend-menu.contact.us.store');
		// Route::get('contact_us/edit/{id}','Backend\ContactUsController@editContactUs')->name('frontend-menu.contact.us.edit');
		// Route::post('contact_us/update/{id}','Backend\ContactUsController@updateContactUs')->name('frontend-menu.contact.us.update');
		// Route::get('contact_us/delete','Backend\ContactUsController@deleteContactUs')->name('frontend-menu.contact.us.delete');

		//Contact Message

		Route::get('contact/message','Backend\ContactMessageController@index')->name('top-menu.contact.message');
		Route::get('control-top-left-menu','Backend\ContactMessageController@controlTopLeftMenu')->name('top-menu.control_top_left_menu');
		Route::post('store-top-left-menu','Backend\ContactMessageController@storeControlTopLeftMenu')->name('top-menu.store_control_top_left_menu');

		//Location

		Route::get('location_admin','Frontend\LocationController@index')->name('top-menu.location_admin');		
		Route::get('location_admin/add','Frontend\LocationController@addLocation')->name('top-menu.location_admin.add');		
		Route::post('location_admin/store','Frontend\LocationController@storeLocation')->name('top-menu.location_admin.store');
		Route::get('location_admin/edit/{id}','Frontend\LocationController@editLocation')->name('top-menu.location_admin.edit');
		Route::post('location_admin/update/{id}','Frontend\LocationController@updateLocation')->name('top-menu.location_admin.update');
		Route::get('location_admin/delete','Frontend\LocationController@deleteLocation')->name('top-menu.location_admin.delete');

		//Photo Gallery

		Route::get('photo_gallery','Backend\PhotoGalleryController@index')->name('top-menu.photo_gallery');		
		Route::get('photo_gallery/add','Backend\PhotoGalleryController@addPhotoGallery')->name('top-menu.photo_gallery.add');		
		Route::post('photo_gallery/store','Backend\PhotoGalleryController@storePhotoGallery')->name('top-menu.photo_gallery.store');
		Route::get('photo_gallery/edit/{id}','Backend\PhotoGalleryController@editPhotoGallery')->name('top-menu.photo_gallery.edit');
		Route::post('photo_gallery/update/{id}','Backend\PhotoGalleryController@updatePhotoGallery')->name('top-menu.photo_gallery.update');
		Route::get('photo_gallery/delete','Backend\PhotoGalleryController@deletePhotoGallery')->name('top-menu.photo_gallery.delete');
		//Route::get('remove/image/from_photo_gallery','Backend\PhotoGalleryController@removeImageFromPhotoGallery')->name('remove.image.from_photo_gallery');
		Route::get('remove/image/from_photo_gallery/{id}','Backend\PhotoGalleryController@removeImageFromPhotoGallery')->name('remove.image.from_photo_gallery');

		//Video Gallery

		Route::get('video_gallery','Backend\VideoGalleryController@index')->name('top-menu.video_gallery');		
		Route::get('video_gallery/add','Backend\VideoGalleryController@addVideoGallery')->name('top-menu.video_gallery.add');		
		Route::post('video_gallery/store','Backend\VideoGalleryController@storeVideoGallery')->name('top-menu.video_gallery.store');
		Route::get('video_gallery/edit/{id}','Backend\VideoGalleryController@editVideoGallery')->name('top-menu.video_gallery.edit');
		Route::post('video_gallery/update/{id}','Backend\VideoGalleryController@updateVideoGallery')->name('top-menu.video_gallery.update');
		Route::get('video_gallery/delete','Backend\VideoGalleryController@deleteVideoGallery')->name('top-menu.video_gallery.delete');

		//Career/Jobs

		Route::get('career','Backend\CareerController@index')->name('top-menu.career');		
		Route::get('career/add','Backend\CareerController@addCareer')->name('top-menu.career.add');		
		Route::post('career/store','Backend\CareerController@storeCareer')->name('top-menu.career.store');
		Route::get('career/edit/{id}','Backend\CareerController@editCareer')->name('top-menu.career.edit');
		Route::post('career/update/{id}','Backend\CareerController@updateCareer')->name('top-menu.career.update');
		Route::get('career/delete','Backend\CareerController@deleteCareer')->name('top-menu.career.delete');

	});

	Route::prefix('footer-menu')->group(function(){

		//Useful Links

		Route::get('useful_links','Backend\UsefulLinksController@index')->name('footer-menu.useful.links');		
		Route::get('useful_links/add','Backend\UsefulLinksController@addUsefulLinks')->name('footer-menu.useful.links.add');		
		Route::post('useful_links/store','Backend\UsefulLinksController@storeUsefulLinks')->name('footer-menu.useful.links.store');
		Route::get('useful_links/edit/{id}','Backend\UsefulLinksController@editUsefulLinks')->name('footer-menu.useful.links.edit');
		Route::post('useful_links/update/{id}','Backend\UsefulLinksController@updateUsefulLinks')->name('footer-menu.useful.links.update');
		Route::get('useful_links/delete','Backend\UsefulLinksController@deleteUsefulLinks')->name('footer-menu.useful.links.delete');

		//Quick Links

		Route::get('quick_links','Backend\QuickLinksController@index')->name('footer-menu.quick.links');		
		Route::get('quick_links/add','Backend\QuickLinksController@addQuickLinks')->name('footer-menu.quick.links.add');		
		Route::post('quick_links/store','Backend\QuickLinksController@storeQuickLinks')->name('footer-menu.quick.links.store');
		Route::get('quick_links/edit/{id}','Backend\QuickLinksController@editQuickLinks')->name('footer-menu.quick.links.edit');
		Route::post('quick_links/update/{id}','Backend\QuickLinksController@updateQuickLinks')->name('footer-menu.quick.links.update');
		Route::get('quick_links/delete','Backend\QuickLinksController@deleteQuickLinks')->name('footer-menu.quick.links.delete');

		//For Students

		Route::get('for_students','Backend\ForStudentsController@index')->name('footer-menu.for.students');		
		Route::get('for_students/add','Backend\ForStudentsController@addForStudents')->name('footer-menu.for.students.add');		
		Route::post('for_students/store','Backend\ForStudentsController@storeForStudents')->name('footer-menu.for.students.store');
		Route::get('for_students/edit/{id}','Backend\ForStudentsController@editForStudents')->name('footer-menu.for.students.edit');
		Route::post('for_students/update/{id}','Backend\ForStudentsController@updateForStudents')->name('footer-menu.for.students.update');
		Route::get('for_students/delete','Backend\ForStudentsController@deleteForStudents')->name('footer-menu.for.students.delete');

		//Get in Touch

		Route::get('get_in_touch','Backend\GetInTouchController@index')->name('footer-menu.get.in.touch');		
		Route::get('get_in_touch/add','Backend\GetInTouchController@addGetInTouch')->name('footer-menu.get.in.touch.add');		
		Route::post('get_in_touch/store','Backend\GetInTouchController@storeGetInTouch')->name('footer-menu.get.in.touch.store');
		Route::get('get_in_touch/edit/{id}','Backend\GetInTouchController@editGetInTouch')->name('footer-menu.get.in.touch.edit');
		Route::post('get_in_touch/update/{id}','Backend\GetInTouchController@updateGetInTouch')->name('footer-menu.get.in.touch.update');
		Route::get('get_in_touch/delete','Backend\GetInTouchController@deleteGetInTouch')->name('footer-menu.get.in.touch.delete');

		//Fast Service

		Route::get('fast_service','Backend\FastServiceController@index')->name('footer-menu.fast.service');		
		Route::get('fast_service/add','Backend\FastServiceController@addFastService')->name('footer-menu.fast.service.add');		
		Route::post('fast_service/store','Backend\FastServiceController@storeFastService')->name('footer-menu.fast.service.store');
		Route::get('fast_service/edit/{id}','Backend\FastServiceController@editFastService')->name('footer-menu.fast.service.edit');
		Route::post('fast_service/update/{id}','Backend\FastServiceController@updateFastService')->name('footer-menu.fast.service.update');
		Route::get('fast_service/delete','Backend\FastServiceController@deleteFastService')->name('footer-menu.fast.service.delete');

		//Social Media Links

		Route::get('social_media_links','Backend\SocialMediaLinkController@index')->name('footer-menu.social_media_links');		
		Route::get('social_media_links/add','Backend\SocialMediaLinkController@addSocialMediaLink')->name('footer-menu.social_media_links.add');		
		Route::post('social_media_links/store','Backend\SocialMediaLinkController@storeSocialMediaLink')->name('footer-menu.social_media_links.store');
		Route::get('social_media_links/edit/1','Backend\SocialMediaLinkController@editSocialMediaLink')->name('footer-menu.social_media_links.edit');
		Route::post('social_media_links/update/1','Backend\SocialMediaLinkController@updateSocialMediaLink')->name('footer-menu.social_media_links.update');
		Route::get('social_media_links/delete','Backend\SocialMediaLinkController@deleteSocialMediaLink')->name('footer-menu.social_media_links.delete');

		//NOC/Office Order

		Route::get('office_order','Backend\OfficeOrderController@list')->name('footer-menu.office.order');		
		Route::get('office_order/add','Backend\OfficeOrderController@add')->name('footer-menu.office.order.add');		
		Route::post('office_order/store','Backend\OfficeOrderController@store')->name('footer-menu.office.order.store');
		Route::get('office_order/edit/{id}','Backend\OfficeOrderController@edit')->name('footer-menu.office.order.edit');
		Route::post('office_order/update/{id}','Backend\OfficeOrderController@update')->name('footer-menu.office.order.update');
		Route::get('office_order/delete','Backend\OfficeOrderController@delete')->name('footer-menu.office.order.delete');

		//office order attachment
		Route::get('member/noc-attachment/remove/{id}','Backend\OfficeOrderController@officeOrderAttachmentRemove')->name('remove_office_order_attachment');
		
	});

	Route::prefix('library-management')->group(function(){

		//Slider
		Route::get('slider','Backend\LibrarySliderController@index')->name('library-management.slider');		
		Route::get('slider/add','Backend\LibrarySliderController@addSlider')->name('library-management.slider.add');		
		Route::post('slider/store','Backend\LibrarySliderController@storeSlider')->name('library-management.slider.store');
		Route::get('slider/edit/{id}','Backend\LibrarySliderController@editSlider')->name('library-management.slider.edit');
		Route::post('slider/update/{id}','Backend\LibrarySliderController@updateSlider')->name('library-management.slider.update');
		Route::get('slider/delete','Backend\LibrarySliderController@deleteSlider')->name('library-management.slider.delete');

		//Time Schedule
		Route::get('time_schedule','Backend\LibraryTimeScheduleController@index')->name('library-management.time_schedule');		
		// Route::get('time_schedule/add','Backend\LibraryTimeScheduleController@addSlider')->name('library-management.time_schedule.add');		
		Route::post('time_schedule/store','Backend\LibraryTimeScheduleController@storeSchedule')->name('library-management.time_schedule.store');
		// Route::get('time_schedule/edit/{id}','Backend\LibraryTimeScheduleController@editSlider')->name('library-management.time_schedule.edit');
		// Route::post('time_schedule/update/{id}','Backend\LibraryTimeScheduleController@updateSlider')->name('library-management.time_schedule.update');
		// Route::get('time_schedule/delete','Backend\LibraryTimeScheduleController@deleteSlider')->name('library-management.time_schedule.delete');
		
		//Books / Publications
		Route::get('books-publications','Backend\BooksPublicationsController@index')->name('library-management.books_publications');		
		Route::get('books-publications/add','Backend\BooksPublicationsController@add')->name('library-management.books_publications.add');		
		Route::post('books-publications/store','Backend\BooksPublicationsController@store')->name('library-management.books_publications.store');
		Route::get('books-publications/edit/{id}','Backend\BooksPublicationsController@edit')->name('library-management.books_publications.edit');
		Route::post('books-publications/update/{id}','Backend\BooksPublicationsController@update')->name('library-management.books_publications.update');
		Route::get('books-publications/delete','Backend\BooksPublicationsController@delete')->name('library-management.books_publications.delete');

		Route::get('books-publications/filter_new_arrivals','Backend\BooksPublicationsController@filterNewArrivals')->name('library-management.books_publications.filter_new_arrivals');
		Route::get('books-publications/filter_upcoming_books','Backend\BooksPublicationsController@filterUpcomingBooks')->name('library-management.books_publications.filter_upcoming_books');
		Route::get('books-publications/filter_publications_journals','Backend\BooksPublicationsController@filterPublicationsJournals')->name('library-management.books_publications.filter_publications_journals');

		//Library Subjects
		Route::get('library-subjects','Backend\LibrarySubjectController@index')->name('library-management.library_subjects');		
		Route::get('library-subjects/add','Backend\LibrarySubjectController@add')->name('library-management.library_subjects.add');		
		Route::post('library-subjects/store','Backend\LibrarySubjectController@store')->name('library-management.library_subjects.store');
		Route::get('library-subjects/edit/{id}','Backend\LibrarySubjectController@edit')->name('library-management.library_subjects.edit');
		Route::post('library-subjects/update/{id}','Backend\LibrarySubjectController@update')->name('library-management.library_subjects.update');
		Route::get('library-subjects/delete','Backend\LibrarySubjectController@delete')->name('library-management.library_subjects.delete');

		//Library News
		Route::get('library-news','Backend\LibraryNewsController@index')->name('library-management.library_news');		
		Route::get('library-news/add','Backend\LibraryNewsController@add')->name('library-management.library_news.add');		
		Route::post('library-news/store','Backend\LibraryNewsController@store')->name('library-management.library_news.store');
		Route::get('library-news/edit/{id}','Backend\LibraryNewsController@edit')->name('library-management.library_news.edit');
		Route::post('library-news/update/{id}','Backend\LibraryNewsController@update')->name('library-management.library_news.update');
		Route::get('library-news/delete','Backend\LibraryNewsController@delete')->name('library-management.library_news.delete');

		//Ask Librarian

		Route::get('ask-librarian','Backend\ContactMessageController@askLibrarian')->name('library-management.ask_librarian');
	});

	//Blog Management
	Route::prefix('blog-management')->group(function(){

		//Category
		Route::get('post_category','Backend\PostCategoryController@index')->name('blog-management.post_category');		
		Route::get('post_category/add','Backend\PostCategoryController@addPostCategory')->name('blog-management.post_category.add');		
		Route::post('post_category/store','Backend\PostCategoryController@storePostCategory')->name('blog-management.post_category.store');
		Route::get('post_category/edit/{id}','Backend\PostCategoryController@editPostCategory')->name('blog-management.post_category.edit');
		Route::post('post_category/update/{id}','Backend\PostCategoryController@updatePostCategory')->name('blog-management.post_category.update');
		Route::get('post_category/delete','Backend\PostCategoryController@deletePostCategory')->name('blog-management.post_category.delete');


		//Manage Post
		Route::get('manage_post','Backend\ManagePostController@index')->name('blog-management.blog_post');		
		Route::get('manage_post/add','Backend\ManagePostController@addBlogPost')->name('blog-management.blog_post.add');		
		Route::post('manage_post/store','Backend\ManagePostController@storeBlogPost')->name('blog-management.blog_post.store');
		Route::get('manage_post/edit/{id}','Backend\ManagePostController@editBlogPost')->name('blog-management.blog_post.edit');
		Route::post('manage_post/update/{id}','Backend\ManagePostController@updateBlogPost')->name('blog-management.blog_post.update');
		Route::get('manage_post/delete','Backend\ManagePostController@deleteBlogPost')->name('blog-management.blog_post.delete');

		//Manage Comment
		Route::get('manage_comment','Backend\ManageCommentController@index')->name('blog-management.blog_comment');		
		Route::get('manage_comment/add','Backend\ManageCommentController@add')->name('blog-management.blog_comment.add');		
		Route::post('manage_comment/store','Backend\ManageCommentController@store')->name('blog-management.blog_comment.store');
		Route::get('manage_comment/edit/{id}','Backend\ManageCommentController@edit')->name('blog-management.blog_comment.edit');
		Route::post('manage_comment/update/{id}','Backend\ManageCommentController@update')->name('blog-management.blog_comment.update');
		Route::get('manage_comment/delete','Backend\ManageCommentController@delete')->name('blog-management.blog_comment.delete');
	});
});