<?php

namespace App\Http\Controllers\Frontend;

use App;
use App\Http\Controllers\Controller;
use App\Model\About;
use App\Model\Activity;
use App\Model\Advisor;
use App\Model\Alumni;
use App\Model\Banner;
use App\Model\ContactMessage;
use App\Model\ContactUs;
use App\Model\CounterBox;
use App\Model\DepartmentHead;
use App\Model\Designation;
use App\Model\Director;
use App\Model\Facility;
use App\Model\Feature;
use App\Model\FollowUs;
use App\Model\FrontendMenu;
use App\Model\Gallery;
use App\Model\MenuPost;
use App\Model\News;
use App\Model\Notice;
use App\Model\Offer;
use App\Model\Partnership;
use App\Model\Research;
use App\Model\Slider;
use App\Model\SocialMediaLink;
use App\Model\StudentFeedback;
use App\Model\Teacher;
use App\Model\TeacherAdvisor;
use App\Model\TrainingEnroll;
use App\Model\UsefulLink;
use App\Model\QuickLink;
use App\Model\ForStudent;
use App\Model\GetInTouch;
use App\Model\FastService;
use App\Model\AskLibrarian;
use App\Model\OurResearch;
use App\Model\OurDevelopment;
use App\Model\OurLibrary;
use App\Model\OurCampus;
use App\Model\OngoingResearch;
use App\Model\CompletedResearch;
use App\Model\Oped;
use App\Model\OngoingTraining;
use App\Model\UpcomingTraining;
use App\Model\JournalPaper;
use DB;
use Illuminate\Http\Request;

use Notification;
use App\Notifications\JournalSubmit;
use App\Notifications\JournalSubmitted;
use Mail;

class FrontController extends Controller
{

    public function __construct()
    {
        $slider = Slider::orderBy('id','asc')->get();
        $this->slider = $slider;

        $partnership = Partnership::orderBy('sort_order','asc')->get();
        $this->partnership = $partnership;

        $today = date('Y-m-d');

        $news = News::where('type',1)->where('course_info_id',null)->where('end_date','>=',$today)->orderBy('start_date','desc')->take(3)->get();
        $this->news = $news;

        $event = News::where('type',2)->where('course_info_id',null)->where('end_date','>=',$today)->orderBy('start_date','desc')->take(3)->get();
        $this->event = $event;

        $notice = News::where('type',3)->where('course_info_id',null)->where('end_date','>=',$today)->orderBy('start_date','desc')->take(3)->get();
        $this->notice = $notice;

        $offer = Offer::orderBy('sort_order','asc')->take(4)->get();
        $this->offer = $offer;

        $about = About::first();
        $this->about = $about;

        $director = Director::orderBy('id','asc')->take(2)->get();
        $this->director = $director;

        $facility = Facility::orderBy('sort_order','asc')->get();
        $this->facility = $facility;

        $activity = Activity::where('status',1)->orderBy('date','desc')->take(8)->get();
        $this->activity = $activity;

        $features = Feature::orderBy('sort_order','asc')->get();
        $this->features = $features;

        $trainingEnrolls = TrainingEnroll::orderBy('sort_order','asc')->take(8)->get();
        $this->trainingEnrolls = $trainingEnrolls;

        $alumnies = Alumni::get();
        $this->alumnies = $alumnies;

        $studentFeedbacks = StudentFeedback::orderBy('sort_order','asc')->get();
        $this->studentFeedbacks = $studentFeedbacks;

        $banner = Banner::orderBy('id','asc')->get();
        $this->banner = $banner;

        // $follow_us = FollowUs::orderBy('id','asc')->get();
        // $this->follow_us = $follow_us;

        // $contact = ContactUs::orderBy('id','asc')->get();
        // $this->contact = $contact;

        $socialMediaLink = SocialMediaLink::first();
        $this->socialMediaLink = $socialMediaLink;

        $counterBox = CounterBox::all();
        $this->counterBox = $counterBox;

        $advisor = TeacherAdvisor::with('member')->orderBy('sort_order')->get();
        $this->advisor = $advisor;

    }

