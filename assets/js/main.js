(function() {
  "use strict";
 
  /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }
 
  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    let selectEl = select(el, all)
    if (selectEl) {
      if (all) {
        selectEl.forEach(e => e.addEventListener(type, listener))
      } else {
        selectEl.addEventListener(type, listener)
      }
    }
  }
 
  /**
   * Easy on scroll event listener 
   */
  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
  }
 
  /**
   * Navbar links active state on scroll
   */
  let navbarlinks = select('#navbar .scrollto', true)
  const navbarlinksActive = () => {
    let position = window.scrollY + 200
    navbarlinks.forEach(navbarlink => {
      if (!navbarlink.hash) return
      let section = select(navbarlink.hash)
      if (!section) return
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        navbarlink.classList.add('active')
      } else {
        navbarlink.classList.remove('active')
      }
    })
  }
  window.addEventListener('load', navbarlinksActive)
  onscroll(document, navbarlinksActive)
 
  /**
   * Scrolls to an element with header offset
   */
  const scrollto = (el) => {
    let header = select('#header')
    let offset = header.offsetHeight
 
    let elementPos = select(el).offsetTop
    window.scrollTo({
      top: elementPos - offset,
      behavior: 'smooth'
    })
  }
 
  /**
   * Toggle .header-scrolled class to #header when page is scrolled
   */
  let selectHeader = select('#header')
  let selectTopbar = select('#topbar')
  if (selectHeader) {
    const headerScrolled = () => {
      if (window.scrollY > 100) {
        selectHeader.classList.add('header-scrolled')
        if (selectTopbar) {
          selectTopbar.classList.add('topbar-scrolled')
        }
      } else {
        selectHeader.classList.remove('header-scrolled')
        if (selectTopbar) {
          selectTopbar.classList.remove('topbar-scrolled')
        }
      }
    }
    window.addEventListener('load', headerScrolled)
    onscroll(document, headerScrolled)
  }
 
  /**
   * Back to top button
   */
  let backtotop = select('.back-to-top')
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) {
        backtotop.classList.add('active')
      } else {
        backtotop.classList.remove('active')
      }
    }
    window.addEventListener('load', toggleBacktotop)
    onscroll(document, toggleBacktotop)
  }
 
  /**
   * Mobile nav toggle
   */
  on('click', '.mobile-nav-toggle', function(e) {
    select('#navbar').classList.toggle('navbar-mobile')
    this.classList.toggle('bi-list')
    this.classList.toggle('bi-x')
  })
 
  /**
   * Mobile nav dropdowns activate
   */
  on('click', '.navbar .dropdown > a', function(e) {
    if (select('#navbar').classList.contains('navbar-mobile')) {
      e.preventDefault()
      this.nextElementSibling.classList.toggle('dropdown-active')
    }
  }, true)
 
  /**
   * Scrool with ofset on links with a class name .scrollto
   */
  on('click', '.scrollto', function(e) {
    if (select(this.hash)) {
      e.preventDefault()
 
      let navbar = select('#navbar')
      if (navbar.classList.contains('navbar-mobile')) {
        navbar.classList.remove('navbar-mobile')
        let navbarToggle = select('.mobile-nav-toggle')
        navbarToggle.classList.toggle('bi-list')
        navbarToggle.classList.toggle('bi-x')
      }
      scrollto(this.hash)
    }
  }, true)
 
  /**
   * Scroll with ofset on page load with hash links in the url
   */
  window.addEventListener('load', () => {
    if (window.location.hash) {
      if (select(window.location.hash)) {
        scrollto(window.location.hash)
      }
    }
  });
 
  /**
   * Hero carousel indicators
   */
  let heroCarouselIndicators = select("#hero-carousel-indicators")
  let heroCarouselItems = select('#heroCarousel .carousel-item', true)
 
  heroCarouselItems.forEach((item, index) => {
    (index === 0) ?
    heroCarouselIndicators.innerHTML += "<li data-bs-target='#heroCarousel' data-bs-slide-to='" + index + "' class='active'></li>":
      heroCarouselIndicators.innerHTML += "<li data-bs-target='#heroCarousel' data-bs-slide-to='" + index + "'></li>"
  });
 
  /**
   * Testimonials slider
   */
  new Swiper('.events-slider', {
    speed: 600,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    }
  });
 
  /**
   * Initiate gallery lightbox 
   */
  const galleryLightbox = GLightbox({
    selector: '.gallery-lightbox'
  });
 
  /**
   * Testimonials slider
   */
  new Swiper('.testimonials-slider', {
    speed: 600,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    }
  });
 
})();
/**
 * Custom UX improvements: mobile menu, filters, validation and AJAX forms.
 */
