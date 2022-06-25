const menuToggle = document.querySelector('.menu');
const sidebar = document.querySelector('#menusidebar');
const close_sidebar = document.querySelector('.close_sidebar');

menuToggle.addEventListener('click',function(){
    sidebar.classList.toggle('slide');

});

close_sidebar.addEventListener('click',function(){
    sidebar.classList.remove('slide')

});