    public function home()
    {
        // dd('test');
        $data['slider'] = $this->slider;
        $data['partnership'] = $this->partnership;
        $data['news'] = $this->news;
        $data['event'] = $this->event;
        $data['notice'] = $this->notice;
        $data['offer'] = $this->offer;
        $data['about'] = $this->about;
        $data['director'] = $this->director;
        $data['facility'] = $this->facility;
        $data['activity'] = $this->activity;
        $data['advisor'] = $this->advisor;
        $data['features'] = $this->features;
        $data['alumnies'] = $this->alumnies;
        $data['trainingEnrolls'] = $this->trainingEnrolls;
        $data['studentFeedbacks'] = $this->studentFeedbacks;
        $data['socialMediaLink'] = $this->socialMediaLink;
        $data['counterBox'] = $this->counterBox;
        
        return view('frontend.home')->with($data);
    }

    public function MenuUrl(Request $request){
        // $menu_url_data = FrontendMenu::where('url_link','like',$request->menu.'%')->first();
        $menu_url_data = FrontendMenu::where('id',$request->menu_id)->first();
        if($menu_url_data != null){
            if($menu_url_data->url_link_type == '1'){
                return redirect()->route($menu_url_data['url_link'],$request->all());
            }

            if($menu_url_data->url_link_type == '2'){
                $data['find_post'] = MenuPost::where('title',@str_replace('-',' ',$menu_url_data->url_link))->first();
                return view('frontend.single_page.single-page',$data);
            }

            if($menu_url_data->url_link_type == '3'){
                $url = strpos($menu_url_data->url_link, 'http') !== 0 ? "http://".$menu_url_data->url_link : $menu_url_data->url_link;
                header("Location:".$url);
                die();
            }

            if($menu_url_data->url_link_type == '4'){
                $data['find_post'] = $menu_url_data;

                return view('frontend.single_page.single-page-attach',$data);
            }
            return redirect()->back()->with('error','Sorry page is not found');
        }else{
            return redirect()->back();
        }
    }

    public function usefulUrl(Request $request){
        $menu_data = UsefulLink::where('id',$request->id)->first();
        if($menu_data != null){
            if($menu_data->url_link_type == '1'){
                return redirect()->route($menu_data['link'],$request->all());
            }

            if($menu_data->url_link_type == '2'){
                $data['find_post'] = MenuPost::where('title',@str_replace('-',' ',$menu_data->link))->first();
                return view('frontend.single_page.single-page',$data);
            }

            if($menu_data->url_link_type == '3'){
                $url = strpos($menu_data->link, 'http') !== 0 ? "http://".$menu_data->link : $menu_data->link;
                header("Location:".$url);
                die();
            }

            if($menu_data->url_link_type == '4'){
                $data['find_post'] = $menu_data;

                return view('frontend.single_page.single-page-attach',$data);
            }
            return redirect()->back()->with('error','Sorry page is not found');
        }else{
            return redirect()->back();
        }
    }

    public function quickUrl(Request $request){
        $menu_data = QuickLink::where('id',$request->id)->first();
        //dd($menu_data);
        if($menu_data != null){
            if($menu_data->url_link_type == '1'){
                return redirect()->route($menu_data['link'],$request->all());
            }

            if($menu_data->url_link_type == '2'){
                $data['find_post'] = MenuPost::where('title',@str_replace('-',' ',$menu_data->link))->first();
                return view('frontend.single_page.single-page',$data);
            }

            if($menu_data->url_link_type == '3'){
                //dd(strpos($menu_data->url_link, 'http'));
                // dd($menu_data->link);
                $url = strpos($menu_data->link, 'http') !== 0 ? "http://".$menu_data->link : $menu_data->link;
                // dd($url);
                header("Location:".$url);
                die();
            }

            if($menu_data->url_link_type == '4'){
                $data['find_post'] = $menu_data;

                return view('frontend.single_page.single-page-attach',$data);
            }
            return redirect()->back()->with('error','Sorry page is not found');
        }else{
            return redirect()->back();
        }
    }

