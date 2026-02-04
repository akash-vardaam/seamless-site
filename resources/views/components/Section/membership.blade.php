<section class="membership-section" style="background-image: url('{{ asset('assets/section-5-bg.png') }}')">
  <!-- Top Content -->
  <div class="membership-top">
    <div class="membership-content">
      <x-ui-scroll-animate animation="fade-up">
        <h2 class="membership-heading">Membership, without friction.</h2>
      </x-ui-scroll-animate>

      <x-ui-scroll-animate animation="fade-up" delay="150">
        <p class="membership-text">
          A unified system that removes barriers across the entire<br />
          member lifecycle, from backend to frontend.
        </p>
      </x-ui-scroll-animate>

      <x-ui-scroll-animate animation="fade-up" delay="300">
        <a href="{{ route('features') }}" class="btn-cta">Explore More</a>
      </x-ui-scroll-animate>
    </div>
  </div>

  <!-- Screenshot aligned to bottom -->
  <div class="membership-bottom">
    <x-ui-scroll-animate animation="scale" delay="450" class="membership-screenshot-wrapper">
      <div class="membership-screenshot-container">
        <img
          src="{{ asset('assets/software-screenshot.png') }}"
          alt="Seamless Dashboard"
          class="membership-screenshot"
          loading="lazy"
        />
        <!-- Decorative glow -->
        <div class="membership-glow"></div>
      </div>
    </x-ui-scroll-animate>
  </div>
</section>

<style>
  .membership-section {
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    display: flex;
    flex-direction: column;
  }

  .membership-top {
    max-width: 1280px;
    margin: 0 auto;
    padding: 140px 1.5rem 1.75rem;
    flex-shrink: 0;
  }

  .membership-content {
    text-align: center;
    max-width: 56rem;
    margin: 0 auto;
  }

  .membership-heading {
    font-size: 2.5rem;
    font-weight: 700;
    font-family: Aspira,Inter,sans-serif;
    color: hsl(var(--primary-foreground));
    margin-bottom: 1.5rem;
  }

  @media (min-width: 768px) {
    .membership-heading {
      font-size: 3rem;
    }
  }

  @media (min-width: 1024px) {
    .membership-heading {
      font-size: 3.5rem;
    }
  }

  .membership-text {
    font-size: 1rem;
    color: rgba(255, 255, 255, 0.8);
    margin-bottom: 2rem;
    max-width: 36rem;
    margin-left: auto;
    margin-right: auto;
  }

  @media (min-width: 768px) {
    .membership-text {
      font-size: 1.125rem;
    }
  }

  .membership-cta {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    padding: 1rem 2rem;
    background: linear-gradient(135deg, hsl(var(--primary)), hsl(var(--secondary)));
    color: white;
    border-radius: 9999px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
  }

  .membership-cta:hover {
    transform: translateY(-2px);
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
  }

  .membership-bottom {
    flex: 1;
    display: flex;
    align-items: flex-end;
    justify-content: center;
    margin-top: auto;
    padding-top: 140px;
    min-width: 100vw;
  }

  .membership-screenshot-wrapper {
    width: 100%;
    max-width: 80rem;
    margin: 0 auto;
    padding: 0 1.5rem;
  }

  .membership-screenshot-container {
    position: relative;
    display: flex;
    justify-content: center;
  }

  .membership-screenshot {
    width: 78%;
    height: auto;
    border-top-left-radius: 0.75rem;
    border-top-right-radius: 0.75rem;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
  }

  .membership-glow {
    position: absolute;
    inset: -1rem;
    background: linear-gradient(to right, 
      rgba(59, 130, 246, 0.2), 
      rgba(168, 85, 247, 0.2), 
      rgba(244, 63, 94, 0.2)
    );
    border-radius: 1rem;
    filter: blur(2rem);
    z-index: -10;
  }
</style>
