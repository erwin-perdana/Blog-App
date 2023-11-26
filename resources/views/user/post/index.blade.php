@extends('layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Post</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    @if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
    @endif
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-md-8">
                  <h3 class="card-title">Data Post</h3>
                </div>
                <div class="col-md-4 text-right">
                  @if (Auth::user()->role == "User")
                  <a href="{{ route('user.post.create') }}" class="btn btn-sm btn-primary"><i class="far fa-plus-square"></i> Tambah</a>
                  @endif
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="myTable" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($posts as $post)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ Carbon\Carbon::parse($post->date)->format('d M Y') }}</td>
                    <td>{{$post->user->email}}</td>
                    <td>{{ $post->title }}</td>
                    <td>
                      <img src="{{$post->image}}" alt="post image" width="200">
                    </td>
                    <td>
                      <a href="{{ route('user.post.edit', $post->id) }}" class="btn btn-sm btn-primary"><i class="far fa-edit"></i></a>
                      <form action="{{ route('user.post.destroy', $post->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm" onClick="return confirm('Delete Data ?') ? $(this).closest('form').submit() : false ">
                          <i class="fa fa-trash-alt"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                  </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection