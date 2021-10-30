<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Events\MyEvent;

/**
 * Class OrderController
 * @package App\Http\Controllers
 */
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('id', 'DESC')->paginate();
        return view('order.index', compact('orders'))
            ->with('i', (request()->input('page', 1) - 1) * $orders->perPage());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order = new Order();
        $category = Category::all();
        $product = Product::all();        
        return view('order.create', compact('order','category','product'));
    }

    public function status($id_order,$id_status)
    {    
        $done = DB::table('orders')
              ->where('id_order', $id_order)
              ->update(['status' => $id_status]);
        if($id_status==1)
            $message= "Pedido ID <font color=blue><b>$id_order</b></font> listo para recoger en COCINA.";
        if($id_status==2)
            $message= "Pedido ID <font color=blue><b>$id_order</b></font> entregado a CLIENTE.";
        event(new MyEvent($message));
        return redirect()->route('orders.index')
            ->with('success', 'Estado de pedido cambiado.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_order = rand(100, 999);
        foreach ($request->p as $x => $x_value){
            if($x_value>0){
                $order = new Order;
                $order->id_order = $id_order;
                $order->id_user = auth()->user()->id;
                $order->id_product = (int)$x;
                $order->quantity = (int)$x_value;
                $order->status = 0;
                $order->save();
            }
        }
        $message= "NUEVO pedido <font color=blue><b>$id_order</b></font> creado para COCINA.";
        event(new MyEvent($message));

        return redirect()->route('orders.index')
            ->with('success', 'Pedido creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        return view('order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);

        return view('order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        request()->validate(Order::$rules);

        $order->update($request->all());

        return redirect()->route('orders.index')
            ->with('success', 'Pedido modificado con éxito.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $order = Order::find($id)->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Pedido eliminado con éxito');
    }
}
