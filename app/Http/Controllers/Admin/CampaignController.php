<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CampaignReview;
use App\Models\Campaign;
use Image;
use Toastr;
use Str;
use File;

class CampaignController extends Controller
{
    public function index(Request $request)
    {
        $show_data = Campaign::orderBy('id','DESC')->get();
        return view('backEnd.campaign.index',compact('show_data'));
    }
    public function create()
    {
        $products = Product::where(['status'=>1])->select('id','name','status')->get();
        return view('backEnd.campaign.create',compact('products'));
    }
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        
        $input = $request->except(['files']);

        // image one
        $image1 = $request->file('image_one');
        $name1 =  time().'-'.$image1->getClientOriginalName();
        $name1 = preg_replace('"\.(jpg|jpeg|png|webp)$"', '.webp',$name1);
        $name1 = strtolower(preg_replace('/\s+/', '-', $name1));
        $uploadpath1 = 'public/uploads/campaign/';
        $image1Url = $uploadpath1.$name1; 
        $img1=Image::make($image1->getRealPath());
        $img1->encode('webp', 90);
        $width1 = '';
        $height1 = '';
        $img1->height() > $img1->width() ? $width1=null : $height1=null;
        $img1->resize($width1, $height1, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img1->save($image1Url);

        // image two
        $image2 = $request->file('image_two');
        if($image2){
            $name2 =  time().'-'.$image2->getClientOriginalName();
            $name2 = preg_replace('"\.(jpg|jpeg|png|webp)$"', '.webp',$name2);
            $name2 = strtolower(preg_replace('/\s+/', '-', $name2));
            $uploadpath2 = 'public/uploads/campaign/';
            $image2Url = $uploadpath2.$name2; 
            $img2=Image::make($image2->getRealPath());
            $img2->encode('webp', 90);
            $width2 = '';
            $height2 = '';
            $img2->height() > $img2->width() ? $width2=null : $height2=null;
            $img2->resize($width2, $height2, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img2->save($image2Url);
        }

        // image three
        $image3 = $request->file('image_three');
        if($image3){
            $name3 =  time().'-'.$image3->getClientOriginalName();
            $name3 = preg_replace('"\.(jpg|jpeg|png|webp)$"', '.webp',$name3);
            $name3 = strtolower(preg_replace('/\s+/', '-', $name3));
            $uploadpath3 = 'public/uploads/campaign/';
            $image3Url = $uploadpath3.$name3; 
            $img3=Image::make($image3->getRealPath());
            $img3->encode('webp', 90);
            $width3 = '';
            $height3 = '';
            $img3->height() > $img3->width() ? $width3=null : $height3=null;
            $img3->resize($width3, $height3, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img3->save($image3Url);
        }

        $input = [
            'banner_title' => $request->banner_title,
            'video' => $request->video,
            'name' => $request->name,
            'slug' => strtolower(Str::slug($request->name)),
            'short_description' => $request->short_description,
            'description' => $request->description,
            'review' => $request->review,
            'product_id' => $request->product_id,
            'status' => $request->status,
        ];

        $campaign = Campaign::create($input); 

        $images = $request->file('image');
        if($images){
            foreach ($images as $key => $image) {
                $name =  time().'-'.$image->getClientOriginalName();
                $name = strtolower(preg_replace('/\s+/', '-', $name));
                $uploadPath = 'public/uploads/campaign/';
                $image->move($uploadPath,$name);
                $imageUrl =$uploadPath.$name;

                $pimage             = new CampaignReview();
                $pimage->campaign_id = $campaign->id;
                $pimage->image      = $imageUrl;
                $pimage->save();
            }
            
        }       
        
        Toastr::success('Success','Data insert successfully');
        return redirect()->route('campaign.index');
    }
    
    public function edit($id)
    {
        $edit_data = Campaign::with('images')->find($id);
        $select_products = Product::where('campaign_id',$id)->get();
        $show_data = Campaign::orderBy('id','DESC')->get();
        $products = Product::where(['status'=>1])->select('id','name','status')->get();
        return view('backEnd.campaign.edit',compact('edit_data','products','select_products'));
    }
    
    public function update(Request $request)
    { 
        $this->validate($request, [
            'name' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        // image one
        $update_data = Campaign::find($request->hidden_id);
        $input = $request->except('hidden_id','product_id','files','image');
        $image_one = $request->file('image_one');
        if($image_one){
            // image with intervention 
            $image_one = $request->file('image_one');
            $name1 =  time().'-'.$image_one->getClientOriginalName();
            $name1 = preg_replace('"\.(jpg|jpeg|png|webp)$"', '.webp', $name1);
            $name1 = strtolower(preg_replace('/\s+/', '-', $name1));
            $uploadpath1 = 'public/uploads/campaign/';
            $imageUrl1 = $uploadpath1.$name1; 
            $img1 = Image::make($image_one->getRealPath());
            $img1->encode('webp', 90);
            $width1 = '';
            $height1 = '';
            $img1->height() > $img1->width() ? $width1=null : $height1=null;
            $img1->resize($width1, $height1, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img1->save($imageUrl1);
            $input['image_one'] = $imageUrl1;
            File::delete($update_data->image_one);
        }else{
            $input['image_one'] = $update_data->image_one;
        }
      
        $input = [
            'banner_title' => $request->banner_title,
            'video' => $request->video,
            'name' => $request->name,
            'slug' => strtolower(Str::slug($request->name)),
            'product_id' => $request->product_id,
            'review' => $request->review,
            'short_description' => $request->short_description,
            'image_one' => $update_data->image_one,
            'description' => $request->description,
            'status' => $request->status,
        ];
        $update_data = Campaign::find($request->hidden_id);
        $update_data->update($input);

        $images = $request->file('image');  
        if($images){
            foreach ($images as $key => $image) {
                $name =  time().'-'.$image->getClientOriginalName();
                $name = strtolower(preg_replace('/\s+/', '-', $name));
                $uploadPath = 'public/uploads/campaign/';
                $image->move($uploadPath,$name);
                $imageUrl =$uploadPath.$name;

                $pimage             = new CampaignReview();
                $pimage->campaign_id = $update_data->id;
                $pimage->image      = $imageUrl;
                $pimage->save();
            }
        }

        Toastr::success('Success','Data update successfully');
        return redirect()->route('campaign.index');
    }
 
    public function inactive(Request $request)
    {
        $inactive = Campaign::find($request->hidden_id);
        $inactive->status = 0;
        $inactive->save();
        Toastr::success('Success','Data inactive successfully');
        return redirect()->back();
    }
    public function active(Request $request)
    {
        $active = Campaign::find($request->hidden_id);
        $active->status = 1;
        $active->save();
        Toastr::success('Success','Data active successfully');
        return redirect()->back();
    }
    public function destroy(Request $request)
    {
       
        $delete_data = Campaign::find($request->hidden_id);
        $delete_data->delete();
        
        $campaign = Product::whereNotNull('campaign_id')->get();
        foreach($campaign as $key=>$value){
            $product = Product::find($value->id);
            $product->campaign_id = null;
            $product->save();
        }
        Toastr::success('Success','Data delete successfully');
        return redirect()->back();
    }
    public function imgdestroy(Request $request)
    { 
        $delete_data = CampaignReview::find($request->id);
        File::delete($delete_data->image);
        $delete_data->delete();
        Toastr::success('Success','Data delete successfully');
        return redirect()->back();
    } 
}
