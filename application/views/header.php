<!doctype html>
<html lang="ko">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <title>교통사고치료 지역 주치의 네트워크 하나카N</title>

  <!-- Search Engine -->
  <meta name="description" content="교통사고치료 지역 주치의 네트워크">
  <meta name="keywords" lang="ko" content="교통사고, 지역별주치의한의원, 교통하고휴유증, 한방치료">
  <meta name="author" content="하나카N">
  <meta name="image"
    content="<?php if($this->common->isSecure()) echo "https://".$_SERVER['HTTP_HOST']; else echo "http://".$_SERVER['HTTP_HOST'];?>/images/ogimage.jpg">
  <!-- Schema.org for Google -->
  <meta itemprop="name" content="하나카N">
  <meta itemprop="description" content="교통사고치료 지역 주치의 네트워크">
  <meta itemprop="image"
    content="<?php if($this->common->isSecure()) echo "https://".$_SERVER['HTTP_HOST']; else echo "http://".$_SERVER['HTTP_HOST'];?>/images/ogimage.jpg">
  <!-- Open Graph general (Facebook, Pinterest & Google+) -->
  <meta property="og:title" content="하나카N">
  <meta property="og:description" content="교통사고치료 지역 주치의 네트워크">
  <meta property="og:image"
    content="<?php if($this->common->isSecure()) echo "https://".$_SERVER['HTTP_HOST']; else echo "http://".$_SERVER['HTTP_HOST'];?>/images/ogimage.jpg">
  <meta property="og:url"
    content="<?php if($this->common->isSecure()) echo "https://".$_SERVER['HTTP_HOST']; else echo "http://".$_SERVER['HTTP_HOST'];?>">
  <meta property="og:site_name" content="하나카N">
  <meta property="og:locale" content="ko_KR">
  <meta property="og:type" content="website">

  <link rel="stylesheet" href="/css/swiper.css">
  <link rel="stylesheet" type="text/css" href="/css/style.css?v=2.0" />
  <script src="/js/swiper.js"></script>
  <script src="/js/jquery-3.3.1.js"></script>
  <script src="/js/common.js"></script>
</head>

<body>
  <div class="wrap">
    <!--s: 헤더-->
    <header>
      <div class="sm-header">
        <div class="container clearfx">
          <a href="#" class="icon menu-btn">메뉴</a>
          <h1><a href="/" class="icon logo">하나카N</a></h1>
          <nav class="gnb">
            <a href="javascript:void(0);" class="icon close-btn">닫기</a>
            <ul class="clearfx">
              <li>
                <a href="/beopmusa" class="oneD">내 지역 한의원 찾기</a>
              </li>
              <li>
                <a href="/insure" class="oneD">보험처리 절차</a>
              </li>
              <li>
                <a href="/care" class="oneD">교통사고 후유증 치료</a>
              </li>
              <li>
                <a href="/article" class="oneD">미디어N뉴스</a>
                <ul class="twoD">
                  <li><a href="/article">미디어속하나카N</a></li>
                  <li><a href="/notice">공지사항</a></li>
                </ul>
              </li>
              <li>
                <a href="/joinq" class="oneD">온라인 가입문의</a>
              </li>
            </ul>
          </nav>
          <div class="tel-btn clearfx">
            <h3>가맹문의</h3>
            <a href="tel:<?=$this->dinfo['manager']['tel_join']?>" class="icon tel">전화 상담</a>
            <a href="<?=$this->dinfo['manager']['kakaotok']?>" class="icon kakao" target="_blank">카톡 상담</a>
          </div>
        </div>
      </div>
      <div class="lg-header">
        <div class="container clearfx">
          <div class="copy">
            <span class="icon"></span>
            <p><strong>교통사고후유증치료?</strong>하나를 기억하면 건강이 보인다!</p>
          </div>
          <h1><a href="/" class="icon logo">하나카N</a></h1>
          <div class="tel-btn clearfx">
            <div class="number">
              <dl>
                <dt>가맹문의</dt>
                <dd><a href="tel:<?=$this->dinfo['manager']['tel_join']?>"><?=$this->dinfo['manager']['tel_join']?></a>
                </dd>
              </dl>
              <dl>
                <dt>빠른가입</dt>
                <dd><a
                    href="tel:<?=$this->dinfo['manager']['tel_quick']?>"><?=$this->dinfo['manager']['tel_quick']?></a>
                </dd>
              </dl>
            </div>
            <ul class="clearfx">
              <li><a href="<?=$this->dinfo['manager']['kakaotok']?>" class="kakao" target="_blank">카카오톡 가맹상담</a></li>
              <li class="sms-btn">
                <a href="javascript:void(0);" class="tel">SMS 가맹문의</a>
                <form action="/joinq/post" method="post">
                  <input type="hidden" name="hp_name" value="SMS문의" />
                  <div class="sms-wrap">
                    <ul>
                      <li>
                        <input type="text" placeholder="담당자명" name="jq_name" required />
                      </li>
                      <li>
                        <input type="tel" placeholder="연락처" name="tel" required />
                      </li>
                      <li>
                        <input type="email" placeholder="이메일" name="email" />
                      </li>
                      <li>
                        <input type="text" placeholder="입점희망지역" name="local" required />
                      </li>
                      <li>
                        <input type="checkbox" id="agree-term" name="confirm" value="1" required>
                        <label for="agree-term">개인정보취급방침에 동의</label><a href="#" class="btn_privacy">&#91;자세히&#93;</a>
                      </li>
                      <li>
                        <button class="submit-btn">신청하기</button>
                      </li>
                    </ul>
                  </div>
                </form>
              </li>
            </ul>
          </div>
        </div>
        <nav class="gnb">
          <ul class="clearfx">
            <li>
              <a href="/beopmusa" class="oneD find-beopmusa">전국 <strong><?=$this->dinfo['total_count']?></strong>, 내 지역
                한의원 찾기<span>GO!</span></a>
              <ul class="twoD city">
                <li><a href="/beopmusa">전체</a></li>
                <?php foreach($this->dinfo['city'] as $item): ?>
                <li><a href="/beopmusa?city_code=<?=$item['city_code']?>"><?=$item['city_name']?></a></li>
                <?php endforeach; ?>
              </ul>
            </li>
            <li>
              <a href="/insure" class="oneD">보험처리 절차</a>
            </li>
            <li>
              <a href="/care" class="oneD">교통사고 후유증 치료</a>
            </li>
            <li>
              <a href="/article" class="oneD">미디어N뉴스</a>
              <ul class="twoD">
                <li><a href="/article">미디어속하나카N</a></li>
                <li><a href="/notice">공지사항</a></li>
              </ul>
            </li>
            <li>
              <a href="/joinq" class="oneD">온라인 가입문의</a>
            </li>
          </ul>
        </nav>
      </div>
    </header>
    <!--e: 헤더-->