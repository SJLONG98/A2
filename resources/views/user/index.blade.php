@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-10 offset-md-1">
           @if ($wallets)
            <div class="card">
                <div class="card-header">Wallets for {{ Auth::user()->firstName }} {{ Auth::user()->lastName }} <span class="float-right">
                   <a href="/createWallet">Create</a>
                    /
                   <a href="/editWallet">Edit</a>
                   /
                 <a href="/deleteWallet">Delete</a>
                </span>
                </div>

                <div class="card-body">


                    <ul class="nav nav-tabs" id="nav-tab" role="tablist">
                    @foreach ($wallets as $wallet)

                      <li class="nav-item">
                        <a class="nav-link "  id="nav-{{ $wallet->id }}-tab" data-toggle="tab" href="#{{ $wallet->id }}" role="tab" aria-controls="nav-{{ $wallet->name }}" aria-selected="true" >{{ $wallet->name }}</a>
                      </li>

                      @endforeach
                      </ul>


                      <div class="tab-content" id="nav-tabContent">

                      @foreach ($wallets as $wallet)
                       <div class="tab-pane fade" id="{{ $wallet->id }}" role="tabpanel" aria-labelledby="{{ $wallet->name }}-tab">
                       </br>
                          <h3>Wallet: {{ $wallet->name }}</h3>
                         <div class="card-deck">
                          <div class="card border-dark mb-3" style="max-width: 18rem;">
                             <div class="card-header"><svg class="BTC cc-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 226.777 226.777"><path d="M135.715 122.244c-2.614-1.31-8.437-3.074-15.368-3.533-6.934-.458-15.828 0-15.828 0v30.02s9.287.198 15.503-.26c6.21-.458 12.621-2.027 15.826-3.795 3.203-1.766 7.063-4.513 7.063-11.379 0-6.869-4.579-9.745-7.196-11.053zm-19.555-17.465c5.104-.197 10.532-1.373 14.453-3.532 3.925-2.158 6.148-5.557 6.02-10.66-.134-5.102-3.532-9.418-9.287-11.186-5.757-1.766-9.613-1.897-13.998-1.962-4.382-.064-8.83.328-8.83.328v27.012c.001 0 6.541.197 11.642 0z"/><path d="M113.413 0C50.777 0 0 50.776 0 113.413c0 62.636 50.777 113.413 113.413 113.413s113.411-50.777 113.411-113.413C226.824 50.776 176.049 0 113.413 0zm46.178 156.777c-8.44 5.887-17.465 6.935-21.455 7.456-1.969.259-5.342.532-8.959.744v22.738h-13.998v-22.37h-10.66v22.37H90.522v-22.37H62.987l2.877-16.812h8.371c2.814 0 3.989-.261 5.166-1.372 1.177-1.113 1.439-2.812 1.439-4.188V85.057c0-3.628-.295-4.61-1.963-6.473-1.668-1.867-5.591-2.112-7.8-2.112h-8.091V61.939h27.535V39.505h13.996v22.434h10.66V39.505h13.998v22.703c10.435.647 18.203 2.635 24.983 7.645 8.766 6.475 8.306 17.724 8.11 20.406-.195 2.682-1.372 7.85-3.729 11.183-2.352 3.337-8.108 6.673-8.108 6.673s6.801 1.438 11.578 5.036c4.771 3.598 8.307 9.941 8.106 19.229-.192 9.288-2.088 18.511-10.524 24.397z"/></svg>
                                Bitcoin
                             </div>
                             <div class="card-body">
                               <h5 class="card-title">BTC {{ $wallet->bitcoin }}</h5>
                               <p class="card-text">£{{number_format($wallet->bitcoin * $prices['BTC']['GBP'], 2, ',', ' ')}}</p>
                             </div>
                           </div>
                           <div class="card border-dark mb-3" style="max-width: 18rem;">
                              <div class="card-header">
                                 <svg class="ETH cc-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 226.777 226.777"><path d="M113.313 0C50.732 0 0 50.732 0 113.313s50.732 113.313 113.313 113.313 113.313-50.732 113.313-113.313S175.894 0 113.313 0zm-1.469 188.386l-44.78-63.344 44.78 26.218v37.126zm0-46.41l-45.083-26.408 45.083-19.748v46.156zm0-49.329l-43.631 19.11 43.631-73.306v54.196zm2.906-54.218l44.244 73.6-44.244-19.382V38.429zm0 149.957V151.26l44.78-26.218-44.78 63.344zm0-46.409V95.821l45.116 19.762-45.116 26.394z"/></svg>

                                 Etherium</div>
                              <div class="card-body">
                                <h5 class="card-title">ETH {{ $wallet->etherium }}</h5>
                                <p class="card-text">£{{number_format($wallet->etherium * $prices['ETH']['GBP'], 2, ',', ' ')}}</p>
                              </div>
                            </div>
                            <div class="card border-dark mb-3" style="max-width: 18rem;">
                               <div class="card-header">
                                  <svg class="LTC cc-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 226.777 226.777"><path d="M113.441 0C50.789 0 0 50.79 0 113.443c0 62.654 50.789 113.441 113.441 113.441 62.654 0 113.443-50.787 113.443-113.441C226.885 50.79 176.096 0 113.441 0zm44.036 168.762H68.839l7.45-35.566-14.486 9.933 3.519-19.463 15.151-10.43 14.862-70.939h27.671l-10.232 48.71L148.8 66.213l-4.222 20.167-36.02 24.693-7.126 33.93H162.4l-4.923 23.759z"/></svg>

                                  Litcoin</div>
                               <div class="card-body">
                                 <h5 class="card-title">LTC {{ $wallet->litcoin }}</h5>
                                 <p class="card-text">£{{number_format($wallet->litcoin * $prices['LTC']['GBP'], 2, ',', ' ')}}</p>
                               </div>
                             </div>
                             </div>
                       </div>

                       @endforeach
                     </div>

                    @endif
                    @if (!$wallets)
                    <div class="card">
                        <div class="card-header">Dashboard for {{ Auth::user()->firstName }} {{ Auth::user()->lastName }} <span class="float-right"><a href="/createWallet">Create a Wallet</a></span></div>

                        <div class="card-body">

                    Create Your First Wallet
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
