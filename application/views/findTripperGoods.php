<!DOCTYPE html>
<html data-bs-theme="light" lang="ko">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>trippers</title>
  <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/fonts/fontawesome-all.min.css">
  <link rel="stylesheet" href="/assets/css/Navbar-Centered-Brand-icons.css">
  
  <link rel="stylesheet" href="/assets/css/styles.css">
  <link rel="stylesheet" href="/assets/css/swiper.css" />

  <style>
    a {
      color: black; /* 링크 색깔을 검은색으로 설정 */
      text-decoration: underline;
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

    .custom-btn2 {
      border: none; /* 테두리 없애기 */
      background: none; /* 배경색 없애기 */
      padding: 0; /* 버튼의 여백 제거 */
    }

    .custom-btn {
      background-color: #000; /* Black background */
      color: #fff; /* White text */
      border-radius: 0; /* Remove rounded corners to make the button rectangular */
      border: none; /* Remove any default border */
      width: 160px;
      padding: 10px; /* Add padding for a better look */
      text-transform: uppercase; /* Uppercase text for consistency */
      font-weight: bold; /* Bold text */
    }

    .custom-btn:hover {
      background-color: #333; /* Slightly lighter black on hover */
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
      align-items: start;
      padding: 0 !important;
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

    <div class="container" style="height: 700px; display: flex; justify-content: center; align-items: center; max-width: 90%;">
      <div class="row" style="width: 100%;">
        <div class="text-center mx-auto" style="width: 100%;">
          <div>
            <img src="/assets/img/findBanner.svg" alt="" class="mt-4 mb-4 img-fluid">
            <p class="text-center fs-5">
              일상 속 새로운 여행의 가치를 제공하는 크리에이터의 상품을
              <br />
              <span class="fw-bold">FIND POINT로 응모하세요</span>
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="d-flex justify-content-center align-items-center mt-5" style="background-color: #F5F5F5;">
      <div class="row w-100">
        <div class="col-md-6">
          <img src="/assets/img/findItem.png" alt="" class="rounded img-fluid w-100 fit-cover" style="min-height: 300px;">
        </div>
        <div class="col-md-6 d-md-flex align-items-md-center flex-start ps-5">
          <div style="max-width: 900px;">
            <h2 class="fw-bold">어텀제주 머모리퍼퓸</h2>
            <p class="my-3 lh-lg">
              제주에서의 소중한 추억들을 듬뿍 담은 향기로 만나보는 내 손 안에 작은 제주
              <br />
              제주를 닮은 향기로 나만의 공간을 채워보세요
            </p>
            <a href="" class="btn custom-btn btn-lg me-2">자세히보기</a>
          </div>
        </div>
      </div>
    </div>
    
    <div class="d-flex justify-content-center align-items-center mt-5" style="background-color: #F5F5F5;">
      <div class="row w-100">
        <div class="col-md-6">
          <img src="/assets/img/findItem.png" alt="" class="rounded img-fluid w-100 fit-cover" style="min-height: 300px;">
        </div>
        <div class="col-md-6 d-md-flex align-items-md-center flex-start ps-5">
          <div style="max-width: 900px;">
            <h2 class="fw-bold">어텀제주 머모리퍼퓸</h2>
            <p class="my-3 lh-lg">
              제주에서의 소중한 추억들을 듬뿍 담은 향기로 만나보는 내 손 안에 작은 제주
              <br />
              제주를 닮은 향기로 나만의 공간을 채워보세요
            </p>
            <a href="" class="btn custom-btn btn-lg me-2">자세히보기</a>
          </div>
        </div>
      </div>
    </div>
    
    <div class="d-flex justify-content-center align-items-center mt-5" style="background-color: #F5F5F5;">
      <div class="row w-100">
        <div class="col-md-6">
          <img src="/assets/img/findItem.png" alt="" class="rounded img-fluid w-100 fit-cover" style="min-height: 300px;">
        </div>
        <div class="col-md-6 d-md-flex align-items-md-center flex-start ps-5">
          <div style="max-width: 900px;">
            <h2 class="fw-bold">어텀제주 머모리퍼퓸</h2>
            <p class="my-3 lh-lg">
              제주에서의 소중한 추억들을 듬뿍 담은 향기로 만나보는 내 손 안에 작은 제주
              <br />
              제주를 닮은 향기로 나만의 공간을 채워보세요
            </p>
            <a href="" class="btn custom-btn btn-lg me-2">자세히보기</a>
          </div>
        </div>
      </div>
    </div>
    
    <div class="d-flex justify-content-center align-items-center mt-5" style="background-color: #F5F5F5;">
      <div class="row w-100">
        <div class="col-md-6">
          <img src="/assets/img/findItem.png" alt="" class="rounded img-fluid w-100 fit-cover" style="min-height: 300px;">
        </div>
        <div class="col-md-6 d-md-flex align-items-md-center flex-start ps-5">
          <div style="max-width: 900px;">
            <h2 class="fw-bold">어텀제주 머모리퍼퓸</h2>
            <p class="my-3 lh-lg">
              제주에서의 소중한 추억들을 듬뿍 담은 향기로 만나보는 내 손 안에 작은 제주
              <br />
              제주를 닮은 향기로 나만의 공간을 채워보세요
            </p>
            <a href="" class="btn custom-btn btn-lg me-2">자세히보기</a>
          </div>
        </div>
      </div>
    </div>
    
    <div class="d-flex justify-content-center align-items-center mt-6">
      <button type="button" class="custom-btn2">
        <img src="/assets/img/downArrow.svg" alt="" onclick="">
      </button>
    </div>

    <div class="d-flex justify-content-center align-items-center mt-6">
      <img src="/assets/img/tripperLounge.svg" alt="">
    </div>

    <div class="centered-text-container">
      <div class="centered-text">트리퍼가 만든 지역의 굿즈를 소개합니다</div>
    </div>

    <div class="container mt-6 w-95">
      <div class="row mb-5 g-4"> <!-- 행 사이 간격과 카드 사이 간격을 조정 -->
        <div class="col-md-4">
          <div class="card">
            <img src="/assets/img/tripperGoods.png" class="card-img-top" alt="Card Image">
            <div class="card-body mt-3">
              <h6 class="card-title"><span class="text-uppercase">find your namhae</span> | 다랭이마을 티셔츠</h6>
              <p class="card-text">
                <span class="me-2">30,000원</span> <!-- 판매 가격 -->
                <span class="text-muted text-decoration-line-through">50,000원</span> <!-- 원래 가격 -->
              </p>              
            </div>
          </div>
        </div>
    
        <div class="col-md-4">
          <div class="card">
            <img src="/assets/img/tripperGoods.png" class="card-img-top" alt="Card Image">
            <div class="card-body mt-3">
              <h6 class="card-title"><span class="text-uppercase">find your namhae</span> | 다랭이마을 티셔츠</h6>
              <p class="card-text">
                <span class="me-2">30,000원</span> <!-- 판매 가격 -->
                <span class="text-muted text-decoration-line-through">50,000원</span> <!-- 원래 가격 -->
              </p>              
            </div>
          </div>
        </div>
    
        <div class="col-md-4">
          <div class="card">
            <img src="/assets/img/tripperGoods.png" class="card-img-top" alt="Card Image">
            <div class="card-body mt-3">
              <h6 class="card-title"><span class="text-uppercase">find your namhae</span> | 다랭이마을 티셔츠</h6>
              <p class="card-text">
                <span class="me-2">30,000원</span> <!-- 판매 가격 -->
                <span class="text-muted text-decoration-line-through">50,000원</span> <!-- 원래 가격 -->
              </p>              
            </div>
          </div>
        </div>
      </div>
    
      <div class="row g-4"> <!-- 두 번째 행 카드 사이 간격 조정 -->
        <div class="col-md-4">
          <div class="card">
            <img src="/assets/img/tripperGoods.png" class="card-img-top" alt="Card Image">
            <div class="card-body mt-3">
              <h6 class="card-title"><span class="text-uppercase">find your namhae</span> | 다랭이마을 티셔츠</h6>
              <p class="card-text">
                <span class="me-2">30,000원</span> <!-- 판매 가격 -->
                <span class="text-muted text-decoration-line-through">50,000원</span> <!-- 원래 가격 -->
              </p>              
            </div>
          </div>
        </div>
    
        <div class="col-md-4">
          <div class="card">
            <img src="/assets/img/tripperGoods.png" class="card-img-top" alt="Card Image">
            <div class="card-body mt-3">
              <h6 class="card-title"><span class="text-uppercase">find your namhae</span> | 다랭이마을 티셔츠</h6>
              <p class="card-text">
                <span class="me-2">30,000원</span> <!-- 판매 가격 -->
                <span class="text-muted text-decoration-line-through">50,000원</span> <!-- 원래 가격 -->
              </p>              
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card">
            <img src="/assets/img/tripperGoods.png" class="card-img-top" alt="Card Image">
            <div class="card-body mt-3">
              <h6 class="card-title"><span class="text-uppercase">find your namhae</span> | 다랭이마을 티셔츠</h6>
              <p class="card-text">
                <span class="me-2">30,000원</span> <!-- 판매 가격 -->
                <span class="text-muted text-decoration-line-through">50,000원</span> <!-- 원래 가격 -->
              </p>              
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="d-flex justify-content-center align-items-center mt-6">
      <button type="button" class="custom-btn2">
        <img src="/assets/img/downArrow.svg" alt="" onclick="">
      </button>
    </div>

    <div class="container mt-8">
      <img src="/assets/img/tripletter.png" alt="Trip Letter Image" class="img-fluid d-block mx-auto">
    </div>
  </div>

  <?php include_once("layout/footer_company_info.php")?>
  
  <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
