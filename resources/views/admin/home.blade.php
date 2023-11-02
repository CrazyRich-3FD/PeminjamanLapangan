@extends('admin.index')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-6">
                            <!-- Customers Card -->
                            <div class="card info-card customers-card">
                                <div class="card-body">
                                    <h5 class="card-title">Customers <span>| Total</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{$user}} User</h6>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End Customers Card -->
                        </div>
                        <div class="col-6">
                            <!-- Sales Card -->
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Peminjaman <span>| Total</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-cart"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{$pinjam}} Peminjam</h6>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- End Sales Card -->
                        </div>
                    </div>
                    <!-- Reports -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Grafik Peminjaman <span>/Bulan</span></h5>

                                <!-- Line Chart -->
                                <div id="reportsChart"></div>

                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                      new ApexCharts(document.querySelector("#reportsChart"), {
                                        series: [{
                                          name: 'Terpinjam',
                                          data: {!!$data!!},
                                        },
                                        ],
                                        chart: {
                                          height: 350,
                                          type: 'area',
                                          toolbar: {
                                            show: false
                                          },
                                        },
                                        markers: {
                                          size: 5
                                        },
                                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
                                        fill: {
                                          type: "gradient",
                                          gradient: {
                                            shadeIntensity: 1,
                                            opacityFrom: 0.3,
                                            opacityTo: 0.4,
                                            stops: [0, 90, 100]
                                          }
                                        },
                                        dataLabels: {
                                          enabled: false
                                        },
                                        stroke: {
                                          curve: 'smooth',
                                          width: 3
                                        },
                                        xaxis: {
                                        //   type: 'datetime',
                                            // format: 'ddd';
                                          categories: {!!$label!!}
                                        },
                                        tooltip: {
                                          x: {
                                            // format: 'ddd'
                                          },
                                        }
                                      }).render();
                                    });
                                  </script>
                                <!-- End Line Chart -->

                            </div>

                        </div>
                    </div><!-- End Reports -->
                </div><!-- End Left side columns -->
                <!-- Right side columns -->
                <div class="col-lg-4">
                    <div class="col-12">
                        <!-- Website Traffic -->
                        <div class="card">
                            <div class="card-body pb-0">
                                <h5 class="card-title">Lapangan Favorit <span>| Bulan</span></h5>

                                <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        echarts.init(document.querySelector("#trafficChart")).setOption({
                                            tooltip: {
                                                trigger: 'item'
                                            },
                                            legend: {
                                                top: '5%',
                                                left: 'center'
                                            },
                                            series: [{
                                                name: 'Access From',
                                                type: 'pie',
                                                radius: ['40%', '70%'],
                                                avoidLabelOverlap: false,
                                                label: {
                                                    show: false,
                                                    position: 'center'
                                                },
                                                emphasis: {
                                                    label: {
                                                        show: true,
                                                        fontSize: '18',
                                                        fontWeight: 'bold'
                                                    }
                                                },
                                                labelLine: {
                                                    show: false
                                                },
                                                data: {!!$datas!!}
                                            }]
                                        });
                                    });
                                </script>

                            </div>
                        </div>
                        <!-- End Website Traffic -->
                    </div>
                    <div class="col-12">
                        <!-- Website Traffic -->
                        <div class="card">
                            <div class="card-body pb-0">
                                <h5 class="card-title">Jenis Lapangan</h5>

                                <div id="trafficChart1" style="min-height: 400px;" class="echart"></div>

                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        echarts.init(document.querySelector("#trafficChart1")).setOption({
                                            // tooltip: {
                                            //     trigger: 'item'
                                            // },
                                            legend: {
                                                top: '5%',
                                                left: 'center'
                                            },
                                            series: [{
                                                name: 'Access From',
                                                type: 'pie',
                                                radius: ['40%', '70%'],
                                                avoidLabelOverlap: false,
                                                label: {
                                                    show: false,
                                                    position: 'center'
                                                },
                                                emphasis: {
                                                    label: {
                                                        show: true,
                                                        fontSize: '18',
                                                        fontWeight: 'bold'
                                                    }
                                                },
                                                labelLine: {
                                                    show: false
                                                },
                                                data: [
                                                    @foreach ($jenis as $j) 
                                                        {
                                                            value: 1,
                                                            name: '{{ $j->jenis }}'
                                                        },
                                                    @endforeach
                                                ]
                                            }]
                                        });
                                    });
                                </script>

                            </div>
                        </div><!-- End Website Traffic -->
                    </div>
                </div><!-- End Right side columns -->
            </div>
        </section>

    </main><!-- End #main -->
@endsection
