<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSlide;
use Intervention\Image\Facades\Image;

class HomeSliderController extends Controller
{
    //
    public function HomeSlide(){
        $homeslide = HomeSlide::find(1);
        return view('admin.home_slide.home_slide_all',compact('homeslide'));
    }

    public function UpdateSlide(Request $req){

        $slide_id = $req->id;
        if ($req->file('home_slide')){
            $image = $req->file('home_slide');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(636,852)->save('upload/home_slide/'.$name_gen);
            $save_url = 'upload/home_slide/'.$name_gen;

            HomeSlide::findOrFail($slide_id)->update([
                'title' => $req->title,
                'short_title' => $req->short_title,
                'video_url' => $req->video_url,
                'home_slide' => $save_url,
            ]);

            $notification = array(
                'message' => "Home Slide with Image Updated Successfully",
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
            // return view('admin.home_slide.home_slide_all',compact('homeslide'));
        }else{

            HomeSlide::findOrFail($slide_id)->update([
                'title' => $req->title,
                'short_title' => $req->short_title,
                'video_url' => $req->video_url,
            ]);

            $notification = array(
                'message' => "Home Slide without image Updated Successfully",
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
       
    }
}
