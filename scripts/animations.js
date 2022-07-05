

(function(){
    'use strict';

    // gsap.from() animamos desde un determinado estado hasta el 
    // estado que ya tenemos definido en el html.

    // gsap.to() animamos desde el estado que tenemos en el html
    // hasta el estado que definimos en el método.

    // timeline() nos permite ordenar nuestras animaciones en una linea
    // de tiempo, de manera que todas las animaciones se ejecutan en secuencia.
    // el tercer parametro es un delay que significa que la animación comenzará justo 
    // después de la animación anterior si ponemos: '<0.5' estamos indicando que la animación
    // tendrá un delay de 0.5 justo despues de la animación que se encuentra en la posición
    // anterior en la linea de tiempo.

    var title = document.querySelector('.page-title');
    var link = document.querySelector('.link');
    var card = document.querySelector('.product-card');
    var section = document.querySelector('.section');
    var navbar = document.querySelector('.navbar-brand');

    gsap.registerPlugin(ScrollTrigger);
    
    if(title){
        gsap.from(title, { 
            duration: 3, 
            opacity:-1,
            x: -450,
            onStart:function(){
                title.classList.add('rounded'); // añade la clase ´rounded´ al iniciar la animación
            },
            onComplete: function(){
                title.classList.remove('rounded');  // se activa cuando termina la animación
            },
        });
    }
        
    if(link){
        gsap.from('.link', { scrollTrigger:'.page-title', duration:4, opacity:0, delay:2});
    }

    if(card){
        gsap.from('.product-card', { 
            duration:1, 
            opacity:0, 
            delay:0.2, 
            scale:0.5, 
            ease:'circ.out',
            scrollTrigger:{
                trigger:'.product-card',
                toggleActions:'restart none none none',
                //  Posible Actions: onEnter  onLeave onEnterBack onLeaveBack
                //   pause, resume, reverse, restart, reset, complete, none 
            }, 
        });
    }

    if(section){
        gsap.from(section, { 
            duration:2, 
            opacity:-1,
            x:400, 
            scrollTrigger:{
                trigger:'.section',
                //toggleActions:'restart reverse none none',
            } 
        });
    }

    if(navbar){
        gsap.from(navbar, {
            duration:3,
            opacity:-1,
            x:400,
        })
    }


    // var timeline = gsap.timeline({defaults: { duration:1 }});
    // timeline
    //     .from('.page-title', {duration: 2, x: -450,})
    //     .from('.link', { duration:1, opacity:0 }, 2)
    //     .from('.product-card', {  opacity:0, scale:0.5, ease:'circ.out',force3D: false}, '<0.2') 

})();