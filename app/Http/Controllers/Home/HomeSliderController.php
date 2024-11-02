<?php

namespace App\Http\Controllers\Home;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSlide;

class HomeSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $homeslide = HomeSlide::find(1);
        return view('backend.home_slide.home_slide_all', compact('homeslide'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $slide_id = $request->id;
        $slide_image = HomeSlide::where('id', $slide_id)->value('home_slide');

        if($request->hasFile('home_slide')){
            $manager = new ImageManager(new Driver());
            $image = $request->file('home_slide');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            @unlink(public_path($slide_image)); // Unlink Previous Image
            $img = $manager->read($image);
            $img->resize(636, 852);
            $img->toPng()->save(base_path('public/upload/home_slide/'. $name_gen));
            $save_url = 'upload/home_slide/' . $name_gen;

            $result = HomeSlide::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'home_slide' => $save_url,
                'video_url' => $request->video_url,
            ]);

            if($result){
                sweetalert()->success('Home Slide Updated With Images!');
            }

            return redirect()->back();
        }else{
            $result = HomeSlide::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
            ]);

            if($result){
                sweetalert()->success('Home Slide Updated Without Image!');
            }

            return redirect()->back();
        }

       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
