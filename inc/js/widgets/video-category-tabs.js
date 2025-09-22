document.addEventListener("DOMContentLoaded", function() {
    const tabTitles = document.querySelectorAll(".mytube-titles-wrapper .title-wrapper");
    const tabPanes = document.querySelectorAll(".tabs-content .tab-pane");

    tabTitles.forEach((title, index) => {
        title.setAttribute("data-tab", index); // هر عنوان تب هم data-tab بگیره
        title.addEventListener("click", function() {
            const target = this.getAttribute("data-tab");

            tabTitles.forEach(t => t.classList.remove("active"));
            tabPanes.forEach(p => p.classList.remove("active"));

            this.classList.add("active");
            const targetPane = document.querySelector(`.tabs-content .tab-pane[data-tab="${target}"]`);
            if (targetPane) {
                targetPane.classList.add("active");
            }
        });
    });
});