    public function forStudentsUrl(Request $request){
        $menu_data = ForStudent::where('id',$request->id)->first();
        //dd($menu_data);
        if($menu_data != null){
            if($menu_data->url_link_type == '1'){
                return redirect()->route($menu_data['link'],$request->all());
            }

            if($menu_data->url_link_type == '2'){
                $data['find_post'] = MenuPost::where('title',@str_replace('-',' ',$menu_data->link))->first();
                return view('frontend.single_page.single-page',$data);
            }

            if($menu_data->url_link_type == '3'){
                //dd(strpos($menu_data->url_link, 'http'));
                // dd($menu_data->link);
                $url = strpos($menu_data->link, 'http') !== 0 ? "http://".$menu_data->link : $menu_data->link;
                // dd($url);
                header("Location:".$url);
                die();
            }

            if($menu_data->url_link_type == '4'){
                $data['find_post'] = $menu_data;

                return view('frontend.single_page.single-page-attach',$data);
            }
            return redirect()->back()->with('error','Sorry page is not found');
        }else{
            return redirect()->back();
        }
    }

    public function getInTouchUrl(Request $request){
        $menu_data = GetInTouch::where('id',$request->id)->first();
        //dd($menu_data);
        if($menu_data != null){
            if($menu_data->url_link_type == '1'){
                return redirect()->route($menu_data['link'],$request->all());
            }

            if($menu_data->url_link_type == '2'){
                $data['find_post'] = MenuPost::where('title',@str_replace('-',' ',$menu_data->link))->first();
                return view('frontend.single_page.single-page',$data);
            }

            if($menu_data->url_link_type == '3'){
                //dd(strpos($menu_data->url_link, 'http'));
                // dd($menu_data->link);
                $url = strpos($menu_data->link, 'http') !== 0 ? "http://".$menu_data->link : $menu_data->link;
                // dd($url);
                header("Location:".$url);
                die();
            }

            if($menu_data->url_link_type == '4'){
                // dd($menu_data->link);
                $data['find_post'] = $menu_data;

                return view('frontend.single_page.single-page-attach',$data);
            }
            return redirect()->back()->with('error','Sorry page is not found');
        }else{
            return redirect()->back();
        }
    }

    public function fastServiceUrl(Request $request){
        $menu_data = FastService::where('id',$request->id)->first();
        //dd($menu_data);
        if($menu_data != null){
            if($menu_data->url_link_type == '1'){
                return redirect()->route($menu_data['link'],$request->all());
            }

            if($menu_data->url_link_type == '2'){
                $data['find_post'] = MenuPost::where('title',@str_replace('-',' ',$menu_data->link))->first();
                return view('frontend.single_page.single-page',$data);
            }

            if($menu_data->url_link_type == '3'){
                // dd($menu_data->link);
                $url = strpos($menu_data->link, 'http') !== 0 ? "http://".$menu_data->link : $menu_data->link;
                // dd($url);
                header("Location:".$url);
                die();
            }

            if($menu_data->url_link_type == '4'){
                $data['find_post'] = $menu_data;

                return view('frontend.single_page.single-page-attach',$data);
            }
            return redirect()->back()->with('error','Sorry page is not found');
        }else{
            return redirect()->back();
        }
    }

