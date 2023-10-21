    <div class="row">
        <div class="col-12 col-sm-5 col-lg-5">
            <h4>No kartu. <code> <u>{{ $noKartu ?? ''}} </u> </code></h4>
            <ul class="nav nav-pills" id="myTab3" role="tablist">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('rujukan/biodata*') ? 'active' : ''}}" href="{{ route('rujukan.biodata', $noKartu)}}">Biodata</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('rujukan/list*') ? 'active' : ''}}" href="{{ route('rujukan.list', $noKartu)}}">Rujukan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3" role="tab" aria-controls="contact" aria-selected="false">History</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent2">
                <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                    {{ $slot}}
                </div>
            </div>
            {{-- <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                </div>
            </div> --}}
        </div>
    </div>
