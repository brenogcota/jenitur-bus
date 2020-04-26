@extends('adminlte::page')

@section('title', 'Jenitur Turismo')

@section('content_header')
       <!-- Main content -->
        @php 
            $name = Auth::user()->name;
        @endphp

       <section class="content">
       

                <h3>Olá, {{ $name }}</h3>
                

                <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-bus"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Viagens</span>
                        <span class="info-box-number">
                        @php
                            echo App\Http\Controllers\HomeController::countTrip();
                        @endphp
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-list"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Passagens</span>
                        <span class="info-box-number">
                        @php
                            echo App\Http\Controllers\HomeController::countPassenger();
                        @endphp
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
               
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-address-card"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Usuários</span>
                        <span class="info-box-number">
                        @php
                            echo App\Http\Controllers\HomeController::countUser();
                        @endphp
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
        </div>

        
        <h2>Como usar o sistema</h2>
        <ul>
            <li>Na sessão de viagens você pode ver as viagens e cadastrar um novo passageiro clicando no <strong>+</strong></li>
            <li>Na sessão de cadastrar viagem você pode fazer o cadastro de uma nova viagem</li>
            <li>Na sessão de relatório você pode gerar o relatório de todas as viagens e dos passageiros de uma viagem em específico</li>
            <li>Na sessão de cadastro de novo usuario você pode cadastrar um novo usuario para fazer uso do sistema</li>

            <strong>Preencha todos os dados sempre que atualizar um passageiro ou viagem</strong>
        </ul>
        
        
        </section>

@stop





