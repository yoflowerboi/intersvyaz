@extends('layouts.admin_layout')

@section('title', 'Добавить тарифы')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Добавить тарифы</h1>
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
    <!-- /.content-header -->
    <!-- Main FORM -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

            <!-- Вывод полей для добавления тарифа + метод добавления -->
            <div class="card card-primary">
            <form action="{{ route('rates.store') }}" method="POST">
                @method('POST')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputRates1">Название</label>
                        <input type="text" name="title" class="form-control" id="exampleInputRates1" placeholder="Введите название тарифа" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputRates2">Описание</label>
                        <input type="text" name="content" class="form-control" id="exampleInputRates2" placeholder="Введите описание" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputRates3">Скорость, Мбит/с</label>
                        <input type="text" name="speed" class="form-control" id="exampleInputRates3" placeholder="Введите скорость" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputRates4">Цена, ₽/мес</label>
                        <input type="text" name="price" class="form-control" id="exampleInputRates4" placeholder="Введите цену" required>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </div>
                </div>
            </form>
            </div> 

            </div>
        </div>
    </section>

@endsection