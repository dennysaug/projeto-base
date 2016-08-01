@extends('layout.controle')
@section('title','Grupo de Usuário')
@section('conteudo')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Grupo de Usuários</h2>
                    <div class="pull-right">
                        <a href="{{ route('controle.grupo-usuario.edit') }}" class="btn btn-success"><i class="fa fa-plus"></i> Novo</a>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <p>Total de registros encontrados: {{ $grupos->count() }}</p>

                    <table class="table table-striped responsive-utilities jambo_table bulk_action">
                        <thead>
                        <tr class="headings">
                            <th class="column-title">Nome</th>
                            <th class="column-title">Descrição</th>
                            <th class="column-title no-link last"><span class="nobr">Opções</span></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($grupos as $grupo)
                            <tr class="even pointer">
                                <td class=" ">{{ $grupo->nome }}</td>
                                <td class=" ">{{ $grupo->texto }}</td>
                                <td class=" last">
                                    @can('grupo-usuario.alterar')
                                        <a href="{{ route('controle.grupo-usuario.edit', $grupo) }}" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>
                                    @endcan
                                    @can('grupo-usuario.excluir')
                                        <a href="javascript:void(0);" class="btn btn-danger btn-xs excluir" data-url="{{ route('controle.grupo-usuario.excluir', $grupo) }}" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-times"></i></a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