    public function offerUrl(Request $request){
        $menu_data = Offer::where('id',$request->id)->first();
        //dd($menu_data);
        if($menu_data != null){
            if($menu_data->url_link_type == '1'){
                return redirect()->route($menu_data['offer_url'],$request->all());
            }

            if($menu_data->url_link_type == '2'){
                $data['find_post'] = MenuPost::where('title',@str_replace('-',' ',$menu_data->offer_url))->first();
                return view('frontend.single_page.single-page',$data);
            }

            if($menu_data->url_link_type == '3'){
                // dd($menu_data->offer_url);
                $url = strpos($menu_data->offer_url, 'http') !== 0 ? "http://".$menu_data->offer_url : $menu_data->offer_url;
                // dd($url);
                header("Location:".$url);
                die();
            }

            if($menu_data->url_link_type == '4'){
                $data['find_post'] = $menu_data;

                return view('frontend.single_page.single-page-attach',$data);
            }
            return redirect()->back()->with('error','Sorry page is not found');
        }else{
            return redirect()->back();
        }
    }

    public function featureUrl(Request $request){
        $menu_data = Feature::where('id',$request->id)->first();
        //dd($menu_data);
        if($menu_data != null){
            if($menu_data->url_link_type == '1'){
                return redirect()->route($menu_data['feature_url'],$request->all());
            }

            if($menu_data->url_link_type == '2'){
                $data['find_post'] = MenuPost::where('title',@str_replace('-',' ',$menu_data->feature_url))->first();
                return view('frontend.single_page.single-page',$data);
            }

            if($menu_data->url_link_type == '3'){
                // dd($menu_data->feature_url);
                $url = strpos($menu_data->feature_url, 'http') !== 0 ? "http://".$menu_data->feature_url : $menu_data->feature_url;
                // dd($url);
                header("Location:".$url);
                die();
            }

            if($menu_data->url_link_type == '4'){
                $data['find_post'] = $menu_data;

                return view('frontend.single_page.single-page-attach',$data);
            }
            return redirect()->back()->with('error','Sorry page is not found');
        }else{
            return redirect()->back();
        }
    }

    public function trainingUrl(Request $request){
        $menu_data = TrainingEnroll::where('id',$request->id)->first();
        //dd($menu_data);
        if($menu_data != null){
            if($menu_data->url_link_type == '1'){
                return redirect()->route($menu_data['training_url'],$request->all());
            }

            if($menu_data->url_link_type == '2'){
                $data['find_post'] = MenuPost::where('title',@str_replace('-',' ',$menu_data->training_url))->first();
                return view('frontend.single_page.single-page',$data);
            }

            if($menu_data->url_link_type == '3'){
                // dd($menu_data->training_url);
                $url = strpos($menu_data->training_url, 'http') !== 0 ? "http://".$menu_data->training_url : $menu_data->training_url;
                // dd($url);
                header("Location:".$url);
                die();
            }

            if($menu_data->url_link_type == '4'){
                $data['find_post'] = $menu_data;

                return view('frontend.single_page.single-page-attach',$data);
            }
            return redirect()->back()->with('error','Sorry page is not found');
        }else{
            return redirect()->back();
        }
    }

    public function director($id)
    {
        $data['find_post'] = Director::find($id);
        return view('frontend.single_page.single-page',$data);
    }

    public function about($id)
    {
        $data['find_post'] = About::find($id);
        return view('frontend.single_page.single-page',$data);
    }

    public function facility($id)
    {
        $data['find_post'] = Facility::find($id);
        return view('frontend.single_page.single-page',$data);
    }

    public function activity($id)
    {
        $data['find_post'] = Activity::find($id);
        return view('frontend.single_page.single-page',$data);
    }

    public function ourResearch($id)
    {
        $data['find_post'] = OurResearch::find($id);
        return view('frontend.single_page.single-page',$data);
    }

    public function ongoingResearch()
    {
        $data['ongoingResearches'] = OngoingResearch::orderBy('date','DESC')->get();

        return view('frontend.ongoing_research')->with($data);
    }

    public function completedResearch()
    {
        $data['completedResearches'] = CompletedResearch::where('type','Research')->orderBy('date','DESC')->get();

        return view('frontend.completed_research')->with($data);
    }

    public function conference()
    {
        $data['conferences'] = CompletedResearch::where('type','Conference')->orderBy('date','DESC')->get();

        return view('frontend.conference')->with($data);
    }

