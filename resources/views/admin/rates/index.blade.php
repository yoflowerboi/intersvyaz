@extends('layouts.admin_layout')

@section('title', 'Все тарифы')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Все тарифы</h1>
            </div>
        </div><!-- /.row -->

        <!-- Вывод уведомления об успешной обработке операции -->
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
            </div>
        @endif

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Вывод данных тарифов в таблице -->
    <section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                     <tr> <th style="width: 5%"> ID  </th>
                          <th> Название  </th>
                          <th> Описание  </th>
                          <th> Скорость, Мбит/с  </th>
                          <th> Цена, ₽/мес  </th>
                          <th> Дата создания  </th>
                          <th> Дата обновления  </th>
                          <th style="width: 30%">  </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($rates as $rate)

                    <tr> <td> {{ $rate['id'] }} </td>
                          <td> {{ $rate['title'] }} </td>
                          <td> {{ $rate['content'] }} </td>
                          <td>
                            <input name="speed" class="form-control" value="{{ $rate['speed'] }}" data-id="{{ $rate['id'] }}" onkeyup="saveMe(this)">
                          </td>
                          <td> {{ $rate['price'] }} </td>
                          <td> {{ $rate['created_at'] }} </td>
                          <td> {{ $rate['updated_at'] }} </td>

                        <!-- Кнопка переадресации на страницу редактирования -->
                          <td class="project-actions text-right">
                             <a class="btn btn-info btn-sm" href="{{ route('rates.edit', $rate['id']) }}">
                                 <i class="fas fa-pencil-alt"></i>Редактировать</a>

                        <!-- Кнопка удаления -->
                        <form action="{{ route('rates.destroy', $rate['id']) }}" method="POST" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm delete-btn"><i class="fas fa-trash">    </i>Удалить</button>
                        </form>
                          </td>
                    </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>

<!-- Скрипт для обновления ячейки скорости -->
<script>

    function saveMe(e) {

        const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        const value = $(e).val();
        const field = $(e).attr('name');
        const id = $(e).attr('data-id');

        $.ajax({
            url:'/saveMe',
            type: 'POST',
            data: {_token:CSRF_TOKEN,
                value:value,
                field:field,
                id:id
            },
            success:function (data) {
                console.log(data[0]);
                if(data[0]==1){
                    $(e).addclass('is-invalid')
                }else{
                    $(e).addclass('is-valid')
                }
            },
            error:function (data) {

            }
        })
        
    }    
    
</script>
</section>