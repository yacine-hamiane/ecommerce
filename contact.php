<?php 
    include 'files/header.php';
    include 'files/navbar.php';
     ?>


    <!-- Start Content Page -->
    <div class="container-fluid bg-light py-5">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1"><?= lang('contactus'); ?></h1>
            <p>
                <?= lang('text_contact'); ?>.
            </p>
        </div>
    </div>

    <!-- Start Map -->
    <div id="mapid" style="width: 100%; height: 300px;" class="d-none"></div>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <script>
        var mymap = L.map('mapid').setView([-23.013104, -43.394365, 13], 13);

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            maxZoom: 18,
            attribution: 'Zay Telmplte | Template Design by <a href="https://templatemo.com/">Templatemo</a> | Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1
        }).addTo(mymap);

        L.marker([-23.013104, -43.394365, 13]).addTo(mymap)
            .bindPopup("<b>Zay</b> eCommerce Template<br />Location.").openPopup();

        mymap.scrollWheelZoom.disable();
        mymap.touchZoom.disable();
    </script>
    <!-- Ena Map -->

    <!-- Start Contact -->
    <div class="container py-5">
        <div class="row py-5">
            <form class="col-md-9 m-auto" method="post" role="form">
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputname"><?= lang('label_name'); ?> </label>
                        <input type="text" class="form-control mt-1" id="name" name="name" placeholder="<?= lang('placeholder_name'); ?>">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputemail"><?= lang('label_email'); ?></label>
                        <input type="email" class="form-control mt-1" id="email" name="email" placeholder="<?= lang('placeholder_email'); ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputsubject"><?= lang('label_sujet'); ?></label>
                    <input type="text" class="form-control mt-1" id="subject" name="subject" placeholder="<?= lang('placeholder_sujet'); ?>">
                </div>
                <div class="mb-3">
                    <label for="inputmessage"><?= lang('msg'); ?></label>
                    <textarea class="form-control mt-1" id="message" name="message" placeholder="<?= lang('msg'); ?>" rows="8"></textarea>
                </div>
                <div class="row">
                    <div class="col text-end mt-2">
                        <button type="submit" class="btn btn-success btn-lg px-3" name="contact"><?= lang('btn_concact'); ?></button>
                    </div>
                </div>
            </form>

            <?php 

            if (isset($_POST['contact'])) {
                # code...
                $name = $_POST['name'];
                $mail = $_POST['email'];
                $sujet= $_POST['subject'];
                $msg  = $_POST['message'];

                $sql = "INSERT INTO contact (nom,email,sujet,message) VALUES ('$name','$mail','$sujet','$msg') ";
                $query = mysqli_query($con,$sql);

                if ($query) {
                    # code...
                    echo '<div class="alert alert-success" role="alert">votre message a été envoyé avec succés .</div>';
                }else{
                    echo '<div class="alert alert-danger" role="alert">echec veuillez réessayez.</div>';
                }
            }

             ?>
        </div>
    </div>
    <!-- End Contact -->


  <?php 
    include 'files/footer.php';
    //ob_end_flush();
     ?>