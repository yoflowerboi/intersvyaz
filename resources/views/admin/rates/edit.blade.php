@extends('layouts.admin_layout')

@section('title', 'Редактирование тарифа')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Редактирование тарифа {{ $rates['title'] }}</h1>
            </div>
        </div><!-- /.row -->

        <!-- Вывод уведомления об ошибке -->
        @if ($errors->any())
        <div class="row justify-content-center">
         <div class="col-md-8 alert alert-danger">
             <ul>
                 @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                 @endforeach
             </ul>
         </div>
        </div>
        @endif

        <!-- Вывод уведомления об успешной обработке операции -->
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
            </div>
        @endif

      </div><!-- /.container-fluid -->
    </div>
    <section class="content">

    <div class="container-fluid">
    <div class="row">
    <div class="col-lg-12">
    
    <div class="card card-primary">
            
            <!-- Вывод полей для обновления тарифа + метод обновления -->
            <form action="{{ route('rates.update', $rates['id']) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputRates1">Название</label>
                        <input type="text" name="title" value="{{ $rates['title'] }}" class="form-control" id="exampleInputRates1" placeholder="Введите название тарифа" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputRates2">Описание</label>
                        <input type="text" name="content" value="{{ $rates['content'] }}" class="form-control" id="exampleInputRates2" placeholder="Введите описание" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputRates3">Скорость, Мбит/с</label>
                        <input type="text" name="speed" value="{{ $rates['speed'] }}" class="form-control" id="exampleInputRates3" placeholder="Введите скорость" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputRates4">Цена, ₽/мес</label>
                        <input type="text" name="price" value="{{ $rates['price'] }}" class="form-control" id="exampleInputRates4" placeholder="Введите цену" required>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Обновить</button>
                     </div>
                </div>
            </form>
    </div>
  </div>
</div>
</section>
@endsection