<!DOCTYPE html>
<html lang="ko" data-bs-theme="light">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>trippers</title>

  <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/fonts/fontawesome-all.min.css">
  <link rel="stylesheet" href="/assets/css/Navbar-Centered-Brand-icons.css">

  <link rel="stylesheet" href="/assets/css/globals.css" />
  <link rel="stylesheet" href="/assets/css/styles.css">
  <link rel="stylesheet" href="/assets/css/swiper.css" />

  <style>
    .mt-8 {
      margin-top: 8rem !important;
    }
    
    .p-4 {
      padding: 4.5rem !important;
    }

    a {
      color: black; /* 링크 색깔을 검은색으로 설정 */
      text-decoration: underline;
    }
    a:hover {
      color: darkgray; /* 마우스를 올렸을 때 색깔을 어두운 회색으로 변경 (선택 사항) */
    }

    .hero-icon {
      list-style-type: none; /* 기본 목록 스타일 제거 */
      padding: 0; /* 패딩 제거 */
      margin: 0; /* 마진 제거 */
      display: flex; /* 수평 정렬 */
      justify-content: start;
      gap: 10px; /* 아이콘 간의 간격 설정 */
    }
    .hero-icon li {
      font-size: 24px; /* 아이콘 크기 조정 */
    }

    /* Swiper Container */
    .swiper-container {
      width: 100%;
      height: 70vh; /* Reduce height to 70% of the viewport height */
    }

    .swiper-wrapper {
      display: flex;
    }

    /* Swiper Slide */
    .swiper-slide {
      display: flex;
      justify-content: space-between;
      gap: 2%; /* Add gap between the images */
      width: 100%; /* Ensure slide takes full container width */
      box-sizing: border-box; /* Include padding and border in width/height */
    }

    /* Left Image - Full Height */
    .first-left-image {
      width: 50%;
      height: 95%;
      object-fit: cover;
    }

    /* Right Image - Slightly Smaller */
    .first-right-image {
      width: 50%;
      height: 85%; /* Reduce height slightly */
      object-fit: cover;
    }

    /* Left Image - Full Height */
    .second-left-image {
      width: 50%;
      height: 85%;
      object-fit: cover;
    }

    /* Right Image - Slightly Smaller */
    .second-right-image {
      width: 50%;
      height: 95%; /* Reduce height slightly */
      object-fit: cover;
    }

    /* Container for images to ensure they are on the same line */
    .sns-img-container {
      display: flex;
      align-items: center; /* Align images vertically in the middle */
      justify-content: center;
    }

    .img-icon {
      margin-right: 10px; /* Space between images */
    }

    /* Style badges */
    .badge-container {
      display: flex;
      justify-content: center; /* Center badges horizontally */
      flex-wrap: wrap; /* Wrap badges if needed */
      margin-top: 20px; /* Space above badges container */
    }

    .badge {
      display: inline-block;
      padding: 5px 10px;
      margin: 2px;
      background-color: #d0d0d0; /* Grey background */
      color: #000; /* Black text color */
      font-size: 14px;
      border: none; /* No border */
    }

    .creator-info {
      border-top: 2px solid #000;
      border-bottom: 2px solid #000;
      margin: 0;
      padding: 0;
    }

    .image-container {
      width: 300px; /* 원하는 크기로 설정 */
      height: 300px; /* 원하는 크기로 설정 */
      overflow: hidden; /* 이미지가 컨테이너를 넘어가지 않도록 설정 */
      border-radius: 50%; /* 동그라미 모양으로 만들기 위해 설정 */
    }
    
    .image-container img {
      width: 100%;
      height: 100%;
      object-fit: cover; /* 이미지를 컨테이너에 맞게 조정 */
    }    

    .mt-8 {
      margin-top: 8rem !important;
    }

    .mt-7 {
      margin-top: 6.5rem !important;
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

    .badge {
      display: inline-block;
      padding: 5px 10px;
      margin: 2px;
      background-color: #f0f0f0; /* Light grey background */
      border: 1px solid #ccc; /* Light grey border */
      border-radius: 4px; /* Slightly rounded corners, adjust as needed */
      font-size: 14px;
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
</head>

<body>
  <div class="container-fluid">
    <?php include_once("layout/navbar.php")?>

    <div class="mt-2">
      <div style="height: 600px; background-image: url(https://cdn.bootstrapstudio.io/placeholders/1400x800.png); background-position: center; background-size: cover;">
        <div class="container h-100">
          <div class="row h-100 align-items-center justify-content-center">
            <div class="col-md-6 text-center">
              <h1 class="fw-bold">‘아마도’라는 말로 일단 시작했어요</h1>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container mt-5 py-4 py-xl-5" style="max-width: 58% !important;">
      <div class="row gy-4 gy-md-0 creator-info">
        <div class="col-md-6">
          <div class="p-xl-5 m-xl-5">
            <div class="image-container">
              <img class="rounded-circle img-fluid" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" />
            </div>
          </div>
        </div>
        <div class="col-md-6 d-md-flex align-items-md-center">
          <div class="text-center" style="max-width: 500px;">
            <h6 class="fw-bold">아마도 책방</h6>
            <h4 class="fw-bold">책방지기 박수진</h4>
            
            <p class="my-3">
              오늘의 인터뷰 주인공은 바로 남해에서 마음가는대로 <br /> 멋지게 살아가고 있는 아마도 책방 박수진이야.
              <br /><br />
              평일엔 팜프라촌에서 일하고, 책도 쓰고, 서핑을 즐기는 멋진 여성이지.
              <br />
              시골에서 마음 가는대로 살게 된다면? 바로 이렇게 멋지게 살아보면 어떨까?
            </p>

            <div class="sns-img-container">
              <img src="/assets/img/Home.svg" alt="" class="img-icon">
              <img src="/assets/img/Instagram.svg" alt="" class="img-icon">
            </div>
            
            <div class="badge-container">
              <h6 class="badge">경남남해</h6>
              <h6 class="badge">크리에이터</h6>
              <h6 class="badge">책작가</h6>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-7">
        <h3>책방하려고 남해에 내려온 건 아니예요</h3>
        <p class="mt-3 lh-lg">
          서울에서 회사 생활을 한 3년 정도 짧게 했었는데 퇴사 이후에 뭘 해야 될지 조금 고민하는 시간을 1년 정도 가졌었어요. 속초에도 한 6개월 살아보면서 일을 병행했어요.
          근데 또 지치더라구요. 이번엔 '조금 더 따뜻한 곳으로 가자' 싶어서 여행 온 게 남해였는데 그때 남해의 풍경이 너무 아름다운 거예요.
          <br /><br />
          그 이후에 한 달 정도 짧게 여행을 하며 반복하다 보니 '이럴 거면 그냥 한번 살아보자'해서 내려오게 된 거였어요. 제가 보통 어딜가든 그 동네에 작은 책방들을 찾아서
          꼭 가보는 편인데 그 당시에만 해도 남해에 독립 서점이 안 나오는 거예요. 이렇게 좋은 곳이고 또 관광지인데 왜 없을까 하다가 '그럼 내가 한번 해볼까?' 라는
          생각이 들어서 시작하게 됐던 것 같아요.
        </p>
      </div>

      <!-- FIXME: 일단은 이미지 고정으로 사용. 반복해서 사용시 표시가 제대로 안되는 현상이 있음. -->
      <div class="mt-5 swiper-container">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <img src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" class="first-left-image" alt="Left Image">
            <img src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" class="first-right-image" alt="Right Image">
          </div>
          <!-- Add more slides as needed -->
        </div>
      </div>

      <div class="row mt-7">
        <h3>책이 나의 아이덴티티라고 생각했어요</h3>
        <p class="mt-3 lh-lg">
          1인으로 운영되는 서점이라서 어떤 특정한 책을 들여온다 하는 기준은 없는 거 같아요. 아무래도 제가 스스로 궁금해하고 좋아하는 작가의 책이나 새로 배우고 싶은 분야를 많이
          들여오는 거 같아요. 지난 입고된 책들의 목록을 쭉 보면 그때 그 시기에 제가 어떤 것에 관심을 기울였는지 알 수 있어요.
          <br /><br />
          그래서 애초에 책방을 해보자고 생각을 한 것도 책이 어떻게 보면 하나의 매개체니까 다양한 콘텐츠들을 담을 수 있겠다는 생각이 들어서 시작했던 거였어요. 처음에 저의 취향
          위주였다면 지금은 전보단 조금씩 더 많이 찾아주시고 하다 보니까 요새는 대중 혹은 여행 오신 여행객분들이 쉽게 읽을 수 있는 책들도 같이 두루두루 이렇게 입고를 하고 있는
          편이에요.
        </p>
      </div>

      <!-- FIXME: 일단은 이미지 고정으로 사용. 반복해서 사용시 표시가 제대로 안되는 현상이 있음. -->
      <div class="mt-5 swiper-container">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <img src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" class="second-left-image" alt="Left Image">
            <img src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" class="second-right-image" alt="Right Image">
          </div>
          <!-- Add more slides as needed -->
        </div>
      </div>

      <div class="row mt-7">
        <h3>제 서점의 하루 주인이 되어보세요</h3>
        <p class="mt-3 lh-lg">
          지금 남해에 온 지 8년 차인데 2년 차쯤 위기가 있었어요. 어쨌든 사람의 일이 계획대로 되는 게 아니다 보니까 고민을 하다가 재계약을 하게 됐고 남해에 더 남아있기로
          하면서 새로운 걸 시도해 보자! 싶어서 책방 체험 프로그램을 생각하게 되었어요. 물론 단골 손님들이나 저를 보기 위해서 와주시는 분들한테는 너무 죄송하지만 책방
          운영을 이어가기 위해서는 계속 다른 일들을 저는 병행해야 되거든요.
          <br /><br />
          그렇게 시작한 체험 프로그램이 반응이 좋았어요. 상대적으로 굉장히 적은 비용으로 책방을 하루 동안 체험을 해볼 수 있으니까요. 그리고 방문하시는 손님들도 원래는 닫혀 있는
          날인데 일일 지기 님이 계시면 책방이 열리니까 책방을 둘러볼 수 있어서 좋고요. 서로에게 좋은 게 되었죠.
        </p>
      </div>

      <div class="row mt-5">
        <div class="col-md-1 fw-bold">글</div>
        <div class="col-md-11">YES</div>
      </div>
      <div class="row mt-2">
        <div class="col-md-1 fw-bold">사진</div>
        <div class="col-md-11">트리퍼</div>
      </div>
      <div class="row mt-2">
        <div class="col-md-1 fw-bold">장소</div>
        <div class="col-md-11">아마도책방</div>
      </div>

      <ul class="mt-6 hero-icon">
        <li><img src="/assets/img/favorite.svg" alt=""></li>
        <li><img src="/assets/img/stars.svg" alt=""></li>
        <li><img src="/assets/img/upload.svg" alt=""></li>
      </ul>

      <div class="row mt-2">
        <p>
          위 버튼을 누르면 FIND POINT가 적립됩니다. <a href="#" class="fw-bold">FIND POINT란?</a>
        </p>
      </div>
    </div>

    <div style="background-color: lightgray;">
      <div class="row">
        <div class="col-md-5 text-end">
          <img class="rounded img-fluid w-50 fit-cover" src="/assets/img/bookstore.png" width="444" height="300" />
        </div>
        <div class="col-md-7 p-4 d-flex align-items-center">
          <div>
            <h5>트리퍼가 추천하는</h5>
            <h2 class="fw-bold mt-3">아마도책방 책방지기 체험</h2>
            <p class="my-3">트리퍼 플랫폼 통해 예약시 20% 할인된 금액에 만나실 수 있습니다</p>
            <a class="btn btn-dark btn-lg mt-7" role="button" href="#">신청하기</a>
          </div>
        </div>
      </div>
    </div>

    <div class="centered-text-container mt-8">
      <div class="centered-text">연관 콘텐츠</div>
    </div>
    

    <!-- Slider main container -->
    <div class="mt-5 w-95 swiper related-swiper">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">
        <!-- Slides -->
        <div class="swiper-slide">
          <div class="card">
            <!-- <img src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" class="card-img-top" alt="Card Image"> -->
            <img src="/assets/img/test1.png" class="card-img-top" alt="Card Image">
            <div class="card-body">
              <h6 class="card-title">DONGNAE</h6>
              <h4 class="card-title">딱 두 시간만 먹을 수 있는 식당.</h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <div class="badge-container">
                <h6><span class="badge">경남김해</span></h6>
                <h6><span class="badge">칼국수</span></h6>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="card">
            <!-- <img src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" class="card-img-top" alt="Card Image"> -->
            <img src="/assets/img/test2.png" class="card-img-top" alt="Card Image">
            <div class="card-body">
              <h6 class="card-title">DONGNAE</h6>
              <h4 class="card-title">딱 두 시간만 먹을 수 있는 식당.</h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <div class="badge-container">
                <h6><span class="badge">경남김해</span></h6>
                <h6><span class="badge">칼국수</span></h6>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="card">
            <!-- <img src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" class="card-img-top" alt="Card Image"> -->
            <img src="/assets/img/test3.png" class="card-img-top" alt="Card Image">
            <div class="card-body">
              <h6 class="card-title">DONGNAE</h6>
              <h4 class="card-title">딱 두 시간만 먹을 수 있는 식당.</h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <div class="badge-container">
                <h6><span class="badge">경남김해</span></h6>
                <h6><span class="badge">칼국수</span></h6>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="card">
            <!-- <img src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" class="card-img-top" alt="Card Image"> -->
            <img src="/assets/img/test4.png" class="card-img-top" alt="Card Image">
            <div class="card-body">
              <h6 class="card-title">DONGNAE</h6>
              <h4 class="card-title">딱 두 시간만 먹을 수 있는 식당.</h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <div class="badge-container">
                <h6><span class="badge">경남김해</span></h6>
                <h6><span class="badge">칼국수</span></h6>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="card">
            <!-- <img src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" class="card-img-top" alt="Card Image"> -->
            <img src="/assets/img/test1.png" class="card-img-top" alt="Card Image">
            <div class="card-body">
              <h6 class="card-title">DONGNAE</h6>
              <h4 class="card-title">딱 두 시간만 먹을 수 있는 식당.</h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <div class="badge-container">
                <h6><span class="badge">경남김해</span></h6>
                <h6><span class="badge">칼국수</span></h6>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="card">
            <!-- <img src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" class="card-img-top" alt="Card Image"> -->
            <img src="/assets/img/test2.png" class="card-img-top" alt="Card Image">
            <div class="card-body">
              <h5 class="card-title">DONGNAE</h5>
              <h4 class="card-title">딱 두 시간만 먹을 수 있는 식당.</h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <div class="badge-container">
                <h6><span class="badge">경남김해</span></h6>
                <h6><span class="badge">칼국수</span></h6>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- If we need pagination -->
      <!-- <div class="swiper-pagination related-pagination"></div> -->
    </div>
  </div>

  <?php include_once("layout/footer_company_info.php")?>

  <!-- 스크립트 위치를 body 태그 안으로 이동 -->
  <script src="/assets/js/swiper.js"></script>
  <script>
    const swiper = new Swiper('.swiper-container', {
      pagination: false, // Pagination disabled
      navigation: false, // Navigation arrows disabled
      slidesPerView: 1, // Show only one slide at a time
      spaceBetween: 0, // No space between slides
      loop: true, // Enable looping
      allowTouchMove: true, // Allow slide movement on touch
    });

    let relatedSwiper = new Swiper('.related-swiper', {
      slidesPerView: 2,
      spaceBetween: 20,
      loop: true,
      pagination: {
        el: '.related-pagination',
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
  </script>
  <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>