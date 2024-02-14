<div>
    @php
        use Darryldecode\Cart\Cart;
        use App\Services\CountableDataService;
    @endphp
    <div class="mb-4 d-sm-flex align-items-center justify-content-between">
        <h1 class="mb-0 text-gray-800 h3">Dashboard</h1>
        <a href="#" class="shadow-sm d-none d-sm-inline-block btn btn-sm btn-primary"><i
                class="fas fa-download fa-sm text-white-50"></i> </a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="mb-4 col-xl-3 col-md-6">
            <div class="py-2 shadow card border-left-primary h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="mr-2 col">
                            <div class="mb-1 text-xs font-weight-bold text-primary text-uppercase">
                                Commandes en cours</div>
                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ CountableDataService::countUnconfirmedOrders() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-calendar fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="mb-4 col-xl-3 col-md-6">
            <div class="py-2 shadow card border-left-success h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="mr-2 col">
                            <div class="mb-1 text-xs font-weight-bold text-success text-uppercase">
                                Commandes Livres</div>
                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ CountableDataService::countConfirmedOrders() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-dollar-sign fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="mb-4 col-xl-3 col-md-6">
            <div class="py-2 shadow card border-left-info h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="mr-2 col">
                            <div class="mb-1 text-xs font-weight-bold text-info text-uppercase">Nombre d'utilisateurs
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="mb-0 mr-3 text-gray-800 h5 font-weight-bold">{{ CountableDataService::countUser() }}</div>
                                </div>
                                <div class="col">
                                    <div class="mr-2 progress progress-sm">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-clipboard-list fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="mb-4 col-xl-3 col-md-6">
            <div class="py-2 shadow card border-left-warning h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="mr-2 col">
                            <div class="mb-1 text-xs font-weight-bold text-warning text-uppercase">
                                Nombres de clients</div>
                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ CountableDataService::countClients() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-comments fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Row -->
    {{-- @dd($productsDashboard) --}}
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="mb-4 shadow card">
                <!-- Card Header - Dropdown -->
                <div class="flex-row py-3 card-header d-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"></h6>
                    @if (session()->get('customer_id'))
                       @isset($productsDashboard[0])
                        <div>
                            <a href="{{ route('invoice.create', ['id' => $productsDashboard[0]["id"]]) }}" class="btn btn-success text-white m-2">Imprimer<i class="fa fa-print p-2"
                                    aria-hidden="true"></i></a>
                            <a type="button" wire:click.prevent="confirm({{ $productsDashboard[0]->id }})" class="btn btn-danger text-white">Confirmer<i class="fas fa-file-pdf p-2"></i></a>
                        </div>
                    @endisset
                    @endif
                    <div class="dropdown no-arrow">
                        <a href="#" role="button" data-toggle="modal" data-target="#product">
                            <button class="btn btn-primary text-white"><i class="fa fa-plus" aria-hidden="true"></i>
                                ajouter un produit</button>
                        </a>

                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>N.</th>
                                    <th>nom</th>
                                    <th>couleur</th>
                                    <th>actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @empty($productsDashboard)
                                    Aucunne donnee
                                @else
                                    @isset($productsDashboard[0]['products'])
                                        @foreach ($productsDashboard[0]['products'] as $key => $product)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->description }}</td>

                                                <td>-n
                                                    <a href=""></a>

                                                    <button type="submit" wire:click =""
                                                        class="btn btn-danger p1 text-white">X</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endisset

                                @endempty
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
    {{-- <livewire:create-order-list @saved="$refresh"> --}}
        {{-- modal create product --}}
            <div wire:ignore.self class="modal fade" id="product" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un article?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="post" action="">
                        <div class="form-group">
                            <label for=""></label>
                            <input type="text" wire:model="name" class="form-control" name="" id=""
                                aria-describedby="helpId" value="">
                            <small id="helpId" class="form-text text-muted">nom de l'article</small>
                        </div>
                        <div class="form-group">
                            <label for=""></label>
                            <input type="text" wire:model="description" class="form-control" name="" id=""
                                aria-describedby="helpId" value="">
                            <small id="helpId" class="form-text text-muted">couleur</small>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                    <button class="btn btn-primary" type="submit" wire:click.prevent="store()" >Creer</button>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal --}}

    {{-- modal search --}}
        <div wire:ignore.self class="modal fade" id="customer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Creer une commande?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="mt-4 mb-4">
                        <input type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="rechercher une chambre..">
                    </div>
                    <div class="table-responsive">

                        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>nom</th>
                                    <th>chambre</th>
                                    <th>actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @empty($records)
                                    Aucunne donnee
                                @else
                                    @foreach ($records as $key => $record)
                                        <tr>

                                            <td>{{ $record->name }}</td>
                                            <td>{{ $record->room_name }}</td>

                                            <td>
                                                <button class="btn btn-success p1 text-white"
                                                    wire:click ="orderInit({{ $record->id }})">selectioner</button>
                                            </td>
                                        </tr>
                                    @endforeach

                                @endempty
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
