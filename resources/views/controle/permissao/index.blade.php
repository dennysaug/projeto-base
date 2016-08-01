@extends('layout.controle')
@section('title','Grupo de Usuário')
@section('conteudo')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Permissão <small></small></h2>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                @include('includes.controle.validator')
                <!-- start form for validation -->
                    {!! Form::open(['route' => ['controle.usuario.salvar'], 'class' => 'form-horizontal form-label-left']) !!}
                    <div class="form-group">
                        {!! Form::label('Grupo', 'Grupo', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::select('grupo_usuario_id', ['' => 'Selecione']+$grupos, isset($grupo)?$grupo->id:null, ['class' => 'form-control col-md-7 col-xs-12', 'required']) !!}
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                {{--<div class="form-group">--}}
                {{--<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">--}}
                {{--{!! Form::submit(isset($usuario) ? 'Editar' : 'Cadastrar', ['class' => 'btn btn-primary']) !!}--}}
                {{--{!! Form::button('Cancelar', ['class' => 'btn btn-default']) !!}--}}
                {{--</div>--}}
                {{--</div>--}}
                {!! Form::close() !!}
                <!-- end form for validations -->
                    <div>
                        @if(isset($grupo->id))
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2> {{ $grupo->nome }}</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        {!! Form::open(['route' => ['controle.permissao.salvar', $grupo], 'class' => 'form-horizontal']) !!}
                                        <div data-example-id="togglable-tabs" role="tabpanel" class="">
                                            <ul role="tablist" class="nav nav-tabs bar_tabs" id="myTab">
                                                @foreach($categoria_transacaos as $n => $categoria_transacao)
                                                <li class="{{ ($n == 0) ? 'active' : '' }}" role="presentation">
                                                    <a aria-expanded="false" data-toggle="tab" role="tab" id="tab{{ $categoria_transacao->id }}" href="#tab_content{{ $categoria_transacao->id }}">{{ $categoria_transacao->nome }}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                            <div class="tab-content" id="myTabContent">
                                                @foreach($categoria_transacaos as $n => $categoria_transacao)
                                                    <div aria-labelledby="tab{{ $categoria_transacao->id }}" id="tab_content{{ $categoria_transacao->id }}" class="tab-pane fade {{ ($n == 0) ? 'active in' : '' }}" role="tabpanel">
                                                        @foreach($categoria_transacao->transacao as $transacao)
                                                            <div class="form-group">
                                                                {!! Form::label('', $transacao->label, ['class' => 'control-label col-md-5 col-sm-5 col-xs-12']) !!}
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    {!! Form::checkbox('permissao[]', $transacao->id, in_array($transacao->id, $permissao), ['class' => 'form-control col-md-7 col-xs-12']) !!}
                                                                </div>
                                                            </div>
                                                            {{--                                                            <p>{{ $transacao->label }} {{ Form::checkbox('permissao[]', 1,  null, ['class' => 'icheck']) }}</p>--}}
                                                        @endforeach
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                                                {!! Form::submit(isset($grupo) ? 'Alterar' : 'Cadastrar', ['class' => 'btn btn-primary']) !!}
                                                {!! Form::button('Cancelar', ['class' => 'btn btn-default']) !!}
                                            </div>
                                        </div>
                                        {!! Form::close() !!}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function() {
            $('[name=grupo_usuario_id]').change(function() {
                var grupo_id = $(this).val()
                window.location.href = '{{ route('controle.permissao.index') }}/' +grupo_id;
            });
        });
    </script>
@endsection
