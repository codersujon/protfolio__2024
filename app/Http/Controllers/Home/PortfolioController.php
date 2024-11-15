<?php

namespace App\Http\Controllers\Home;

date_default_timezone_set('Asia/Dhaka');
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\Portfolio;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolio = Portfolio::latest()->get();
        return view('backend.portfolio.index', compact('portfolio'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $validation  = $request->validate([
            "portfolio_name" => 'required',
            "portfolio_title" => 'required',
            "portfolio_img" => 'required',
        ],[ // Custom Message
            "portfolio_name.required" => "Portfolio name is required",
            "portfolio_title.required" => "Portfolio title is required",
            "portfolio_img.required" => "Portfolio image is required",
        ]);

        $save_url = "";
        if($request->hasFile('portfolio_img')){
            $manager = new ImageManager(new Driver());
            $image = $request->file('portfolio_img');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(1020, 519);
            $img->toJpg()->save(base_path('public/upload/portfolio/'. $name_gen));
            $save_url = 'upload/portfolio/' . $name_gen;
        }

        $result = Portfolio::insert([
            'portfolio_name' => $request->portfolio_name,
            'portfolio_title' => $request->portfolio_title,
            'portfolio_img' => $save_url,
            'portfolio_description' => $request->portfolio_description,
            'created_at' => Carbon::now(),
        ]);

        if($result){
            sweetalert()->timer(1500)->success('Portfolio Created!');
        }

        return redirect()->route('portfolio.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('backend.portfolio.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $portfolio_image = $portfolio->portfolio_img;
         /**
         * Image Has Image File
         */
        $save_url = "";
        if($request->hasFile('portfolio_img')){
            $manager = new ImageManager(new Driver());
            $image = $request->file('portfolio_img');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            @unlink(public_path($portfolio_image)); // Unlink Previous Image
            $img = $manager->read($image);
            $img->resize(1020, 519);
            $img->toJpg()->save(base_path('public/upload/portfolio/'. $name_gen));
            $save_url = 'upload/portfolio/' . $name_gen;
        }else{
            $save_url = $portfolio_image;
        }

        $result = $portfolio->update([
            'portfolio_name' => $request->portfolio_name,
            'portfolio_title' => $request->portfolio_title,
            'portfolio_img' => $save_url,
            'portfolio_description' => $request->portfolio_description,
            'updated_at' => Carbon::now(),
        ]);

        if($result){
            sweetalert()->timer(1500)->success('Portfolio Updated!');
        }

        return redirect()->route('portfolio.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $portfolio = Portfolio::findOrFail($id);

        if($portfolio->portfolio_img && file_exists(public_path($portfolio->portfolio_img))){
            @unlink(public_path($portfolio->portfolio_img));
        }
       
        $portfolio->delete();
        sweetalert()->timer(1000)->success('Portfolio Deleted!');
        return redirect()->back();
    }

    /**
     * Portfolio Details
     */

     public function portfolioDetails(string $id){
        $portfolio = Portfolio::findOrFail($id);
        return view('frontend.portfolio_details', compact('portfolio'));
     }
}
