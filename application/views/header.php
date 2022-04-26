<!doctype html>
<html lang="ko">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <title>인생 법무사 찾기 네트워크 법무사넷</title>

  <!-- Search Engine -->
  <meta name="description" content="인생 법무사 찾기 네트워크">
  <meta name="keywords" lang="ko" content="법무사, 기업법무, 부동산등기, 집행공탁, 법률전쟁, 파상회생, 사망상속, 성년후견, 출생혼인기사">
  <meta name="author" content="법무사넷">
  <meta name="image" content="<?php if ($this->common->isSecure()) echo "https://" . $_SERVER['HTTP_HOST'];
                              else echo "http://" . $_SERVER['HTTP_HOST']; ?>/images/ogimage.jpg">
  <!-- Schema.org for Google -->
  <meta itemprop="name" content="법무사넷">
  <meta itemprop="description" content="인생 법무사 찾기 네트워크">
  <meta itemprop="image" content="<?php if ($this->common->isSecure()) echo "https://" . $_SERVER['HTTP_HOST'];
                                  else echo "http://" . $_SERVER['HTTP_HOST']; ?>/images/ogimage.jpg">
  <!-- Open Graph general (Facebook, Pinterest & Google+) -->
  <meta property="og:title" content="법무사넷">
  <meta property="og:description" content="인생 법무사 찾기 네트워크">
  <meta property="og:image" content="<?php if ($this->common->isSecure()) echo "https://" . $_SERVER['HTTP_HOST'];
                                      else echo "http://" . $_SERVER['HTTP_HOST']; ?>/images/ogimage.jpg">
  <meta property="og:url" content="<?php if ($this->common->isSecure()) echo "https://" . $_SERVER['HTTP_HOST'];
                                    else echo "http://" . $_SERVER['HTTP_HOST']; ?>">
  <meta property="og:site_name" content="법무사넷">
  <meta property="og:locale" content="ko_KR">
  <meta property="og:type" content="website">

  <link rel="stylesheet" href="/css/swiper.css">
  <link rel="stylesheet" type="text/css" href="/css/style.css?v=2.0" />
  <link href="/css/nanum-square.css" rel="stylesheet">
  <script src="/js/swiper.js"></script>
  <script src="/js/jquery-3.3.1.js"></script>
  <script src="/js/common.js"></script>
</head>

<body>
  <div class="wrap">
    <!--s: 헤더-->
    <header>
      <div class="sm-header">
        <div class="container top">
          <a href="#" class="icon menu-btn">메뉴</a>
          <h1><a href="/" class="icon logo">법무사넷</a></h1>
          <nav class="gnb">
            <a href="javascript:void(0);" class="icon close-btn">닫기</a>
            <ul class="clearfx">
              <li>
                <a href="/about" class="oneD">법무사넷?</a>
              </li>
              <li>
                <a href="/task" class="oneD">법무사 업무</a>
              </li>
              <li>
                <a href="/article" class="oneD">미디어&뉴스</a>
              </li>
              <li>
                <a href="/joinq" class="oneD">온라인 가입문의</a>
              </li>
            </ul>
          </nav>
          <div class="tel-btn">
            <a href="tel:<?= $this->dinfo['manager']['tel_join'] ?>" class="icon tel">전화 상담</a>
            <a href="<?= $this->dinfo['manager']['kakaotok'] ?>" class="icon kakao" target="_blank">카톡 상담</a>
            <a href="<?= $this->dinfo['manager']['navertok'] ?>" class="icon naver" target="_blank">톡톡 상담</a>
          </div>
        </div>
        <div class="container bottom">
          <form action="/beopmusa">
            <div class="search-block">
              <input type="search" name="keyword" placeholder="해시태그/지역명/지하철역명으로 바로찾기!">
              <button class="icon">찾기</button>
            </div>
          </form>
        </div>        
      </div>
      <div class="lg-header">
        <div class="container">
          <div class="left">
            <div class="copy">
              <p>빠른 상담 신청을 남기면<br /><strong>가장 가까운 법무사가 연락을 드립니다.</strong></p>
            </div>
            <ul class="tel-btn">
              <li>
                <a href="tel:<?= $this->dinfo['manager']['tel_quick'] ?>" class="tel">빠른상담</a>
              </li>
              <li>
                <a href="<?= $this->dinfo['manager']['kakaotok'] ?>" class="kakao" target="_blank">카톡상담</a>
              </li>
              <li>
                <a href="<?= $this->dinfo['manager']['navertok'] ?>" class="naver" target="_blank">톡톡상담</a>
              </li>
            </ul>
          </div>
          <h1><a href="/" class="icon logo">법무사넷</a></h1>
          <div class="right">
            <div class="number">
              <dl>
                <dt>가맹문의</dt>
                <dd><a href="tel:<?= $this->dinfo['manager']['tel_join'] ?>"><?= $this->dinfo['manager']['tel_join'] ?></a></dd>
              </dl>
              <dl>
                <dt>빠른가입</dt>
                <dd><a href="tel:<?= $this->dinfo['manager']['tel_quick'] ?>"><?= $this->dinfo['manager']['tel_quick'] ?></a></dd>
              </dl>
            </div>
          </div>
        </div>
        <nav class="gnb">
          <ul>
            <li>
              <a href="/beopmusa" class="oneD"><span>전국</span><strong><?= $this->dinfo['total_count'] ?>개,</strong><span>내 지역 인생 법무사 찾기</span><span class="border">GO!</span></a>  
              <div class="twoD city">
                <ul>
                  <li><a href="/beopmusa">전체</a></li>
                  <?php foreach ($this->dinfo['city'] as $item) : ?>
                    <li><a href="/beopmusa?city_code=<?= $item['city_code'] ?>"><?= $item['city_name'] ?></a></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </li>
            <li>
              <a href="/about" class="oneD">법무사넷?</a>
            </li>
            <li>
              <a href="/task" class="oneD">법무사 업무</a>
            </li>
            <li>
              <a href="/article" class="oneD">미디어&뉴스</a>
            </li>
            <li>
              <a href="/joinq" class="oneD">온라인 가맹문의</a>
            </li>
          </ul>
        </nav>
      </div>
    </header>
    <!--e: 헤더-->