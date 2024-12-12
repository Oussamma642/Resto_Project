// let btn=document.getElementsByClassName("booking")
// let section=document.getElementById("table-booking")

// btn[0].addEventListener("click",function(){
//     section.style.display="block"   })



// let btnreserve=document.getElementById("reserve_first")
// let form1=document.getElementById("form-section-1")
// let form2=document.getElementById("form-section-2")




// document.getElementById('reserve-first').addEventListener('click', function(event) {
//     event.preventDefault(); // Ensure no default behaviors
//     const form1 = document.getElementById('form-section-1');
//     const form2 = document.getElementById('form-section-2');
//     form1.classList.add('animate__animated', 'animate__slideOutLeft');
    
//     // Wait for animation to finish before hiding
//     form1.addEventListener('animationend', function handler() {
//         form1.classList.add('d-none');
//         form1.style.display = 'none';
//         form2.style.display = 'block';
//         form1.classList.remove('animate__animated', 'animate__slideOutLeft');
//         form1.removeEventListener('animationend', handler);

//         // Show second form with animation
//         form2.classList.remove('d-none');
//         form2.classList.add('animate__animated', 'animate__slideInRight');
//     });
// });











let btn = document.getElementsByClassName("booking");
let section = document.getElementById("table-booking");

btn[0].addEventListener("click", function() {
    section.style.display = "block";
});

let btnreserve = document.getElementById("reserve-first");
let form1 = document.getElementById("form-section-1");
let form2 = document.getElementById("form-section-2");

// Reserve button click event (form1 -> form2)
document.getElementById('reserve-first').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent default form behavior
    const form1 = document.getElementById('form-section-1');
    const form2 = document.getElementById('form-section-2');
    
    // Add slide-out animation to form1
    form1.classList.add('animate__animated', 'animate__slideOutLeft');
    
    // Wait for the animation to finish before hiding form1
    form1.addEventListener('animationend', function handler() {
        form1.classList.add('d-none');  // Hide form1
        form1.style.display = 'none';    // Ensure form1 is not displayed
        form2.style.display = 'block';  // Show form2
        form1.classList.remove('animate__animated', 'animate__slideOutLeft');  // Remove the animation class
        form1.removeEventListener('animationend', handler);  // Remove the event listener

        // Add slide-in animation to form2
        form2.classList.remove('d-none');
        form2.classList.add('animate__animated', 'animate__slideInRight');
    });
});

// Back button click event (form2 -> form1)
document.getElementById('back-first').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent default behavior
    const form1 = document.getElementById('form-section-1');
    const form2 = document.getElementById('form-section-2');
    
    // Add slide-out animation to form2
    form2.classList.add('animate__animated', 'animate__slideOutLeft');
    
    // Wait for the animation to finish before hiding form2
    form2.addEventListener('animationend', function handler() {
        form2.classList.add('d-none');  // Hide form2
        form2.style.display = 'none';    // Ensure form2 is not displayed
        form1.style.display = 'block';  // Show form1
        form2.classList.remove('animate__animated', 'animate__slideOutLeft');  // Remove the animation class
        form2.removeEventListener('animationend', handler);  // Remove the event listener

        // Add slide-in animation to form1
        form1.classList.remove('d-none');
        form1.classList.add('animate__animated', 'animate__slideInRight');
    });
});