    public function bookChapter()
    {
        $data['bookChapters'] = CompletedResearch::where('type','Book Chapter')->orderBy('date','DESC')->get();

        return view('frontend.book_chapter')->with($data);
    }

    public function oped()
    {
        //$data['opeds'] = Oped::orderBy('date','DESC')->get();
        $data['opedYears'] = Oped::select(DB::raw('year(date) as year'))->groupBy(DB::raw('year(date)'))->orderBy(DB::raw('year(date)'),'desc')->get();

        //dd($data['opeds']);

        return view('frontend.oped')->with($data);
    }

    public function ongoingTraining()
    {
        $data['ongoingTrainings'] = OngoingTraining::orderBy('start_date','DESC')->get();

        return view('frontend.ongoing_training')->with($data);
    }

    public function upcomingTraining()
    {
        $data['upcomingTrainings'] = UpcomingTraining::orderBy('start_date','DESC')->get();

        return view('frontend.upcoming_training')->with($data);
    }

    public function ourDevelopment($id)
    {
        $data['find_post'] = OurDevelopment::find($id);
        return view('frontend.single_page.single-page',$data);
    }

    public function ourLibrary($id)
    {
        $data['find_post'] = OurLibrary::find($id);
        return view('frontend.single_page.single-page',$data);
    }

    public function advisor($id)
    {
        $data['find_post'] = Advisor::find($id);
        return view('frontend.single_page.single-page',$data);
    }

    public function news(Request $request,$id)
    {
        $data['find_post'] = News::find($id);
        return view('frontend.single_page.single-page',$data);
    }

    public function partnership($id)
    {
        $data['singlePartnership'] = Partnership::find($id);
        return view('frontend.partnership',$data);
    }

    public function ourCampus($id)
    {
        $data['ourCampus'] = OurCampus::find($id);
        return view('frontend.our_campus',$data);
    }

    public function offer($id)
    {
        $data['singleOffer'] = Offer::find($id);
        return view('frontend.offer',$data);
    }

    public function newsAll(Request $request)
    {
        // $course_info_id = $request->course_info_id;
        // $course_info_id = @menuData(request()->menu_id)->course_info_id;
        if(@$course_info_id){
            $where[] = ['course_info_id',$course_info_id];
        }else{
            $where[] = ['course_info_id',null];
        }
        $data['news'] = News::where($where)->where('type',1)->orderBy('id','desc')->get();
        return view('frontend.news-all',$data);
    }

    public function generalNotice(Request $request)
    {
        // $course_info_id = $request->course_info_id;
        // $course_info_id = @menuData(request()->menu_id)->course_info_id;
        if(@$course_info_id){
            $where[] = ['course_info_id',$course_info_id];
        }else{
            $where[] = ['course_info_id',null];
        }
        $data['notice'] = News::where($where)->where('type',4)->orderBy('id','desc')->get();
        return view('frontend.notice-all',$data);
    }

    public function specialNotice(Request $request)
    {
        // $course_info_id = $request->course_info_id;
        // $course_info_id = @menuData(request()->menu_id)->course_info_id;
        if(@$course_info_id){
            $where[] = ['course_info_id',$course_info_id];
        }else{
            $where[] = ['course_info_id',null];
        }
        $data['notice'] = News::where($where)->where('type',5)->orderBy('id','desc')->get();
        return view('frontend.notice-all',$data);
    }

    public function tenderNotice(Request $request)
    {
        // $course_info_id = $request->course_info_id;
        // $course_info_id = @menuData(request()->menu_id)->course_info_id;
        if(@$course_info_id){
            $where[] = ['course_info_id',$course_info_id];
        }else{
            $where[] = ['course_info_id',null];
        }
        $data['notice'] = News::where($where)->where('type',6)->orderBy('id','desc')->get();
        return view('frontend.notice-all',$data);
    }

    public function event(Request $request,$id)
    {
        $data['find_post'] = News::find($id);
        return view('frontend.single_page.single-page',$data);
    }

