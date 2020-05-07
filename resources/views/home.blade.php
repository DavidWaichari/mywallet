@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Wallet</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <img src="{{asset('logo.jpg')}}" class="card-img-top" alt="..." height="200px" width="100px">
                                <div class="card-body">
                                  <h5 class="card-title">Outstanding Balance</h5>
                                 <h1>KSH {{Auth::user()->wallet->amount }}</h1>
                                </div>
                              </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <h4>Recharge Wallet</h4>
                            <form action="{{ route('wallets.update', Auth::user()->wallet->id)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                      <input type="number" class="form-control" name="amount" placeholder="Enter Amount">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                  </form>
                            </div>
                            <hr>
                            <div class="row">
                                <h4>Transfer Money</h4>
                            <form action="{{ route('wallets.transfer')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <select class="form-control" id="exampleFormControlSelect1" name="user_id">
                                            <option>Select User to Transfer</option>
                                            @foreach ($users as $user) 
                                            <option value="{{ $user->id}}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                        <input type="number" class="form-control" name="amount" placeholder="Enter Amount">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
