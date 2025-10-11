document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".short-counter-number").forEach(counter => {
        let target = +counter.getAttribute("data-target");
        let count = 0;
        let step = Math.ceil(target / 50);
        let interval = setInterval(() => {
            count += step;
            if (count >= target) {
                count = target;
                clearInterval(interval);
            }
            counter.textContent = count;
        }, 30);
    });
});