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
    .text-small {
      font-size: 11px; /* 원하는 크기로 조정 */
    }

    .custom-checkbox-container {
      display: flex;
      align-items: center;
    }
    
    .custom-checkbox {
      width: 20px;
      height: 20px;
      border: 2px solid black;
      background-color: white;
      appearance: none;
      -webkit-appearance: none;
      -moz-appearance: none;
      border-radius: 0; /* 사각형 유지 */
      position: relative;
      cursor: pointer;
      margin-right: 8px; /* 체크박스와 글씨 사이 간격 */
    }
    
    .custom-checkbox:checked {
      background-color: white;
      border-color: gray; /* 체크했을 때 테두리 색상 회색으로 변경 */
    }
    
    .custom-checkbox:checked::after {
      content: "";
      position: absolute;
      top: 2px;
      left: 6px;
      width: 5px;
      height: 10px;
      border: solid black;
      border-width: 0 2px 2px 0;
      transform: rotate(45deg);
    }

    a {
      color: black; /* 링크 색깔을 검은색으로 설정 */
      text-decoration: underline;
    }

    .custom-btn {
      background-color: #000; /* Black background */
      color: #fff; /* White text */
      border-radius: 0; /* Remove rounded corners to make the button rectangular */
      border: none; /* Remove any default border */
      padding: 10px; /* Add padding for a better look */
      text-transform: uppercase; /* Uppercase text for consistency */
      font-weight: bold; /* Bold text */
    }

    .custom-btn:hover {
      background-color: #333; /* Slightly lighter black on hover */
    }

    .custom-input {
      background-color: #f2f2f2; /* Light gray background */
      color: #000; /* Black text */
      border-radius: 0; /* Remove rounded corners to make the input rectangular */
      padding: 10px; /* Add padding for a better look */
      box-shadow: none; /* Remove any default shadow */
    }

    .custom-input:focus {
      background-color: #e6e6e6; /* Slightly darker gray on focus */
      border-color: #999; /* Darker border color on focus */
      outline: none; /* Remove default outline */
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
  </style>
</head>

<body>
  <div class="container-fluid">
    <?php include_once("layout/navbar.php")?>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
      <div class="card p-4 border-0" style="width: 26rem;">
        <h3 class="text-center text-uppercase mb-5">signup</h3>
        <form action="" method="post">
          <div class="mb-3">
            <label for="username" class="form-label">이름(닉네임) *</label>
            <input type="text" class="form-control custom-input" id="username" style="cursor: text;" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">이메일 주소 *</label>
            <input type="email" class="form-control custom-input" id="email" style="cursor: text;" required>
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">휴대폰 번호 *</label>
            <input type="text" class="form-control custom-input" id="phone" style="cursor: text;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">비밀번호 *</label>
            <input type="password" class="form-control custom-input" id="password" style="cursor: text;" required>
          </div>
          <div class="mb-3">
            <label for="password-verify" class="form-label">비밀번호 확인 *</label>
            <input type="text" class="form-control custom-input" id="password-verify" style="cursor: text;" required>
          </div>
          
          <div class="form-check custom-checkbox-container mt-5">
            <input class="form-check-input custom-checkbox" type="checkbox" id="agreeAll">
            <label class="form-check-label ms-2 pt-1" for="agreeAll">
              전체 동의
            </label>
          </div>

          <div class="form-check custom-checkbox-container mt-2">
            <input class="form-check-input custom-checkbox" type="checkbox" id="privacyAgree">
            <label class="form-check-label ms-2 pt-1" for="privacyAgree">
              <span class="text-small">필수</span> <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">이용약관</a>과
              <a href="#" data-bs-toggle="modal" data-bs-target="#privacyModal">개인정보처리방침</a>에 동의합니다
            </label>
          </div>

          <div class="form-check custom-checkbox-container mt-2">
            <input class="form-check-input custom-checkbox" type="checkbox" id="tripLetter">
            <label class="form-check-label ms-2 pt-1" for="tripLetter">
              <span class="text-small">필수</span> 트립레터를 구독합니다
            </label>
          </div>

          <div class="mt-5 d-grid">
            <button type="submit" class="btn custom-btn">가입하기</button>
          </div>
        </form>
      </div>

      <!-- 이용약관 모달 -->
      <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="termsModalLabel">이용약관</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <!-- 이용약관 내용을 여기에 추가 -->
              여기에 이용약관 내용이 들어갑니다.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
            </div>
          </div>
        </div>
      </div>

      <!-- 개인정보처리방침 모달 -->
      <div class="modal fade" id="privacyModal" tabindex="-1" aria-labelledby="privacyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="privacyModalLabel">개인정보처리방침</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <!-- 개인정보처리방침 내용을 여기에 추가 -->
              여기에 개인정보처리방침 내용이 들어갑니다.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include_once("layout/footer_company_info.php")?>

    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
  </body>

</html>
