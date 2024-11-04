<?php

namespace App\Http\Controllers\Home;

date_default_timezone_set('Asia/Dhaka');
use App\Models\MultiImage;
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
      
      $save_url = "";
      if($request->hasFile('about_image')){
         $manager = new ImageManager(new Driver());
         $image = $request->file('about_image');
         $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
         @unlink(public_path($about_image)); // Unlink Previous Image
         $img = $manager->read($image);
         $img->resize(523, 605);
         $img->toPng()->save(base_path('public/upload/about/'. $name_gen));
         $save_url = 'upload/about/'.$name_gen;
      }else{
         $save_url = $about_image;
      }

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

   /**
    * About Home Page
    */
    public function HomeAbout(){
      $aboutpage = About::find(1);
      return view('frontend/about', compact('aboutpage'));
    }
   
    /**
     * About Multi Image
     */
    public function AboutMultiImage(){
      return view('backend.about.about_multi_image');
    }

    /**
     * Store Multi Image
     */
    public function StoreMultiImage(Request $request){

      if($request->hasFile('multi_image')){
         $images = $request->file('multi_image');

         foreach ($images as $multi_image){

            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$multi_image->getClientOriginalExtension();
            
            $img = $manager->read($multi_image);
            $img->resize(220, 220);
            $img->toPng()->save(base_path('public/upload/multi/'. $name_gen));
            $save_url = 'upload/multi/'.$name_gen;

            $result = MultiImage::insert([
               'multi_image' => $save_url,
               'created_at' => now()
            ]);

         } // End Foreach

         if($result){
            sweetalert()->success('Multple Image Inserted!');
         }

         return redirect()->back();
      } // End If
    } // End Method


    /**
     * All Multi Image
     */
    public function AllMultiImage(){
      $allMultiImages = MultiImage::all();
      return view('backend.about.about_all_multi_image', compact('allMultiImages'));
    }
}