    public function eventAll(Request $request)
    {
        // $course_info_id = $request->course_info_id;
        // $course_info_id = @menuData(request()->menu_id)->course_info_id;
        if(@$course_info_id){
            $where[] = ['course_info_id',$course_info_id];
        }else{
            $where[] = ['course_info_id',null];
        }
        $data['event'] = News::where($where)->where('type',2)->orderBy('id','desc')->get();
        return view('frontend.event-all',$data);
    }

    public function notice(Request $request,$id)
    {
        $data['find_post'] = News::find($id);
        return view('frontend.single_page.single-page',$data);
    }

    public function noticeAll(Request $request)
    {
        // $course_info_id = $request->course_info_id;
        // $course_info_id = @menuData(request()->menu_id)->course_info_id;
        if(@$course_info_id){
            $where[] = ['course_info_id',$course_info_id];
        }else{
            $where[] = ['course_info_id',null];
        }
        $data['notice'] = News::where($where)->where('type',3)->orderBy('id','desc')->get();
        return view('frontend.notice-all',$data);
    }

    public function trainingEnrollAll()
    {
        $data['trainingEnrolls'] = TrainingEnroll::orderBy('id','desc')->get();
        return view('frontend.training_enroll-all',$data);
    }











    public function Search(Request $request){

        // $data['slider'] = $this->slider;
        // $data['banner'] = $this->banner;
        // $data['about'] = $this->about;
        // $data['head'] = $this->head;
        // $data['gallery'] = $this->gallery;
        // $data['home_news'] = $this->home_news;
        // $data['notice'] = $this->notice;
        // $data['research'] = $this->research;
        // $data['teacher'] = $this->teacher;
        // $data['home_news'] = $this->home_news;
        // $data['home_notice'] = $this->home_notice;
        // $data['follow_us'] = $this->follow_us;
        // $data['contact'] = $this->contact;
        // $data['features'] = $this->features;
        // $data['alumnies'] = $this->alumnies;
        // $data['trainingEnrolls'] = $this->trainingEnrolls;
        // $data['studentFeedbacks'] = $this->studentFeedbacks;
        // $data['news_ticker'] = $this->getNewsTicker();
        // $data['home_research'] = Research::paginate(4);
        // $data['professor'] = Teacher::orderBy('serial','asc')->whereHas('designations',function($q){
        //     $q->where('name','Professor');
        // })->with(['designations'])->get();

        // Search
        $q = $request->search;
        $tables = DB::select('SHOW TABLES');
        //dd($tables);


        $data['search_result'] = [];
        foreach($tables as $key=>$table){
            //dd($table);
            $db_name = 'Tables_in_'.env('DB_DATABASE');
            //dd($db_name);
            // $new = env('DB_DATABASE');
            $table_name = $table->$db_name;
            //dd($table_name);
                $columns = DB::select('DESCRIBE '.$table_name);
                //dd($columns);
                $where = "";
                foreach($columns as $column){
                    $col_type = explode('(', $column->Type)[0];
                    //dd($column->Field);
                    if($col_type == 'varchar' || $col_type == 'text' || $col_type == 'longtext'){
                        if($where == ''){
                            $where .= "WHERE ".$column->Field." LIKE '%".$q."%'";
                        }else{
                            $where .= " OR ".$column->Field." LIKE '%".$q."%'";
                        }
                    }
                }
                //dd($where);
                $result = [];
                if($where != ''){
                    $qry = "SELECT * FROM $table_name ".$where;
                    //dd($qry);
                    if($table_name == "alumnies")
                    {
                        //dd($qry);
                        $result = DB::select($qry);
                        //dd($result);
                    }
                    $result = DB::select($qry);
                    //dd($result);
                }
                if(!empty($result)){
                    $data['search_result'][$key]['data'] = $result;
                    //dd($data['search_result'][$key]['data']);
                    $data['search_result'][$key]['table_name'] = $table_name;
                    //dd($data['search_result'][$key]['table_name']);
                } 
        }
        $data['search_for'] = $q;
        return view('frontend.search', $data);  
    }


