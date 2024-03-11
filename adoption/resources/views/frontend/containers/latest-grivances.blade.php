<div class="container-fluid py-5 bg-hetauda">
    <div class="row justify-content-center">
        <div class="col-12 mb-4">
            <h3 class="text-center text-white mb-3">प्राप्त गुनासोहरु</h3>
            <p class="text-white text-center text-shadow">(सार्वजनिक गरिएका)</p>
        </div>
        <div class="col-12">
            <div class="row">
                @foreach($public_grivances as $grivance)
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12 p-5">
                        <div class="row">
                            <div class="col-12 bg-white p-4 rounded shadow text-center">
                                <div class="row">
                                    <div class="col-12">
                                        <p class="text-muted fw-bold small mb-0">गुनासोको प्रकृति</p>
                                        <p class="">{{$grivance->category->name}}</p>
                                    </div>
                                    <div class="col-12">
                                        <a class="btn bg-primary text-white" href="{{url('/gunaso/detail/'.$grivance->id)}}">हेर्नुहोस्</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
