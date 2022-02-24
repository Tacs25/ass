// // Get all sections that have an ID defined
// const sections = document.querySelectorAll("section[id]");

// // Add an event listener listening for scroll
// window.addEventListener("scroll", () => {
//     let current = '';
//     sections.forEach(section => {
//         const sectionTop = section.offsetTop;
//         const sectionHeight = section.clientHeight;

//         if (pageYOffset >= (sectionTop - sectionHeight / 3)) {
//             current = section.getAttribute("id");

//         }
//     })
//     navLi.forEach(li => {
//         li.classList.remove('active');
//         if (li.classList.contains(current)) {
//             li.classList.add('active')

//         }
//     })
// })


// Get all sections that have an ID defined
// const sections = document.querySelectorAll("section[id]");

// // Add an event listener listening for scroll
// window.addEventListener("scroll", navHighlighter);

// function navHighlighter() {

//     // Get current scroll position
//     let scrollY = window.pageYOffset;

//     // Now we loop through sections to get height, top and ID values for each
//     sections.forEach(current => {
//         const sectionHeight = current.offsetHeight;
//         const sectionTop = current.offsetTop - 50;
//         sectionId = current.getAttribute("id");

//         /*
//         - If our current scroll position enters the space where current section on screen is, add .active class to corresponding navigation link, else remove it
//         - To know which link needs an active class, we use sectionId variable we are getting while looping through sections as an selector
//         */
//         if (
//             scrollY > sectionTop &&
//             scrollY <= sectionTop + sectionHeight
//         ) {
//             document.querySelector(".navbar a[href*=" + sectionId + "]").classList.add("active");
//         } else {
//             document.querySelector(".navbar a[href*=" + sectionId + "]").classList.remove("active");
//         }
//     });
// }