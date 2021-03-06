@extends('layouts.app')

@section('template_title')
    Nuevo pedido
@endsection

@section('content')
    <section class="content container-fluid">
        <form method="POST" action="{{ route('orders.store') }}"  role="form" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card">
                    <div class="card-header">
                        <span class="card-title"><b>Nuevo pedido</b></span>
                    </div>

                    <div class="card-body">
                    <div class="card-deck">

                            @csrf
                            @php
                            if(isset($category)){
                                $i=0;
                                foreach ($category as $onec){
                                    echo '<div class="card" style="width: 18rem;flex: 1 0 17%">
                                            <div class="card-header">
                                                <b>'.$onec->name.'</b>
                                            </div>
                                            <ul class="list-group list-group-flush">';  
                                        foreach ($product as $onep){
                                            if($onep->id_category == $onec->id AND $onep->stock){
                                                $i++;
                                                echo '
                                                <li class="list-group-item">                                                 
                                                <button id=buttonminus onclick="decrement('.$i.')" type="button">-</button>
                                                <button id=buttonplus onclick="increment('.$i.')" type="button">+</button>
                                                <input id=Input'.$i.' name="p['.$onep->id.']" type=number min=0 max=20>
                                                <br><b>'.
                                                $onep->name.
                                                '</b></li>                                 
                                                ';
                                            }
                                        }
                                        echo'</ul>
                                        </div>
                                        ';
                                }
                            }
                            @endphp
                    </div></div>
                    <div align=center class="box-footer mt20">
                        <div class="mb-3">
                            <label for="exampleInputName1" class="form-label"><b>Nombre de cliente</b></label>
                            <input type="text" name="name" class="form-control" min=0 max=20 required>
                          </div>
                          <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label"><b>Anotaciones de pedido</b></label>
                            <textarea class="form-control" name="notes" rows="2"></textarea>
                          </div>
                        
                        <button type="submit" class="btn btn-primary">Crear pedido</button>
                    </div><br>
                </div>
            </div>
        </div>
    </form>
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
