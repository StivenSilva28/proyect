@extends('layouts.app')

@section('template_title')
    Tiposexo
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Tiposexo') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tiposexos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Sexo Id</th>
										<th>Sexo Tipo</th>
										<th>Descripcion</th>
										<th>Sw Mostrar</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tiposexos as $tiposexo)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $tiposexo->sexo_id }}</td>
											<td>{{ $tiposexo->sexo_tipo }}</td>
											<td>{{ $tiposexo->descripcion }}</td>
											<td>{{ $tiposexo->sw_mostrar }}</td>

                                            <td>
                                                <form action="{{ route('tiposexos.destroy',$tiposexo->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('tiposexos.show',$tiposexo->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('tiposexos.edit',$tiposexo->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $tiposexos->links() !!}
            </div>
        </div>
    </div>
@endsection
