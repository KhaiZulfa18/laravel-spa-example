<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Validator;
use App\Post;

class PostController extends Controller
{
    //
    public function index()
    {
        $post = Post::all();

        $response = [
            'success' => true,
            'message' => 'All Post',
            'post' => $post
        ];

        return response()->json($response, 200);
    }

    public function FunctionName(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Please required input',
                'data'    => $validator->errors()
            ],400);
        }else{

            $post = Post::create([
                'title' => $request->title,
                'content' => $request->content
            ]);

            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Post Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Post Gagal Disimpan!',
                ], 500);
            }
        }
    }

    public function show($id)
    {
        $post = Post::where('id',$id)->first();

        if($post){
            return response()->json([
                'success' => true,
                'message' => 'Post ditemukan',
                'post' => $post
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Post tidak ditemukan'
            ], 404);
        }
    }

    public function edit($id)
    {
        $post = Post::where('id',$id)->first();

        if($post){
            return response()->json([
                'success' => true,
                'message' => 'Post ditemukan',
                'post' => $post
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Post tidak ditemukan'
            ], 404);
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'content' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Please required input',
                'data'    => $validator->errors()
            ],400);
        }else{

            $post = Post::where('id',$id)->update([
                'title' => $request->title,
                'content' => $request->content
            ]);

            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Post Berhasil Diperbarui!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Post Gagal Diperbarui!',
                ], 500);
            }
        }
    }

    public function destroy($id)
    {
        $post = Post::where('id',$id)->delete();

        if ($post) {
            return response()->json([
                'success' => true,
                'message' => 'Post Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Post Gagal Dihapus!',
            ], 500);
        }
    }
}
