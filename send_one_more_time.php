<?php
session_start();
$car_info =  $_SESSION['car_info'] ?? '';
$message = $_SESSION['message'] ?? '';
$message2 = $_SESSION['message2'] ?? '';

$time = 3600000;

// Array of stickers for easy management
$stickers = [
    '1.png', '2.png', '3.png', '4.png', 
    '5.png', '6.png', '7.png', '8.png'
];

?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="format-detection" content="telephone=no">

    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://shiftapp.net/viaqr">
    <meta property="og:image" content="img/main_visual.png" />
    <meta property="og:description" content="QR알리미" />
    <title>QR알리미 :: QRAlimy</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css">
    
    <style>
        /* --- START OF reset.css --- */
        @charset "utf-8";
        html, body, div, span, applet, object, iframe,
        h1, h2, h3, h4, h5, h6, p, blockquote, pre,
        a, abbr, acronym, address, big, cite, code,
        del, dfn, em, img, ins, kbd, q, s, samp,
        small, strike, strong, sub, sup, tt, var,
        b, u, i, center,
        dl, dt, dd, ol, ul, li,
        fieldset, form, label, legend,
        table, caption, tbody, tfoot, thead, tr, th, td,
        article, aside, canvas, details, embed, 
        figure, figcaption, footer, header, hgroup, 
        menu, nav, output, ruby, section, summary,
        time, mark, audio, video {
          margin: 0;
          padding: 0;
          border: 0;
          font-size: 100%;
          font: inherit;
          vertical-align: baseline;
          box-sizing: border-box;
        }
        article, aside, details, figcaption, figure, 
        footer, header, hgroup, menu, nav, section {
          display: block;
        }
        body {
          line-height: 1;
          word-break: keep-all;
        }
        ol, ul {
          list-style: none;
        }
        blockquote, q {
          quotes: none;
        }
        blockquote:before, 
        blockquote:after,
        q:before, 
        q:after {
          content: '';
          content: none;
        }
        table {
          border-collapse: collapse;
          border-spacing: 0;
        }
        
        /* --- START OF send_one_more_time.css --- */
        @charset "utf-8";
        @font-face {
          font-family: "S-CoreDream-9Black";
          src: url("https://cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_six@1.2/S-CoreDream-9Black.woff")
            format("woff");
          font-weight: normal;
          font-style: normal;
        }
        @import url("https://shiftapp.net/css/font");
        .fixed {
          position: fixed;
          bottom: 0;
          left: 0;
          width: 100%;
          max-width: 428px;
          height: auto;
          background: var(--dominant);
          padding: 5px 10px;
          border-radius: 25px 25px 0 0;
          z-index: 1000;
          box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .fixed h3 {
          font-family: "Yoon Gothic 775", sans-serif;
          font-size: 16px;
        }
        .fixed h3 img {
          margin-right: 24px;
          width: 36px;
          height: 36px;
          vertical-align: middle;
        }
        .car-info-input-field {
          margin: 14px 0 18px;
          padding: 8px 16px;
          background: #fff;
          border-radius: 6px;
          width: 100%;
          height: 36px;
        }
        .fixed .radio-container {
          margin: 14px 0 18px;
          padding: 8px 16px;
          background: #fff;
          border-radius: 6px;
          width: 100%;
          height: 72px;
        }
        .request form {
          display: flex;
          justify-content: center;
          align-items: center;
          flex-direction: column;
          gap: 16px;
        }
        .request label {
          display: block;
        }
        .request label:not(:first-child) {
          margin-top: 8px;
        }
        .request input {
          margin: 3px 8px 0 0;
        }
        .request input[type="text"] {
          border: none;
          background: none;
          font-size: 16px;
        }

        /* --- START OF index.css --- */
        @charset "utf-8";
        :root {
          --dominant: #fae100;
          --darkgray: #292929;
          --font-family: "Yoon Gothic 745", Helvetica, Arial, "Noto Sans JP",
            "Noto Sans SC", "Font Awesome 5 Free", sans-serif;
        }
        ::-webkit-scrollbar {
          display: none;
        }
        .ir {
          overflow: hidden;
          line-height: 0;
          position: absolute;
          width: 0;
          height: 0;
          left: 0;
          top: 0;
          color: var(--darkgray);
          background: var(--darkgray);
        }
        a {
          color: #000;
          text-decoration: none;
        }
        body {
          width: 100%;
          top: 0 !important;
          font-family: var(--font-family);
          font-weight: 400;
          font-size: 16px;
          line-height: 1.4;
          word-break: keep-all;
          box-sizing: border-box;
          -webkit-box-sizing: border-box;
          background: var(--darkgray);
        }
        .wrap {
          margin: 0 auto;
          max-width: 428px;
          width: 100%;
          height: 100%;
          position: relative;
          z-index: 1;
          overflow: hidden;
        }
        header {
          display: flex;
          flex-direction: row;
          justify-content: space-between;
          align-items: center;
          padding: 0 16px;
          width: 100%;
          height: 64px;
          border-bottom: solid 1px var(--darkgray);
        }
        header .text-container {
          display: flex;
          width: 100%;
          max-width: 101px;
          height: auto;
          padding: 10px 0;
          justify-content: center;
          align-items: center;
          z-index: 2;
        }
        header .text {
          color: rgba(255, 255, 255, 0.7);
          font-family: "Apple SD Gothic Neo";
          font-size: 14px;
          font-style: normal;
          font-weight: 400;
          line-height: normal;
          text-decoration-line: underline;
          cursor: pointer;
          position: relative;
          z-index: 2;
          text-decoration-style: solid;
        }
        header h1 img {
          margin: 16px 0;
          height: 22px;
        }
        h2 {
          margin: 0 0 32px;
          text-align: center;
          font-family: "S-CoreDream-9Black";
          font-size: 16px;
          color: #ffff;
        }
        main {
          min-height: 100vh;
          height: 100%;
        }
        main.index {
          position: relative;
          z-index: 1;
        }
        .index {
          padding-bottom: 380px;
        }
        .intro {
          display: flex;
          flex-direction: row;
          justify-content: space-between;
          align-items: center;
          align-self: stretch;
          position: relative;
          padding: 0px 16px;
          gap: 6px;
          width: 100%;
          max-width: 428px;
          height: 124px;
          border-bottom: solid 1px var(--darkgray);
        }
        .intro p {
          color: #ffffffe6;
          font-family: "Apple SD Gothic Neo";
          font-size: 28px;
          font-style: normal;
          font-weight: 700;
          line-height: 36px;
        }
        .intro-img {
          width: 100%;
          max-width: 133px;
          height: 100%;
          max-height: 38px;
        }
        .intro::after {
          content: "";
          display: block;
          position: absolute;
          top: -50px;
          right: -50px;
          width: 100%;
          height: 200px;
          opacity: 0.2;
        }
        .btn_download {
          display: flex;
          justify-content: center;
          align-items: center;
          text-align: center;
          height: 36px;
          margin: 0 0 32px 0;
          padding: 0;
          gap: 16px;
        }
        .btn_download a {
          position: relative;
          display: inline-block;
          margin: 0 8px;
          width: 156px;
          height: 36px;
          line-height: 36px;
          border-radius: 10px;
          box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.87);
          font-size: 14px;
          cursor: pointer;
          transition: all 0.3s;
          overflow: hidden;
          background: #fff;
        }
        .btn_download a:hover {
          box-shadow: inset 0px 2px 8px rgba(255, 179, 0, 0.87);
          box-shadow: 0px 10px 20px rgba(255, 179, 0, 0.38);
        }
        .btn_download a img {
          margin-right: 5px;
          width: 24px;
          height: 24px;
          vertical-align: middle;
        }
        .qralliym-add-video-container {
          display: flex;
          justify-content: center;
          align-items: center;
          width: 100%;
          max-width: 428px;
          height: 100%;
          max-height: 184.5px;
          margin: 0 0 32px 0;
          padding: 0;
        }
        .qralliym-add-video {
          width: 100%;
          height: 100%;
          max-width: 328px;
          max-height: 184.5px;
          margin: 0;
          padding: 0;
        }
        .main_visual {
          display: block;
          position: relative;
          margin: 0 0 36px 0;
          width: 100%;
          max-width: 428px;
          height: 100%;
          max-height: 131px;
        }
        .main_visual button {
          position: absolute;
          top: 6px;
          right: 8px;
          border: 1px solid #fff;
          background-color: transparent;
          color: #fff;
        }
        .main_visual a {
          font-size: 0;
          width: 131px;
          height: 48px;
        }
        .main_visual img {
          align-self: stretch;
          width: 100%;
          max-width: 428px;
          height: 100%;
          max-height: 131px;
        }
        .main_visual video {
          position: absolute;
          top: 10px;
          left: 2%;
          width: 44%;
        }
        .container {
          max-width: 100%;
          padding: 0 20px;
          overflow: hidden;
          position: relative;
          z-index: 1;
        }
        .slider-wrapper {
          margin: 0 -20px;
          position: relative;
          z-index: 1;
        }
        .slide-carousel {
          opacity: 1 !important;
          position: relative;
          z-index: 1;
          visibility: hidden;
        }
        .slide-carousel.slick-initialized {
          visibility: visible;
        }
        .slide-item {
          padding: 0;
          border-radius: 17.66px;
        }
        .slide-item img {
          width: 100%;
          height: auto;
          border-radius: 17.66px;
        }
        .slick-current {
          opacity: 1;
          transform: scale(1);
          transition: all 0.3s ease;
        }
        .slick-slide:not(.slick-current) {
          opacity: 0.5;
          transform: scale(0.9);
          transition: all 0.3s ease;
        }
        .slick-list {
          overflow: visible !important;
        }
        .slick-track {
          display: flex !important;
        }
        .slick-dots {
          width: 100%;
          max-width: 428px;
          z-index: 2;
          display: flex !important;
          justify-content: center;
          align-items: center;
          gap: 9px;
          padding: 20px 0;
        }
        .slick-dots li {
          display: flex;
          align-items: center;
          justify-content: center;
          width: 14px;
          height: 14px;
          margin: 0;
          padding: 0;
        }
        .slick-dots li button {
          width: 14px;
          height: 14px;
          padding: 0;
          margin: 0;
        }
        .slick-dots li button:before {
          content: "";
          width: 14px;
          height: 14px;
          background-color: #fff;
          border-radius: 50%;
          opacity: 1;
          margin: 0;
          padding: 0;
          position: absolute;
          top: 0;
          left: 0;
        }
        .slick-dots li.slick-active {
          width: 30px;
        }
        .slick-dots li.slick-active button:before {
          background-color: #fae100;
          opacity: 1;
          border: 1px solid #fae100;
          border-radius: 16px;
          width: 30px;
          height: 14px;
        }
        .slick-dots li:not(.slick-active) button:before {
          width: 14px;
          height: 14px;
          border-radius: 50%;
        }
        .info {
          margin: 100px 0 0 0;
          padding: 26px 16px;
          color: rgba(255, 255, 255, 0.5);
          font-family: "S-Core Dream";
          font-size: 16px;
          font-style: normal;
          font-weight: 200;
          line-height: 28px;
        }
        .info p {
          display: flex;
          flex-wrap: wrap;
          gap: 8px;
          margin-bottom: 4px;
        }
        .info > p:first-child > span,
        .info > p:nth-of-type(2) > span {
          position: relative;
          margin-left: 8px;
          padding-left: 8px;
        }
        .info > p:first-child > span::before,
        .info > p:nth-of-type(2) > span::before {
          content: "";
          position: absolute;
          left: 0;
          top: 50%;
          transform: translateY(-50%);
          width: 1px;
          height: 12px;
          background: rgba(255, 255, 255, 0.5);
        }
        .info > p:last-child > span {
          margin-right: 2px;
          font-weight: 400;
        }

        /* --- START OF NEW STYLES FOR BUTTON AND POPUP --- */
        .fixed .btn {
            width: 100%;
            position: relative;
            background-color: transparent;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: flex-start;
            padding: 8px 16px;
            box-sizing: border-box;
            gap: 8px;
            text-align: left;
            font-size: 18px;
            color: #fff;
            font-family: 'Apple SD Gothic Neo', sans-serif;
            cursor: pointer;
        }
        .fixed .btn .button-wrapper {
            flex: 1;
            border-radius: 99px;
            background-color: #292929;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            padding: 12px;
            height: 48px;
        }
        .fixed .btn .button {
            position: relative;
            letter-spacing: 0.02em;
            font-weight: 600;
        }
        .fixed .btn .btn-child {
            width: 48px;
            height: 48px;
            border-radius: 50%;
        }

        /* POPUP STYLES */
        .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 2000;
            justify-content: center;
            align-items: center;
            padding: 20px;
            box-sizing: border-box;
        }
        .popup-content .text {
            width: 100%;
            max-width: 350px;
            position: relative;
            border-radius: 8px;
            background-color: #292929;
            border: 1px solid #fae100;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            padding: 16px;
            gap: 20px;
            text-align: left;
            font-size: 20px;
            color: #fff;
            font-family: 'Apple SD Gothic Neo', sans-serif;
        }
        .popup-content .div {
            align-self: stretch;
            position: relative;
            font-weight: 600;
        }
        .popup-content .text-div {
            align-self: stretch;
            position: relative;
            font-size: 14px;
            line-height: 1.5;
            color: rgba(255, 255, 255, 0.74);
        }
        .popup-content .button-confirm-container {
            align-self: stretch;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: flex-end;
            font-size: 18px;
            color: rgba(255, 255, 255, 0.87);
        }
        .popup-content .confirm-wrapper {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            padding: 8px 0px 8px 16px;
            cursor: pointer;
        }
        .popup-content .confirm-text {
            position: relative;
            font-weight: 500;
        }
        
        /* === START OF REVISED CHAT UI STYLES === */
        #chat-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.74);
            z-index: 3000;
            display: none;
            justify-content: center;
            align-items: flex-end;
            font-family: 'Apple SD Gothic Neo', sans-serif;
        }
        .chat-container {
            width: 100%;
            max-width: 428px;
            position: relative;
            border-radius: 24px 24px 0px 0px;
            background-color: #fff;
            height: 90vh;
            max-height: 720px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }
