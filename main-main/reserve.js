let btn=document.getElementsByClassName("booking")
let section=document.getElementById("table-booking")

btn[0].addEventListener("click",function(){
    section.style.display="block"   })



let btnreserve=document.getElementById("reserve_first")
let form1=document.getElementById("form-section-1")
let form2=document.getElementById("form-section-2")




document.getElementById('reserve-first').addEventListener('click', function(event) {
    event.preventDefault(); // Ensure no default behaviors
    const form1 = document.getElementById('form-section-1');
    const form2 = document.getElementById('form-section-2');
    form1.classList.add('animate__animated', 'animate__slideOutLeft');
    
    // Wait for animation to finish before hiding
    form1.addEventListener('animationend', function handler() {
        form1.classList.add('d-none');
        form1.style.display = 'none';
        form2.style.display = 'block';
        form1.classList.remove('animate__animated', 'animate__slideOutLeft');
        form1.removeEventListener('animationend', handler);

        // Show second form with animation
        form2.classList.remove('d-none');
        form2.classList.add('animate__animated', 'animate__slideInRight');
    });
});