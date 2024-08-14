<?php include_once("layout/header.php")?>
<body>
  <div class="container-fluid">
    <nav class="navbar navbar-expand-md bg-body mt-3 py-3" style="height: 50px;">
      <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#" style="margin: 0px -50px 0px 0px;">
          <img src="assets/img/tripperLogo.png" style="width: 88px;height: 28px;">
        </a>
        <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-4">
          <span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse flex-grow-0 order-md-first" id="navcol-4">
          <ul class="navbar-nav me-auto">
            <li class="nav-item"><a class="nav-link active" href="#">Menu</a></li>
            <li class="nav-item"></li>
          </ul>
          <div class="d-md-none my-2">
            <button class="btn btn-light me-2" type="button">Button</button>
            <button class="btn btn-primary" type="button">Button</button>
          </div>
        </div>
        <div class="d-none d-md-block">
          <ul class="navbar-nav ms-auto" style="width: 120px;margin: 0px;">
            <li class="nav-item me-5">
              <div class="input-group border-secondary border-0 border-bottom"></div>
            </li>
            <li class="nav-item mx-1"><a class="nav-link" href="#"><i class="fas fa-search text-dark" style="width: 22px;height: 22px;text-align: center;"></i></a></li>
            <li class="nav-item mx-1"><a class="nav-link" href="#" style="padding: 8px;"><i class="far fa-user" style="width: 22px;height: 22px;text-align: center;"></i></a></li>
            <li class="nav-item mx-1"></li>
            <li class="nav-item mx-1"></li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Slider main container -->
    <div class="mt-2 swiper swiper-main">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">
        <!-- Slides -->
        <?php foreach($mt_banners as $list): ?>
        <div class="swiper-slide">
          <img class="w-100 d-block fixed-size" src="<?php echo get_banner_upload_path() . $list['filename']; ?>" alt="Slide Image" />
        </div>
        <?php endforeach; ?>
      </div>

      <!-- If we need navigation buttons -->
      <div class="swiper-button-prev swiper-main-prev"></div>
      <div class="swiper-button-next swiper-main-next"></div>

      <!-- If we need pagination -->
      <div class="swiper-pagination swiper-main-pagination"></div>
    </div>

    <div class="centered-text-container">
      <div class="centered-text">크리에이터 추천 공간</div>
    </div>
    

    <!-- Slider main container -->
    <div class="mt-5 w-95 swiper creator-swiper">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">
        <!-- Slides -->
        <?php foreach($article_creator as $list): ?>
        <div class="swiper-slide">
          <div class="card">
            <img src="<?php echo get_article_upload_path() . $list['thumbnail']; ?>" class="card-img-top" alt="Card Image">
            <div class="card-body">
              <h6 class="card-title"><?php echo $list['name']; ?></h6>
              <h4 class="card-title"><?php echo $list['title']; ?></h4>
              <p class="card-text"><?php echo strip_tags($list['content']); ?></p>
              <div class="badge-container">
                <?php 
                  $tags = explode("#", $list['tag']);
                  for($i = 1; $i < count($tags); $i++): 
                ?>
                  <h6><span class="badge bg-secondary"><?php echo $tags[$i]; ?></span></h6>
                <?php endfor; ?>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <!-- If we need pagination -->
      <!-- <div class="swiper-pagination creator-pagination"></div> -->
    </div>


    <!-- Slider main container -->
    <div class="mt-8 swiper swiper-main2">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">
        <!-- Slides -->
        <?php foreach($mb_banners as $list): ?>
        <div class="swiper-slide">
          <img class="w-100 d-block fixed-size" src="<?php echo get_banner_upload_path() . $list['filename']; ?>" alt="Slide Image" />
        </div>
        <?php endforeach; ?>
      </div>

      <!-- If we need navigation buttons -->
      <div class="swiper-button-prev swiper-main-prev2"></div>
      <div class="swiper-button-next swiper-main-next2"></div>

      <!-- If we need pagination -->
      <div class="swiper-pagination swiper-main-pagination2"></div>
    </div>

    <div class="centered-text-container">
      <div class="centered-text">이번 주 우리동네</div>
    </div>
    

    <!-- Slider main container -->
    <div class="mt-5 w-95 swiper dongnae-swiper">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">
        <!-- Slides -->
        <?php foreach($article_dongnae as $list): ?>
        <div class="swiper-slide">
          <div class="card">
            <img src="<?php echo get_article_upload_path() . $list['thumbnail']; ?>" class="card-img-top" alt="Card Image">
            <div class="card-body">
              <h6 class="card-title"><?php echo $list['name']; ?></h6>
              <h4 class="card-title"><?php echo $list['title']; ?></h4>
              <p class="card-text"><?php echo strip_tags($list['content']); ?></p>
              <div class="badge-container">
                <?php 
                  $tags = explode("#", $list['tag']);
                  for($i = 1; $i < count($tags); $i++): 
                ?>
                  <h6><span class="badge bg-secondary"><?php echo $tags[$i]; ?></span></h6>
                <?php endfor; ?>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <!-- If we need pagination -->
      <!-- <div class="swiper-pagination dongnae-pagination"></div> -->
    </div>

    <div class="mt-8 swiper swiper-find-item">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">
        <!-- Slides -->
        <div class="swiper-slide row gy-4 gy-md-0">
          <div class="col-md-6">
            <div class="p-xl-5 m-xl-5">
              <img src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" alt="" class="rounded img-fluid w-100 fit-cover" style="min-height: 300px;">
            </div>
          </div>
          <div class="col-md-6 d-md-flex align-items-md-center">
            <div style="max-width: 350px;">
              <h2 class="text-uppercase fw-bold">Biben dum <br /> fringi dictum, augue purus </h2>
              <p class="my-3">Tincidunt laoreet leo, adipiscing taciti tempor. Primis senectus sapien, risus donec ad fusce augue interdum.</p>
              <a href="" class="btn btn-primary btn-lg me-2">Button</a>
              <a href="" class="btn btn-outline-primary btn-lg">Button</a>
            </div>
          </div>
        </div>

        <div class="swiper-slide row gy-4 gy-md-0">
          <div class="col-md-6">
            <div class="p-xl-5 m-xl-5">
              <img src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" alt="" class="rounded img-fluid w-100 fit-cover" style="min-height: 300px;">
            </div>
          </div>
          <div class="col-md-6 d-md-flex align-items-md-center">
            <div style="max-width: 350px;">
              <h2 class="text-uppercase fw-bold">Biben dum <br /> fringi dictum, augue purus </h2>
              <p class="my-3">Tincidunt laoreet leo, adipiscing taciti tempor. Primis senectus sapien, risus donec ad fusce augue interdum.</p>
              <a href="" class="btn btn-primary btn-lg me-2">Button</a>
              <a href="" class="btn btn-outline-primary btn-lg">Button</a>
            </div>
          </div>
        </div>

        <div class="swiper-slide row gy-4 gy-md-0">
          <div class="col-md-6">
            <div class="p-xl-5 m-xl-5">
              <img src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" alt="" class="rounded img-fluid w-100 fit-cover" style="min-height: 300px;">
            </div>
          </div>
          <div class="col-md-6 d-md-flex align-items-md-center">
            <div style="max-width: 350px;">
              <h2 class="text-uppercase fw-bold">Biben dum <br /> fringi dictum, augue purus </h2>
              <p class="my-3">Tincidunt laoreet leo, adipiscing taciti tempor. Primis senectus sapien, risus donec ad fusce augue interdum.</p>
              <a href="" class="btn btn-primary btn-lg me-2">Button</a>
              <a href="" class="btn btn-outline-primary btn-lg">Button</a>
            </div>
          </div>
        </div>

        <div class="swiper-slide row gy-4 gy-md-0">
          <div class="col-md-6">
            <div class="p-xl-5 m-xl-5">
              <img src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" alt="" class="rounded img-fluid w-100 fit-cover" style="min-height: 300px;">
            </div>
          </div>
          <div class="col-md-6 d-md-flex align-items-md-center">
            <div style="max-width: 350px;">
              <h2 class="text-uppercase fw-bold">Biben dum <br /> fringi dictum, augue purus </h2>
              <p class="my-3">Tincidunt laoreet leo, adipiscing taciti tempor. Primis senectus sapien, risus donec ad fusce augue interdum.</p>
              <a href="" class="btn btn-primary btn-lg me-2">Button</a>
              <a href="" class="btn btn-outline-primary btn-lg">Button</a>
            </div>
          </div>
        </div>
      </div>

      <!-- If we need navigation buttons -->
      <div class="swiper-button-prev swiper-find-item-prev"></div>
      <div class="swiper-button-next swiper-find-item-next"></div>

      <!-- If we need pagination -->
      <!-- <div class="swiper-pagination swiper-find-item-pagination"></div> -->
    </div>

    <div class="container">
      <img src="assets/img/tripletter.png" alt="Trip Letter Image" class="img-fluid d-block mx-auto">
    </div>

    <?php include_once("layout/footer_company_info.php")?>

    <script src="assets/js/swiper.js"></script>
    <script>
      let swiperMain = new Swiper('.swiper-main', {
        direction: 'horizontal',
        loop: true,
        pagination: {
          el: '.swiper-main-pagination',
        },
        navigation: {
          nextEl: '.swiper-main-next',
          prevEl: '.swiper-main-prev',
        },
      });

      let creatorSwiper = new Swiper('.creator-swiper', {
        slidesPerView: 2,
        spaceBetween: 20,
        loop: true,
        pagination: {
          el: '.creator-pagination',
          clickable: true,
        },
        breakpoints: {
          768: {
            slidesPerView: 4,
            spaceBetween: 10,
          },
          576: {
            slidesPerView: 2,
            spaceBetween: 5,
          }
        }
      });

      let swiperMain2 = new Swiper('.swiper-main2', {
        direction: 'horizontal',
        loop: true,
        pagination: {
          el: '.swiper-main-pagination2',
        },
        navigation: {
          nextEl: '.swiper-main-next2',
          prevEl: '.swiper-main-prev2',
        },
      });

      let dongnaeSwiper = new Swiper('.dongnae-swiper', {
        slidesPerView: 2,
        spaceBetween: 20,
        loop: true,
        pagination: {
          el: '.dongnae-pagination',
          clickable: true,
        },
        breakpoints: {
          768: {
            slidesPerView: 4,
            spaceBetween: 10,
          },
          576: {
            slidesPerView: 2,
            spaceBetween: 5,
          }
        }
      });

      let swiperFindItem = new Swiper('.swiper-find-item', {
        slidesPerView: 1, // 한 번에 보여줄 슬라이드 수
        spaceBetween: 30, // 슬라이드 간의 간격
        loop: true, // 무한 루프
        direction: 'horizontal',
        loop: true,
        pagination: {
          el: '.swiper-find-item-pagination',
        },
        navigation: {
          nextEl: '.swiper-find-item-next',
          prevEl: '.swiper-find-item-prev',
        },
      });
    </script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  </body>

</html>