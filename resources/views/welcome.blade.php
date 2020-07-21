<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CRUD</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 mx-auto text-center">
                <div class="col-sm-6 text-center">
                    <img src="https://movitrans.colombiasoftware.net/themes/basic/images/movitrans/078_logo.gif" class="img-fluid" alt="Responsive image">
                    <h2>Reportes de Silogtran</h2>
                </div>     
                <div class="card shadow my-4 border-0">
                    <form action="{{ route('manifests.store') }}" method="POST" enctype="multipart/form-data">
                        <div class="card-body">                             
                            @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    - {{ $error }} <br>
                                @endforeach
                            </div>
                            @endif

                            <div class="form-row">
                                <div class="col-sm-4">
                                    <label for="">Remesas</label>
                                    <input type="file" name="file" class="form-control">
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Combustible</label>
                                    <input type="file" name="combustible" class="form-control">
                                </div>
                                <div class="col-auto">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Cargar archivos</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card shadow my-4 border-0">
                    <form action="{{ route('manifests.vehicle') }}" method="POST">
                        <div class="card-body">                             
                            @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    - {{ $error }} <br>
                                @endforeach
                            </div>
                            @endif

                            <div class="form-row">
                                <div class="col-sm-6">
                                    <input type="text" name="license_plate" placeholder="Ingresa una placa" class="form-control">
                                </div>
                                <div class="col-auto">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Buscar por placa</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card shadow my-4 border-0">
                    <form action="{{ route('manifests.driver') }}" method="POST">
                        <div class="card-body">                             
                            @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    - {{ $error }} <br>
                                @endforeach
                            </div>
                            @endif

                            <div class="form-row">
                                <div class="col-sm-6">
                                    <input type="text" name="identification" placeholder="Ingresa una cédula" class="form-control">
                                </div>
                                <div class="col-auto">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Buscar por Conductor</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card shadow my-4 border-0">
                    <form action="{{ route('manifests.route') }}" method="POST">
                        <div class="card-body">                             
                            @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    - {{ $error }} <br>
                                @endforeach
                            </div>
                            @endif

                            <div class="form-row">
                                <div class="col-sm-6">
                                    <input type="text" name="route_id" placeholder="Ingresa una ruta" class="form-control">
                                </div>
                                <div class="col-auto">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Buscar por Ruta</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card shadow my-4 border-0">
                    <form action="{{ route('manifests.customer') }}" method="POST">
                        <div class="card-body">                             
                            @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    - {{ $error }} <br>
                                @endforeach
                            </div>
                            @endif

                            <div class="form-row">
                                <div class="col-sm-6">
                                    <input type="text" name="identification" placeholder="Ingresa un NIT" class="form-control">
                                </div>
                                <div class="col-auto">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Buscar por cliente</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <h2 style="color:gray">
                
                @if (isset($header))
                    {{$header}}
                @else
                    Resultado
                @endif
                
                </h2>
                <h3>Ingresos {{"$ " . number_format($income, 0, ",", ".")  }}</h3>
                <h3>Costos: {{"$ " . number_format($cost, 0, ",", ".")  }}</h3>
                <h3>Markup: {{"$ " . number_format($income - $cost, 0, ",", ".")  }}</h3>
            </div>
        </div>
    </body>
</html>