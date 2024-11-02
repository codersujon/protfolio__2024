<?php

namespace App\Http\Controllers\Home;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\About;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    
    /**
     * About Page
     */

     public function AboutPage(){
        $aboutpage = About::find(1);
        return view('backend.about.about_page_all', compact('aboutpage'));
     }

   /**
   * Update About
   */
   public function AboutUpdate(Request $request){
      $about_id = $request->id;

      $about_image = About::where('id', $about_id)->value('about_image');

      // dd($about->about_image);
      if($request->hasFile('about_image')){
         $manager = new ImageManager(new Driver());
         $image = $request->file('about_image');
         $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
         @unlink(public_path($about_image)); // Unlink Previous Image
         $img = $manager->read($image);
         $img->resize(523, 605);
         $img->toPng()->save(base_path('public/upload/about/'. $name_gen));
         $save_url = 'upload/about/'.$name_gen;

         $result = About::findOrFail($about_id)->update([
            'title' => $request->title,
            'short_title' => $request->short_title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'about_image' => $save_url,
         ]);

         if($result){
            sweetalert()->success('About Updated!');
         }
         return redirect()->back();
      }
     
   }
   
}
