<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
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
                } 
            }
    
            $total += ($subtotal * 1.19);
            $order->total = $total;
            $order->subtotal = $subtotal;
            $order->save();

        }catch (\Exception $e) {
            return response()->json([
                "error" => $e->getMessage()
            ],400);
        } 
    }

    public function update($id, Request $request){
        try{
            $order = Order::find($id);

            if(!$order){
                return response()->json([
                    'error'=>'Order not found'
                ],404);
            }

            $order->update($request->all());  

            if($order->status == 1){
                $orderProducts = OrderProduct::where('order_id',$id)->get();

                foreach ($orderProducts as $orderProduct) {
                    $product = Product::where('id',$orderProduct->product_id)->first();
                    $product->stock -= $orderProduct->quantity;
                    $product->save();
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
