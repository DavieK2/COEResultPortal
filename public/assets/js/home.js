function toggleMobileMenu() {
    const nav = document.getElementById('main-nav');
    nav.classList.toggle('open');
}

// Smooth scrolling for anchor links
document.addEventListener('DOMContentLoaded', function() {
    const anchors = document.querySelectorAll('a[href^="#"]');
    anchors.forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Close mobile menu if open
            const nav = document.getElementById('main-nav');
            if (nav.classList.contains('open')) {
                nav.classList.remove('open');
            }
            
            // Scroll to target
            const targetId = this.getAttribute('href');
            if (targetId !== '#') {
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 70, // Adjust for header height
                        behavior: 'smooth'
                    });
                }
            }
        });
    });
    
    // Add active class to menu items on scroll
    window.addEventListener('scroll', function() {
        const sections = document.querySelectorAll('section[id]');
        const scrollPosition = window.scrollY;
        
        sections.forEach(section => {
            const sectionTop = section.offsetTop - 100;
            const sectionHeight = section.offsetHeight;
            const sectionId = section.getAttribute('id');
            
            if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                document.querySelector('nav ul li a[href="#' + sectionId + '"]')?.classList.add('active');
            } else {
                document.querySelector('nav ul li a[href="#' + sectionId + '"]')?.classList.remove('active');
            }
        });
    });
});