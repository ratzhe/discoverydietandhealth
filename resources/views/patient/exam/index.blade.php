@extends('patient.layout.master')

@section('title', __('Upload de Exame') . ' - DDH')

@section('content')
<div id="app">
  <section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">

          <div class="card card-primary">
            <div class="card-header">
              <h4>Upload de Exame</h4>
            </div>

            <div class="card-body">
              @if(session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
              @endif

              <form action="{{ route('patient.exam.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="file" class="form-label">Escolha o arquivo PDF:</label>
                  <input type="file" class="form-control" id="file" name="file" required>
                </div>

                <div class="form-group">
                  <label for="exam_name">Nome do Exame:</label>
                  <input type="text" class="form-control" id="exam_name" name="exam_name" placeholder="Digite o nome do exame" required>
                </div>

                <div class="form-group">
                  <label for="description">Descrição:</label>
                  <textarea class="form-control" id="description" name="description" rows="3" placeholder="Descrição do exame" required></textarea>
                </div>

                <div class="form-group">
                  <label for="date">Data do Exame:</label>
                  <input type="date" class="form-control" id="date" name="date" required>
                </div>

                <button type="submit" class="btn btn-primary">Carregar</button>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
</div>
@endsection
