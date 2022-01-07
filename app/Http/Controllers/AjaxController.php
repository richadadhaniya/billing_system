<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Index;
use App\Category;
use App\Bill;
use PDF;
use Redirect,Response;

class AjaxController extends Controller
{
    public function index()
    {
        //
        $data['posts'] = Index::orderBy('id','desc')->paginate(8);
   
        return view('index',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $postID = $request->post_id;
        $post   =   Index::updateOrCreate(['id' => $postID],
                    ['title' => $request->title,'email' => $request->email, 'body' => $request->body]);
    
        return Response::json($post);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $where = array('id' => $id);
        $post  = Index::where($where)->first();
 
        return Response::json($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Index::where('id',$id)->delete();
   
        return Response::json($post);
    }
   public function client_detail(Request $request ,$id)
    {
        $add=Index::where('id',$id)->first();
         $bill=Bill::where('cid',$id)->get();
        $category= Category::get();
        return view('detail',compact('add','category','bill'));
    }
    public function edit_bill(Request $request ,$id)
    {
        $bill=Bill::where('id',$id)->first();
        $category= Category::get();
        return view('editbill',compact('bill','category'));
    }
    public function update_bill(Request $request)
    {
         // dd($request);
       $bill =Bill::find($request->id);
       $bill->cname =$request->input('cname');
       $bill->product =$request->input('product');
       $bill->height =$request->input('height');
       $bill->width =$request->input('width');
       $bill->total =$request->input('total');
       $bill->price =$request->input('price');
       $bill->grandtotal =$request->input('grandtotal');
       
        {
         $id = $request->id;
            $update = [ 
            'cname'=>$request->cname, 
            'product'=>$request->product,
            'height'=>$request->height,
            'width'=>$request->width,
            'total'=>$request->total,
            'price'=>$request->price,
            'grandtotal'=>$request->grandtotal,
           
        
     ];
        Bill::where('id', $id)->update($update);
        return redirect()->back()->with('success', 'client data Updated Successfully!');

          
        }

        $bill->save();
        return redirect()->back();
    }
    public function delete_bill($id)
    {
        Bill::where('id',$id)->delete();
        return redirect()->back();
    }
    

     public function generatePDF(Request $request, $id)
    {
        $add=Index::where('id',$id)->first();
        $users=Bill::where('cid',$id)->get();
       
        
        $pdf = PDF::loadView('pdf.users',compact('users','add'));

        $pdf->setPaper('L');
       $pdf->output();
       $canvas = $pdf->getDomPDF()->getCanvas();
       $height = $canvas->get_height();
       $width = $canvas->get_width();
       $canvas->set_opacity(.2,"Multiply");
       $canvas->page_text($width/5, $height/2, 'Richaaa',null,
        70, array(0,0,0),2,2,-30);

        return $pdf->stream();
       
    }
  
}
