@extends('layouts.app')

@section('template_title')
    Pedidos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <b>{{ __('Pedidos') }}</b>
                            </span>
                            @if(auth()->user()->role<2)
                             <div class="float-right">
                                <a href="{{ route('orders.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Añadir pedido') }}
                                </a>
                              </div>
                            @endif
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">

                        @php                       
                            $data =  [];
                            $i = 0;
                        @endphp

                        @foreach ($orders as $order)                         
                            @php     
                                if (array_key_exists($order->id_order,$data)) {
                                    $data[$order->id_order] .= '||'.$order->id_order.'_'.$order->product->name.'_'.$order->quantity.'_'.$order->status.'_'.$order->created_at.'_'.$order->client->name.'_'.$order->client->notes;
                                }else{
                                    $data[$order->id_order] = $order->id_order.'_'.$order->product->name.'_'.$order->quantity.'_'.$order->status.'_'.$order->created_at.'_'.$order->client->name.'_'.$order->client->notes; 
                                }    
                                $i++;                                             
                            @endphp
                        @endforeach

                        <div class="card-deck">
                        @foreach ($data as $one_data)                        
                            @php
                            $all_orders = explode('||',$one_data);
                            $my_order = explode('_',$all_orders[0]);
                            @endphp

                            <div class="card mb-8" style="width: 18rem;flex: 1 0 30%">
                                <div class="card-header">
                                    <h4>
                                        {{ $my_order[0] }}
                                        @php
                                        if($my_order[3]==0){
                                            echo'<span class="badge rounded-pill bg-danger" style="color:white">ABIERTO</span> ';
                                            echo'<a class="btn btn-sm btn-success " href="'.route('orders.status',[$my_order[0], 1]).'"> <b>&#10004;</b> </a>';
                                        }else if($my_order[3]==1 && auth()->user()->role==2){
                                            echo'<span class="badge rounded-pill bg-warning text-dark">PREPARADO</span> ';
                                        }else if($my_order[3]==1){
                                            echo'<span class="badge rounded-pill bg-warning text-dark">PREPARADO</span> ';
                                            echo'<a class="btn btn-sm btn-success " href="'.route('orders.status',[$my_order[0], 2]).'"> <b>&#10004;</b> </a>';
                                        }else if($my_order[3]==2){
                                            echo'<span class="badge rounded-pill bg-success" style="color:white">ENTREGADO</span>';
                                        }
                                        echo "&nbsp; <font size=2>&#128337;".time_elapsed_string($my_order[4])." <b>".$my_order[5]."</b></font>";
                                        @endphp                                        
                                    </h4>                
                                </div>
                                <ul class="list-group list-group-flush">
                            @php
                                if($my_order[6]!='')
                                    echo '<li class="list-group-item" style="background-color:#fffce3;"><span style="font-size:18px;font-weight: bold;color:red">&#9888;</span> '.$my_order[6].'</li>';
                                foreach ($all_orders as $val){
                                    $d = explode('_',$val);
                                    echo '<li class="list-group-item">'.$d[1].' <b>( '.$d[2].' )</b></li>';
                                }
                            @endphp
                                </ul>
                                <br>
                            </div>
                        @endforeach
                    </div><!-- end card deck -->
                </div>
                {!! $orders->links() !!}
            </div>
        </div>
    </div>
@endsection

@php
 function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'año',
        'm' => 'mes',
        'w' => 'sem',
        'd' => 'd',
        'h' => 'h',
        'i' => 'm',
        's' => 's',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . '' : 'ahora';
}   
@endphp