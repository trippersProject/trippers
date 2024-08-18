<?php include_once("layout/header.php")?>
<style>
  a {
    color: black; /* 링크 색깔을 검은색으로 설정 */
    text-decoration: underline;
  }
  a:hover {
    color: darkgray; /* 마우스를 올렸을 때 색깔을 어두운 회색으로 변경 (선택 사항) */
  }

  .mt-8 { 
    margin-top: 8rem !important;
  }

  .mt-6 {
    margin-top: 5rem !important;
  }

  .logo-container {
    display: inline-block;
    text-align: center;
  }

  .logo-underline {
    height: 5px;
    width: 70px; /* Adjust the width as needed */
    background-color: #000; /* Black color for the underline */
    margin: 0 auto;
    margin-top: 8px; /* Adjust spacing between the image and the underline */
  }

  .logo-img {
    width: 70px; /* Adjust the width as needed */
    height: auto; /* Maintain aspect ratio */
    display: block;
    margin: 0 auto;
  }

  .fixed-size {
    width: 1400px;
    height: 800px;
    object-fit: cover;
  }

  .badge-container {
    display: flex;
    gap: 5px; /* 배지 간의 간격 조절 */
  }
  
  .badge-container h6 {
    margin: 0;
  }

  .centered-text-container {
    display: flex;
    justify-content: center; /* 가로 방향 중앙 정렬 */
    align-items: center; /* 세로 방향 중앙 정렬 */
    width: 100%;
    height: 100px; /* 높이 조정 */
    margin-top: 20px; /* 상단 여백 */
    position: relative; /* 부모 컨테이너에서 상대 위치 설정 */
  }

  .centered-text {
    text-align: center; /* 텍스트를 화면 중앙에 위치 */
    position: relative; /* 밑줄을 위한 상대 위치 지정 */
    display: inline-block; /* 텍스트 길이에 맞게 밑줄 적용 */
    margin: 0 auto; /* 중앙 정렬 */
    padding-bottom: 5px; /* 밑줄과 텍스트 간격 조정 */
    font-weight: 800;
    font-size: 24px;
  }
  
  .centered-text::after {
    content: ""; /* 가상 요소 생성 */
    display: block;
    width: 100%; /* 밑줄의 길이 */
    height: 4px; /* 밑줄의 두께 */
    background-color: black; /* 밑줄 색상 */
    position: absolute;
    bottom: 0;
    left: 0;
  }
  
  

  /* Swiper 카드 슬라이드 스타일 */
  .swiper-slide {
    display: flex;
    justify-content: center; /* 카드 가운데 정렬 */
    align-items: center; /* 카드 가운데 정렬 */
    padding: 10px; /* 카드 간격 조정 */
  }

  /* 카드 스타일 */
  .card {
    width: 100%;
    max-width: 23rem; /* 카드 최대 너비 */
    transition: transform 0.2s ease-in-out;
    border: none; /* 테두리 제거 */
    box-shadow: none; /* 그림자 제거 */
    text-align: center; /* 텍스트 중앙 정렬 */
  }

  /* 카드 이미지 */
  .card-img-top {
    width: 100%;
    height: auto;
  }

  /* 카드 내용 */
  .card-body {
    display: flex;
    flex-direction: column;
    align-items: center; /* 내용 중앙 정렬 */
    padding: 1rem;
  }
  
  .card img {
    margin: 0 auto; /* 이미지 중앙 정렬 */
  }

  @media (max-width: 768px) {
    .card {
      width: 14rem;
    }
  }

  @media (max-width: 576px) {
    .card {
      width: 12rem;
    }
  }
</style>

<body>
  <div class="container-fluid">
    <?php include_once("layout/navbar.php")?>

    <!-- Slider main container -->
    <div class="mt-2 swiper swiper-main">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">
        <!-- Slides -->
        <?php foreach($mt_banners as $list): ?>
        <div class="swiper-slide">
          <img class="w-100 d-block fixed-size" src="<?php echo get_banner_upload_path() . $list['filename_pc']; ?>" alt="Slide Image" />
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
          <div class="card" onclick="articleDetail()">
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
          <img class="w-100 d-block fixed-size" src="<?php echo get_banner_upload_path() . $list['filename_pc']; ?>" alt="Slide Image" />
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
          <div class="card" onclick="articleDetail()">
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
      function articleDetail() {
        location.href = "/main/articleDetail";
      }

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