<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ $breadcrumb->title ?? 'Judul Halaman' }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    @if(isset($breadcrumb->list) && is_iterable($breadcrumb->list))
                        @foreach($breadcrumb->list as $key => $value)
                            <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}">
                                {{ $value }}
                            </li>
                        @endforeach
                    @endif
                </ol>
            </div>
        </div>
    </div>
</section>
