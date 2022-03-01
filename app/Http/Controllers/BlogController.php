<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;


class BlogController extends Controller
{
    public function addBlog()
    {    
        return view('/addblog');
       
      }
    public function addBlogdetails(Request $request)
    {   
    Blog::create([
        'title'=>$request->title,
        'description'=>$request->description,
        'status'=>'active',
    ]);

        return redirect()->back();
       
      }

    //   public function showBlogs()
    //   {    
    //       return view('/showBlogs');
         
    //     }



        public function showBlogs()
        {
             $data= Blog::paginate(3);
             return view('bloglist',['detail'=>$data]);
      }    
        

      public function updateBlogStatus($id)
      {    //get product status with the help of product ID
        $product = DB::table('blogs')
                    ->select('status')
                    ->where('id','=',$id)
                    ->first();
    
        //Check user status
        if($product->status == 'active'){
            $status = 'archive';
        }
       
        if($product->status == 'archive'){
            $status = 'draft';
        }
        if($product->status == 'draft'){
          $status = 'active';
      }
    
        //update product status
        $values = array('status' => $status );
        DB::table('blogs')->where('id','=',$id)->update($values);
        return redirect('/showblogs');
         
        }
}
