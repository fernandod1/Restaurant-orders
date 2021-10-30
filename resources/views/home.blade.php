@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Panel de control') }}</div>

                <div class="card-body" style="text-align:center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <img width=250px src=https://scontent.fsvq2-2.fna.fbcdn.net/v/t1.6435-9/172436324_100229258874124_5038771354793411007_n.png?_nc_cat=104&ccb=1-5&_nc_sid=973b4a&_nc_ohc=qatfHDkovGYAX-uksmY&_nc_ht=scontent.fsvq2-2.fna&oh=a99ca22e71467046852e1b9b919d629c&oe=61A286BD>
                    <br><a href=/orders><b>Ver pedidos</b></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
