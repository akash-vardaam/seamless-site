<section class="frustration-section" style="background-image: url('{{ asset('assets/section-2-bg.png') }}')">
  <div class="frustration-container">
    <div class="frustration-wrapper">
      <div class="frustration-content">
        <x-ui-scroll-animate animation="fade-right" delay="100">
          <h2 class="frustration-heading">
            The <span class="frustration-highlight">frustration</span><br />
            is definitely <span class="frustration-highlight">real!</span>
          </h2>
        </x-ui-scroll-animate>

        <x-ui-scroll-animate animation="fade-right" delay="200">
          <p class="frustration-text">
            Most AMS platforms ask you to choose.<br />
            Powerful backend or a modern website.<br />
            Membership or events. Structure or flexibility.
          </p>
        </x-ui-scroll-animate>

        <x-ui-scroll-animate animation="fade-right" delay="300">
          <p class="frustration-emphasis">
            That tension shows up everywhere — in your tools,<br />
            your workflows, and your member experience.
          </p>
        </x-ui-scroll-animate>
      </div>
    </div>
  </div>
</section>

<style>
  .frustration-section {
    background-size: cover;
    background-position: right;
    background-repeat: no-repeat;
  }

  @media (min-width: 768px) {
    .frustration-section {
      background-position: left;
    }
  }

  .frustration-container {
    min-width: 75vw;
    margin: 0 auto;
    padding: 5rem 1.5rem;
  }

  .frustration-wrapper {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    min-height: 80vh;
  }

  .frustration-content {
    text-align: center;
    max-width: 36rem;
  }

  @media (min-width: 1024px) {
    .frustration-content {
      text-align: left;
      margin-left: auto;
    }
  }

  .frustration-heading {
    font-size: 2.5rem;
    font-weight: 700;
    font-family: Aspira,Inter,sans-serif;
    color: hsl(var(--foreground));
    margin-bottom: 1.5rem;
  }

  @media (min-width: 768px) {
    .frustration-heading {
      font-size: 3rem;
    }
  }

  @media (min-width: 1024px) {
    .frustration-heading {
      font-size: 3.5rem;
    }
  }

  .frustration-highlight {
    color: hsl(var(--primary));
  }

  .frustration-text {
    font-size: 1rem;
    color: hsl(var(--muted-foreground));
    margin-bottom: 1.5rem;
  }

  @media (min-width: 768px) {
    .frustration-text {
      font-size: 1.125rem;
    }
  }

  .frustration-emphasis {
    font-size: 1rem;
    color: hsl(var(--foreground));
    font-weight: 500;
  }

  @media (min-width: 768px) {
    .frustration-emphasis {
      font-size: 1.125rem;
    }
  }
</style>
