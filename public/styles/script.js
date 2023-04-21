const navLinkEls = document.querySelectorAll("nav-link");
const windowPathname = window.location.pathname;

navLinkEls.forEach(navLinkEl => {
    const navLinkPathname = new URL(navLinkEL.href).pathname;

    if(windowPathname === navLinkPathname){
        navLinkEl.add("active")
    }
})