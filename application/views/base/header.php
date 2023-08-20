<!DOCTYPE html>
<html>

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="shortcut icon" href="<?php echo base_url(); ?>Imagenes/gto.ico">
     <nav class="navbar navbar-light" style="background-color:#00009F ;">
          <a class="navbar-brand ml-auto mr-auto" href="#">
               <img src="<?php echo base_url(); ?>Imagenes/Logo_ventana.png" width="50" height="50" alt="">
          </a>
     </nav>
     <title>Sistema de Trayectorias</title>
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Baloo+2&display=swap" rel="stylesheet">

     <link href="<?= base_url() ?>libs/fontawesome/css/fontawesome.css" rel="stylesheet">
     <link href="<?= base_url() ?>libs/fontawesome/css/brands.css" rel="stylesheet">
     <link href="<?= base_url() ?>libs/fontawesome/css/solid.css" rel="stylesheet">
     <link rel="stylesheet" media="screen" href="<?= base_url() ?>style/style.css">
     <link rel="stylesheet" media="screen" href="<?= base_url() ?>style/sfia.css">

     <!-- Swiper agregado el 3/7/2023  -->
     <!-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>  -->
     <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/> -->


     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

     <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet" />
     <link href="https://cdn.datatables.net/v/bs4-4.6.0/jq-3.6.0/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/date-1.4.1/fc-4.2.2/r-2.4.1/sc-2.1.1/sb-1.4.2/sl-1.6.2/datatables.min.css" rel="stylesheet" />


     <link href="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/css/lightbox.min.css" rel="stylesheet">

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css">
     
     <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     
     
     <script src="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/js/lightbox.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
     <script src="https://cdn.datatables.net/v/bs4-4.6.0/jq-3.6.0/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/date-1.4.1/fc-4.2.2/r-2.4.1/sc-2.1.1/sb-1.4.2/sl-1.6.2/datatables.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

     <script src="https://cdn.jsdelivr.net/npm/bubbly-bg@1.0.0/dist/bubbly-bg.js"></script>
     <!-- Asegúrate de incluir la hoja de estilos animate.css -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Baloo+2&display=swap" rel="stylesheet">
     

</head>

<body>
     <div class="wrapper">
          <!-- GTranslate: https://gtranslate.io/ -->
          <div id="google_translate_element2"></div>

          <!-- HEADER -->
          <header class="masthead" role="banner">
               <!-- Top bar -->
               <div class="top-bar">
                    <div class="container">
                         <div class="row">
                              <!-- CONTACT -->
                              <div class="hidden-xs col-sm-6">
                                   <ul class="contact-options">

                                        <li class="phone">
                                             <a href="http://sgo.juventudesgto.com/Directorio/Directorio.html" title="Contacto" target="_blank"> 477 710 34 00</a>

                                        </li>

                                        <div class="rro"></div>
                                        <li class="phone">
                                             <a href="http://sgo.juventudesgto.com/Directorio/Directorio.html" title="Contacto" target="_blank">DIRECTORIO</a>
                                        </li>

                                   </ul>
                              </div>
                              <!-- /CONTACT -->
                              <!-- SOCIAL -->
                              <div class="col-xs-12 col-sm-6">
                                   <div class="social xs-center">

                                        <a href="https://www.instagram.com/juventudgto/" title="Instagram" target="_blank"><span class="fab fa-instagram"></span></a>
                                        <a href="https://www.facebook.com/JuventudEsGto" title="Facebook" target="_blank"><span class="fab fa-facebook-square"></span></a>
                                        <a href="https://twitter.com/JuventudEsGto" title="Twitter" target="_blank"><span class="fab fa-twitter"></span></a>
                                        <a href="https://www.youtube.com/channel/UCNxjn155hP-SHqu1m4C4w4w" title="YouTube" target="_blank"><span class="fab fa-youtube"></span></a>
                                        <a href="https://www.tiktok.com/@juventudesgto?_d=secCgYIASAHKAESMgowwNecevOXTNFs1MrRbUWyACd%2F8VbwjJSj7X0VbtSgMB8Hk6CSAz4JM6iFy3fkAhmMGgA%3D&language=es&sec_uid=MS4wLjABAAAAIvg_1QW5XcHcnWaU215krcSoYRS32VH140AvOjufnSdAgfinJVU1lo4yH5UGZANK&sec_user_id=MS4wLjABAAAAIvg_1QW5XcHcnWaU215krcSoYRS32VH140AvOjufnSdAgfinJVU1lo4yH5UGZANK&share_app_id=1233&share_author_id=6902169995460314113&share_link_id=1ef3c474-ff07-49b6-9446-456a68e369d6&timestamp=1625587897&u_code=dfm08lg625c7a6&user_id=6902169995460314113&utm_campaign=client_share&utm_medium=android&utm_source=whatsapp&source=h5_m&_r=1" title="TikTok" target="_blank"><span class="fab fa-tiktok"></span></a>
                                        <div class="rro lnh"></div>
                                   </div>
                              </div>
                              <!-- /SOCIAL -->
                         </div>
                    </div>
               </div>

          </header> 
          <!-- <br><br><br> -->
          <!-- Search field -->
          <div class="modal search fade" id="modal_search" tabindex="-1" role="dialog">
               <div class="modal-dialog" role="document">
                    <div class="modal-body">
                         <form action="javascript:RedireccionaBuscador()">
                              <input type="text" class="search-field" id="txtSearch" placeholder="Buscar" value="">
                              <button type="submit" style="display: none;">Buscar</button>
                         </form>
                    </div>
               </div>
          </div>
          <!-- /Search field -->


          <style>
               body {
                    background: #FFFFFF;
                    /* fallback for old browsers */
                    font-family: 'Baloo';
               }



               @keyframes bounceIn {
                    0% {
                         opacity: 0;
                         transform: scale(0.3);
                    }

                    50% {
                         opacity: 1;
                         transform: scale(1.05);
                    }

                    70% {
                         transform: scale(0.9);
                    }

                    100% {
                         transform: scale(1);
                    }
               }

               .bounce-in {
                    animation: bounceIn 1s;
               }

               a.gflag {
                    vertical-align: middle;
                    font-size: 32px;
                    padding: 1px 0;
                    background-repeat: no-repeat;
                    background-image: url(//gtranslate.net/flags/32.png);
               }

               a.gflag img {
                    border: 0;
               }

               a.gflag:hover {
                    background-image: url(//gtranslate.net/flags/32a.png);
               }

               #goog-gt-tt {
                    display: none !important;
               }

               .goog-te-banner-frame {
                    display: none !important;
               }

               .goog-te-menu-value:hover {
                    text-decoration: none !important;
               }

               body {
                    top: 0 !important;
               }

               #google_translate_element2 {
                    display: none !important;
               }
          </style>