(function () {
  const $ = (selector, root = document) => root.querySelector(selector);
  const $$ = (selector, root = document) => Array.from(root.querySelectorAll(selector));
 
  const progress = $('#scroll-progress');
  const openStatus = $('#open-status');
  const navbar = $('#navbar');
  const navbarToggle = $('.mobile-nav-toggle');
  const menuFilterButtons = $$('#menu-flters li');
  const serverForms = $$('.php-server-form');
 
  const setVisible = (element, visible) => {
    if (element) element.style.display = visible ? 'block' : 'none';
  };
 
  const setMessage = (form, type, message = '') => {
    const loading = $('.loading', form);
    const sent = $('.sent-message', form);
    const error = $('.error-message', form);
 
    setVisible(loading, type === 'loading');
    setVisible(sent, type === 'success');
    setVisible(error, type === 'error');
 
    if (type === 'success' && sent && message) sent.textContent = message;
    if (type === 'error' && error) error.textContent = message;
    if (type === 'error' && !error) alert(message);
  };
 
  const isValidEmail = (email) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
 
  const validateFields = (form, rules) => {
    const data = new FormData(form);
 
    for (const rule of rules) {
      const value = String(data.get(rule.name) || '').trim();
      const valid = rule.test(value, data);
      if (!valid) {
        setMessage(form, 'error', rule.message);
        return false;
      }
    }
 
    return true;
  };
 
  const validationRules = {
    'order-form': [
      { name: 'name', test: (v) => v.length >= 2, message: 'Introduceți un nume valid.' },
      { name: 'email', test: isValidEmail, message: 'Introduceți un email valid.' },
      { name: 'phone', test: (v) => v.length >= 6, message: 'Introduceți un număr de telefon valid.' },
      { name: 'date', test: (v) => v.length > 0, message: 'Selectați data comenzii.' },
      { name: 'time', test: (v) => v.length > 0, message: 'Selectați ora comenzii.' },
      { name: 'people', test: (v) => /^\d+$/.test(v) && Number(v) >= 1 && Number(v) <= 20, message: 'Numărul de persoane trebuie să fie între 1 și 20.' },
      { name: 'message', test: (v) => v.length >= 5, message: 'Introduceți detaliile comenzii.' }
    ],
    'contact-form': [
      { name: 'name', test: (v) => v.length >= 2, message: 'Introduceți numele tău.' },
      { name: 'email', test: isValidEmail, message: 'Introduceți un email valid.' },
      { name: 'subject', test: (v) => v.length >= 3, message: 'Introduceți subiectul mesajului.' },
      { name: 'message', test: (v) => v.length >= 10, message: 'Mesajul trebuie să conțină cel puțin 10 caractere.' }
    ]
  };
 
  window.validateOrderForm = () => {
    const form = $('#order-form');
    return form ? validateFields(form, validationRules['order-form']) : true;
  };
 
  window.validateContactForm = () => {
    const form = $('#contact-form');
    return form ? validateFields(form, validationRules['contact-form']) : true;
  };
 
  const submitAjax = async (form) => {
    setMessage(form, 'loading');
 
    try {
      const formData = new FormData(form);
      if (!formData.get('form_type')) {
        if (form.id === 'order-form') formData.set('form_type', 'order');
        if (form.id === 'contact-form') formData.set('form_type', 'contact');
      }
 
      const response = await fetch(form.action, {
        method: 'POST',
        body: new URLSearchParams(formData),
        headers: {
          'X-Requested-With': 'XMLHttpRequest',
          'Accept': 'application/json',
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      });
 
      let data;
      try {
        data = await response.json();
      } catch (parseError) {
        throw new Error('Serverul nu a răspuns cu formatul așteptat. Verifică setup-ul PHP.');
      }
 
      if (!response.ok || !data.ok) {
        throw new Error(data.message || 'A apărut o eroare la trimitere.');
      }
 
      setMessage(form, 'success', data.message || 'Datele au fost trimise cu succes.');
      form.reset();
    } catch (error) {
      setMessage(form, 'error', error.message || 'Nu s-a putut trimite formularul. Încearcă din nou.');
    }
  };
 
  serverForms.forEach((form) => {
    form.addEventListener('submit', (event) => {
      event.preventDefault();
      const rules = validationRules[form.id] || [];
      if (validateFields(form, rules)) submitAjax(form);
    });
 
    form.addEventListener('input', () => {
      setVisible($('.error-message', form), false);
      setVisible($('.sent-message', form), false);
    });
  });
 
  const updateScrollProgress = () => {
    if (!progress) return;
    const maxScroll = document.documentElement.scrollHeight - window.innerHeight;
    progress.style.width = (maxScroll > 0 ? (window.scrollY / maxScroll) * 100 : 0) + '%';
  };
 
  const updateOpenStatus = () => {
    if (!openStatus) return;
 
    const parts = new Intl.DateTimeFormat('en-GB', {
      timeZone: 'Europe/Chisinau',
      weekday: 'short',
      hour: '2-digit',
      minute: '2-digit',
      hour12: false
    }).formatToParts(new Date());
 
    const weekday = (parts.find((part) => part.type === 'weekday') || {}).value || '';
    const hour = Number((parts.find((part) => part.type === 'hour') || {}).value || 0);
    const minute = Number((parts.find((part) => part.type === 'minute') || {}).value || 0);
    const totalMinutes = hour * 60 + minute;
    const isOpen = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'].includes(weekday) && totalMinutes >= 780 && totalMinutes < 1200;
 
    openStatus.textContent = isOpen ? 'Deschis acum' : 'Închis acum';
    openStatus.classList.toggle('is-open', isOpen);
    openStatus.classList.toggle('is-closed', !isOpen);
  };
 
  const initMenuFilter = () => {
    const menuContainer = $('.menu-container');
    if (!menuContainer || !menuFilterButtons.length) return;
 
    if (typeof Isotope !== 'undefined') {
      const isotope = new Isotope(menuContainer, { itemSelector: '.menu-item', layoutMode: 'fitRows' });
      menuFilterButtons.forEach((button) => {
        button.addEventListener('click', (event) => {
          event.preventDefault();
          menuFilterButtons.forEach((item) => item.classList.remove('filter-active'));
          button.classList.add('filter-active');
          isotope.arrange({ filter: button.dataset.filter || '*' });
        });
      });
      return;
    }
 
    menuFilterButtons.forEach((button) => {
      button.addEventListener('click', (event) => {
        event.preventDefault();
        const filter = button.dataset.filter || '*';
        menuFilterButtons.forEach((item) => item.classList.remove('filter-active'));
        button.classList.add('filter-active');
        $$('.menu-item', menuContainer).forEach((item) => {
          item.style.display = filter === '*' || item.matches(filter) ? '' : 'none';
        });
      });
    });
  };
 
  const initMobileMenu = () => {
    if (!navbar || !navbarToggle) return;
 
    navbarToggle.addEventListener('click', (event) => {
      event.preventDefault();
      navbar.classList.toggle('navbar-mobile');
      navbarToggle.classList.toggle('bi-list');
      navbarToggle.classList.toggle('bi-x');
    });
 
    $$('#navbar a').forEach((link) => {
      link.addEventListener('click', () => {
        navbar.classList.remove('navbar-mobile');
        navbarToggle.classList.add('bi-list');
        navbarToggle.classList.remove('bi-x');
      });
    });
  };
 
  window.addEventListener('scroll', updateScrollProgress);
  window.addEventListener('load', () => {
    updateScrollProgress();
    updateOpenStatus();
    initMenuFilter();
    initMobileMenu();
    setInterval(updateOpenStatus, 60000);
  });
})();