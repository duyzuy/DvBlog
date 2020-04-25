$(document).ready(function(){

    $('button.dropdown').hover(function(){
        $(this).toggleClass('is-open');
    })
});

// const btnDropdown = document.getElementsByClassName('dropdown');

// for(i = 0; i <= btnDropdown.length; i++){
//     btnDropdown[i].addEventListener("mouseenter", function(e){
//          this.classList.add('is-open');
//         console.log(e);
//     })

//     btnDropdown[i].addEventListener("mouseout", function(e){
//         this.classList.remove('is-open');
//        console.log(e);
//    })
// }

const btnSideManage = document.getElementsByClassName('btn-side-manage');
const sideManage = document.getElementById('side-manage');

if(btnSideManage.length !== 0){
    btnSideManage[0].addEventListener('click', function(e){
        e.preventDefault();
        this.classList.toggle('is-active');
        sideManage.classList.toggle('is-active');
        // const overlay = document.createElement('div');
        // overlay.classList.add('overlay');

        // sideManage.appendChild(overlay);
        
    });

    const accordions = document.getElementsByClassName('has-submenu')

    for(i = 0; i < accordions.length; i++){

        const btnAccordion = accordions[i].childNodes[1];

        btnAccordion.nextElementSibling.style.marginTop = '0px';
        btnAccordion.nextElementSibling.style.marginBottom = '0px';

        if(accordions[i].childNodes[1].classList.contains('is-active')){
            const subMenu = accordions[i].childNodes[1].nextElementSibling;
            subMenu.style.maxHeight = subMenu.scrollHeight + 'px';
            subMenu.style.marginTop = '0.75rem';
            subMenu.style.marginBottom = '0.75rem';


        }
        


        btnAccordion.onclick = function(){

            this.parentNode.classList.toggle('is-active');
            const subMenu = this.nextElementSibling;
        

            if(subMenu.style.maxHeight){

                subMenu.style.maxHeight = null;
                subMenu.style.marginTop = '0px';
                subMenu.style.marginBottom = '0px';

            }else{

                subMenu.style.maxHeight = subMenu.scrollHeight + 'px';
                subMenu.style.marginTop = '0.75rem';
                subMenu.style.marginBottom = '0.75rem';

            }
        }
    
    }
}

