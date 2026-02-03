{{-- Toast Provider Component - Wraps all toast elements --}}
<div class="toast-provider">
  {!! $slot !!}
</div>

<style>
  .toast-provider {
    position: relative;
  }
  
  @keyframes slideInFromTop {
    from {
      transform: translateY(-100%);
      opacity: 0;
    }
    to {
      transform: translateY(0);
      opacity: 1;
    }
  }
  
  @keyframes slideInFromBottom {
    from {
      transform: translateY(100%);
      opacity: 0;
    }
    to {
      transform: translateY(0);
      opacity: 1;
    }
  }
  
  @keyframes slideOutToRight {
    from {
      transform: translateX(0);
      opacity: 1;
    }
    to {
      transform: translateX(100%);
      opacity: 0;
    }
  }
  
  @keyframes fadeOut {
    from {
      opacity: 1;
    }
    to {
      opacity: 0;
    }
  }
  
  @media (max-width: 640px) {
    [role="alert"] {
      animation: slideInFromTop 0.3s ease-out;
    }
  }
  
  @media (min-width: 641px) {
    [role="alert"] {
      animation: slideInFromBottom 0.3s ease-out;
    }
  }
  
  [role="alert"].removing {
    animation: slideOutToRight 0.3s ease-in forwards !important;
  }
</style>
