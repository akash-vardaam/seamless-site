<footer class="footer">
  <div class="footer-container">
    <div class="footer-grid">
      <!-- Logo & Description -->
      <div class="footer-brand">
        <a href="{{ route('home') }}">
          <img src="{{ asset('assets/logo-white.png') }}" alt="Seamless" class="footer-logo" />
        </a>
        <p class="footer-description">
          A modern, unified AMS Platform built for now and what's to come.
        </p>
      </div>

      <!-- Product Links -->
      <div class="footer-column">
        <h4 class="footer-heading">Product</h4>
        <ul class="footer-links">
          <li><a href="{{ route('features') }}" class="footer-link">Features</a></li>
          <li><a href="{{ route('integrations') }}" class="footer-link">Integrations</a></li>
          <li><a href="{{ route('pricing') }}" class="footer-link">Pricing</a></li>
        </ul>
      </div>

      <!-- Company Links -->
      <div class="footer-column">
        <h4 class="footer-heading">Company</h4>
        <ul class="footer-links">
          <li><a href="{{ route('about') }}" class="footer-link">About</a></li>
          <li><a href="{{ route('contact') }}" class="footer-link">Contact</a></li>
          <li><a href="{{ route('faq') }}" class="footer-link">FAQ</a></li>
        </ul>
      </div>

      <!-- Get Started Links -->
      <div class="footer-column">
        <h4 class="footer-heading">Get Started</h4>
        <ul class="footer-links">
          <li><a href="{{ route('request-demo') }}" class="footer-link">Request a Demo</a></li>
          <li><a href="{{ route('pricing') }}" class="footer-link">View Pricing</a></li>
          <li><a href="{{ route('contact') }}" class="footer-link">Contact Sales</a></li>
        </ul>
      </div>
    </div>

    <!-- Bottom Bar -->
    <div class="footer-bottom">
      <p class="footer-copyright">
        © {{ date('Y') }} Seamless. All rights reserved.
      </p>
      <div class="footer-social">
        <!-- LinkedIn -->
        <a href="#" class="footer-social-link">
          <span class="sr-only">LinkedIn</span>
          <svg class="footer-social-icon" fill="currentColor" viewBox="0 0 24 24">
            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
          </svg>
        </a>
        <!-- Twitter -->
        <a href="#" class="footer-social-link">
          <span class="sr-only">Twitter</span>
          <svg class="footer-social-icon" fill="currentColor" viewBox="0 0 24 24">
            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
          </svg>
        </a>
      </div>
    </div>
  </div>
</footer>

<style>
  /* Footer Styles */
  .footer {
    background-color: #3d3652;
    color: hsl(var(--background));
    padding: 4rem 0;
  }

  .footer-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 1.5rem;
  }

  .footer-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 3rem;
  }

  @media (min-width: 768px) {
    .footer-grid {
      grid-template-columns: repeat(4, 1fr);
    }
  }

  .footer-brand {
    grid-column: span 1;
  }

  .footer-logo {
    height: 2.5rem;
    margin-bottom: 1rem;
  }

  .footer-description {
    color: hsl(var(--muted-foreground));
    font-size: 0.875rem;
    line-height: 1.625;
  }

  .footer-column {
    /* Column styling */
  }

  .footer-heading {
    font-weight: 600;
    font-size: 1.125rem;
    margin-bottom: 1rem;
    color: hsl(var(--background));
  }

  .footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
  }

  .footer-links li {
    font-size: 0.875rem;
  }

  .footer-link {
    color: hsl(var(--muted-foreground));
    text-decoration: none;
    transition: color 0.3s ease;
  }

  .footer-link:hover {
    color: hsl(var(--background));
  }

  .footer-bottom {
    border-top: 1px solid rgba(255, 255, 255, 0.2);
    margin-top: 3rem;
    padding-top: 2rem;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    gap: 1rem;
  }

  @media (min-width: 768px) {
    .footer-bottom {
      flex-direction: row;
    }
  }

  .footer-copyright {
    font-size: 0.875rem;
    color: hsl(var(--muted-foreground));
  }

  .footer-social {
    display: flex;
    gap: 1.5rem;
  }

  .footer-social-link {
    color: hsl(var(--muted-foreground));
    text-decoration: none;
    transition: color 0.3s ease;
  }

  .footer-social-link:hover {
    color: hsl(var(--background));
  }

  .footer-social-icon {
    width: 1.25rem;
    height: 1.25rem;
  }

  .sr-only {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    white-space: nowrap;
    border-width: 0;
  }
</style>
