@extends('admin.layout.master')

@section('content')
    <section class="section">
    <div class="section-header">
      <h1>Painel de Controle</h1>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Administradores</h4>
            </div>
            <div class="card-body">
                {{ $totalAdmins }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-newspaper"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Nutricionistas</h4>
            </div>
            <div class="card-body">
              {{ $totalNutricionist }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="far fa-file"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Pacientes</h4>
            </div>
            <div class="card-body">
              {{ $totalPatient }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="fas fa-circle"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total de Usuários</h4>
            </div>
            <div class="card-body">
              {{ $totalUsers }}
            </div>
          </div>
        </div>
      </div>

      <div class="col-4">
            <div class="card">
            <div class="card-header">
                <h4>Anamneses cadastradas por Mês</h4>
            </div>
            <div class="card-body">
                <canvas id="anamnesesChart"></canvas>
            </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
            <div class="card-header">
                <h4>Antropometrias cadastradas por Mês</h4>
            </div>
            <div class="card-body">
                <canvas id="antropometriasChart"></canvas>
            </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
            <div class="card-header">
                <h4>Planos Alimentares cadastrados por Mês</h4>
            </div>
            <div class="card-body">
                <canvas id="mealplansChart"></canvas>
            </div>
            </div>
        </div>
    </div>
  </section>

@endsection

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('anamnesesChart').getContext('2d');
            ctx.canvas.height = 250;

            var anamnesesChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($months) !!}, // Array de meses, ex: ['Janeiro', 'Fevereiro', ...]
                    datasets: [{
                        label: 'Anamneses Cadastradas',
                        data: {!! json_encode($anamnesesPerMonth) !!}, // Quantidade de anamneses por mês
                        backgroundColor: 'rgba(103, 119, 240, 0.6)',
                        borderColor: 'rgba(103, 119, 240, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('antropometriasChart').getContext('2d');
        ctx.canvas.height = 250;

        var antropometriasChart = new Chart(ctx, {
            type: 'line', // Tipo de gráfico: pode ser 'line', 'bar', etc.
            data: {
                labels: {!! json_encode($months) !!},
                datasets: [{
                    label: 'Antropometrias Cadastradas',
                    data: {!! json_encode($antropometriaPerMonth) !!},
                    backgroundColor: 'rgba(103, 119, 240, 0.6)',
                    borderColor: 'rgba(103, 119, 240, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('mealplansChart').getContext('2d');
        ctx.canvas.height = 250;

        var mealplansChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($months) !!},
                datasets: [{
                    label: 'Planos Alimentares Cadastrados',
                    data: {!! json_encode($mealplanPerMonth) !!},
                    backgroundColor: 'rgba(103, 119, 240, 0.6)',
                    borderColor: 'rgba(103, 119, 240, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>


