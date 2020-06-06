<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>{{ $title }}</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('salesman.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">____</a></li>
                {!! $links !!}
            </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
