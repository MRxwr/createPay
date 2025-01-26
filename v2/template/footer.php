</main>
<style>
      /* Bottom Nav Styling */
      .bottom-nav {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: rgba(255, 255, 255, 0.8); /* Transparent background */
        box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
        z-index: 1000;
      }

      .nav-link {
        color: #6c757d;
        font-size: 24px;
        position: relative;
        transition: transform 0.3s ease-in-out, color 0.3s ease-in-out;
      }

      /* Active State for Circle */
      .nav-link.active::before {
        content: "";
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 60px;
        background-color: rgba(0, 0, 0, 0.05); /* Light circle highlight */
        border-radius: 50%;
        z-index: -1;
      }

      /* Active Icon */
      .nav-link.active {
        color: #000;
        transform: translateY(-10px);
      }

      /* Badge Styling */
      .badge-notification {
        position: absolute;
        top: -2px;
        right: 10px;
        font-size: 0.6rem;
      }

      /* Bounce Animation */
      @keyframes bounce {
        0%, 100% {
          transform: translateY(0);
        }
        50% {
          transform: translateY(-8px);
        }
      }

      .nav-link.active i {
        animation: bounce 0.5s ease;
      }
    </style>

<nav class="bottom-nav">
        <div class="d-flex justify-content-around py-2">
            <!-- Home -->
            <a href="#" class="nav-link text-center active">
                <i class="bi bi-house-door"></i>
            </a>
            <!-- Cart with Notification -->
            <a href="#" class="nav-link text-center position-relative">
                <i class="bi bi-cart"></i>
                <span class="badge bg-danger rounded-pill badge-notification">2</span>
            </a>
            <!-- Orders -->
            <a href="#" class="nav-link text-center">
                <i class="bi bi-file-earmark-text"></i>
            </a>
            <!-- Settings -->
            <a href="#" class="nav-link text-center">
                <i class="bi bi-gear"></i>
            </a>
        </div>
    </nav>

<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    ></script>
    <script>
      // Toggle active state on click
      const navLinks = document.querySelectorAll('.nav-link');

      navLinks.forEach(link => {
        link.addEventListener('click', () => {
          navLinks.forEach(nav => nav.classList.remove('active'));
          link.classList.add('active');
        });
      });
    </script>
<script>
  var bannerSwiper = new Swiper('.banner-slider', {
    pagination: {
      el: '.swiper-pagination',
      clickable: true
    },
    autoplay: {
      delay: 3000,
      disableOnInteraction: false
    },
    loop: true
  });

  var categorySwiper = new Swiper('.category-slider', {
    slidesPerView: 'auto',
    spaceBetween: 20,
    freeMode: true
  });

  var brandSwiper = new Swiper('.brand-slider', {
    slidesPerView: 'auto',
    spaceBetween: 20,
    freeMode: true
  });
</script>
</body>
</html>