    public function headMessage()
    {
        $data['title_page'] = 'Head of the department';
        $data['page'] = 'Message';
        $data['banner'] = $this->banner;
        $data['home_news'] = $this->home_news;
        $data['home_notice'] = $this->home_notice;
        $data['head'] = $this->head;
        $data['follow_us'] = $this->follow_us;
        $data['contact'] = $this->contact;
        return view('frontend.message-detail')->with($data);
    }

    public function moreFaculty()
    {
        // $active_head = DepartmentHead::where('status',1)->first();
        // $inactive_head = DepartmentHead::where('status',0)->first();
        $data['title_page'] = 'Faculty Members';
        $data['page'] = 'Faculty';
        $data['banner'] = $this->banner;
        $data['home_news'] = $this->home_news;
        $data['home_notice'] = $this->home_notice;
        $data['follow_us'] = $this->follow_us;
        $data['contact'] = $this->contact;
        $data['active_designation'] = Designation::with(['teacher'=>function($q){
            $q->where('status','1')->orderBy(DB::raw('ISNULL(serial),serial'),'asc');
        }])->get();
        $data['in_active_designation'] = Designation::whereHas('teacher',function($q){
            $q->where('status','0');
        })->with(['teacher'=>function($q){
            $q->where('status','0')->orderBy(DB::raw('ISNULL(serial),serial'),'asc');
        }])->get();
        
        

        return view('frontend.faculty')->with($data);
    }

    public function moreResearch()
    {
        $data['title_page'] = 'Research';
        $data['page'] = 'Research';
        $data['banner'] = $this->banner;
        $data['home_news'] = $this->home_news;
        $data['home_notice'] = $this->home_notice;
        $data['follow_us'] = $this->follow_us;
        $data['contact'] = $this->contact;
        $data['research'] = $this->research;
        return view('frontend.all-research')->with($data);

    }

    public function facultyDetails($slug)
    {
        $data['title_page'] = 'Faculty Member Details';
        $data['page'] = 'Faculty';
        $data['banner'] = $this->banner;
        $data['home_news'] = $this->home_news;
        $data['home_notice'] = $this->home_notice;
        $data['follow_us'] = $this->follow_us;
        $data['contact'] = $this->contact;
        $data['faculty'] = Teacher::where('faculty_slug',$slug)->first();
        // dd($data['faculty']->toArray());
        return view('frontend.faculty-details')->with($data);
    }

    public function moreGallery()
    {
        $data['title_page'] = 'Gallery';
        $data['page'] = 'Gallery';
        $data['banner'] = $this->banner;
        $data['home_news'] = $this->home_news;
        $data['home_notice'] = $this->home_notice;
        $data['follow_us'] = $this->follow_us;
        $data['contact'] = $this->contact;
        $data['head'] = $this->head;
        $data['gallery'] = Gallery::orderBy('created_at','DESC')->paginate(20);
        return view('frontend.all-gallery')->with($data);
    }

    public function Research($id)
    {
        $data['title_page'] = 'Research';
        $data['page'] = 'Research';
        $data['banner'] = $this->banner;
        $data['home_news'] = $this->home_news;
        $data['home_notice'] = $this->home_notice;
        $data['follow_us'] = $this->follow_us;
        $data['research'] = Research::find($id);
        $data['contact'] = $this->contact;
        return view('frontend.research-detail')->with($data);
    }
    public function ContactUs()
    {
        // $data['title_page'] = 'Get In Touch';
        $data['page'] = 'Contact Us';
        // $data['banner'] = $this->banner;
        // $data['home_news'] = $this->home_news;
        // $data['home_notice'] = $this->home_notice;
        // $data['follow_us'] = $this->follow_us;
        // $data['contact'] = $this->contact;
        // dd($data['contact']->toArray());
        return view('frontend.contact-us')->with($data);
    }
    public function storeContactMessage(Request $request)
    {
        ContactMessage::create($request->all());
        return redirect()->route('contact.us')->with('notify','Your message submit successfully.');

    }

