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
        <form action="{{ url('user/update/'.$users_data->id) }}" method="POST">
            @csrf
            <div class="form-group row">
                <label for="" class="col-sm-1 col-form-label font-weight-bold">Name:</label>
                <div class="col-sm-11">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="" value="{{ $users_data->name }}">
                    @error('name')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-1 col-form-label font-weight-bold">Email:</label>
                <div class="col-sm-11">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="" value="{{ $users_data->email }}">
                    @error('email')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-1 col-form-label font-weight-bold">Phone:</label>
                <div class="col-sm-11">
                    <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" id="" value="{{ $users_data->phone }}">
                    @error('phone')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-1 col-form-label font-weight-bold">Occupation:</label>
                <div class="col-sm-11">
                    <input type="text" name="occupation" class="form-control @error('occupation') is-invalid @enderror" id="" value="{{ $users_data->occupation }}">
                    @error('occupation')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-1 col-form-label font-weight-bold">Remarks:</label>
                <div class="col-sm-11">
                    <input type="text" name="remarks" class="form-control @error('remarks') is-invalid @enderror" id="" value="{{ $users_data->remarks }}">
                    @error('remarks')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>

        <div style="padding: 10px;"></div>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>