<section class="better-way-section" style="background-image: url('{{ asset('assets/section-3-bg.png') }}')">
  <div class="better-way-container">
    <x-ui-scroll-animate animation="scale">
      <h2 class="better-way-heading">
        There Has to<br />
        Be a Better Way.
      </h2>
    </x-ui-scroll-animate>

    <x-ui-scroll-animate animation="fade-up" delay="150">
      <p class="better-way-text">
        Membership, engagement, and design shouldn't<br />
        compete. They should work together.
      </p>
    </x-ui-scroll-animate>

    <x-ui-scroll-animate animation="fade-up" delay="300">
      <p class="better-way-tagline">
        Quietly. Continuously. Seamless.
      </p>
    </x-ui-scroll-animate>
  </div>
</section>

<style>
  .better-way-section {
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
  }

  .better-way-container {
    position: relative;
    z-index: 10;
    text-align: center;
    padding: 5rem 1.5rem;
    max-width: 56rem;
    margin: 0 auto;
  }

  .better-way-heading {
    font-size: 2.5rem;
    font-weight: 700;
    font-family: Aspira,Inter,sans-serif;
    color: hsl(var(--primary-foreground));
    margin-bottom: 1.5rem;
    line-height: 1.25;
  }

  @media (min-width: 768px) {
    .better-way-heading {
      font-size: 3rem;
    }
  }

  @media (min-width: 1024px) {
    .better-way-heading {
      font-size: 3.5rem;
    }
  }

  .better-way-text {
    font-size: 1rem;
    color: rgba(255, 255, 255, 0.8);
    margin-bottom: 1rem;
    max-width: 36rem;
    margin-left: auto;
    margin-right: auto;
  }

  @media (min-width: 768px) {
    .better-way-text {
      font-size: 1.125rem;
    }
  }

  .better-way-tagline {
    font-size: 1.125rem;
    font-family: Aspira,Inter,sans-Aspira,Inter,sans-serifserif;
    color: hsl(var(--primary-foreground));
  }

  @media (min-width: 768px) {
    .better-way-tagline {
      font-size: 1.25rem;
    }
  }
</style>
