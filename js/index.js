let index = 0;
    function slideshow(){
        let getslide = document.getElementsByClassName('slide');
        if(index > getslide.length - 1){
            index = 0;
        }
        if(index < 0){
            index = getslide.length - 1;
        }
        for (let i  = 0; i  < getslide.length; i ++) {
            getslide[i].style.display = "none";  
        }
        getslide[index].style.display = "block";
    }
    slideshow();
        function prevous(){
            index --;
            slideshow();
        }
        function next(){
            index ++;
            slideshow();
        }
        let loop;
        function auto(){
            loop = setInterval(function(){
                next();
            }, 1000);
        }