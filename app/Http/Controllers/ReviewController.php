<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestValidateReview;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{
    public function showAddReview()
    {
        return view('admin.reviews.add_review');
    }

    public function addReview(RequestValidateReview $request)
    {
        $data = $request->except('_token');

        if ($request->hasFile('customer_photo')) {
            $photo = $request->file('customer_photo');
            $extension = $photo->getClientOriginalExtension();
            $filename = rand(111, 99999) . "." . $extension;
            $filepath = $photo->storeAs('files/images/customers', $filename);
            $data['customer_photo'] = $filepath;
        }
        $review = Review::create($data);
        if($review){
            return redirect('/admin/view-reviews')->with('flash_massage_success', 'Review has been added successfully');
        }else{
            return redirect()->back()->with('flash_massage_error', 'Something was wrong');
        }
    }

    public function showEditReview($id)
    {
        $reviewDetails = Review::where(['id' => $id])->first();
        return view('admin.reviews.edit_review')->with(['reviewDetails' => $reviewDetails]);
    }

    public function editReview(RequestValidateReview $request, $id = null)
    {
          $data = $request->all();
          $review = Review::find($id);
          $old_photo = $review->customer_photo;
          if($request->hasFile('photo'))
          {
              $photo = $request->photo;
              $existPhoto = Storage::exists($old_photo);
              if($existPhoto){
                  Storage::delete($old_photo);

              }
              $extension = $photo->getClientOriginalExtension();
              $filename = rand(111, 99999).".".$extension;
              $filepath = $photo->storeAs('files/images/customers', $filename);

          }else  {
              $filepath = $data['current_photo'];
          }

          Review::where(['id'=>$id])->update(['customer_name'=>$data['customer_name'],
                                                'published_at'=>$data['published_at'],
                                                'text_review'=>$data['text_review'],
                                                'customer_link'=>$data['customer_link'],
                                                'mark_review'=>$data['mark_review'],
                                                'customer_photo'=>$filepath]);
          //dd(Review::where(['id'=>$id])->value('customer_photo'));
          return redirect('/admin/view-reviews')->with('flash_massage_success', 'Review Update Successfully');
    }

    public function viewReview()
    {
        $reviews = Review::all();
        return view('admin.reviews.view_reviews')->with(compact('reviews'));
    }

    public function deleteReviewPhoto($id = null)
    {
        $review = Review::find($id);
        $filename = $review->customer_photo;
        $existPhoto = Storage::exists($filename);
        if($existPhoto){
            Storage::delete($filename);
        }
        $review->update(['image'=>null]);
        return redirect()->back()->with('flash_massage_success', 'Review Image has been delete successfully');
    }

    public function deleteReview($id = null)
    {
        $review = Review::find($id);
        $filename = $review->customer_photo;
        $existPhoto = Storage::exists($filename);
        if($existPhoto){
            Storage::delete($filename);
        }
        if($review){
            $review->delete();
        }

        return redirect()->back()->with('flash_massage_success', 'Review has been delete successfully');
    }

}