    public function askLibrarian()
    {
        return view('frontend.ask_librarian');
    }
    public function storeAskLibrarian(Request $request)
    {
        AskLibrarian::create($request->all());
        return redirect()->route('ask_librarian')->with('notify','Your message submit successfully.');

    }


    function getNewsTicker(){
        $news_ticker = array();
        $news = News::limit(2)->orderBy('date','desc')->get();
        foreach($news as $key => $n){
            $news_ticker[$key]['id'] = $n->id;
            $news_ticker[$key]['title'] = $n->title;
            $news_ticker[$key]['route']   = route('read.more.news',$n->id);
        }

        $notice = Notice::limit(2)->orderBy('date','desc')->get();
        $news_count = count($news);
        foreach($notice as $key => $n){
            $news_ticker[$key+$news_count]['id'] = $n->id;
            $news_ticker[$key+$news_count]['title'] = $n->title;
            $news_ticker[$key+$news_count]['route']   = route('notice',$n->id);
        }

        return $news_ticker;
    }

    public function newsSinglePage()
    {
        $data['news'] = News::where('type',1)->where('course_info_id',null)->orderBy('id','desc')->take(6)->get();

        $data['event'] = News::where('type',2)->where('course_info_id',null)->orderBy('id','desc')->take(6)->get();

        $data['notice'] = News::where('type',3)->where('course_info_id',null)->orderBy('id','desc')->take(6)->get();

        return view('frontend.news-single-page')->with($data);
    }

    public function bigmJournalPolicy()
    {

        return view('frontend.bigm_journal_policy');
    }

    public function storeJournalPolicy(Request $request)
    {
        // dd($request->all());
        $request->validate([
            // 'title' => 'required',
            // 'date' => 'required',
            // 'image' => 'required',
            //'attachment1' => 'required|mimes:doc,docx',
            //'attachment2' => 'mimes:pdf',
        ]);
       
        $params = $request->all();
        //    $params['date'] = date('Y-m-d',strtotime($request->date));
        //    $params['status'] = $request->status ?? 0;
        $params['mobile'] = $request->countryCode . $request->mobile_no;
        // dd($params);
        if($file = $request->file('attachment1'))
        {
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/bigm_journal_policy'), $filename);
            $params['attachment1']= $filename;
        }

        if($file = $request->file('attachment2'))
        {
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/bigm_journal_policy'), $filename);
            $params['attachment2']= $filename;
        }

        $journalPaper = JournalPaper::create($params);
        
        // Mail::send('mail.journal_submitted', [], function ($m){
        //                 $m->to('alamin@bigm.edu.bd', 'Tanjin')->subject('Email Subject!');
        //             });
        
        
        Notification::route('mail',$request->email)->notify((new JournalSubmit($journalPaper)));
        Notification::route('mail',['journal@bigm.edu.bd'])->notify((new JournalSubmitted($journalPaper)));

        return view('frontend.bigm_journal_policy_thank_you');
    }

    public function alumni(Request $request)
    {
        $data['alumnies'] = DB::table('alumnies')->where('program_name',$request->program_name)->where('batch',$request->batch)->get();
        $data['programs'] = DB::table('alumnies')->groupBy('program_name')->select('program_name')->get();
        //dd($programs);
        $data['batches'] = DB::table('alumnies')->where('program_name',$request->program_name)->groupBy('batch')->select('batch')->get();
        return view('frontend.alumni')->with($data);
    }

    public function program_wise_batch(Request $request)
    {
        $programWiseBatch = DB::table('alumnies')->where('program_name',$request->program_name)->groupBy('batch')->select('batch')->get();

        if(isset($programWiseBatch))
		{
			return response()->json($programWiseBatch);
		}
		else
		{
			return response()->json('fail');
		}
    }

}
