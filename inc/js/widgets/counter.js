document.addEventListener("DOMContentLoaded", function () {
    const counters = document.querySelectorAll(".short-counter-number");

    // Function to convert Persian numbers to English
    const faToEnDigits = str => str.replace(/[۰-۹]/g, d => "۰۱۲۳۴۵۶۷۸۹".indexOf(d));

    // Count function
    const animateCounter = (counter) => {
        const target = +faToEnDigits(counter.getAttribute("data-target"));
        let count = 0;
        const duration = 1500; // Total animation time (milliseconds)
        const stepTime = 20;
        const increment = target / (duration / stepTime);

        const update = () => {
            count += increment;
            if (count < target) {
                counter.textContent = Math.ceil(count);
                setTimeout(update, stepTime);
            } else {
                counter.textContent = target;
            }
        };
        update();
    };

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.classList.contains("counted")) {
                entry.target.classList.add("counted");
                animateCounter(entry.target);
            }
        });
    }, { threshold: 0.5 }); 

    counters.forEach(counter => {
        counter.textContent = "0";
        observer.observe(counter);
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const counters = document.querySelectorAll(".short-counter-number");

    // Function to convert Persian numbers to English
    const faToEnDigits = str => str.replace(/[۰-۹]/g, d => "۰۱۲۳۴۵۶۷۸۹".indexOf(d));

    // Count function
    const animateCounter = (counter) => {
        const target = +faToEnDigits(counter.getAttribute("data-target"));
        let count = 0;
        const duration = 1500; // Total animation time (milliseconds)
        const stepTime = 20;
        const increment = target / (duration / stepTime);

        const update = () => {
            count += increment;
            if (count < target) {
                counter.textContent = Math.ceil(count);
                setTimeout(update, stepTime);
            } else {
                counter.textContent = target;
            }
        };
        update();
    };

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.classList.contains("counted")) {
                entry.target.classList.add("counted");
                animateCounter(entry.target);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(counter => {
        counter.textContent = "0";
        observer.observe(counter);
    });
});
