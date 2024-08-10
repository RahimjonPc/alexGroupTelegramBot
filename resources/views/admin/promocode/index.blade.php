@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('used_promocodes') }}" class="btn btn-danger btn-add-new">Скачать использованные промокоды</a>
                        <a href="{{ route('new_promocodes') }}" class="btn btn-success btn-add-new">Скачать не использованные промокоды</a>
                        <form action="{{ route('import_promocodes') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="promocodes" >
                            <button class="btn btn-primary btn-add-new" type="submit">Импортировать промокоды</button>
                        </form>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Промокоды</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Пользователь</th>
                                            <th>Промокод</th>
                                            <th>Статус</th>
                                            <th>Создано</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($promocodes as $promocode)
                                            <tr>
                                                <td>{{ $promocode->id }}</td>
                                                <td>{{ $promocode->user->name ?? ' ' }}</td>
                                                <td>{{ $promocode->code }}</td>
                                                @if ($promocode->status == 0)
                                                    <td>Не использованный</td>
                                                @else
                                                    <td>Использованный</td>
                                                @endif
                                                <td>{{ $promocode->created_at->format('d.m.Y') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
