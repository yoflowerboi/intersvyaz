@extends('layouts.admin_layout')

@section('title', 'Главная')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->

            <!-- Вывод количества тарифов -->
            <div class="small-box bg-info">
              <div class="inner">

                <h3>{{ $rates_count }}</h3>

                <p>Количество тарифов</p>

              </div>
              
              <!-- Кнопка для перехода к таблице тарифов -->
              <a href="{{ route('rates.index') }}" class="small-box-footer">Посмотреть тарифы <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection