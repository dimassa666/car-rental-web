<!DOCTYPE html>
<html lang="en">

<head>
    <title>Lucky Rental</title>
    <link rel="icon" href="{{ asset('img/lr_s.png') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('main/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('main/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('main/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('main/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('main/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('main/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('main/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('main/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('main/css/jquery.timepicker.css') }}">


    <link rel="stylesheet" href="{{ asset('main/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('main/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('main/css/style.css') }}">
    <link rel="stylesheet" href="CSS/chatbot.css">

    @yield('head')
</head>

<body>

    @yield('konten')

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>


    <script src="{{ asset('main/js/jquery.min.js') }}"></script>
    <script src="{{ asset('main/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('main/js/popper.min.js') }}"></script>
    <script src="{{ asset('main/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('main/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('main/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('main/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('main/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('main/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('main/js/aos.js') }}"></script>
    <script src="{{ asset('main/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('main/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('main/js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('main/js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ asset('main/js/google-map.js') }}"></script>
    <script src="{{ asset('main/js/main.js') }}"></script>

    <div class="container-chat">
        <button id="toggleChat" class="toggle-chat"><img src="img/technical-support.png" alt="Chat icon" width="30" height="30">  LIVE</button>
        <div class="card-chat mt-5" id="chatCard">
          <div class="d-flex flex-row justify-content-between p-3 adiv text-white">
            <i class="fas fa-chevron-left"></i>
            <span class="live-chat-title">LUCKY RENTAL ASSISTANT</span>
            <i class="fas fa-times"></i>
          </div>
          <div class="chat-container" id="chatContainer">
            <div id="chatBox"></div>
          </div>
          <div class="form-group px-3">
            <textarea id="userInput" class="form-control" rows="2" placeholder="Tanyakan apapun..."></textarea>
          </div>
        </div>
      </div>
    
      <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          const toggleChat = document.getElementById('toggleChat');
          const chatCard = document.getElementById('chatCard');
          const chatContainer = document.getElementById('chatContainer');
          const chatBox = document.getElementById('chatBox');
          const userInput = document.getElementById('userInput');
    
          let chatVisible = false;
    
          // Toggle chatbox
          toggleChat.addEventListener('click', function() {
            chatVisible = !chatVisible;
            chatCard.style.display = chatVisible ? 'block' : 'none';
    
            if (chatVisible) {
              // Scroll ke bawah chatBox saat chatbox ditampilkan
              chatContainer.scrollTo({
                top: chatContainer.scrollHeight,
                behavior: 'smooth'
              });
            }
          });
    
          // Event listener untuk mengirim pesan saat tekan Enter
          userInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter' && !e.shiftKey) {
              e.preventDefault();
              sendMessage(userInput.value.trim());
            }
          });
    
          // Fungsi untuk mengirim pesan dari user ke server
          function sendMessage(message) {
            if (message === '') {
              return;
            }
    
            // Tambahkan pesan user ke kotak obrolan
            appendMessage('user', message);
    
            // Kosongkan input
            userInput.value = '';
    
            // Kirim pesan ke server
            axios.post('/api/send-prompt', { prompt: message })
              .then(function(response) {
                const botResponse = response.data.result;
                appendMessage('bot', botResponse);
              })
              .catch(function(error) {
                console.error('Error sending message:', error);
                appendMessage('bot', 'Maaf, terjadi kesalahan server');
              });
          }
    
          function appendMessage(sender, message) {
            const messageDiv = document.createElement('div');
            messageDiv.classList.add('message', sender);
    
            if (sender === 'user') {
              messageDiv.innerHTML = `
                <div class="message-content bg-secondary">${message}</div>
                <img class="avatar" src="https://img.icons8.com/color/48/000000/circled-user-male-skin-type-7.png" alt="User Avatar">
              `;
            } else {
              messageDiv.innerHTML = `
                <img class="avatar" src="img/technical-support.png" alt="Bot Avatar">
                <div class="message-content chat bg-secondary">${message}</div>
              `;
            }
    
            chatBox.appendChild(messageDiv);
            chatContainer.scrollTo({
              top: chatContainer.scrollHeight,
              behavior: 'smooth'
            });
          }
        });
      </script>

</body>

</html>
