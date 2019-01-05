
        <section>
            <div>
                <div class="background-holder overlay" style="background-image:url(<?php echo base_url() ?>front_assets/images/background-2.jpg);background-position: center bottom;"></div>
                <!--/.background-holder-->
                <div class="container">
                    <div class="row pt-6" data-inertia='{"weight":1.5}'>
                        <div class="col-md-8 px-md-0 color-white" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                            <div class="overflow-hidden">
                                <h1 class="color-white fs-4 fs-md-5 mb-0 zopacity" data-zanim='{"delay":0}'>Clients</h1>
                                <div class="nav zopacity" aria-label="breadcrumb" role="navigation" data-zanim='{"delay":0.1}'>
                                    <ol class="breadcrumb fs-1 pl-0 fw-700">
                                        <li class="breadcrumb-item"><a class="color-white" href="#">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Clients</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/.row-->
            </div>
            <!--/.container-->
        </section>
        <section class="background-11 text-center">
            <div class="container">
                <div class="row">
                <?php foreach ($clients as $client): ?>
                    <div class="col-sm-6 col-lg-4">
                        <div class="background-white pb-4 h-100 radius-secondary"><img class="mb-4 radius-tr-secondary radius-tl-secondary" src="<?php echo base_url() ?><?php echo $client["image"] ?>" alt="Profile Picture" />
                            <div class="px-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                                <div class="overflow-hidden">
                                    <h5 data-zanim='{"delay":0}'><?php echo $client["Client_Name"] ?></h5>
                                </div>
                                <div class="overflow-hidden">
                                    <h6 class="fw-400 color-7" data-zanim='{"delay":0.1}'>Short Description</h6>
                                </div>
                                <div class="overflow-hidden">
                                    <p class="py-3 mb-0" data-zanim='{"delay":0.2}'><?php echo $client["Short_Description"] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                    
                   
                </div>
                <!--/.row-->
            </div>
            <!--/.container-->
        </section>