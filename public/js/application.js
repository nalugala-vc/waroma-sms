let buttondiv=document.getElementById('buttondiv');
let buttondiv2=document.getElementById('buttondiv2');

buttondiv.addEventListener('click',function(){
    document.getElementById('main').style.display='none';
    document.getElementById('maintoo').style.display='block';
})

buttondiv2.addEventListener('click',function(){
    document.getElementById('maintoo').style.display='none';
    document.getElementById('main').style.display='block';
})