.chat-header {
    background-color: #fff;
    width: 100%;
    display: flex;
    justify-content: flex-end; /* Align items to the right */
    align-items: center;
    padding: 16px;
    box-sizing: border-box;
    flex-shrink: 0;
    border-bottom: 1px solid #f1f1f1;
}

.chat-header-icon {
    width: 24px;
    height: 24px;
    cursor: pointer;
}

        .chat-messages-area {
            flex: 1;
            overflow-y: auto;
            background-color: #fff;
            padding: 16px;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }
        .message-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
            max-width: 80%;
        }
        .message-group.driver { align-items: flex-start; align-self: flex-start; }
        .message-group.requester { align-items: flex-end; align-self: flex-end; }
        .sender-name { font-size: 14px; color: #555; padding: 0 4px; }
        
        /* Bubble Styling */
        .message-bubble {
            position: relative; /* Needed for positioning the tail */
            padding: 10px 14px;
            font-size: 15px;
            line-height: 1.5;
            word-break: break-word;
        }
        .message-group.driver .message-bubble {
            background-color: #f1f1f1;
            color: #000;
            border-radius: 18px 18px 18px 4px; /* Flatten bottom-left corner */
        }
        .message-group.requester .message-bubble {
            background-color: #fae100;
            color: #000;
            border-radius: 18px 18px 4px 18px; /* Flatten bottom-right corner */
        }

        /* Remove background for sticker messages */
        .message-bubble.sticker-bubble {
            background: none;
            padding: 0;
            border: none;
        }

        /* Add tail to text bubbles only */
        .message-group.driver .message-bubble:not(.sticker-bubble)::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: -8px;
            width: 0;
            height: 0;
            border: 10px solid transparent;
            border-right-color: #f1f1f1;
            border-bottom-width: 0;
        }
        .message-group.requester .message-bubble:not(.sticker-bubble)::after {
            content: '';
            position: absolute;
            bottom: 0;
            right: -8px;
            width: 0;
            height: 0;
            border: 10px solid transparent;
            border-left-color: #fae100;
            border-bottom-width: 0;
        }
        .message-bubble img.sticker-message { width: 120px; height: 120px; display: block; }
        
        .chat-input-area {
            background-color: #fff;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-start;
            flex-shrink: 0;
            border-top: 1px solid #f1f1f1;
        }
        .text-input-wrapper {
            width: 100%;
            background-color: #fff;
            overflow: hidden;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: flex-start;
            padding: 8px 12px;
            gap: 8px;
            box-sizing: border-box;
        }
        .text-input-container {
            flex: 1;
            border-radius: 22px;
            background-color: #f1f1f1;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: flex-start;
            padding: 0 16px;
            border: 1px solid #f1f1f1; /* NEW */
            transition: border-color 0.2s ease-in-out; /* NEW */
        }
        /* NEW */
        .text-input-container:focus-within {
            border-color: #fae100;
        }
        #text-input {
            flex: 1; border: none; background: transparent; height: 44px;
            font-size: 15px; color: #333; outline: none;
        }
        #text-input::placeholder {
            color: #999;
            transition: color 0.2s ease-in-out; /* NEW */
        }
        /* NEW */
        #text-input:focus::placeholder {
            color: transparent;
        }
        .input-icon {
            width: 44px; height: 44px; display: flex;
            align-items: center; justify-content: center; cursor: pointer;
        }
        .input-icon img { width: 100%; height: 100%; }
        #send-btn { border-radius: 50%; background-color: #fae100; }
        #send-btn.disabled { background-color: #f1f1f1; cursor: default; }
        .sticker-panel {
            display: grid; /* Initially visible */
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            padding: 20px;
            background-color: #f7f7f7;
            height: 250px;
            overflow-y: auto;
            width: 100%;
        }
        .sticker-item { cursor: pointer; transition: transform 0.2s; }
        .sticker-item:hover { transform: scale(1.1); }
        .sticker-item img { width: 100%; height: auto; }
        .chat-notification {
            position: fixed; bottom: 20px; right: 20px; width: 60px; height: 60px;
            background: #fae100; border-radius: 50%; display: flex;
            justify-content: center; align-items: center; color: #000;
            cursor: pointer; box-shadow: 0 4px 8px rgba(0,0,0,0.2); z-index: 999;
        }
        .chat-notification.hidden { display: none; }
        .chat-notification-badge {
            position: absolute; top: -5px; right: -5px; background: #ff4757; color: white;
            border-radius: 50%; width: 20px; height: 20px; display: flex;
            justify-content: center; align-items: center; font-size: 12px;
        }
        /* === END OF REVISED CHAT UI STYLES === */
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        // --- Main page slick carousel setup ---
        $('.slide-carousel').slick({
            arrows: false, dots: true, infinite: false, speed: 500,
            slidesToShow: 1.2, slidesToScroll: 1, centerMode: true,
            centerPadding: '40px', focusOnSelect: true, touchThreshold: 10,
            responsive: [
                { breakpoint: 768, settings: { slidesToShow: 1.1, centerPadding: '30px' } },
                { breakpoint: 480, settings: { slidesToShow: 1.05, centerPadding: '20px' } }
            ]
        });
        $(window).on('resize orientationchange', function() { $('.slide-carousel').slick('setPosition'); });
        $('.slide-carousel, .slick-dots').on('click touchstart touchmove', function(e) { e.stopPropagation(); });
        $(".main_visual button").click(function() { $(".main_visual").hide(); });

        // --- Chat functionality ---
        const car_info = "<?php echo $car_info; ?>";
        let chatTimeout;
        let isChatOpen = false;
        let unreadCount = 0;
        let chatRoomCreated = false;
        let lastSender = null;

        function createChatRoom() {
            if (!car_info || chatRoomCreated) return;
            $.ajax({
                url: 'chat_create.php', type: 'POST', data: { car_info: car_info },
                success: function(response) { if (response.success) chatRoomCreated = true; },
                error: function() { console.error('Error creating chat room'); }
            });
        }

        function checkForMessages() {
            if (!car_info) return;
            $.ajax({
                url: 'chat_receive.php', type: 'POST', data: { car_info: car_info }, dataType: 'json',
                success: function(response) {
                    if (response.success && response.messages.length > 0) {
                        displayMessages(response.messages);
                        if (!isChatOpen) {
                            const newDriverMessages = response.messages.filter(msg => msg.sender_type === 'driver' && !msg.is_read);
                            if (newDriverMessages.length > 0) {
                                unreadCount += newDriverMessages.length;
                                updateNotificationBadge();
                                showNotification();
                            }
                        }
                        if (isChatOpen) resetInactivityTimer();
                    }
                },
                error: function() { console.error('Error checking for messages'); }
            });
        }

        function displayMessages(messages) {
            const chatMessagesArea = $('#chat-messages-area');
            const currentMessageCount = chatMessagesArea.find('.message-group').length;
            if (messages.length === currentMessageCount) return;

            chatMessagesArea.empty();
            lastSender = null;
            
            messages.forEach(message => {
                const senderClass = message.sender_type === 'driver' ? 'driver' : 'requester';
                const senderName = message.sender_type === 'driver' ? '차주' : '이동요청자';
                const isSticker = message.message_type === 'emoji';
                
                const bubbleClass = isSticker ? 'sticker-bubble' : '';
                const messageContent = isSticker
                    ? `<img src="emojis/${message.message}" alt="Sticker" class="sticker-message">`
                    : escapeHtml(message.message);
                
                const showSenderName = lastSender !== message.sender_type;
                lastSender = message.sender_type;

                const messageElement = `
                    <div class="message-group ${senderClass}">
                        ${showSenderName ? `<div class="sender-name">${senderName}</div>` : ''}
                        <div class="message-bubble ${bubbleClass}">${messageContent}</div>
                    </div>`;
                chatMessagesArea.append(messageElement);
            });
            
            chatMessagesArea.scrollTop(chatMessagesArea[0].scrollHeight);
        }
        
        function escapeHtml(text) {
            const map = { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#039;' };
            return text.replace(/[&<>"']/g, m => map[m]);
        }

        function sendMessage(content, messageType) {
            if (!car_info || !content) return;
            $.ajax({
                url: 'chat_send.php', type: 'POST',
                data: { car_info: car_info, message: content, message_type: messageType, sender_type: 'requester' },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        if (messageType === 'text') {
                            $('#text-input').val('');
                            toggleSendButtonState();
                        }
                        checkForMessages();
                    }
                },
                error: function() { console.error('Error sending message'); }
            });
        }

        function showChat() {
            $('#chat-overlay').css('display', 'flex');
            $('.chat-notification').addClass('hidden');
            $('.sticker-panel').slideDown(0); // Ensure panel is visible when chat opens
            isChatOpen = true; unreadCount = 0;
            updateNotificationBadge();
            resetInactivityTimer();
            markMessagesAsRead();
        }

        function hideChat() {
            $('#chat-overlay').hide();
            isChatOpen = false;
        }

        function showNotification() { $('.chat-notification').removeClass('hidden'); }

        function updateNotificationBadge() {
            const badge = $('.chat-notification-badge');
            badge.text(unreadCount > 0 ? unreadCount : '').toggle(unreadCount > 0);
        }

        function resetInactivityTimer() {
            clearTimeout(chatTimeout);
            chatTimeout = setTimeout(hideChat, 180000); // 3 minutes
        }

        function markMessagesAsRead() {
            if (!car_info) return;
            $.ajax({ url: 'chat_mark_read.php', type: 'POST', data: { car_info: car_info } });
        }
        
        function toggleSendButtonState() {
            $('#send-btn').toggleClass('disabled', !$('#text-input').val().trim());
        }

        // --- Event Handlers for New Chat UI ---
        $('#close-chat-btn').click(hideChat);
        $('.chat-notification').click(showChat);

        // Hide sticker panel when keyboard is expected (input focus)
        $('#text-input').on('focus', function() {
            $('.sticker-panel').slideUp();
        });

        // Toggle sticker panel visibility
        $('#sticker-toggle-btn').click(function() {
            const stickerPanel = $('.sticker-panel');
            if (stickerPanel.is(':visible')) {
                stickerPanel.slideUp();
            } else {
                $('#text-input').blur(); // Dismiss keyboard before showing panel
                stickerPanel.slideDown();
            }
        });

        // Sticker click handler
        $('.sticker-item').on('click', function() {
            const stickerFile = $(this).data('sticker');
            sendMessage(stickerFile, 'emoji');
        });
        
        // Check send button state on input
        $('#text-input').on('input', toggleSendButtonState);

        // Send button click handler for text messages
        $('#send-btn').click(function() {
            if ($(this).hasClass('disabled')) return;
            const text = $('#text-input').val().trim();
            if (text) sendMessage(text, 'text');
        });
        
        // Enter key handler for text input
        $('#text-input').keypress(function(e) {
            if (e.which === 13) {
                e.preventDefault();
                $('#send-btn').click();
            }
        });

        // --- Initial setup & Page Logic ---
        toggleSendButtonState();
        checkForMessages();
        setInterval(checkForMessages, 5000);

        $("#send-notification-btn").on("click", function(e) {
            e.preventDefault();
            $.ajax({
                url: "/viaqr/kakao_api/send_notification_talk.php", type: "POST", data: $("#notificationForm").serialize(),
                success: function() {
                    $('#notification-popup').css('display', 'flex');
                    createChatRoom();
                },
                error: function() { alert('메시지 전송에 실패했습니다.'); }
            });
        });
        $("#close-popup-btn, #notification-popup").on("click", function(e) {
             if (e.target === this || $(e.target).closest('#close-popup-btn').length) {
                $('#notification-popup').hide();
                showChat();
             }
        });
        setTimeout(() => { window.location.href = '/viaqr/final_page.php'; }, <?php echo $time; ?>);
    });
    </script>
