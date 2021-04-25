<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>LARAVEL 8</title>
</head>

<body>
  <div style="padding: 30px;"></div>

  <div class="container">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>{{ (session('success')) }}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif

    @if(session('delete'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>{{ (session('delete')) }}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    <form action="{{ url('user/store') }}" method="POST">
      @csrf
      <div class="form-group row">
        <label for="" class="col-sm-1 col-form-label font-weight-bold">Name:</label>
        <div class="col-sm-11">
          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="" placeholder="">
          @error('name')
          <strong class="text-danger">{{ $message }}</strong>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-1 col-form-label font-weight-bold">Email:</label>
        <div class="col-sm-11">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="" placeholder="">
          @error('email')
          <strong class="text-danger">{{ $message }}</strong>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-1 col-form-label font-weight-bold">Phone:</label>
        <div class="col-sm-11">
          <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" id="" placeholder="">
          @error('phone')
          <strong class="text-danger">{{ $message }}</strong>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-1 col-form-label font-weight-bold">Occupation:</label>
        <div class="col-sm-11">
          <input type="text" name="occupation" class="form-control @error('occupation') is-invalid @enderror" id="" placeholder="">
          @error('occupation')
          <strong class="text-danger">{{ $message }}</strong>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-1 col-form-label font-weight-bold">Remarks:</label>
        <div class="col-sm-11">
          <input type="text" name="remarks" class="form-control @error('remarks') is-invalid @enderror" id="" placeholder="">
          @error('remarks')
          <strong class="text-danger">{{ $message }}</strong>
          @enderror
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <div style="padding: 10px;"></div>

    <div class="text-center">
      @if(session('update'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ (session('update')) }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      <h1>ALl Data</h1>
    </div>
    <table class="table table-striped table-dark">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <th scope="col">Occupation</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @php
        $loop = 1;
        @endphp

        @php
        foreach ($us as $user) :
        @endphp
          <tr>
            <th scope="row">{{ $loop+11 }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->occupation }}</td>
            <td>
              <a href="{{ url('user/edit/' .$user->id ) }}" class="btn btn-primary">Edit</a>
              <a href="{{ url('user/delete/' .$user->id ) }}" class="btn btn-danger" onclick="return confirm('Do you want to delete this?')">Delete</a>
            </td>
          </tr>
        @php
        endforeach;
        @endphp

        {{-- @foreach ($users as $i => $user)
          <tr>
            <th scope="col">{{ $i+11 }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->occupation }}</td>
            <td>
              <a href="{{ url('user/edit/' .$user->id ) }}" class="btn btn-primary">Edit</a>
              <a href="{{ url('user/delete/' .$user->id ) }}" class="btn btn-danger" onclick="return confirm('Do you want to delete this?')">Delete</a>
            </td>
          </tr>
        @endforeach --}}
      </tbody>
    </table>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>