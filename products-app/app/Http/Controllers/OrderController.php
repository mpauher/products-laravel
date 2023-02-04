<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\OrderProduct;
use Carbon\Carbon;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index(){
        try {
            $orders = Order::all();

            if(count($orders) == 0){
                return response()->json();
            }

            return response()->json([
                'orders' => $orders
            ],200);
        } catch (\Exception $e) {
            return response()->json([
                "error" => $e->getMessage()
            ],400);
        }

    }

    public function show($id){
        try {
            $order = Order::find($id);

            //Validate role            
            $user_id = auth()->user()->id;
            $user = User::find($user_id);

            if($user->role != 1 && $order->user_id != $user_id){
                echo($user->role);
                return response()->json([
                    'error' => 'You do not have the right roles for this action'
                ],404);
            }
            //-----------------------------

            if(!$order){
                return response()->json([
                    'error'=>'Order not found'
                ],404);
            }

            return response()->json([
                'order' => $order
            ],200);

        } catch (\Exception $e) {
            return response()->json([
                "error" => $e->getMessage()
            ],400);
        }      
    }

    public function create(Request $request){
        try {
            return DB::transaction(function () use ($request) {
                $reference = Str::random(10).'_'.Carbon::now();
                $user_id = auth()->user()->id;

                $request->validate([
                    'items' => 'required|array'
                ]);   

                $order = Order::create([
                    'reference'=>$reference,
                    'user_id'=>$user_id,
                    'status'=> 3 //Default status (pendings order)
                ]);

                $subtotal = 0;
                $total = 0;

                foreach($request->items as $item){
                    $product = Product::find($item['product_id']);
                    
                    if($item['quantity'] <= $product->stock){
                        $price = Product::find($item['product_id'])->price;
                        $orderProduct = OrderProduct::create([
                            'order_id' => $order->id,
                            'product_id' => $item['product_id'],
                            'quantity' => $item['quantity'],
                            'price' => $product->price
                        ]);

                        $subtotal += ($product->price * $orderProduct->quantity);
                    } else {
                        DB::rollBack();
                        return response()->json([
                            'error'=>'Product quantity not enough',
                        ],404);
                    }
                }
        
                $total += ($subtotal * 1.19);
                $order->total = $total;
                $order->subtotal = $subtotal;
                $order->save();

                return response()->json([
                    'message' => 'Order created succesfully',
                ],200);
            },5);
        }catch (\Exception $e) {
            return response()->json([
                "error" => $e->getMessage()
            ],400);
        } 
    }

    public function update($id, Request $request){
        try{
            //Validate role            
            $user_id = auth()->user()->id;
            $user = User::find($user_id);

            if($user->role != 1){
                return response()->json([
                    'error' => 'You do not have the right roles for this action'
                ],404);
            }
            //-----------------------------

            $order = Order::find($id);

            if(!$order){
                return response()->json([
                    'error'=>'Order not found'
                ],404);
            }

            $order->update($request->all());  

            if($order->isDirty('status')){
                if($order->status == 1){
                    $orderProducts = OrderProduct::where('order_id',$id)->get();
    
                    foreach ($orderProducts as $orderProduct) {
                        $product = Product::where('id',$orderProduct->product_id)->first();
                        if($product->stock >= $orderProduct->quantity){
                            $product->stock -= $orderProduct->quantity;
                            $product->save();
                        } else {
                            DB::rollBack();
                            return response()->json([
                                'error'=>'Product quantity not enough',
                            ],404);
                        }
                    }
                }
            }                         

            return response()->json([
                'message' => 'Order update succesfully',
            ],200);
        }catch ( \Exception $e){
            return response()->json([
                'error' => $e->getMessage()
            ],400);
        }       
    }

    public function delete($id){
        try {
            //Validate role            
            $user_id = auth()->user()->id;
            $user = User::find($user_id);

            if($user->role != 1){
                return response()->json([
                    'error' => 'You do not have the right roles for this action'
                ],404);
            }
            //-----------------------------

            $order = Order::find($id);

            if(!$order){
                return response()->json([
                    'error'=>'Order not found'
                ],404);
            }

            Order::destroy($id);

            return response()->json([
                'message' => 'Order deleted succesfully',
            ],200);

        } catch ( \Exception $e){
            return response()->json([
                'error' => $e->getMessage()
            ],400);
        }
    }  

    public function invoice($id){
        try {
            $invoice = OrderProduct::select('product_id','price','quantity')->where('order_id',$id)->get();
            return response()->json([
                'invoice' => $invoice
            ],200);

        } catch ( \Exception $e){
            return response()->json([
                'error' => $e->getMessage()
            ],400);
        }
    }
}
