<style>
    .rated:not(:checked)>label {
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ccc;
    }

    .rate:not(:checked)>label:before {
        content: '★ ';
    }

    .star-rating-complete {
        color: #c59b08;
    }

    .rating-container .form-control:hover,
    .rating-container .form-control:focus {
        background: #fff;
        border: 1px solid #ced4da;
    }

    .rating-container textarea:focus,
    .rating-container input:focus {
        color: #000;
    }

    .rated {
        height: 46px;
        padding: 0 10px;
    }

    .rated:not(:checked)>label {
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ffc700;
    }

    .rated:not(:checked)>label:before {
        content: '★ ';
    }
</style>
<!-- Testimonial Start -->
<div class="container-fluid bg-primary bg-testimonial py-5 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: 40px;">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="owl-carousel testimonial-carousel rounded p-5 wow zoomIn" data-wow-delay="0.6s">
                    @foreach ($ulasan as $u)
                        @if ($u->status == 'selesai')
                            <div class="testimonial-item text-center text-white">
                                <img class="img-fluid mx-auto rounded mb-4" src="{{ asset('storage/' . $u->us->foto) }}"
                                    alt="">
                                <h4 class="text-white mb-0">{{ $u->us->name }}</h4>
                                <div class="rated">
                                    @for ($i = 1; $i <= $u->ul->rating; $i++)
                                        <label class="star-rating-complete" title="text">{{ $i }}
                                            stars</label>
                                    @endfor
                                </div>
                                <hr class="mx-auto w-25">
                                <p class="fs-5">{{ $u->ul->ulasan }}</p>
                            </div>
                        @else
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Testimonial End -->
