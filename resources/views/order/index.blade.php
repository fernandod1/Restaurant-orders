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
                                {{ __('Pedidos') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('orders.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Añadir pedido') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">

                        @php
                        $old_o = '';
                        $html_card = '';
                        $total_cards = 0;
                        $i=0;
                        @endphp
                        
                        @foreach ($orders as $order)       
                            @php                        
                            if(($old_o != $order->id_order)){
                                $html[$i] = $html_card;
                                //$html_card = '';
                                $id_order[$i] = $order->id_order;
                                $status[$i] = $order->status;                                                                
                                $old_o = $order->id_order;
                                $total_cards++;
                                $i++;
                            } else{
                                $html_card .= '<li class="list-group-item">'.$order->product->name.' '.$order->quantity.'</li>';   
                            }
                            @endphp               
                        @endforeach
       
            
                        @php
                            for ($i = 0; $i < $total_cards; $i++) {
                                echo '
                                <div class="card" style="width: 18rem;">
                                <div class="card-header">
                                    ID:  '.$id_order[$i].' 
                                    '.$status[$i].'                                     '.$i.' 
                                </div>
                                <ul class="list-group list-group-flush">
                                    '.$html[$i].'   
                                </ul>
                                </div>
                                ';
                            }
                        @endphp  

                            

                        
                    </div>
                </div>
                {!! $orders->links() !!}
            </div>
        </div>
    </div>
@endsection
