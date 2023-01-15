@extends('layouts.app')

@section('template_title')
    Zonaresidencia
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Zonaresidencia') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('zonaresidencias.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Zona Residencia Id</th>
										<th>Zona Id</th>
										<th>Descripcion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($zonaresidencias as $zonaresidencia)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $zonaresidencia->zona_residencia_id }}</td>
											<td>{{ $zonaresidencia->zona_id }}</td>
											<td>{{ $zonaresidencia->descripcion }}</td>

                                            <td>
                                                <form action="{{ route('zonaresidencias.destroy',$zonaresidencia->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('zonaresidencias.show',$zonaresidencia->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('zonaresidencias.edit',$zonaresidencia->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $zonaresidencias->links() !!}
            </div>
        </div>
    </div>
@endsection
