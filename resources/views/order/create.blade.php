@extends('layouts.app')

@section('template_title')
    Nuevo pedido
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Nuevo pedido</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('orders.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            @php
                            if(isset($category)){
                                $i=0;
                                foreach ($category as $onec){
                                    echo "<b>".$onec->name."</b><br>";
                                        foreach ($product as $onep){
                                            if($onep->id_category == $onec->id){
                                                $i++;
                                                echo $onep->name.' 
                                                <input id=Input'.$i.' name="p['.$onep->id.']" type=number min=0 max=20>
                                                <button id=buttonplus onclick="increment('.$i.')" type="button">+</button>
                                                <button id=buttonminus onclick="decrement('.$i.')" type="button">-</button>
                                                <br>                                    
                                                ';
                                            }
                                        }
                                }
                            }
                            @endphp
                            <div class="box-footer mt20">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<style>
    #buttonplus{
        padding-right: 20px;
        padding-left: 20px;
        margin-right: 10px;
        background-color: greenyellow;
        font-weight: bold;
        font-size: 16px;
    }
    #buttonminus{
        padding-right: 10px;
        padding-left: 10px;
        background-color: #ff8c9d;
        font-weight: bold;
        font-size: 16px;
    }
</style>
<script>
    function increment(i) {
        document.getElementById('Input'+i).stepUp();
    }
    function decrement(i) {
        document.getElementById('Input'+i).stepDown();
    }
</script>
@endsection
