<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- quick_nav -->
<div class="quick_nav">
	<div class="quick_title">유학 관련 궁금한 점은 부담없이 문의하세요!</div>
	<ul class="quick_list">
		<li class="phone"><a href="#">전화 상담 예약</a></li>
		<li class="home"><a href="#">방문 상담 예약</a></li>
		<li>
			<div id="kakao-talk-channel-chat-button" data-channel-public-id="_mnYdxj" data-title="consult" data-size="large" data-color="yellow" data-shape="pc" data-support-multiple-densities="true" ></div>
		</li>
		<!-- <li class="kakao"><a href="#">실시간 상담</a></li> -->
	</ul>
	<ul class="quick_time">
		<li>평일 10:00AM~19:00PM</li>
		<li>주말 10:00AM~14:00PM</li>
	</ul>
	<ul class="quick_contact">
		<li class="email">hm.lee@mylimeedu.com</li>
		<li class="tel">02-2135-7699</li>
	</ul>

</div>
<script>
  window.kakaoAsyncInit = function() {
    Kakao.Channel.createChatButton({container: '#kakao-talk-channel-chat-button', });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://t1.kakaocdn.net/kakao_js_sdk/2.1.0/kakao.channel.min.js';
    js.integrity = 'sha384-MEvxc+j9wOPB2TZ85/N6G3bt3K1/CgHSGNSM+88GoytFuzP4C9szmANjTCNfgKep';
    js.crossOrigin = 'anonymous';
    fjs.parentNode.insertBefore(js, fjs);
  })(document, 'script', 'kakao-js-sdk');
</script>
<!-- // quick_nav -->
