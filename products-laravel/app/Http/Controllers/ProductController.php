<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        try {
            $products = Product::all();

            if(count($products) == 0){
                return response()-> json();
            }

            return response()->json([
                'products' => $products
            ],200);
            
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ],400);            
        }
    }

    public function show($id){
        try{
            $product = Product::find($id);

            if(!$product){
                return response()->json([
                    'error'=>'Product not found'
                ],404);
            }

            return response()->json([
                'product' => $product
            ],200);

        }catch (\Exception $e){
            return response()->json([
                'error' => $e->getMessage()
            ],400);
        }
    }

    public function create(Request $request){
        try{
            //Validate role            
            $user_token_id = auth()->user()->id;
            $user_token = User::find($user_token_id);

            if($user_token->role != 1){
                return response()->json([
                    'error' => 'You do not have the right roles for this action'
                ],404);
            }
            //-----------------------------

            $request->validate([
            'name'=>'required|string',
            'stock'=>'required|integer',
            'serial'=>'required|string',
            'price'=>'required|numeric|min:0',
            'description'=>'string',
            'category'=>'string',
            ]);

            $product = Product::create([
            'name'=>$request->name,
            'stock'=>$request->stock,
            'serial'=>$request->serial,
            'price'=>$request->price,
            'category'=>$request->category,
            'description'=>$request->description,
            ]);

            return response()->json([
                'message'=>'Product created successfully'
            ]);
        }catch ( \Exception $e){
            return response()->json([
                'error' => $e->getMessage()
            ],400);
        }
    }

    public function update($id, Request $request){
        try{
            //Validate role            
            $user_token_id = auth()->user()->id;
            $user_token = User::find($user_token_id);

            if($user_token->role != 1){
                return response()->json([
                    'error' => 'You do not have the right roles for this action'
                ],404);
            }
            //-----------------------------

            $product = Product::find($id);

            if(!$product){
                return response()->json([
                    'error'=>'Product not found'
                ],404);
            }

            $product->update($request->all());

            return response()->json([
                'message' => 'Product update succesfully',
            ],200);
        }catch ( \Exception $e){
            return response()->json([
                'error' => $e->getMessage()
            ],400);
        }
    }

    public function destroy($id){
        try {
            //Validate role            
            $user_token_id = auth()->user()->id;
            $user_token = User::find($user_token_id);

            if($user_token->role != 1){
                return response()->json([
                    'error' => 'You do not have the right roles for this action'
                ],404);
            }
            //-----------------------------

            $product = Product::find($id);

            if(!$product){
                return response()->json([
                    'error'=>'Product not found'
                ],404);
            }

            Product::destroy($id);

            return response()->json([
                'message' => 'Product deleted succesfully',
            ],200);

        } catch ( \Exception $e){
            return response()->json([
                'error' => $e->getMessage()
            ],400);
        }
    }
}