</head>

<body>
    <div class="wrap">
        <header>
            <h1><a href="#"><img src="img/logo.png" alt="logo_qr알리미"></a></h1>
            <div class="text-container">
                <a href="http://shiftapp.net/QR/" target="_blank" class="text" alt="홈페이지 바로가기">홈페이지 바로가기</a>
            </div>
        </header>
        <main class="index">
            <!-- ... Main page content remains the same ... -->
            <section class="intro">
                <div class="intro-text">
                    <p>개인정보 노출 없는<br>나만의 주차 필수 APP</p>
                </div>
            </section>
            <div class="btn_download">
                <a href="https://play.google.com/store/apps/details?id=com.jejecomms.qrparking" target="_blank" class="googleplay"><img src="img/btn_google_play.png" alt="구글플레이">Google Play</a>
                <a href="https://apps.apple.com/kr/app/qralimy/id1628992038" target="_blank" class="appstore"><img src="img/btn_app_store.png" alt="앱스토어">App Store</a>
            </div>
            <div class="qralliym-add-video-container">
                <video class="qralliym-add-video" autoplay="autoplay" muted="muted" loop="loop" playsinline>
                    <source src="video/qralliym_promo_add.mp4" type="video/mp4">
                </video>
            </div>
            <section class="main_visual">
                <h2 class="ir">메인비주얼</h2>
                <button>X</button>
                <a href="https://shiftapp.net/">
                    <img src="img/ad_shift_1.png" alt="">
                    <video autoplay="autoplay" muted="muted" loop="loop" playsinline>
                        <source src="video/youtube_promotional_video_Full.mp4" type="video/mp4">
                    </video>
                </a>
            </section>
            <section>
                <h2>QR알리미 사용방법</h2>
                <div class="container">
                    <div class="slider-wrapper">
                        <ul class="slide-carousel">
                            <li class="slide-item"><img src="img/slide_1.png" alt="슬라이드_1"></li>
                            <li class="slide-item"><img src="img/slide_2.png" alt="슬라이드_2"></li>
                            <li class="slide-item"><img src="img/slide_3.png" alt="슬라이드_3"></li>
                            <li class="slide-item"><img src="img/slide_4.png" alt="슬라이드_4"></li>
                            <li class="slide-item"><img src="img/slide_5.png" alt="슬라이드_5"></li>
                        </ul>
                    </div>
                </div>
            </section>
            <section class="info">
                <p>(주)제제컴즈 <span>대표이사 : 김준강</span></p>
                <p>사업자등록번호 : 641-88-00828</p>
                <p><span>통신판매업신고 :</span> <span>제2021-성남수정-1335호</span> </p>
                <p><span>T.</span> <span>070-4252-5571 (서비스 제휴문의)</span></p>
            </section>

            <div class="fixed">
                <div style="display: none;">
                    <h3><img src="img/icon_car.png" alt="icon_car">차번호확인하기</h3>
                    <div class="car-info-input-field"><?php echo $car_info; ?></div>
                </div>
                <div class="request">
                    <h3 style="display: none;"><img src="img/icon_message.png" alt="icon_message">차주에게요청하기</h3>
                    <form id="notificationForm" action='/viaqr/move_car_1.php' method="post" style="display:none;">
                        <input type="hidden" name="car_info" value="<?php echo $car_info; ?>">
                        <div class="radio-container">
                            <label><input type="radio" name="message" value="차 이동 부탁드립니다."
                                    onClick="this.form.message2.disabled=true" checked="checked"> 차 이동 부탁드립니다.</label>
                            <label><input type="radio" name="message" value="next_message_jejecomms"
                                    onClick="this.form.message2.disabled=false"> <input type="text" name="message2"
                                    class="form-control" placeholder="직접입력하기" disabled></label>
                        </div>
                    </form>
                    <div class="btn" id="send-notification-btn">
                        <div class="button-wrapper">
                          <div class="button">다시한번 메시지보내기</div>
                        </div>
                        <img class="btn-child" alt="" src="img2/chat.png">
                    </div>
                </div>
            </div>
    </div>

    <!-- Notification Confirmation POPUP -->
    <div class="popup-overlay" id="notification-popup">
        <div class="popup-content">
            <div class="text">
                <div class="div">메시지 알림</div>
                <div class="text-div">차주에게 메시지를 전송했습니다.</div>
                <div class="button-confirm-container">
                    <div class="confirm-wrapper" id="close-popup-btn">
                        <div class="confirm-text">확인</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- REVISED CHAT UI -->
    <div id="chat-overlay">
        <div class="chat-container">
            <div class="chat-header">
                <img class="chat-header-icon" alt="Close" src="img2/Close_round.png" id="close-chat-btn">
            </div>
            
            <div class="chat-messages-area" id="chat-messages-area">
                <!-- Messages will be dynamically inserted here -->
            </div>
            
            <div class="chat-input-area">
                <div class="sticker-panel">
                    <?php foreach ($stickers as $sticker_file): ?>
                        <div class="sticker-item" data-sticker="<?php echo $sticker_file; ?>">
                            <img src="emojis/<?php echo $sticker_file; ?>" alt="Sticker">
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="text-input-wrapper">
                    <div class="text-input-container">
                        <input type="text" id="text-input" placeholder="메시지를 입력해주세요">
                    </div>
                    <!-- SWAPPED BUTTONS -->
                    <div class="input-icon" id="send-btn">
                         <img src="img2/send.png" alt="Send">
                    </div>
                    <div class="input-icon" id="sticker-toggle-btn">
                        <img src="img2/emoji.png" alt="Stickers">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chat Notification Icon -->
    <div class="chat-notification hidden">
        <i class="xi-message" style="font-size: 24px;"></i>
        <div class="chat-notification-badge" style="display: none;"></div>
    </div>
</body>

</html>