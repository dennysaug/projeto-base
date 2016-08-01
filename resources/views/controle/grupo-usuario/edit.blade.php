@extends('layout.controle')
@section('title','Grupo de Usuário')
@section('conteudo')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Grupo de Usuário <small>{{ isset($grupo) ? 'Editar' : 'Cadastrar' }}</small></h2>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <!-- start form for validation -->
                    {!! Form::model(isset($grupo)?$grupo:null, ['route' => ['controle.grupo-usuario.salvar', (isset($grupo)?$grupo->id:null)], 'class' => 'form-horizontal form-label-left']) !!}
                        <div class="form-group">
                            {!! Form::label('nome', 'Nome', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('nome', null, ['class' => 'form-control col-md-7 col-xs-12', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('descricao', 'Descrição', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::textarea('texto', null, ['class' => 'form-control col-md-7 col-xs-12', 'rows' => '2', 'required']) !!}
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                {!! Form::submit(isset($grupo) ? 'Editar' : 'Cadastrar', ['class' => 'btn btn-primary']) !!}
                                {!! Form::button('Cancelar', ['class' => 'btn btn-default']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                    <!-- end form for validations -->
                </div>
            </div>
        </div>
    </div>
@endsection